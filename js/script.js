console.log("Score: ", score);
console.log("Username: ", username);
console.log("id ", id);
var a = Math.round(Math.random() * 100);
let essai = 0;
let table = [];
var isGameActive = true;
function initialisation() {
  document.getElementById("essaiInput").value = "";
  document.getElementById("rep").value = "";
  document.getElementById("msgInput").value = "";
  document.getElementById("prop").value = "";
  document.getElementById("msgInput").value = "";
  a = Math.round(Math.random() * 100);
  essai = 1;
  console.log(a);
  historique.innerHTML = "";
  isGameActive = true;
}
function affiche() {
  if (!isGameActive) {
    return; // Stop further actions if the game is not active
  }
  document.getElementById("rep").value = "la valeur recherchée est :" + a;
  isGameActive = false;
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
  var scoreToAdd = 50;

  document.getElementById("essaiInput").value = essai + 1;

  console.log(x);
  essai = essai + 1;
  scoreToAdd -= 10;

  if (essai <= 5) {
    sessionStorage.setItem(essai, x);
    if (x > a) {
      resultMessage = "less";
    } else if (x < a) {
      resultMessage = "more";
    } else {
      if (isGameActive) {
        // Check if the game is still active before updating the score
        score = score + scoreToAdd;
        modify_score(score, id);
        resultMessage = "You WIN ";
        updateDisplayedScore(score);
        isGameActive = false;
      }
    }
    document.getElementById("msgInput").value = resultMessage;
  } else {
    alert("No more Attempts allowed ");
    isGameActive = false;
  }

  if (isGameActive) {
    console.log(x, essai);
    var historique = document.getElementById("historique");
    let row = document.createElement("tr");
    let histor = document.createElement("td");
    histor.innerHTML = essai;
    let val = document.createElement("td");
    val.innerHTML = x;
    let message = document.createElement("td"); // New column for message
    message.innerHTML = resultMessage;
    row.appendChild(histor);
    row.appendChild(message);
    row.appendChild(val);
    historique.appendChild(row);
  }
}
function modify_score(score, id) {
  fetch("/TopicListing-1.0.0/php/modifyData.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ score: score, id: id }), // Include the 'id' here
  })
    .then((response) => {
      // Handle the response from the server, if needed
      console.log("Data modified successfully");
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}

function updateDisplayedScore(score) {
  // Update the displayed score in the HTML element
  document.getElementById("scoreDisplay").innerText = score;
}
