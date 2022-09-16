var btn = document.getElementById("btn_menu");
var modal_menu = document.getElementsByClassName("header__menu")[0];
var button_g = document.getElementsByClassName("button");
var button_g1 = document.getElementsByClassName("btn");
var ulmenu = modal_menu.getElementsByTagName("ul")[0];
ulmenu.classList.add("switch__dark-mode");


var nav_item = ulmenu.querySelectorAll("li a");
for (var i = 0; i < nav_item.length; i++) {
  if(nav_item[i].getAttribute("href")==window.location.href){
    nav_item[i].classList.add("active");
  }
}


// Modal js
btn.onclick = function () {
  modal_menu.style.display = "block";
  ulmenu.classList.add("move_right");
};

window.onclick = function (event) {
  if (event.target == modal_menu) {
    modal_menu.style.display = "var(--dp-menu)";
    ulmenu.classList.remove("move_right");
}
};

// Dark mode js
var darkOn = localStorage.getItem("dnbl_dark");
// console.log(darkOn);
if (darkOn == "true") {
  dark_mode();
  for (var i = 0; i < button_g.length; i++) {
    button_g[i].classList.add("switch__dark-mode--button");
  }
  for (var j = 0; j < button_g1.length; j++) {
    button_g1[j].classList.add("switch__dark-mode--button");
  }
}

function dark_mode() {
  let checkBtn = false;
  var element = document.getElementsByClassName("switch__dark-mode");
  for (var i = 0; i < element.length; i++) {
    element[i].classList.toggle("dark-mode");
  }
  for (var j = 0; j < button_g.length; j++) {
    if(button_g[j].classList.contains("btn")){
      button_g[j].classList.toggle("switch__dark-mode--button")      
    }else{
      button_g[j].classList.toggle("switch__dark-mode--button");
    }
  }
  for (var x = 0; x < button_g1.length; x++) {
    if(button_g1[x].classList.contains("button")){
      break;
    }else{
      button_g1[x].classList.toggle("switch__dark-mode--button");
    }
  }
  var check = element[0].classList.contains("dark-mode");
  if (check) {
    localStorage.setItem("dnbl_dark", "true");
    document.getElementById("switch__icon").innerHTML = '<ion-icon name="sunny-outline"  title="Turn off dark mode" onclick="dark_mode()" ></ion-icon>';
  } else {
    localStorage.setItem("dnbl_dark", "false");
    document.getElementById("switch__icon").innerHTML = '<ion-icon name="moon-outline" onclick="dark_mode()"></ion-icon>';
  }
}

function searchBtn() {
  document.getElementById("search_global").classList.toggle('search__open')
}

let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("banner__item");
  let dots = document.getElementsByClassName("dot");
  if(slides[0]){
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active_slide", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active_slide";
    setTimeout(showSlides, 3000);
  }
}

