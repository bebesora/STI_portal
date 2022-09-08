const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

function show(){
    document.getElementById("idHome").style.display="block";
    document.getElementById("idHome2").style.display="none";
    document.getElementById("idHome3").style.display="none";
    document.getElementById("idHome4").style.display="none";
    document.getElementById("idHome5").style.display="none";
    document.getElementById("idHome6").style.display="none";
}
function show2(){
    document.getElementById("idHome").style.display="none";
    document.getElementById("idHome2").style.display="block";
    document.getElementById("idHome3").style.display="none";
    document.getElementById("idHome4").style.display="none";
    document.getElementById("idHome5").style.display="none";
    document.getElementById("idHome6").style.display="none";
}
function show3(){
    document.getElementById("idHome").style.display="none";
    document.getElementById("idHome2").style.display="none";
    document.getElementById("idHome3").style.display="block";
    document.getElementById("idHome4").style.display="none";
    document.getElementById("idHome5").style.display="none";
    document.getElementById("idHome6").style.display="none";
}
function show4(){
    document.getElementById("idHome").style.display="none";
    document.getElementById("idHome2").style.display="none";
    document.getElementById("idHome3").style.display="none";
    document.getElementById("idHome4").style.display="block";
    document.getElementById("idHome5").style.display="none";
    document.getElementById("idHome6").style.display="none";
}
function show5(){
    document.getElementById("idHome").style.display="none";
    document.getElementById("idHome2").style.display="none";
    document.getElementById("idHome3").style.display="none";
    document.getElementById("idHome4").style.display="none";
    document.getElementById("idHome5").style.display="block";
    document.getElementById("idHome6").style.display="none";
}
function show6(){
    document.getElementById("idHome").style.display="none";
    document.getElementById("idHome2").style.display="none";
    document.getElementById("idHome3").style.display="none";
    document.getElementById("idHome4").style.display="none";
    document.getElementById("idHome5").style.display="none";
    document.getElementById("idHome6").style.display="block";
}

