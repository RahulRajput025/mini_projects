// FORM VALIDATION
function errorMessage(id, message) {
  element = document.getElementById(id);
  element = document.getElementsByClassName(id)[0]["innerText"] = message;
}

function validateForm() {
  let returnInput = true;

  // Name Validation
  let username = document.getElementById("username").value;
  if (username == "" || username == null) {
    errorMessage("name", "Please Enter Name");
    returnInput = false;
  }

  // Contact Validation
  let number = document.getElementById("phone_number").value;
  if (number.length < 10) {
    errorMessage("number", "Number should be of 10 digits");
    returnInput = false;
  }

  // Password Validation
  let password = document.getElementById("user_password");
  if (password.value.length < 6) {
    errorMessage("password", "*Password must be greater than 6");
    returnInput = false;
  }

  // Gender box validation
  let male = document.getElementById("male");
  let female = document.getElementById("female");
  if (male.checked != true && female.checked != true) {
    errorMessage("gender", "Please select gender");
    returnInput = false;
  }

  // // Select Box Validation
  let cse_sub = document.getElementById("cse");
  let electronics_sub = document.getElementById("electronics");
  let mechanical_sub = document.getElementById("mechanical");
  let civil_sub = document.getElementById("civil");

  // let select = document.getElementById("select");
  if (
    cse_sub.selected != true &&
    electronics_sub.selected != true &&
    mechanical_sub.selected != true &&
    civil_sub.selected != true
  ) {
    errorMessage("stream", "please select a stream");
    returnInput = false;
  }

  // Text area Validation
  let textarea = document.getElementById("description").value;
  if (textarea == "" && textarea.length < 20) {
    errorMessage("description", "Enter Description more than 20 words");
    returnInput = false;
  }
  return returnInput;
}

// JSON Format
const form = document.getElementById("myForm");

form.addEventListener("submit", function (event){
  event.preventDefault();
  const formData = new FormData(form);
  const jsonObject = Object.fromEntries(formData);
  const jsonString = JSON.stringify(jsonObject, null, 4);

  document.getElementById("json").innerText = jsonString;
  console.log(jsonString);


  // Array Format
let formArray = [];
let nameArr = document.getElementById('username').value;
let emailArr = document.getElementById('email').value;
let numberArr = document.getElementById('phone_number').value;
let passwordArr = document.getElementById('user_password').value;
let genderArr = document.querySelector('input[name = gender]:checked').value;
let selectBoxArr = document.getElementById('select').value;
let descArr = document.getElementById('description').value;


formArray.push(nameArr,emailArr,numberArr,passwordArr, genderArr, selectBoxArr,descArr);
let output = JSON.stringify(formArray , null , 2);
document.getElementById('array').innerText = output;
console.log(output);
});





