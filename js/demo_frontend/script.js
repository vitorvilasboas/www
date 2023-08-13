let show = false;

let list = document.getElementById("vitor")

function showHide(e){
	console.log(e)
    if(show){show = false; list.style.display = 'none'; e.innerHTML = "show";}
    else{show = true; list.style.display = 'block' ; e.innerHTML = "hide"}
}