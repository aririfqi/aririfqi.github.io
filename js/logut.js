const foto = document.querySelector('.fotoProfil');
const logout = document.querySelector('.logout');
const html = document.querySelector('html');
foto.addEventListener('click', function () {
    if (logout.style.display == 'block') {
        logout.style.display = 'none';
    } else {
        logout.style.display = 'block';
    }
})

if (logout.style.display == 'block') {
    $(document).click(function () {
        logout.style.display = 'none';
    });
}


  $(document).click(function() {
    alert("me")
});
// $(".myDiv").click(function(e) {
//     e.stopPropagation(); // This is the preferred method.
//     return false;        // This should not be used unless you do not want
//                          // any click events registering inside the div
// });


// function outsideClick(event, notelem)	{
//     notelem = $(notelem); // jquerize (optional)
//     // check outside click for multiple elements
//     var clickedOut = true, i, len = notelem.length;
//     for (i = 0;i < len;i++)  {
//         if (event.target == notelem[i] || notelem[i].contains(event.target)) {
//             clickedOut = false;
//         }
//     }
//     if (clickedOut) return true;
//     else return false;
// }
// html.addEventListener('click', function(){
//     // foto.addEventListener('click',function({

//     // }))
//     this.alert("Haii")
//     logout.style.display = 'none';
//  });