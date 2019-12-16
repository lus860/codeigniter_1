<?php foreach($users as $user):?>
    <?php if($user->id!==$userid):?>   
        <div class="mt-4">
            <div class="container emp-profile" style="width:50%;">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                          <?php if($user->prof_img==null){?>
                          <img src="<?=base_url()?>files/avatar.png"   class="w-100">
                           <?php }else{?>  
                         <img src="<?=base_url()?>files/<?=$user->prof_img?>" class="w-100">
                          <?php };?> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                  <?=$user->firstname?>
                                    </h5>
                                      <h5>
                                  <?=$user->lastname?>
                                    </h5>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Firstname</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$user->firstname?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Lastname</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$user->lastname?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?=$user->email?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            <a data-userid="<?=$userid;?>" data-id="<?=$user->id?>" href="<?=site_url("profile/chat?userid=$userid&profid=$user->id")?>"><h4>Send a letter</h4></a> 
            </div>
        </div>
            <?php endif ?>
<?php endforeach ?> 
