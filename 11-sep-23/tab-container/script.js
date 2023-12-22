function character(characterName) {
    var i;
    var x = document.getElementsByClassName("op_character");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";  
    }
    document.getElementById(characterName).style.display = "block";  
  }