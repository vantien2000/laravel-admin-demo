$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#register_form").submit(function(event){
        event.preventDefault();
        var formData = $('#register_form').serialize();
        $.ajax({
            type: 'POST',
            url: '/register',
            data: formData,
            dataType: 'json',
            success: function(res){
                if(typeof res.errors != 'undefined'){
                    for(let error of res.errors){
                        $('#'+Object.keys(error)+'_group').append('<div class="text text-danger">'+Object.keys(error)+' '+error[Object.keys(error)]+'</div>'); 
                    }
                }else{
                    if(!res.confirm){
                        alert('Hãy xác nhận điều khoản!!');
                    }
                    else{
                        alert('đăng ký thành công, hãy đăng nhập lại!!')
                    }
                }
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
    $("#signin-form").submit(function(event){
        event.preventDefault();
        var formData = $("#signin-form").serialize();
        $.ajax({
            type: 'POST',
            url: '/login',
            data: formData,
            dataType: 'json',
            success: function(res){
                if(typeof res.errors != 'undefined'){
                    alert(res.errors);
                }else{
                    if(res.confirm){
                        window.location.href = '/';
                    }
                }
            },
            error: function (res) {
                console.log(res);
            }
        })
    });
    $('#logout').click(function(event){
        event.preventDefault();
        $.ajax({
            type: 'GET',
            url: '/logout',
            dataType: 'json',
            success: function(res){
                if(res.ok){
                    window.location.href = '/';
                }else{
                    window.location.href = '/';
                }
            },
            error: function (res) {
                console.log(res);
            }
        })
    })
})