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
        if (datas[data].selector === "homepage_h1") $("#homeH1").text(datas[data].theText);
        if (datas[data].selector === "navHome") $("#navHome").text(datas[data].theText);
        if (datas[data].selector === "navContact") $("#navContact").text(datas[data].theText);
        if (datas[data].selector === "navLogin") $("#navLogin").text(datas[data].theText);
        if (datas[data].selector === "navLogout") $("#navLogout").text(datas[data].theText);
        if (datas[data].selector === "navAbout") $("#navAbout").text(datas[data].theText);
        if (datas[data].selector === "logLabelName") $("#logLabelName").text(datas[data].theText);
        if (datas[data].selector === "logLabelPwd") $("#logLabelPwd").text(datas[data].theText);
        if (datas[data].selector === "submitLogin") $("#submitLogin").text(datas[data].theText);
    }
 }


}); // end ready