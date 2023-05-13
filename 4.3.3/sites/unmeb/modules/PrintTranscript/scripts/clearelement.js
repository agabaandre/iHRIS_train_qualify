window.addEvent('click', function() {
    alert('The DOM is ready!');
});

var myElement = $('myTitle');
myElement.addEvents({
    mouseover: function(){
        alert('mouseover');
    },
    click: function(){
        alert('click');
    }
});
