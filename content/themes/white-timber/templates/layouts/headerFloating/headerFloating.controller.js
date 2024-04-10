(function( $ ){
    $(document).ready(function(){

    });
    $(window).scroll(function(){
        var aTop = '500';
        if($(this).scrollTop()>=aTop){
            $('.floating__fixed').fadeIn('fast')
        }else{
            $('.floating__fixed').fadeOut('fast')

        }
      });
    
})( jQuery );
  

