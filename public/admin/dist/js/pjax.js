
$.pjax.defaults.timeout = 5000;
$.pjax.defaults.maxCacheLength = 0;

$(document).pjax('a:not(a[target="_blank"])', {
    container: '#page'
});

$(document).on('pjax:timeout',function(event){
    event.preventDefault();
})


//submit form
$(document).on('submit','form[pjax-container]',function(event){
    $.pjax.submit(event,"#page")
})

$(document).on('click', 'a[id="sbm"]', function(event) {
    var message = confirm('bạn có muốn xóa thông tin này??');
    if(message){
        $.pjax({url: 'delete/'+$(this).data('id'), container: '#page'})
    }
})

//add plugin
$(document).on('pjax:complete', function() {
    $('#example1').DataTable()
    $("#example1_length").replaceWith($(".btn-add"))
})

