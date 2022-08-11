function dark_mode() {
  var element = document.getElementsByClassName("side");
  for(var i = 0; i 
    < element.length; i++){
      element[i].classList.toggle("dark-mode");
  }
}