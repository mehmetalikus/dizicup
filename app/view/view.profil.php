<?php require "static/head.php" ?>
<body>
<?php require "static/header.php" ?>
<div class="container">
    <div class="row">
      <div class="col-md-4 col-xs-12 col-sm-12 col-lg-4" style="border: 2px solid #085372; background-color: #022336; border-radius: 5px;">
         <img src="<?= $user->getUserImage() ?>" class="img-responsive text-center mTop15"  style="width:200px; height:200px;  margin:0 auto; border-radius: 50%; text-align: center;" />
          <div id="profile-userName-area" style="text-align: center;">
            <p id="profile-userName" style="color:white; font-size: 2em;"><?= $user->getUserName(); ?></p>
            <p id="profile-idName" style="font-size: 13px; color:white;"> <u>@<?= $user->getUserURL(); ?></u> </p>
          </div> 
         <div id="profile-userInformation-area">
            <p id="profile-userLocation" style="color:white;" class="pull-left text-white"><i class="fa fa-map-marker" aria-hidden="true" style="color:#01ACF0;"></i> <?= $user->getUserCreatedAt() ?> </p>
            <p id="profile-userBirthday" style="color:white;" class="pull-right"><i class="fa fa-birthday-cake" aria-hidden="true" style="color: #01ACF0;"></i> <?= $user->getUserBirthDate() ?> </p>
          </div>
          <div style="clear: both;"></div>
          <div id="profile-userAbout-area">
              <p id="profile-userAbout" style="color:white; word-wrap: break-word; font-style: italic; font-size: 1em;"> 
                <?= $user->getUserSummary() ?>
              </p>
          </div>
          <div id="profile-userAvg">
                <p id="profile-userTime" class="text-center mTop15" style="max-width:auto; font-style:italic; border:1px solid #085372; border-radius: 5px; color:white;"> {{@totalViewClock}} </p>
          </div>
      </div>
      <div id="user-histories" class="col-md-8 col-xs-12 col-sm-12 col-lg-8 pad0 mar0" style="margin-top:1.5px; border-radius:3px;">
          <ul class="nav nav-tabs input-css border-none" role="tablist">
          <li role="presentation" class="active"><a href="#watch-history" aria-controls="watch-history" role="tab" data-toggle="tab">İzleme Geçmişim</a></li>
            <li role="presentation"><a href="#favs" aria-controls="favs" role="tab" data-toggle="tab">Favorilerim</a></li>
            <li role="presentation"><a href="#my-comments" aria-controls="my-comments" role="tab" data-toggle="tab">Yorumlarım</a></li>
          </ul>  
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="watch-history">
                <?php foreach ($userWatchLogs as $log): ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div style="padding:15px;background-color:#022336; color:white; opacity:0.8;">
                                <img src="https://dizilab.pw/upload/series/<?= permalink(strtolower($log["SeriesName"])) ?>_thumb.png" class="" />
                                <span><?= $log["SeriesName"] ?></span>
                                <div class="pull-right">
                                    <span class="episodeSeason">Sezon <?= $log["EpisodeSeason"] ?></span>
                                    <span class="episodeChapter">Bölüm <?= $log["EpisodeChapter"] ?></span>
                                    <br>
                                    <span class="episodeName"><?= $log["EpisodeName"] ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
              </div>
              <div role="tabpanel" class="tab-pane" id="favs">
                  Favs Section
              </div>
              <div role="tabpanel" class="tab-pane" id="my-comments">
                  Comments Section
              </div>
            </div>        
      </div>
  </div>

	<?php require "static/script-manager.php" ?>

</body>
</html>