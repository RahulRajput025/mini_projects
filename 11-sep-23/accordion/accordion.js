var access_btn = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < access_btn.length; i++) {
    access_btn[i].addEventListener("click", function () {
        this.classList.toggle("active");
        if (this.classList.contains("active")) {
            this.querySelector("i").classList.replace("fa-plus", "fa-minus");
        }
        else {
            this.querySelector("i").classList.replace("fa-minus", "fa-plus");
        }
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    })
}
