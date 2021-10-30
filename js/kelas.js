const tambah = document.querySelector(".tambah");
const cover = document.querySelector(".buatKelas");
const closetambah = document.querySelector(".buatKelas p");

tambah.addEventListener("click", function(){
    cover.style.display = "flex";
    cover.style.animation = "0.7s ease-out 0s 1 Fade";
    cover.style.transition = "none";
    cover.style.opacity = "1";

});

closetambah.addEventListener("click", function(){
    // login.style.animation.direction = "reverse";
    cover.style.transition = "0.7s"
    cover.style.opacity = "0";
    setTimeout(() => {  cover.style.display = "none"; }, 650);
    
    
})