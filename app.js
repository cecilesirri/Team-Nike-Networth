// alert("Copy");

// let calcNetWorth = document.querySelector("#calc-asset");

// function calc() {
//   // body...
//   let asset = parseInt(document.getElementById("assets").value);
//   let cash = parseInt(document.getElementById("cash").value);
//   let liability = parseInt(document.getElementById("liability").value);
//   let result;
// //   console.log(typeof asset);

//   if ((result = asset + cash - liability)) {
//     // result = parseInt(currency);
//     let toCurrency = new Intl.NumberFormat("en-NG", {
//       style: "currency",
//       currency: "NGN"
//     }).format(result);
//     document.querySelector("#result").innerHTML = toCurrency;
// 	console.log(result);
//   }

// }

// calcNetWorth.addEventListener("click", calc);

// function restCalc() {
//   document.getElementById("myForm").reset();
// }

let toCurrency

/* let modal = document.querySelector(".display-result");
let trigger = document.querySelector(".trigger");
let closeButton = document.querySelector(".close-btn");

function toggleModal() {
  modal.classList.toggle("show-result");
}

function windowOnClick(event) {
  if (event.target === modal) {
    toggleModal();
  }
}

trigger.addEventListener("click", toggleModal);
closeButton.addEventListener("click", toggleModal);
window.addEventListener("click", windowOnClick); */

//inputs addition
function add() {
  var land = parseFloat(document.getElementById("land").value);
  var furniture = parseFloat(document.getElementById("furniture").value);
  var vehicles = parseFloat(document.getElementById("vehicles").value);
  var royalty = parseFloat(document.getElementById("royalty").value);
  var others = parseFloat(document.getElementById("others").value);

  sum = land + furniture + vehicles + royalty + others;

  if (!isNaN(sum)) {
    document.getElementById("total").value = sum;
  }
}
function addLiabilities() {
  var expenses = parseFloat(document.getElementById("expenses").value);
  var loan = parseFloat(document.getElementById("loan").value);
  var tax = parseFloat(document.getElementById("tax").value);
  var rent = parseFloat(document.getElementById("rent").value);
  var other = parseFloat(document.getElementById("other").value);

  total = expenses + loan + tax + rent + other;

  if (!isNaN(total)) {
    document.getElementById("total-liabilities").value = total;
  }
}

function calc() {
  var assets = parseFloat(document.getElementById("total-liabilities").value);
  var land = parseFloat(document.getElementById("land").value);
  var furniture = parseFloat(document.getElementById("furniture").value);
  var vehicles = parseFloat(document.getElementById("vehicles").value);
  var royalty = parseFloat(document.getElementById("royalty").value);
  var others = parseFloat(document.getElementById("others").value);

  liabilities = land + furniture + vehicles + royalty + others;
  net = -(assets - liabilities);
  if (!isNaN(net)) {
    document.getElementById("net").value = net;
  }
}
