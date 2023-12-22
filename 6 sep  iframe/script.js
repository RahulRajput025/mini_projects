function changeContent() {
    var iframeContent = document.getElementById("i_frame").contentWindow;;
    iframeContent.document.getElementsByTagName('li')[1].innerHTML =
    "Favourite of Nami And Robbin";  
}