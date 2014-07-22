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
                required: "��� ���� ����������� ��� ����������",
                // minlength: "����� ������ ���� ������� 4 �������",
                // maxlength: "������������ ����� ������� - 16",
            },

            settings_newpass:{
                required: "��� ���� ����������� ��� ����������",
                minlength: "������ ������ ���� ������� 6 �������",
                maxlength: "������ ������ ���� �������� 16 ��������",
            },
            settings_newpass:{
                required: "��� ���� ����������� ��� ����������",
                equalTo: "���� �� ���������"
            },

       }

    });
	$('#settings_form .btn_log').on('click', function(e){
		e.preventDefault();
		$("#settings_form").validate();
		// if ($('input[type=password]').val()=='') {
		// 	$('.deposits_error').removeClass('hidden');
		// 	$('.deposits_error').html('�� ������ ���� ������ ��������');
		// };
		// if ($('#settings_newpass').val()!=$('#settings_confirm').val()) {
		// 	$('.deposits_error').removeClass('hidden');
		// 	$('.deposits_error').html('����� ������ � ������������� �� ���������');	
		// }else{

		// $('.deposits_error').addClass('hidden');
		// };
		
	});
});