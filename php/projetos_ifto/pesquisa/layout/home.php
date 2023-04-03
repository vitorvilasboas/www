<section>
    <div class="w3-content w3-section" style="max-width:1366px">

<img class="mySlides" src="imagens/ensino.png" style="width:100%">
<img class="mySlides" src="imagens/pesquisaeinovacao.png" style="width:100%">
<img class="mySlides" src="imagens/extensao.png" style="width:100%">


</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000);    
}
</script>

    <!--<div class="slider"> <img src="imagens/red.png" /></div>-->
</section>

