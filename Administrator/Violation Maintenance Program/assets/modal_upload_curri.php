    <!---Modal/ Pop up-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/xlsx.full.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.13.5/jszip.js"></script>
    
    <div class="modal_upload_bg" id="modal_upload_curri" >
        <div class="modal_upload">
            <div class="title_bar">
                <p>Upload Preview</p>
                <a href="#" class="modal_title_bttn" id="close_modal0"><i class="fas fa-times-circle"></i></a>
            </div>
            <form method="POST" id="uploadExcelFile" enctype="multipart/form-data">
                <div class="modal_content">
                    <div class="preview_table_content" id="preview_table_content">
                            
                    </div>
                </div>

                <div class="footer_modal_input">
                    <span id="message"></span>
                    
                    <div class="file_input">
                        <label for="#" class="label">File Path: </label>
                        <span class="input-file">
                            <p for="file_path">Chosen File: </p>
                            <span id="file-name"></span>
                        </span>

                        <input type="file" class="input_field" id="file_path" name="file_path">

                        <label class="file_bttn" for="file_path"><i class="fas fa-folder-open"></i> Find File</label>
                        
                    </div>
                </div>

                <div class="footer_modal_bttn">
                    <button type="submit" class="modal_foot_bttn" id="uploadFunction" >Upload</button>
                    <a href="#" id="close_modal9" class="modal_foot_bttn" ><i class="fas fa-sign-out-alt"></i> Exit</a>
                </div>
            </form>
                
            
            </div>
            
    </div>
    
    <script src="assets/js/modal_upload_curri.js"></script>
    <script>
        $(document).ready(function(){
            $('#uploadExcelFile').on('submit', function(event){
                event.preventDefault();
                $.ajax({
                    url:"assets/upload_curri.php",
                    method:"POST",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function(){
                        $('#uploadFunction').attr('disabled', 'disabled');
                        $('#uploadFunction').text('Uploading...');
                    },
                    success:function(data)
                    {
                        $('#message').html(data);
                        $('#uploadExcelFile')[0].reset();
                        $('#uploadFunction').attr('disabled', false);
                        $('#uploadFunction').text('Upload');
                        $("#table").load("assets/updatedDisplay_pcode.php");
                        

                    }
                })
            });
        });
    </script>

    