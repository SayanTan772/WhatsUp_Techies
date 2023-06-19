const button = document.getElementById('settings-btn');
const dropdown = document.getElementById('dropdown');
var temp = false;

button.addEventListener("click", function() {
  if (temp == false) {
    dropdown.style.display = "flex";
    button.style.backgroundColor = "rgb(160, 86, 229)";
    button.style.color = "hsla(0,100%,100%,1)";
    temp = true;
  } else {
    dropdown.style.display = "none";
    button.style.backgroundColor = "";
    button.style.color = "";
    temp = false;
  }
});

// Hide dropdown when clicking outside
document.addEventListener("click", function(event) {
  const isClickInside = button.contains(event.target) || dropdown.contains(event.target);
  if (!isClickInside) {
    dropdown.style.display = "none";
    button.style.backgroundColor = "";
    button.style.color = "";
    temp = false;
  }
});
