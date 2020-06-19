<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <form id="main" method="post" action="post.php">
                <div class="form-group zone">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="file" class="form-control" name="file[1]" onchange="previewImage(this);">
                    <div class="alert alert-danger" role="alert">
                        
                    </div>
                    <img class="preview" width="100" height="100" />
                    <input type="text" class="form-control txt" name="txt[1]" />
                    <input type="text" class="form-control cmt" name="cmt[1]" />
                    <input type="checkbox" class="form-control" name="chk[1]" value="1" />
                    <button type="button" class="btn btn-primary" onclick="deleteZone(this);">Delete</button>
                </div>

                <button type="button" id="add-more" class="btn btn-primary">Add more</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </body>

    <script type="text/javascript">

        var countZone = 1;
        var iterator = 1;
    
        $(function(){
            $("#add-more").click(function(){
                
                let zone = $("#main .zone").first().prop("outerHTML");
                $("#main .zone").last().after(zone);
                countZone++;
                iterator++;
                
                var edit_zone = $("#main .zone").last();
                $(edit_zone).find("input[type=file]").attr('name', "file["+iterator+"]");
                $(edit_zone).find("input[type=text].txt").attr('name', "txt["+iterator+"]");
                $(edit_zone).find("input[type=text].cmt").attr('name', "cmt["+iterator+"]");
                $(edit_zone).find("input[type=checkbox]").attr('name', "chk["+iterator+"]");
                
            });
        });

        function deleteZone(ctrl) {
            if (countZone > 1) {
                $(ctrl).parent().remove();
                countZone--;
            }
        }

        function previewImage(input) {
            let validExtensions = ['jpg','png','jpeg']; //array of valid extensions
            var fileName = input.files[0].name;
            var fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
            if ($.inArray(fileNameExt, validExtensions) == -1) {
                input.type = ''
                input.type = 'file'
                $(input).parent().find(".alert-danger").text('Not image');
            }
            else
            {
                if (input.files && input.files[0]) {
                    var filerdr = new FileReader();
                    filerdr.onload = function (e) {                        
                        $(input).parent().find(".preview").attr('src', e.target.result);
                    }
                    filerdr.readAsDataURL(input.files[0]);
                }
            }
        }
    
    </script>

</html>