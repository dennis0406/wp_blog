// Dark mode js
var darkOn = localStorage.getItem("dnbl_dark");
console.log(darkOn);
if (darkOn == "true") {
  dark_mode();
}

function dark_mode() {
  var element = document.getElementsByClassName("switch__dark-mode");
  for (var i = 0; i < element.length; i++) {
    element[i].classList.toggle("dark-mode");
  }
  var check = element[0].classList.contains("dark-mode");
  if (check) {
    localStorage.setItem("dnbl_dark", "true");
    document.getElementById("switch__icon").innerHTML = '<ion-icon name="sunny-outline" onclick="dark_mode()" ></ion-icon>';
  } else {
    localStorage.setItem("dnbl_dark", "false");
    document.getElementById("switch__icon").innerHTML = '<ion-icon name="moon-outline" onclick="dark_mode()"></ion-icon>';
  }
}

// Modal js
var btn = document.getElementById("btn_menu");
var modal_menu = document.getElementsByClassName("header__menu")[0];
var ulmenu = modal_menu.getElementsByTagName("ul")[0];
// ulmenu.classList.add("dark-mode");
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
