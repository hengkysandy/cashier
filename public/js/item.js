$(".form-new-item").find('input[type=submit]').removeAttr('disabled');

$('.form-new-item').submit(function(e){
    e.preventDefault();
    $('.modal-add-item').find('#myModalTitle').html("Add Item");
    $('.modal-add-item').find('.form-add-item').attr('action',$fullpathUrl+'createItem');
    $('.modal-add-item').find('#id').val(0);
    $('.modal-add-item').find('#name').val("");
    $('.modal-add-item').find('#price').val("");
    $('.modal-add-item').find('#stock').val("");
    $('.modal-add-item').show();
});

$('.btn-close').click(function(){
    $('.modal-add-item').hide();
    $('.modal-delete-item').hide();
});

$('.btn-update-item').click(function(e){
    e.preventDefault();
    $price = Number($(this).parent().parent().find('.item_price').text().replace(/[.,-]/g,"").split('Rp ')[1]);
    $('.modal-add-item').find('#myModalTitle').html("Update Item");
    $('.modal-add-item').find('.form-add-item').attr('action',$fullpathUrl+'updateItem');
    $('.modal-add-item').find('#id').val($(this).parent().parent().find('.item_id').text());
    $('.modal-add-item').find('#name').val($(this).parent().parent().find('.item_name').text());
    $('.modal-add-item').find('#stock').val(Number($(this).parent().parent().find('.item_stock').text()));
    $('.modal-add-item').find('#price').val($price);
    $('.modal-add-item').show();
});

$('.btn-delete-item').click(function(e){
    e.preventDefault();
    $link = $fullpathUrl+'deleteItem/' + $(this).parent().parent().find('.item_id').text();
    $('.modal-delete-item').find('.form-delete-item').attr('action',$link);
    $('.modal-delete-item').show();
});