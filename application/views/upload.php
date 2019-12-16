
 <?php echo form_open_multipart(site_url('profile/upload')); ?>
    <div id="boxtop"></div>
        <div id="boxmid">
            <div class="section">
                <span>File:</span>
                <input type="file" multiple="multiple" name="files[]" accept="image" />
                <input type="text" name="album_name" placeholder="name album" class="text-center"/>
            </div>
        </div>
    <div id="boxbot">
        
    </div>
 
    <div class="text" style="float:left;">
        <p>Before uploading, check out</p>
        <p>the <a href=#>Terms of Service</a>.</p>
    </div>
    <div class="text" style="clear:both;">
        <input style="padding:10px;border-radius:7px;margin:25px;" type="submit" value="Create Album" name="upload" class="submit" />
    </div>
<br style="clear:both; height: 0px;" />
<?php echo form_close(); ?>
<?php if(isset($_SESSION['msg_error_upload'])):?>
<div class="alert alert-danger text-center">
<?=$this->session->flashdata('msg_error_upload');?>
</div>
<?php endif ?>