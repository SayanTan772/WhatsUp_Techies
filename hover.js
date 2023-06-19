const card = document.querySelector(".slider-container");
const card1 = document.querySelector(".card1");
const card2 = document.querySelector(".card2");
const card3 = document.querySelector(".card3");

// Set initial scale values before attaching event handlers
card2.style.transform = "scale(1)";
card1.style.transform = "scale(0.9)";
card3.style.transform = "scale(0.9)";

card1.onmouseenter = () => {
  card1.style.transform = "scale(1)";
  card2.style.transform = "scale(0.9)";
  card3.style.transform = "scale(0.9)";
};

card2.onmouseenter = () => {
  card2.style.transform = "scale(1)";
  card1.style.transform = "scale(0.9)";
  card3.style.transform = "scale(0.9)";
}

card3.onmouseenter = () => {
  card3.style.transform = "scale(1)";
  card2.style.transform = "scale(0.9)";
  card1.style.transform = "scale(0.9)";
};

card.onmouseleave = () => {
  card2.style.transform = "scale(1)";
  card1.style.transform = "scale(0.9)";
  card3.style.transform = "scale(0.9)";
};
