const listItems = document.getElementById("listitems");
const prevButton = document.getElementById("previous-btn");
const nextButton = document.getElementById("next-btn");
const Pagenumbers = document.getElementById("pagination-numbers");

let paginationLimit = 10;
const pageCount = Math.ceil(listItems.length / paginationLimit);
let currentPage = 1;

const disabledBtn = (button) => {
  button.classList.add("disabled");
  button.setAttribute("disabled", true);
};

const enabledBtn = (button) => {
  button.classList.remove("disabled");
  button.removeAttribute("disabled");
};

// Previous and Next Button events
const buttonEvents = () => {
  if (currentPgae === 1) {
    disabledBtn(prevButton);
  } else {
    enabledBtn(prevButton);
  }

  if (pageCount === currentPage) {
    disabledBtn(nextButton);
  } else {
    enabledBtn(prevButton);
  }
};

const ActiveBtn = ()=>{
    document.querySelectorAll("pagination-numbers").forEach((button) =>{

    })
}
