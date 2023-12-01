// recuperer le username
var username = sessionStorage.getItem("username");
var score = sessionStorage.getItem("score");
// Check if username is available in sessionStorage
if (username) {
  // Use the username in your JavaScript logic
  console.log("Username retrieved from sessionStorage:", username);
} else {
  console.log("Username not found in sessionStorage");
}
