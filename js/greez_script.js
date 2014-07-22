$(document).ready(function(){
	$("#settings_form").validate({

       rules:{

            settings_oldpass:{
                required: true,
                // minlength: ,
                // maxlength: 16,
            },

            settings_newpass:{
                required: true,
                minlength: 6,
                maxlength: 16,
            },
            settings_newconfirm:{
                required: true,
               
                equalTo:"#settings_newpass"
            }
       },

       messages:{

            settings_oldpass:{
                required: "Это поле обязательно для заполнения",
                // minlength: "Логин должен быть минимум 4 символа",
                // maxlength: "Максимальное число символо - 16",
            },

            settings_newpass:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 6 символа",
                maxlength: "Пароль должен быть максимум 16 символов",
            },
            settings_newpass:{
                required: "Это поле обязательно для заполнения",
                equalTo: "Поля не совпадают"
            },

       }

    });
	$('#settings_form .btn_log').on('click', function(e){
		e.preventDefault();
		$("#settings_form").validate();
		// if ($('input[type=password]').val()=='') {
		// 	$('.deposits_error').removeClass('hidden');
		// 	$('.deposits_error').html('Не должно быть пустых значений');
		// };
		// if ($('#settings_newpass').val()!=$('#settings_confirm').val()) {
		// 	$('.deposits_error').removeClass('hidden');
		// 	$('.deposits_error').html('Новый пароль и подтверждение не совпадают');	
		// }else{

		// $('.deposits_error').addClass('hidden');
		// };
		
	});
});