var username = $_SESSION["username"];
console.log(username); // You can now use 'username' in your JavaScript code
var a = Math.round(Math.random() * 100);
let essai = 0;
let table = [];

function initialisation() {
  document.getElementById("essaiInput").value = "";
  document.getElementById("rep").value = "";
  document.getElementById("msgInput").value = "";
  document.getElementById("prop").value = "";
  document.getElementById("msgInput").value = "";
  a = Math.round(Math.random() * 100);
  essai = 0;
  console.log(a);
  historique.innerHTML = "";
}
function affiche() {
  //document.getElementById("rep").textContent=a;
  document.getElementById("rep").value = "la valeur recherchée est :" + a;
}
document.addEventListener("DOMContentLoaded", function () {
  // Find the form by its ID
  var myForm = document.getElementById("myForm");

  // Add an event listener to the form's submit event
  myForm.addEventListener("submit", function (event) {
    // Prevent the default form submission behavior
    event.preventDefault();

    verif();
  });
});

function verif() {
  var x = document.getElementById("prop").value;
  document.getElementById("essaiInput").value = essai;

  console.log(x);
  essai = essai + 1;

  if (essai < 15) {
    sessionStorage.setItem(essai, x);
    if (x > a) {
      document.getElementById("msgInput").value = "less";
    } else if (x < a) {
      document.getElementById("msgInput").value = "more";
    } else {
      document.getElementById("msgInput").value = "You WIN ";
    }
  } else {
    alert("No more Attempts allowed ");
  }
  console.log(x, essai);
  var historique = document.getElementById("historique");
  let row = document.createElement("tr");
  let histor = document.createElement("td");
  histor.innerHTML = essai;
  let val = document.createElement("td");
  val.innerHTML = x;
  row.appendChild(histor);
  row.appendChild(val);
  historique.appendChild(row);
}
