let number = prompt("Enter a number and hit enter:");
let count = 0;
let number_2 = 1;

while (number_2 <= number) {
    if (number % number_2 == 0) {
        count = count + 1;
    }
    number_2++;
}
if (count == 2) {
    console.log("Prime Number");
} else {
    console.log("not a prime number");
}
