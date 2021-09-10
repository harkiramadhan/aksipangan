$('.btn-edit').click(function(){
    var id = $(this).attr('data-id')
    
    $.ajax({
        url: baseUrl + 'donasi/ajaxModalEdit/' + id,
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
        url: baseUrl + 'donasi/ajaxModalDelete/' + id,
        type: 'get',
        beforeSend: function(){
            $('#modal-delete').modal('show')
        },
        success: function(res){
            $('.content-delete').html(res)
        }
    })
})

$('.btn-verif').click(function(){
    var type = $(this).attr('data-type')
    var id = $(this).attr('data-id')

    $.ajax({
        url: baseUrl + 'donasi/ajaxUpdateStatus',
        type: 'post',
        data: {type : type, id : id},
        success: function(res){
            window.history.pushState("", "", baseUrl + "donasi") 
            window.location.reload()
        }
    })
})