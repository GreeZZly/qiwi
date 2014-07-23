$(document).ready(function(){
	// $("#settings_form").validate({

 //       rules:{

 //            settings_oldpass:{
 //                required: true,
 //                // minlength: ,
 //                // maxlength: 16,
 //            },

 //            settings_newpass:{
 //                required: true,
 //                minlength: 6,
 //                maxlength: 16,
 //            },
 //            settings_newconfirm:{
 //                required: true,
               
 //                equalTo:"#settings_newpass"
 //            }
 //       },

 //       messages:{

 //            settings_oldpass:{
 //                required: "Это поле обязательно для заполнения",
 //                // minlength: "Логин должен быть минимум 4 символа",
 //                // maxlength: "Максимальное число символо - 16",
 //            },

 //            settings_newpass:{
 //                required: "Это поле обязательно для заполнения",
 //                minlength: "Пароль должен быть минимум 6 символа",
 //                maxlength: "Пароль должен быть максимум 16 символов",
 //            },
 //            settings_newpass:{
 //                required: "Это поле обязательно для заполнения",
 //                equalTo: "Поля не совпадают"
 //            },

 //       }

 //    });
	$('#pass_submit').on('click', function(e){
        e.preventDefault();
        // $("#settings_form").validate();
        if (function(){
            var temp = false;
            $('input[type="password"]').each(function(i, el){
                // console.log(el, $(el).val())
                if ($(this).val()=='')
                    temp = true;
            });
            return temp;
        }()) {
            // console.log('in')
			$('.deposits_error').html('Не должно быть пустых значений').removeClass('hidden');
		}else{
    		if ($('#settings_newpass').val()!=$('#settings_confirm').val()) {
    			$('.deposits_error').removeClass('hidden');
    			$('.deposits_error').html('Новый пароль и подтверждение не совпадают');	
    		}else{
                   if($('#settings_newpass').val().length<6){
                        $('.deposits_error').removeClass('hidden');
                        $('.deposits_error').html('Пароль не должен быть меньше 6 символов');       
                   } else {
                              $('.deposits_error').addClass('hidden');
                              var oldpass = $('input[name="settings_oldpass"]').val();
                              var newpass = $('input[name="settings_newpass"]').val();

                              // console.log(oldpass);
                              $.post(
                                    "/ajax.php",
                                    {
                                        settings_oldpass: oldpass,
                                        settings_newpass: newpass

                                    },
                                    function(data){
                                        $('.deposits_error').removeClass('hidden');
                                        if(data==1){
                                            $('#deposits_err').removeClass('deposits_error');
                                            $('#deposits_err').addClass('deposits_norm').html('Пароль изменен!');
                                        }
                                        else {
                                            $('#deposits_err').removeClass('deposits_norm');
                                            $('#deposits_err').addClass('deposits_error').html('Старые пароли не совпадают.');
                                        };
                                    }   
                                );
                        };
                  };
              };
    });

        $('#qiwi_submit').on('click', function(e){
            e.preventDefault();
            if($('input[name="settings_qiwi"]').val()==''){
                $('.deposits_error').html('Не должно быть пустых значений').removeClass('hidden');
            }
            else {
                $('.deposits_error').addClass('hidden');
                var old_qiwi = $('input[name="settings_qiwi"]').val();
                $.post(
                        "/ajax.php",
                        {
                            settings_newqiwi: old_qiwi
                        },
                        function(data){
                            $('.deposits_error').removeClass('hidden');
                            if(data == 1){
                                $('#deposits_err').removeClass('deposits_error');
                                $('#deposits_err').addClass('deposits_norm').html('Номер кошелька изменен!');
                            } else {
                                $('#deposits_err').removeClass('deposits_norm');
                                $('#deposits_err').addClass('deposits_error').html('Вы пытаетесь ввести тот же номер кошелька.');
                            }
                        }
                    );
            }
        });
});