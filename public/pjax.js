
$.pjax.defaults.timeout = 5000;
$.pjax.defaults.maxCacheLength = 0;

$(document).pjax('a:not(a[target="_blank"])', {
    container: '#page'
});

$(document).on('pjax:timeout',function(event){
    event.preventDefault();
});




// //add plugin
$(document).on('pjax:complete', function() {
    $('#example1').DataTable({"pageLength": 3,"bDestroy": true});
    $("#example1_length").replaceWith($(".btn-add"));
    $('#summernote').summernote()
    $('#lfm').filemanager('image');
    $('.btn-delete').on('click', function() {
        var message = confirm('bạn có muốn xóa thông tin này??');
        if(message){
            $.pjax({url: '', container: '#page'});
        }
    });

    // $('#btn-update').on('click', function(event) {
    //     alert('sửa thành công!!!');
    //     $.pjax({url: '', container: '#page'});
    // });

    // $('#btn-create').on('click', function(event) {
    //     alert('thêm thành công!!!');
    //     $.pjax({url: '', container: '#page'});
    // });
    
    
});


//submit form








