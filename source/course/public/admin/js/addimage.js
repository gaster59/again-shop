function previewImage(self) {
    var index = $(self).attr('data-index');
    if (self.files && self.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#previewImg'+index).attr('src', e.target.result);
            $('#path'+index).val(e.target.result);
        }
        reader.readAsDataURL(self.files[0]); // convert to base64 string
    }
}

var itemAreaImage = $('#group-image .area-image').length;

$(function(){
    $('#add-more').click(function(){
        var groupImage = $('.draft').html();
        groupImage= groupImage.replace(/xxx/g, itemAreaImage++);
        $('#group-image').append(groupImage);
    });

    $('.delete-area').click(function(){
        
    });
});