function fetchEvent(){
    fetch(BASE_URL + 'events/list').then(onResponse).then(eventJson);
}

function filtra(event){
    const filtro = event.currentTarget;
    console.log(filtro.value);
    fetch(BASE_URL + 'events/list/filtered/' + encodeURIComponent(filtro.value)).then(onResponse).then(eventJson);
}

function onResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}

function eventJson(json) {
    console.log(json);
   
    const passati = document.querySelector(".passati");
    passati.innerHTML = '';
    const futuri = document.querySelector(".futuri");
    futuri.innerHTML = '';

    for (let i=0; i < json.length; i++){
        let data = new Date;
        data = Date.parse(data);
        data = ((data-(Date.parse(json[i].data)))/1000) + 7200;

        if(data<86399){
            const row1 = document.createElement("div");
            const row2 = document.createElement("div");
            const box = document.createElement("div");
            box.classList.add('buttonBox');

            const eventid = document.createElement("p");
            eventid.classList.add('hide');
            eventid.setAttribute("id", 'e'+json[i].id);
            eventid.textContent = json[i].id;
            row1.appendChild(eventid);

            const title = document.createElement("h3");
            title.textContent = json[i].tipo;
            row1.appendChild(title);

            const followButton = document.createElement("input");
            followButton.type = "button";
            followButton.value = "Follow";
            followButton.addEventListener('click', follow);
            box.appendChild(followButton);

            const unfollowButton = document.createElement("input");
            unfollowButton.type = "button";
            unfollowButton.value = "Unfollow";
            unfollowButton.classList.add('hide');
            box.appendChild(unfollowButton);

            const infoButton = document.createElement("input");
            infoButton.type = "button";
            infoButton.value = "👁";
            infoButton.addEventListener('click', info);
            box.appendChild(infoButton);
            
            const data = document.createElement("p");
            const newdate = new Date(json[i].data);
            const day = newdate.getDate();
            const month = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", 
                            "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"][newdate.getMonth()];
            const year = newdate.getFullYear();
            data.textContent = "Data: " + day + " " + month + " " + year;
            row2.appendChild(data);

            const user = document.createElement("p");
            user.textContent = "Promosso da: " + json[i].user;
            row2.appendChild(user);
            
            row1.appendChild(box);
            futuri.appendChild(row1);
            futuri.appendChild(row2);
        } else {
            const row1 = document.createElement("div");
            const row2 = document.createElement("div");

            const eventid = document.createElement("p");
            eventid.classList.add('hide');
            eventid.textContent = json[i].id;
            row1.appendChild(eventid);

            const title = document.createElement("h3");
            title.textContent = json[i].tipo;
            row1.appendChild(title);

            const data = document.createElement("p");
            const newdate = new Date(json[i].data);
            const day = newdate.getDate();
            const month = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", 
                            "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"][newdate.getMonth()];
            const year = newdate.getFullYear();
            data.textContent = "Data: " + day + " " + month + " " + year;
            row2.appendChild(data);

            const user = document.createElement("p");
            user.textContent = "Promosso da: " + json[i].user;
            row2.appendChild(user);

            passati.appendChild(row1);
            passati.appendChild(row2);
        }
    }
    fetch(BASE_URL + 'events/list/filtered/Followed').then(onResponse).then(followed);
}

function followed(json){
    console.log(json);

    for (let i=0; i < json.length; i++) {
        const n = document.querySelector('#e'+json[i].id);
        if (n != null){
            const followButton = n.parentNode.childNodes[2].childNodes[0];
            followButton.classList.add('hide');
            followButton.removeEventListener('click', follow);
            const unfollowButton = n.parentNode.childNodes[2].childNodes[1];
            unfollowButton.classList.remove('hide');
            unfollowButton.addEventListener('click', unfollow);
        }
    }
}

function follow(event){
    console.log("ADESSO SEGUI QUESTO EVENTO");
    const button = event.currentTarget;
    button.classList.add('change');
    button.removeEventListener('click', follow);

    const eventid = button.parentNode.parentNode.childNodes[0];
    const url = encodeURIComponent(eventid.textContent);
    fetch(BASE_URL + 'events/follow/add/' + url).then(onResponse).then(cambiaButton);
}

function unfollow(event){
    console.log("NON SEGUI PIÙ QUESTO EVENTO");
    const button = event.currentTarget;
    button.classList.add('change');
    button.removeEventListener('click', unfollow);

    const eventid = button.parentNode.parentNode.childNodes[0];
    const url = encodeURIComponent(eventid.textContent);
    fetch(BASE_URL + 'events/follow/remove/' + url).then(onResponse).then(cambiaButton);
}

function cambiaButton(json){
    console.log(json);
    const button = document.querySelector('.change');
    button.classList.remove('change');
    if (json.ok){
        if (button === button.parentNode.firstChild){
            button.classList.add('hide');
            hiddenButton = button.parentNode.childNodes[1];
            hiddenButton.classList.remove('hide');
            hiddenButton.addEventListener('click', unfollow);
        } else {
            button.classList.add('hide');
            hiddenButton = button.parentNode.childNodes[0];
            hiddenButton.classList.remove('hide');
            hiddenButton.addEventListener('click', follow);
        }
    } else {
        if (button === button.parentNode.firstChild){
            button.addEventListener('click', follow);
        } else {
            button.addEventListener('click', unfollow);
        }
    }
}

function info(event){
    console.log("Apro pannello info...");
    const button = event.currentTarget;

    const eventid = button.parentNode.parentNode.childNodes[0];
    const url = encodeURIComponent(eventid.textContent);
    fetch(BASE_URL + 'events/get/info/' + url).then(onResponse).then(infoPanel);
}

function infoPanel(json){
    document.body.classList.add('no-scroll');
    const modale = document.querySelector(".infoMod");
    modale.classList.add('modale');
    const infobox = document.querySelector(".infobox");
    const row1 = document.createElement("div");
    const row2 = document.createElement("div");
    row2.setAttribute("id", "row");

    console.log(json);
    const title = document.createElement("h1");
    title.textContent = json.tipo;
    row1.appendChild(title);

    const id = document.createElement("p");
    const root = "000000"
    const serial = (root+json.id).slice(-root.length);
    id.textContent = "Event serial number: #" + serial;
    row1.appendChild(id);
    
    const descr = document.createElement("p");
    descr.textContent = "Descrizione evento: " + json.descr;
    row2.appendChild(descr);

    const data = document.createElement("p");
    const newdate = new Date(json.data);
    const day = newdate.getDate();
    const month = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", 
                    "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"][newdate.getMonth()];
    const year = newdate.getFullYear();
    data.textContent = "Data di inizio: " + day + " " + month + " " + year;
    row2.appendChild(data);

    const cdata = document.createElement("p");
    const newcdate = new Date(json.created_at.slice(0, 10));
    const cday = newcdate.getDate();
    const cmonth = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", 
                    "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"][newcdate.getMonth()];
    const cyear = newcdate.getFullYear();
    cdata.textContent = "Data di creazione: " + cday + " " + cmonth + " " + cyear;
    row2.appendChild(cdata);

    const user = document.createElement("p");
    user.textContent = "Promosso da: " + json.user;
    row2.appendChild(user);

    fetch(BASE_URL + 'events/get/follower/' + encodeURIComponent(json.id)).then(onResponse).then(counter);

    const closeButton = document.createElement("input");
    closeButton.type = "button";
    closeButton.value = "Close";
    closeButton.addEventListener('click', closeModale);

    infobox.appendChild(row1);
    infobox.appendChild(row2);
    infobox.appendChild(closeButton);
}

function counter(json){
    console.log(json);
    const follower = document.createElement("p");
    follower.textContent = "Follower: " + json.follower;
    const row = document.querySelector("#row");
    row.appendChild(follower);
}

function closeModale(){
    const infobox = document.querySelector(".infobox");
    infobox.innerHTML = "";
  
    const modale = document.querySelector(".modale");
    modale.classList.remove('modale');
    document.body.classList.remove('no-scroll');
  }

fetchEvent();
document.querySelector('#filter').addEventListener('change', filtra);