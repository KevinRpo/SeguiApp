//Cambiamos el estado del elemento para verlo
document.getElementById("open").addEventListener("click", function(){
    document.querySelector(".popup").style.display = "flex";
})

//Camibamos el estado del elemento para ocultarlo
document.querySelector(".close").addEventListener("click", function () {
    document.querySelector(".popup").style.display = "none";
})

//Cambiamos el estado del elemento para verlo
document.getElementById("open2").addEventListener("click", function(){
    document.querySelector(".popup2").style.display = "flex";
})

//Camibamos el estado del elemento para ocultarlo
document.querySelector(".close2").addEventListener("click", function () {
    document.querySelector(".popup2").style.display = "none";
})