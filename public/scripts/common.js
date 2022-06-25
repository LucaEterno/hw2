function currentPage(){
  const pathname = window.location.pathname.slice(12);

  if (pathname == 'home'){
    const link = document.querySelector('.link1');
    link.classList.add('here');
    const navlink = document.querySelector('.navlink1');
    navlink.classList.add('here');
  } else if (pathname == 'add-event') {
    const link = document.querySelector('.link2');
    link.classList.add('here');
    const navlink = document.querySelector('.navlink2');
    navlink.classList.add('here');
  } else if (pathname == 'spotify') {
    const link = document.querySelector('.link3');
    link.classList.add('here');
    const navlink = document.querySelector('.navlink3');
    navlink.classList.add('here');
  } else if (pathname == 'preferiti') {
    const link = document.querySelector('.link4');
    link.classList.add('here');
    const navlink = document.querySelector('.navlink4');
    navlink.classList.add('here');
  }
}

function apriModale(){
    document.body.classList.add('no-scroll');
    const modale = document.querySelector(".mobileMod");
    modale.classList.add('modaleM');
    modale.addEventListener("click", removeModale);
}

function removeModale(){
    const divModale = document.querySelector(".modaleM");
    divModale.classList.remove('modaleM');
    document.body.classList.remove('no-scroll');
  }

const mobileButton = document.querySelector(".hide_nav");
mobileButton.addEventListener("click", apriModale);

currentPage();