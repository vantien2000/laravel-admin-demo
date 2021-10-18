//check register form
$(document).ready(function(){
    $('#first_name').change(function(){
        var first_name = $(this).val();
        if(first_name === null || first_name.length <= 0){
            $('#first_name_group').append('<div class="text text-danger">First name không được bỏ trống</div>')
        }
    });
    $('#last_name').change(function(){
        var last_name = $(this).val();
        if(last_name === null || last_name.length <= 0){
            $('#last_name_group').append('<div class="text text-danger">Last name không được bỏ trống</div>')
        }
    });
    $('#email').change(function(){
        var email = $(this).val();
        if(email.length <= 0 || email === null){
            $('#email_group').append('<div class="text text-danger">email không được bỏ trống</div>')
        }
    });
    $('#password').change(function(){
        var password = $(this).val();
        if(password.length <= 0 || password === null){
            $('#password_group').append('<div class="text text-danger">Last name không được bỏ trống</div>')
        }
    });
})