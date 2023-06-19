function updateUserStatus(userId) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        document.querySelector('.user-status').textContent = xhr.responseText;
      }
    };
    xhr.open('POST', 'update-status.php');
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('user_id=' + userId);
  }
  
  setInterval(function() {
    var userId = document.querySelector('.incoming_id').value;
    updateUserStatus(userId);
  }, 500);
  
  