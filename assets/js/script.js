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
        let selector = datas[data].selector;
        let theText = datas[data].theText;
        let element = $(`#${selector}`);
            
        element.html(theText);        
            
        if (element.next().attr('placeholder') !== undefined) {
            console.log(`Element #${selector} has a placeholder attribute.`);
            element.next().attr('placeholder', theText);
        }
    }
}
    



}); // end ready