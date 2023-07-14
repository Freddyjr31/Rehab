var bgCardBody = document.querySelector('.AllCards');
var img = document.querySelector('.cardImg');
var bgbody = document.querySelector('.mainsec');

var bgCardBodyCont = document.querySelector('.card-body');
var bgCardBodyCont2 = document.querySelector('.bodyCard');

function btn() {
    bgCardBody.addEventListener('click', function() {
        var bg = img.getAttribute("src");
        $('body').css("background-image", "url('" + bg + "')");
    });
}

bgCardBody.addEventListener('mouseout', function() {
    bgCardBody.style.color = 'black';
    $('body').css("background", "white");
});


function transition() {
    // algo chido ira por aca 
}