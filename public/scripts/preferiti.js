function fetchPref(){
    fetch(BASE_URL + 'tracks/list').then(onResponse).then(preferitiJson);
}

function onResponse(response) {
    if (!response.ok) {return null};
    return response.json();
}

function preferitiJson(json) {
    console.log(json);
   
    const preferiti = document.querySelector(".preferiti");
    preferiti.innerHTML = '';

    for (let i=0; i < json.length; i++){
            const row = document.createElement("div");
            
            const img = document.createElement("img");
            img.src = decodeURIComponent(json[i].img);

            const a = document.createElement("a");
            a.textContent = decodeURIComponent(json[i].canzone);
            a.href = decodeURIComponent(json[i].canzone);

            const button = document.createElement("input");
            button.type = "button";
            button.value = "Rimuovi";
            button.addEventListener('click', rimuovi);

            row.appendChild(img);
            row.appendChild(a);
            row.appendChild(button);
            preferiti.appendChild(row);
    }

}

function rimuovi(event){
    console.log("Rimuovo...");
    const button = event.currentTarget;

    const a = button.parentNode.childNodes[1];
    a.classList.add('toRemove');
    const url = encodeURIComponent(a.href);
    fetch(BASE_URL + 'tracks/remove/' + url.slice(41)).then(onResponse).then(rimuoviJson);
}

function rimuoviJson(json){
    const a = document.querySelector('.toRemove');
    a.classList.remove('toRemove');
    if (json.ok){
        a.parentNode.innerHTML = "";
    }
}

fetchPref();