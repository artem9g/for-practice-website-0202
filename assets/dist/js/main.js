// Убедитесь, что все работает
console.log('main.js connected');

(function( $ ) {
    $( document ).ready( function() {
        // Добавляем класс "active" к body
        $('body').addClass('active');

        // Добавляем класс "active" к элементу с ID "page"
        $('#page').addClass('active');
    });
})( jQuery );
