$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

$('.post-audit').on('click',function (event) {
    var $target = $(event.target);
    var post_id = $target.attr('post-id');
    var status = $target.attr('post-action-status');

    $.ajax({
        url:'/admin/posts/' + post_id + '/status',
        type:'POST',
        data:{status:status},
        dataType:'json',
        success:function (data) {
            if(data.error != 0){
                alert(data.message)
                return;
            }
            $target.parent().parent().remove();
        }
    });
});

$(function () {
    $('#myTab li:eq(1) a').tab('show');
});

//删除操作
$('.resource-delete').click(function(event){
    if(confirm('确定执行删除操作吗？') == false){
        return;
    }
    var $target = $(event.target);
    event.preventDefault();
    var url = $target.attr('delete-url');
    $.ajax({
        url:url,
        type:'POST',
        data:{'_method':'DELETE'},
        dataType:'json',
        success:function (data) {
            if(data.error != 0){
                alert(data.message)
            }

            window.location.reload();
        }
    });
});