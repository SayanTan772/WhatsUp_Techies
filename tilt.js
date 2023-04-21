const card=document.querySelector(".card");
const angle=20;
var rotateX,rotateY;

card.addEventListener("mousemove", (e) => {
  const width=card.offsetWidth;
  const height=card.offsetHeight;
  const centerX=card.offsetLeft + width/2;
  const centerY=card.offsetTop + height/2;
  const mouseX=e.clientX - centerX;
  const mouseY=e.clientY - centerY;
  rotateX=(angle*mouseY)/(height/2);
  rotateY=(angle*mouseX)/(width/2);
  card.style.setProperty("--rotateX", rotateX + "deg");
  card.style.setProperty("--rotateY", rotateY + "deg");
});

card.addEventListener("mouseleave", (e) => {
  rotateX=0;
  rotateY=0;
  card.style.setProperty("--rotateX", rotateX + "deg");
  card.style.setProperty("--rotateY", rotateY + "deg");
});

