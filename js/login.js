
const login = document.querySelector(".penutup");
const loginButton = document.querySelector("header p");
const closeLogin = document.querySelector(".penutup .login .close");

loginButton.addEventListener("click", function(){
    login.style.display = "flex";
    login.style.animation = "0.7s ease-out 0s 1 Fade";
    login.style.transition = "none";
    login.style.opacity = "1";

});

closeLogin.addEventListener("click", function(){
    // login.style.animation.direction = "reverse";
    login.style.transition = "0.7s"
    login.style.opacity = "0";
    setTimeout(() => {  login.style.display = "none"; }, 650);
    
    
})




