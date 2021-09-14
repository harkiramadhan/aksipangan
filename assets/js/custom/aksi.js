$('.btn-edit').click(function(){
    var id = $(this).attr('data-id')
    
    $.ajax({
        url: baseUrl + 'admin/aksi/ajaxModalDetail/' + id,
        type: 'get',
        beforeSend: function(){
            $('#modal-edit').modal('show')
        },
        success: function(res){
            $('.content-edit').html(res)
        }
    })
})

$('.btn-delete').click(function(){
    var id = $(this).attr('data-id')
    
    $.ajax({
        url: baseUrl + 'admin/aksi/ajaxModalDelete/' + id,
        type: 'get',
        beforeSend: function(){
            $('#modal-delete').modal('show')
        },
        success: function(res){
            $('.content-delete').html(res)
        }
    })
})