var requests_list=document.querySelector(".req-list");

setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "req-show.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            requests_list.innerHTML = data;
          }
        }
      }
    xhr.send();
  }, 500);