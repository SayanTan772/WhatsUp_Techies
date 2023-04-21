const form = document.querySelector(".mssg-box"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = form.querySelector(".message"),
chatBox = document.querySelector(".chat-area"),
sendBtn = form.querySelector(".send");

form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.onkeyup = ()=>{
    if(inputField.value != ""){
        sendBtn.classList.add("active");
    }else{
        sendBtn.classList.remove("active");
    }
}

chatBox.onmouseenter = ()=>{
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

sendBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "insert-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              inputField.value = "";
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `get-chat.php?incoming_id=${incoming_id}`, true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          chatBox.innerHTML = data;
          if (!chatBox.classList.contains('active')) {
            scrollToBottom();
          }
        }
      }
    };
    xhr.send();
  }, 500);

function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  } 