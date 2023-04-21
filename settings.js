const button=document.getElementById('settings-btn');
const dropdown=document.getElementById('dropdown');
var temp=false;

button.addEventListener("click", function() {
    if(temp==false){
        dropdown.style.display="flex";
        button.style.backgroundColor="hsla(251, 60%, 60%, 0.8)";
        button.style.color="hsla(0,100%,100%,1)";
        temp=true;
    }else{
        dropdown.style.display="none";
        button.style.backgroundColor="";
        button.style.color="";
        temp=false;
    }
});