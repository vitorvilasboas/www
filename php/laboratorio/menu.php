<aside >
    <nav>
        <ul class="menu">
            <li><a href="index.php?op=home.php">HOME</a></li>
            <li><a href="exames.php">EXAMES</a></li>
            <li><a href="convenios.php">CONVÊNIOS</a></li>
            <li><a href="conosco.php">FALE CONOSCO</a></li>
      
        </ul>
    </nav>
</aside>
<script type="text/javascript">
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
</script>
<!--rotação automatica
<script type="text/javascript">var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slideIndex++;
    if (slideIndex> slides.length) {slideIndex = 1} 
    slides[slideIndex-1].style.display = "block"; 
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>-->

<div class="slideshow-container">
  <div class="mySlides fade">
    <div class="numbertext">1 / 5</div>
    <img src="imagens/a.jpg" style="width:100%">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 5</div>
    <img src="imagens/aa.jpg" style="width:100%">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 5</div>
    <img src="imagens/aaa.jpg" style="width:100%">
    <div class="text">Caption Three</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">4 / 5</div>
    <img src="imagens/anu.jpg" style="width:100%">
    <div class="text">Caption five</div>
  </div>
  <div class="mySlides fade">
    <div class="numbertext">5 / 5</div>
    <img src="imagens/anun.jpg" style="width:100%">
    <div class="text">Caption six</div>
  </div>


  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
</div>
