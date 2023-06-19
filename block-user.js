const blockBtn = document.querySelector(".block");

blockBtn.onclick = () => {
    const incomingId = document.querySelector(".incoming_id").value;
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "block-user.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                //let data = xhr.response;
                //mssgBox.innerHTML = data;
            } 
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("user_id=" + incomingId);
}
