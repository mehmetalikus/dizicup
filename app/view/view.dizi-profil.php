<?php require "static/head.php" ?>
<body>
<?php require "static/header.php" ?>
<div class="container">
    <div class="row">
       <div class="col-md-4 col-lg-4 hidden-xs">
         <img id="logo" src="<?= $_SERIES->getSeriesPosterImage(); ?>" class="img-responsive" width="100%" height="100%" />
		    <?php if(starring($_SERIES->getSeriesId(), $db) != false): ?>
                <ul class="list-group" style="margin-top: 15px;">
                    <?php foreach(starring($_SERIES->getSeriesId(), $db) as $actor):?>
                    <li class="list-group-item">
                        <img src="<?= $actor["actorImage"] ?>" width="50" height="50"  />
                        <?= $actor["actorName"] ?>
                    </li>
                    <?php endforeach ?>
		        </ul>
            <?php endif ?>
       </div>
       <div id="series-inf" class="col-md-8 col-xs-12 col-sm-12 col-lg-8 series-inf">
          <p id="series-name" class="seriesName"><?= $_SERIES->getSeriesName() ?></p>
         <div id="content" class="series-content" class="mTop15">
              <p id="series-information" class="white-color">
                <span id="season-inf"><?= $seasonCount ?> Sezon / <?= $episodeCount ?> Bölüm</span>
              </p>
              <p class="white-color content-text">
                <?= $_SERIES->getSeriesSummary(); ?>
              </p>
         </div>
         <br>
       </div>
       <div class="col-md-8 col-xs-12 col-sm-12 col-lg-8 mTop15 pad0">
            <ul class="nav nav-tabs input-css border-none" role="tablist">
                <?php $active=true; for ($i=1; $i <= $seasonCount; $i++):?>
                <li role="presentation" class="<?= ($active) ? "active" : "" ?>">
                <a href="#season_<?=$i?>" aria-controls="season_<?=$i?>" role="tab" data-toggle="tab">
                        <?=$i?>. Sezon
                    </a>
                </li>
                <?php $active=false; endfor; ?>
            </ul>

            <div class="tab-content">
            <?php $active=true; for($i = 1; $i <= $seasonCount; $i++): ?>      
                <div role="tabpanel" class="tab-pane <?=($active)?"active":""?>" id="season_<?=$i?>">    
                    <ul class="list-group">
                    <?php foreach(getSeasonEpisodes($i, $_SERIES->getSeriesName(), $db) as $ep): ?>  
                        <li class="list-group-item">
                            <a class="episode-name" href="<?= site_url("dizi/" . $_SERIES->getSeriesName() . "/sezon-" . $ep["EpisodeSeason"] . "-bolum-" . $ep["EpisodeChapter"]) ?>">
                                <?= $_SERIES->getSeriesName() . " " .$ep["EpisodeChapter"] . ". Bölüm  <span class='pull-right'>" . $ep["EpisodeName"] . "</span>" ?>
                            </a>
                        </li>
                    <?php $active=false; endforeach ?>
                    </ul>
                </div>
            <?php endfor ?>
            </div>

        </div>
    </div>
</div>
    <?php require "static/footer.php" ?>
    <?php require "static/script-manager.php" ?>
</body>
</html>