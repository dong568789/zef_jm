(function($){
    $('.submit-btn').click(function(){
        var strArea = $('#area').val();
        var strRealname = $('#realname').val();
        var strEmail = $('#email').val();
        var strSex = $('input[type=radio]:checked').val();
        var strMobile = $('#mobile').val();
        var intCode = $('#code').val();

        if(strArea == ''){
            msg("请输入省/市/区");
            return ;
        }

        if(strSex == ''){
            msg("请选择性别");
            return ;
        }

        if(strRealname == ''){
            msg("请输入投资人姓名");
            return ;
        }

        if(strMobile == ''){
            msg("请输入联系电话");
            return ;
        }

        var patt = /^1[\d]{10}$/
        if(!patt.test(strMobile)){
            msg("联系电话格式不正确");
            return ;
        }

        if(intCode == ''){
            msg("请输入验证码");
            return ;
        }

        var patt2 = /[\d]{6}/;
        if(!patt2.test(intCode)){
            msg("请输入验证码");
            return ;
        }

        if(!$('#xieyi').is(':checked')){
            msg("请先同意协议");
            return ;
        }

        var params = {
            area: strArea,
            realname: strRealname,
            email: strEmail,
            sex: strSex,
            mobile: strMobile,
            code: intCode
        };
        LP.query('post', '/home/query', params).then(function(response){
            if(response.result == 'success') {
                msg("感谢您的提交，稍后工作人员会致电您。");

                window.location.reload();
            }else{
                msg(response.message);
            }
            return true;
        },function(e){
            msg(e.message);
        });

    });

    var phone_code_generator_countdown = 0;

    $('#phone_code_generator').click(function(){
        var txtPhone = $('#mobile').val();

        if (txtPhone == ""){
            msg("手机号不能为空");
            return
        }else{
            var phoneregex = /^1[0-9]{10}$/;

            if (!phoneregex.test(txtPhone))
            {
                msg("手机号格式不正确");
                return
            }
        }

        var url = "/form/send-sms";
        LP.query('post', url, {mobile:txtPhone}).then(function(response){
            if(response.result == 'success') {
                phone_code_generator_countdown = 60;
            }else{
                phone_code_generator_countdown = 60;
            }
            return true;
        },function(e){
            phone_code_generator_countdown = 60;

        });
    });

    setInterval(function(){
        if (phone_code_generator_countdown > 0)
        {
            $('#phone_code_generator_countdown').show();
            $('#phone_code_generator').hide();
            $('#phone_code_generator_countdown_text').text(phone_code_generator_countdown--);
        } else {
            $('#phone_code_generator_countdown').hide();
            $('#phone_code_generator').show();
        }
    }, 1000);

    function msg(msg){
        layer.open({
            content: msg
            ,skin: 'msg'
            ,time: 2000 //2秒后自动关闭
        });
    }

    $('.logo em', '#home').click(function(){
        if($(this).hasClass('open')){
            $(this).addClass('close').removeClass('open');
            $('.nav', '#home').addClass('open').removeClass('close');
        }else{
            $(this).addClass('open').removeClass('close');
            $('.nav', '#home').addClass('close').removeClass('open');
        }
    });
})(jQuery);