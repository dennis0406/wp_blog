function dark_mode() {
  var element = document.getElementsByClassName("switch__dark-mode");
  for(var i = 0; i 
    < element.length; i++){
      element[i].classList.toggle("dark-mode");
  }
}

var btn = document.getElementById("btn_menu");
var modal_menu = document.getElementsByClassName("header__menu")[0];
btn.onclick = function(){
  modal_menu.style.display = "block"
}

window.onclick = function(event) {
  if (event.target == modal_menu) {
    modal_menu.style.display = "none";
  }
}