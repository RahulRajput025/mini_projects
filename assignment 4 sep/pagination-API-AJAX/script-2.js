const paginationNumbers = document.getElementById("pagination-numbers");
const paginatedList = document.getElementById("paginated-list");
const listItems = paginatedList.querySelectorAll("li");
const nextButton = document.getElementById("next-button");
const prevButton = document.getElementById("prev-button");

var pageCount = 5;
var paginationLimit = 25;
var currentPage = 1;


const disableButton = (button) => {
    button.classList.add("disabled");
    button.setAttribute("disabled", true);
};

const enableButton = (button) => {
    button.classList.remove("disabled");
    button.removeAttribute("disabled");
};

const handlePageButtonsStatus = () => {
    if (currentPage === 1) {
        disableButton(prevButton);
    } else {
        enableButton(prevButton);
    }

    if (pageCount === currentPage) {
        disableButton(nextButton);
    } else {
        enableButton(nextButton);
    }
};

const appendPageNumber = (index) => {
    const pageNumber = document.createElement("button");
    pageNumber.className = "pagination-number";
    pageNumber.innerHTML = index;
    pageNumber.setAttribute("page-index", index);
    pageNumber.setAttribute("aria-label", "Page " + index);

    paginationNumbers.appendChild(pageNumber);
};

const handleActivePageNumber = () => {
    document.querySelectorAll(".pagination-number").forEach((button) => {
        button.classList.remove("active");
        const pageIndex = Number(button.getAttribute("page-index"));
        if (pageIndex == currentPage) {
            button.classList.add("active");
        }
    });
};

const getPaginationNumbers = () => {
    for (let i = 1; i <= pageCount; i++) {
        appendPageNumber(i);
        displayImage();
    }
};



const setCurrentPage = (pageNum) => {
    currentPage = pageNum;

    handleActivePageNumber();
    handlePageButtonsStatus();

    const prevRange = (pageNum - 1) * paginationLimit;
    const currRange = pageNum * paginationLimit;
    console.log(pageNum);
};


// pagination numbers
window.addEventListener("load", () => {
    getPaginationNumbers();
    setCurrentPage();
    displayImage(currentPage);

    prevButton.addEventListener("click", () => {
        setCurrentPage(currentPage - 1);
        displayImage(currentPage);
    });

    nextButton.addEventListener("click", () => {
        setCurrentPage(currentPage + 1);
        displayImage(currentPage);
    });

    document.querySelectorAll(".pagination-number").forEach((button) => {
        const pageIndex = Number(button.getAttribute("page-index"));

        if (pageIndex) {
            button.addEventListener("click", () => {
                setCurrentPage(pageIndex);
                displayImage(currentPage);

            });
        }
    });
});





const displayImage = async (currentPage, pageCount) => {
    var pageCount = 6;
    var auth = 'LUDPiFk6poMfR_4HFNHTchMwqPC6sdgbdrEM3P6MqWM';
    var paginationLimit = 30;
    // var currentPage = 1;
    let options = {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        }
    }
    let fetchRes = await fetch(
        `https://api.unsplash.com/photos/?client_id=${auth}&page=${currentPage}&per_page=${pageCount}&Total=${paginationLimit}`, options);

    let data = await fetchRes.json();
    console.log(data);

    let image_display = document.querySelectorAll('.image_card');
    for (let i = 0; i < data.length; i++) {
        image_display[i].src = data[i]['links']['download'];
    }
}
displayImage(currentPage);
