$(document).ready(function(){

    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport:{
            width: 200,
            height: 200, 
            type: 'square'
        },
        boundary:{
            width:300,
            hiegth:300
        }
    });
    
    $('#pic_filename').on('change', function(){
        //var file = this.files[0];
        //var fileType = file["type"];
        //var validImageTypes = ["image/*"];
        //if ($.inArray(fileType, validImageTypes) < 0) {
            // invalid file type code goes here.
        //}
        var reader = new FileReader();
        reader.onload = function (event){
            $image_crop.croppie('bind', {
                url: event.target.result
            })
        }
        reader.readAsDataURL(this.files[0]);
        $('#modal_edit_pic').css('display', 'flex');
    });

    $('#cropNUpload').on('click', function(event){
        event.preventDefault();
        $image_crop.croppie('result',{
            type: 'canvas',
            size: 'size'
        }).then(function(response){
            $.ajax({
                url: "assets/upload_picture.php",
                type: "POST", 
                data: {"image": response},
                success:function(data){
                    if(data = "Success"){
                        $("#prof_pic_div").load("assets/displayUpdatedPic.php");
                        $("#profile_bttn").load("assets/displayUpdatedPic.php");
                        $('#modal_edit_pic').css('display', 'none');
                        $('#pic_filename').val(null);
                    }
                }
            });
        })
    });


    $('#close_modal').on('click', function(){
        $('#modal_edit_pic').css('display', 'none');
        $('#pic_filename').val(null);
    });

    $('#close_modal2').on('click', function(){
        $('#modal_edit_pic').css('display', 'none');
        $('#pic_filename').val(null);
    });

});