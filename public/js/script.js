window.addEventListener('resize', displayScreenWidth); 
function displayScreenWidth() { 
    const screenwidth = document.getElementById("screenwidth");
    let theWidth = window.innerWidth;                                             
    screenwidth.innerHTML = 'The screen width is: ' + theWidth;
}
displayScreenWidth();

$(document).ready(function() {

$(".h1").click(function() {
    $(".h1").fadeOut();
    console.log("clicked");
});





}); // end ready