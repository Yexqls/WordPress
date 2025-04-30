var d = document,
//Se busca por array
btn = d.getElementsByClassName('btn-ejecutar');
//se busca con el array
/* btn[0].addEventListener('click', function(){
    alert('Hola mundo!');
}); */

//usando jQuery
(function($){
    $('.btn-ejecutar').on('click', function(){
        alert('Hola mundo, con jQuery');
    });
})(jQuery)

