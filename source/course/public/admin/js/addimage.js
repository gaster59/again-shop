function previewImage(self) {
    var index = $(self).attr('data-index');
    if (self.files && self.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImg' + index).attr('src', e.target.result);
            $('#path' + index).val(e.target.result);
        }
        reader.readAsDataURL(self.files[0]); // convert to base64 string
    }
}

function deleteAreaImage(self) {
    if(confirm("Do you want to delele ?")) {
        var index = $(self).attr('data-index');
        var id = $('#imageId'+index).val();
        if (id != '') {
            $.post(urlDeleteImage, {'id' : id}, function(response){
                if(response.success == true) {
                    $('#area-image' + index).remove();
                }
            });
        } else {
            $('#area-image' + index).remove();
        }
    }
}

var itemAreaImage = $('#group-image .area-image').length;

$(function () {
    $('#add-more').click(function () {
        var groupImage = $('.draft').html();
        groupImage = groupImage.replace(/xxx/g, itemAreaImage);
        $('#group-image').append(groupImage);
        itemAreaImage++
    });
});