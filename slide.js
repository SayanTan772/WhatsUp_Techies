const btn=document.querySelector(".save-btn");
var front=document.querySelector(".frontcard");

btn.addEventListener("click", function(e){
    
    front.classList.add("slide");
});