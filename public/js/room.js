$(".form-new-room").find('input[type=submit]').removeAttr('disabled');

$('.form-new-room').submit(function(e){
    e.preventDefault();
    $('.modal-add-room').find('#myModalTitle').html("Add Room");
    $('.modal-add-room').find('.form-add-room').attr('action',$fullpathUrl+'createRoom');
    $('.modal-add-room').find('#id').val(0);
    $('.modal-add-room').find('#type').val("Room");
    $('.modal-add-room').find('#name').val("");
    $('.modal-add-room').find('#price').val("");
    $('.modal-add-room').show();
});

$('.btn-close').click(function(){
    $('.modal-add-room').hide();
    $('.modal-delete-room').hide();
});

$('.btn-update-room').click(function(e){
    e.preventDefault();
    $price = Number($(this).parent().parent().find('.room_price').text().replace(/[.,-]/g,"").split('Rp ')[1]);
    $('.modal-add-room').find('#myModalTitle').html("Update Room");
    $('.modal-add-room').find('.form-add-room').attr('action',$fullpathUrl+'updateRoom');
    $('.modal-add-room').find('#id').val($(this).parent().parent().find('.room_id').text());
    $('.modal-add-room').find('#type').val($(this).parent().parent().find('.room_type').text());
    $('.modal-add-room').find('#name').val($(this).parent().parent().find('.room_name').text());
    $('.modal-add-room').find('#price').val($price);
    $('.modal-add-room').show();
});

$('.btn-delete-room').click(function(e){
    e.preventDefault();
    $link = $fullpathUrl+'deleteRoom/' + $(this).parent().parent().find('.room_id').text();
    $('.modal-delete-room').find('.form-delete-room').attr('action',$link);
    $('.modal-delete-room').show();
});