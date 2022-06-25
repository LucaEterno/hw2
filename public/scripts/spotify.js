function startRicerca(event){
  event.preventDefault();
  const track = document.querySelector('#track');
  const track_title = encodeURIComponent(track.value);
  track.value = "";
  if (track_title!=''){
    fetch(BASE_URL + 'spotify/api/cerca/' + track_title).then(onResponse).then(trackJson);
  }
}

function onResponse(response) {
  console.log('Risposta ricevuta');
  return response.json();
}

function trackJson(json){
  document.body.classList.add('no-scroll');
  const modale = document.querySelector(".trackMod");
  modale.classList.add('modaleT');
  const box = document.querySelector(".box");

  console.log(json);
  const list = json;
  const tracks = list.tracks.items;

  for(let i = 0; i < 1; i++){
    const a = document.createElement("a");
    a.classList.add('url');
    a.href = tracks[i].external_urls.spotify; 
    const img = document.createElement("img");
    img.classList.add('cover');
    img.src = tracks[i].album.images[0].url;
    a.appendChild(img);
    box.appendChild(a);
  }

  fetch(BASE_URL + 'tracks/exist/' + encodeURIComponent(tracks[0].external_urls.spotify).slice(41)).then(onResponse).then(currentJson);
}

function currentJson(json){
  console.log(json);
  if (json.length>0){
    const removeButton = document.querySelector('#rimuovi');
    removeButton.classList.add('mostra');
    removeButton.classList.remove('hide');
  } else {
    const addButton = document.querySelector('#aggiungi');
    addButton.classList.add('mostra');
    addButton.classList.remove('hide');
  }
}

const form = document.querySelector('form');
form.addEventListener('submit', startRicerca);

function aggiungiPref(){
  const a = document.querySelector(".url");
  const url = encodeURIComponent(a.href);
  const img = document.querySelector(".cover");
  const img_url = encodeURIComponent(img.src);
  const form_data = new FormData();
  form_data.append('url', url);
  form_data.append('img', img_url);
  form_data.append('_token', csrf_token);
  //fetch(BASE_URL + 'tracks/add/' + url.slice(41) + '/' + img_url.slice(34)).then(onResponse).then(cambiaButton);
  fetch(BASE_URL + 'tracks/add', {method: 'post', body: form_data}).then(onResponse).then(cambiaButton);
}

function rimuoviPref(){
  const a = document.querySelector(".url");
  const url = encodeURIComponent(a.href);
  fetch(BASE_URL + 'tracks/remove/' + url.slice(41)).then(onResponse).then(cambiaButton);
}

function removeModaleTrack(){
  const divBox = document.querySelector(".box");
  divBox.innerHTML = "";

  const button = document.querySelector('.mostra');
  button.classList.add('hide');
  button.classList.remove('mostra');

  const divModale = document.querySelector(".modaleT");
  divModale.classList.remove('modaleT');
  document.body.classList.remove('no-scroll');
}

function cambiaButton(json){
  console.log(json);
  if (json.ok){
    const button = document.querySelector('.mostra');
    const hiddenButton = document.querySelector('.hide');
    button.classList.remove('mostra');
    button.classList.add('hide');
    hiddenButton.classList.add('mostra');
    hiddenButton.classList.remove('hide');
  }
}

const addButton = document.querySelector("#aggiungi");
addButton.addEventListener("click", aggiungiPref);
const removeButton = document.querySelector("#rimuovi");
removeButton.addEventListener("click", rimuoviPref);
const closeButton = document.querySelector("#close");
closeButton.addEventListener("click", removeModaleTrack);

function startPlaylist(){
    fetch(BASE_URL + 'spotify/api/playlist').then(onResponse).then(playlistJson);
}

function playlistJson(json){
    document.body.classList.add('no-scroll');
    const modale = document.querySelector(".playlistMod");
    modale.classList.add('modaleP');
    modale.addEventListener("click", removeModalePlaylist);
  
    console.log(json);
    const playlist = json;
    const tracksPlaylist = playlist.tracks.items;
  
    for(let i = 0; i < tracksPlaylist.length; i++){
      const a = document.createElement("a");
      a.href = tracksPlaylist[i].track.external_urls.spotify;
      const img = document.createElement("img");
      img.src = tracksPlaylist[i].track.album.images[0].url;
      a.appendChild(img);
      modale.appendChild(a);
    }
}
  
function removeModalePlaylist(){
  const divModale = document.querySelector(".modaleP");
  divModale.innerHTML = "";
  divModale.classList.remove('modaleP');
  document.body.classList.remove('no-scroll');
}

const playlistButton = document.querySelector("#playlist");
playlistButton.addEventListener("click", startPlaylist);