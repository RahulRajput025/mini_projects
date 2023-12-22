function submit() {
  var colors = document.getElementsByName("color");
  var selectedColors = [];
  for (var i = 0; i < colors.length; i++) {
    if (colors[i].checked == true) {
      selectedColors.push(colors[i].value);
    }
    // else{
    //   alert("please select any color");
    //   break;
    // }
  }
  document.getElementById("output").innerText = selectedColors;
}

function selectAll() {
  let select = document.getElementsByName("color");
  for (let i = 0; i < select.length; i++) {
    select[i].checked = true;
  }
}
