const form = document.querySelector(".myform"),
Btn = form.querySelector(".signup-btn"),
error = form.querySelector(".error");

form.onsubmit = (e)=>{
    e.preventDefault();
}

Btn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "register.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                location.href="signin.php";
              }else{
                error.style.display = "flex";
                error.textContent = data;
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}