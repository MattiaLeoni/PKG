/* MAIN JS */
(function( $ ){
    $init_summernote = function(){
        $('.summernote').each(function(){
            var textarea = $(this);
            textarea.summernote({
                // callbacks: {
                //     onChange: function (contents, $editable) {
                //       var code = $(this).summernote("code");
                //       textarea.val(code);
                //     }
                //   },
                height: 140,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    // ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    // ['table', ['table']],
                    // ['insert', ['link', 'picture']],
                    ['view', ['codeview']]
                ]
            });
        });
    }
    $clone_click = function(){
        $('.column_clone').click(function(){
            setTimeout(function(){
                $init_summernote();
                $('.column_clone').unbind('click');
                $clone_click();    
            }, 1000);
        });
    }

    $(document).ready(function(){
        $init_summernote();
        $clone_click();
        $('.vc_param_group-add_content').click(function(){
            setTimeout(function(){$init_summernote()}, 1000);
        });
    });
})( jQuery );
  