$(document).ready(function(){

    // 使用所有的material js
    $.material.init();

    // footer到top的tooltip
    $('[data-toggle="tooltip"]').tooltip();


    // 平滑 在navbar的連結跟footer的連結
    $(".navbar a, footer a[href='#app-layout']").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();
            // Store hash
            var hash = this.hash;
            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 900, function(){
                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
        } // End if
    });
})
