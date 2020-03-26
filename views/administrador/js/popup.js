document.getElementById("open").addEventListener("click", function(){
    document.querySelector(".popup").style.display = "flex";
})

document.querySelector(".close").addEventListener("click", function () {
    document.querySelector(".popup").style.display = "none";
})

document.getElementById("open2").addEventListener("click", function(){
    document.querySelector(".popup2").style.display = "flex";
})

document.querySelector(".close2").addEventListener("click", function () {
    document.querySelector(".popup2").style.display = "none";
})