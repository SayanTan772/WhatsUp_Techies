function visibility()
   {
    var x=document.getElementById("password");
    var icon1=document.getElementById("closed-eye");
    var icon2=document.getElementById("open-eye");

    if(x.type=="password")
     {
        x.type="text";
        icon1.style.display="none";
        icon2.style.display="block";
        icon2.style.display = "inline";
      }
    else{
        x.type="password";
        icon1.style.display="block";
        icon1.style.display = "inline";
        icon2.style.display="none";
      }
    }