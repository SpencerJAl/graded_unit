// JavaScript for deleting product
$(document).on('click', '.delete-product-button', function(){
 
    var id = $(this).attr('data-id');
 // Ask's user if the want to delete product
    bootbox.confirm({
        message: "<h4>Are you sure?</h4>",
        buttons: {
            confirm: {
                label: '<span class="glyphicon glyphicon-ok"></span> Yes',
                className: 'btn-danger'
            },
            cancel: {
                label: '<span class="glyphicon glyphicon-remove"></span> No',
                className: 'btn-primary'
            }
        },
        callback: function (result) {
 // calls delete PHP to remove product
            if(result==true){
                $.post('https://graded-unit-spenceral.c9users.io/PHP/EditAPI/delete.php', {
                    id: id
                }, function(data){
                    location.reload();
                }).fail(function() {
                    alert('Unable to delete.');
                });
            }
            
        }
    });
 
    return false;
});