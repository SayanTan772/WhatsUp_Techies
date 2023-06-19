// Get the form element
const form = document.querySelector('.myform');

// Listen for the form submit event
form.addEventListener('submit', function(event) {
  event.preventDefault(); // Prevent the form from submitting normally

  // Send the form data to the server using AJAX
  const xhr = new XMLHttpRequest();
  xhr.open('POST', 'update-db.php');
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
    }
  };
  const formData = new FormData(form); // Get the form data
  xhr.send(formData);
});