const fs = require("fs"); // Import the 'fs' module

fetch("https://data.wa.gov/api/views/f6w7-q2d2/rows") //API
  .then((res) => res.json())
  .then((data) => handle(data));

// document.getElementById("Generate_CSV");
function handle(inputData) {
  const headers = Object.keys(inputData.data[0]);
  var main = inputData.data.map((item) => {
    return Object.values(item).toString();
  });

  // Divide API Data into chunks
  const chunkSize = 30000;
  var chunkedData = []; //Empty Chunk Array Where all the chunks will be stored
  for (let i = 0; i < main.length; i += chunkSize) {
    var chunk = main.slice(i, i + chunkSize);
    chunkedData.push(chunk);
  }
  // console.log(chunkedData);
  // Chnage item values of selected headers
  const thirdColumn = inputData.data.map((item) => {
    item[headers[2]] = "abc";
    // item[headers[2]].push("abc");
    return item[headers[2]];

  });
  // console.log(thirdColumn);

  var combineChunks = [].concat(...chunkedData); //combining chunks
  var csv = [headers.join(","), ...combineChunks].join("\n"); // converting data into csv file

  fs.writeFile("data.csv", csv, (err) => {
    if (err) {
      console.error("Error writing CSV file:", err);
    } else {
      console.log("CSV file has been saved to data.csv");
    }
  });
}

// function startCSVDownload(csv) {
//   const blob = new Blob([csv], { type: "application/csv" });
//   const url = URL.createObjectURL(blob);
//   const a = document.createElement("a");
//   a.download = "data.csv";
//   a.href = url;

//   document.body.appendChild(a);

//   a.click();
//   a.remove();
//   URL.revokeObjectURL(url);
// }
