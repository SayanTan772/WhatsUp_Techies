const chatSearchBar = document.querySelector(".chat-search"); 
const recentchats = document.querySelector(".recent");

chatSearchBar.onkeyup = ()=>{ 
    let search = chatSearchBar.value; 
    if(search != ""){
        chatSearchBar.classList.add("active-now"); 
      }else{
        chatSearchBar.classList.remove("active-now"); 
      }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "search-recent-chats.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            recentchats.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("search=" + search);
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "recent-chats.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!chatSearchBar.classList.contains("active-now")){ 
            recentchats.innerHTML = data;
          }
        }
      }
    }
  xhr.send();
}, 500);
