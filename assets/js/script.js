window.addEventListener('resize', displayScreenWidth); 
function displayScreenWidth() { 
    const screenwidth = document.getElementById("screenwidth");
    let theWidth = window.innerWidth;                                             
    screenwidth.innerHTML = 'The screen width is: ' + theWidth;
}
displayScreenWidth();

$(document).ready(function() {

    fetch("?json")
    .then(function(response){
        response.json().then(function(data){
            console.log(data);
            makeGlobalText(data);
    
            });
    
            })
            .catch(function(error){
                console.log(error.message);
        });



 function makeGlobalText(datas) {
    for (let data in datas) {
        if (datas[data].selector === "homepage_h1") $(".h1").text(datas[data].theText)
    }
 }


}); // end ready