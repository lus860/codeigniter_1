<?php if(isset($files)) :?>
<?php  $album_name='';?>
<div class="row mt-5 ml-1">
<?php foreach($files as $file): ?>
<?php if($file->album_name === $album_name){continue; }?>
<button type="button" class="btn btn-primary btn-lg ml-5 mt-1"><a href="<?=site_url("profile/gallery?album_name=$file->album_name")?>"><?=$file->album_name;?></a></button>
<?php $album_name=$file->album_name;?>
<?php endforeach; ?>
</div>
<?php endif; ?>
   
<?php if(isset($files_img)) :?>
<?php  $album_name='';
foreach($files_img as $file_img): ?>
<?php if($file_img->album_name === $album_name){continue; }?>
<button type="button" class="btn btn-primary btn-lg ml-5 mt-1"><a href="<?=site_url("profile/gallery?album_name=$file_img->album_name")?>"><?=$file_img->album_name;?></a></button>
<?php $album_name=$file_img->album_name;?>
<?php endforeach; ?>
    
    
<div class="row mt-5 ml-1">
<?php foreach($files_img as $file_img): ?>
<?php if($file_img->album_name!==$album){continue; }?>
    <div class="mt-3 col-sm-2">
        <img src="<?=base_url()?>files/<?=$file_img->img?>" class="w-100">
            <div class="mt-3 ">
                <button><a href="<?=base_url()?>files/<?=$file_img->img?>"><b style="color:black">View</b></a></button>
                <button><a href="<?=site_url("profile/delete?album=$album&fileid=$file_img->id")?>"><b style="color:black">Delete</b></a></button>
            </div> 
    </div>   
<?php endforeach; ?>
</div>

<button type="button" class="btn btn-lg btn-primary ml-5 mt-1" disabled><a href="<?=site_url("profile/deleteall?album=$album")?>"><h3>Delete</h3></a></button>
  
<?php endif; ?>
<button type="button" class="btn btn-lg btn-primary ml-5 mt-1" disabled><a href="<?=site_url("profile/uploadview")?>"><h3>Upload</h3></a></button>
        
        
 



