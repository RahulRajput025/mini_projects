let num = 10;
let str = "";
for (let i = 1; i <= num; i++) {
  for (let j = 1; j <= num - i; j++) {
    str += "  ";
  }
  for (let k = 0; k < 2 * i - 1; k++) {
    str += "* ";
  }
//  For Second inline triangle
  for (let j = 1; j <= num - i; j++) {
    str += "    ";
  }
  for (let k = 0; k < 2 * i - 1; k++) {
    str += "* ";
  }
  str += "\n";
}
console.log(str);
