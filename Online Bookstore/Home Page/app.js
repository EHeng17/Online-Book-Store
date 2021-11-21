const card = document.querySelectorAll(".card_inner"); /* Get the first element in the document with class="card_inner" */

function flipCard() {
  this.classList.toggle('is-flipped');
}

card.forEach((card) => card.addEventListener("click", flipCard));

/*
REFERENCE

Potts, T. (2020, September 24). Awesome Card Flip Animation using CSS & JavaScript - Easy tutorial. YouTube
    https://www.youtube.com/watch?v=QGVXmoZWZuw
    
*/