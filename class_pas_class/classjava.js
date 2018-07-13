function toutremplir () {

$('.elements').addClass('plein');

}



function toutvider () {

$('.elements').removeClass('plein');

}



$('.rond').click(function() {

$(this).toggleClass('plein');

});



$('.carre.col1').click(function() {

    $(this).siblings().toggleClass('plein');
    $('.col1').toggleClass('plein');

});



$('.carre.col2').click(function() {

    $(this).siblings().toggleClass('plein');
    $('.col2').toggleClass('plein');

});



$('.losange').click(function() {

    $(this).toggleClass('plein');
    $(this).siblings().toggleClass('plein');
    
    if($('.carre').hasClass('plein')){
        
        $('.col3').addClass('plein');

	} 

});



$('.carre.col4').click(function() {

    $(this).siblings().toggleClass('plein');
    $('.col4').toggleClass('plein');

});



$('.carre.col5').click(function() {

    $(this).siblings().toggleClass('plein');
    $('.col5').toggleClass('plein');

});


