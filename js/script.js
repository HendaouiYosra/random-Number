console.log("Score: ", score);
console.log("Username: ", username);
console.log("id ", id);
var a;
let essai = 0;
let table = [];
var isGameActive = true;

function initialisation() {
  deleteGame(id);
  deleteAttempts(id);
  document.getElementById("essaiInput").value = "";
  document.getElementById("rep").value = "";
  document.getElementById("msgInput").value = "";
  document.getElementById("prop").value = "";
  document.getElementById("msgInput").value = "";
  a = Math.round(Math.random() * 100);
  addGame(a, id);

  essai = 0;
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
  fetchAllAttempts(id);

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

  if (essai <= 5 && x != a) {
    if (x > a) {
      resultMessage = "less";

      console.log(essai, x, resultMessage, id);
      addAttempt(essai, x, resultMessage, id);
    } else if (x < a) {
      resultMessage = "more";

      console.log(essai, x, resultMessage, id);
      addAttempt(essai, x, resultMessage, id);
    } else {
      if (isGameActive) {
        //game = sessionStorage.getItem("game_id");
        //console.log(game);
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

    row.appendChild(val);
    row.appendChild(message);
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
function addGame(a, id) {
  fetch("/TopicListing-1.0.0/php/addgame.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ number_to_guess: a, id: id }), // Include the 'id' here
  })
    .then((response) => {
      // Handle the response from the server, if needed
      console.log("Data modified successfully");
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
function deleteGame(id) {
  console.log(id);
  fetch(`/TopicListing-1.0.0/php/deletegame.php?id=${id}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-HTTP-Method-Override": "DELETE",
    },
    body: JSON.stringify({ id: id }), // Include the 'id' here
  })
    .then((response) => {
      // Handle the response from the server, if needed
      console.log("Data deleted");
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
function addAttempt(attempt_num, value, message, id) {
  fetch("/TopicListing-1.0.0/php/addattempt.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      attempt_num: attempt_num,
      value: value,
      message: message,
      id: id,
    }), // Include the 'id' here
  })
    .then((response) => {
      // Handle the response from the server, if needed
      console.log("attempt added");
    })
    .catch((error) => {
      console.error("Error attempt:", error);
    });
}

function deleteAttempts(id) {
  console.log(id);
  fetch(`/TopicListing-1.0.0/php/deleteattempts.php?id=${id}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-HTTP-Method-Override": "DELETE",
    },
    body: JSON.stringify({ id: id }), // Include the 'id' here
  })
    .then((response) => {
      // Handle the response from the server, if needed
      console.log("attempts deleted");
    })
    .catch((error) => {
      console.error("Error:", error);
    });
}
function fetchAllAttempts(id) {
  fetch(`/TopicListing-1.0.0/php/getAllAttempts.php?id=${id}`)
    .then((response) => response.json())
    .then((attempts) => {
      // Handle the fetched attempts here
      console.log("Fetched all attempts:", attempts);
      // Process the fetched data or update the UI
      // For example:
      displayAttempts(attempts);
    })
    .catch((error) => console.error("Error fetching all attempts:", error));
}

function displayAttempts(attempts) {
  const historique = document.getElementById("historique");

  // Clear previous history
  historique.innerHTML = "";

  // Loop through attempts and populate the table
  attempts.forEach((attempt) => {
    const row = document.createElement("tr");
    const attemptNum = document.createElement("td");
    attemptNum.innerHTML = attempt.attempt_num;
    const value = document.createElement("td");
    value.innerHTML = attempt.value;
    const message = document.createElement("td");
    message.innerHTML = attempt.message;

    row.appendChild(attemptNum);
    row.appendChild(value);
    row.appendChild(message);
    historique.appendChild(row);
  });
}

function updateDisplayedScore(score) {
  // Update the displayed score in the HTML element
  document.getElementById("scoreDisplay").innerText = score;
}
function closeWindow() {
  window.location.href = "/TopicListing-1.0.0/Login.php";
}
