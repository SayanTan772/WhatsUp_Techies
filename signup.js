const form = document.querySelector(".myform");
const Btn = form.querySelector(".signup-btn");
const error = form.querySelector("#error");
const success = form.querySelector("#success");

form.onsubmit = (e)=>{
    e.preventDefault(); // prevents form from submitting
}

Btn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "register.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){
                success.style.display = "flex"; // show the success box
                success.textContent = "Registered successfully!"; // set the success message
                error.style.display = "none"; // hide the error box
              }else{
                error.style.display = "flex"; // show the error box
                error.textContent = data; // set the error message
                success.style.display = "none"; // hide the success box if there's an error
              }
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}