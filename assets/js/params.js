jQuery(function () {
    $('.params .form-control').on('click focus', function(){
        $('.params .btn-success').addClass('hide');
        $(this).closest('.param_value').next().find('.btn-success').removeClass('hide');
    })
    $('.params .btn-success').on('click', function(){
        var input = $(this).closest('.param_value').prev().find('.form-control');
        
        if(input.val() != input.data('old')){
            var value = input.val();
            var param = $(this).data('param');
            var valid = $(this).data('valid');
            /*console.log(value);
            console.log(param);
            console.log(valid);*/

            var p = {param:param, value: value, valid: valid};

            p[ $('meta[name="csrf-param"]').attr('content') ] = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'POST',
                url: '/backend/web/params/default/update',
                dataType: 'json',
                data: p,
                success: function(data)
                {
                },
                error:function(p1,p2,p3){


                }
            });

        }
        $(this).addClass('hide');
    })
});
