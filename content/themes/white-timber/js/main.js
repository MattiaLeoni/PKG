/* MAIN JS */
(function( $ ){
    $(document).ready(function(){
        /* HEADER JS */
        $('#header-hamburger').click(function(){
            $(this).toggleClass('is-active');
            if($(this).hasClass('is-active')){
                var closetext = $(this).find('.hamburger-text').attr('close-text')
                $(this).find('.hamburger-text').html(closetext);
            }else{
                var opentext = $(this).find('.hamburger-text').attr('open-text')
                $(this).find('.hamburger-text').html(opentext);
            }
        });
        $('#search-icon-label').click(function(){
            $(this).toggleClass('active');
            if($(this).hasClass('active')){
                setTimeout(function(){
                    $('#s').focus();
                }, 100);
            }
        });
        $('.top-search-label').click(function(){
            $('#search-icon-label').click();
        });

        $('.single-article a img').each(function(i,el){
            $(el).closest('a').wrap('<div uk-lightbox></div>');
        });

    });
})( jQuery );
  

