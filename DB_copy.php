<?php
  $fileName= '';
  $copyfileName = '';

  if(file_exists($fileName)){
    $result = copy($fileName,$copyfileName);
  }
  if($result == true){
    echo 'file successfully copied';
  }else{
    echo 'fail';
  }
  ?>
  <form method="post" class="form-horizontal mt-5">
                        <div class="w3-third w3-container w3-margin-bottom">
                            <img src="upload\tempic\tem2.png" alt="Norway" style="width:100%; border-radius: 5%;">
                            <div class="w3-container w3-white">
                                <p><b>Template News First</b></p>
                                <p>Template HTML/CSS</p>
                                <input type="hidden" name="update_id" value="1"> <!-- กำหนดค่า update_id เป็น 1 -->
                                <input type="submit" name="btn_update" class="btn btn-success" value="Use"> <!-- ปุ่ม Use -->
                                <input type="submit" name="btn_copy" class="btn btn-secondary" value="Copy">
                            </div>
                        </div>
                    </form>