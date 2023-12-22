
let number = prompt("Enter the number of terms: ");
let number_1 = 0;
let number_2 = 1;
count = 0;

for (let i = 1; i <= number; i++) {
    console.log(number_1);
    count = number_1 + number_2;
    number_1 = number_2;
    number_2 = count;
}