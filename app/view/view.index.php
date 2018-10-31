<?php include("static/head.php"); ?>
<body>
<?php include("static/header.php"); ?>
<?php include("static/banner.php"); ?>
  	<div id="content" class="container pad0 mar0">
        <div class="row series-contents">
		<?php if(isset($series) && !empty($series) && is_array($series)): ?>
		<?php foreach($series as $row): ?>
      		<div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
			  	<div class="box">
	                <a href="dizi/<?= permalink(strtolower($row["SeriesName"])) . "/sezon-" . $row["EpisodeSeason"] . "-bolum-" . $row["EpisodeChapter"] ?>">
	                   <div class="bg" style="background-image: url('<?= $row["SeriesMiniPosterImage"] ?>');"></div>
	                   <img  class="series-img box-img"  src="https://dizilab.pw/upload/series/<?=permalink($row["SeriesName"])?>_thumb.png">
	                   <span class="series-title"> <?= $row["EpisodeName"] ?> </span>
	                   <span class="season">Sezon <?= $row["EpisodeSeason"] ?></span>
	                   <span class="episode">Bölüm <?= $row["EpisodeChapter"] ?></span>
	                   <img src="<?= ($row["EpisodeSubtitle"] ? "https://dizibox.co/altyazi.png" : "assets/images/altyazisiz.jpg" )?>" alt="astet" width="28" height="18" class="pull-right series-flag"/>
	                   <small class="series-date pull-right"><?= DateShorter::Output($row["EpisodeDate"])?></small>
	               	</a>
              	</div>
          	</div>
		<?php endforeach; ?>
		<?php endif; ?>
        </div>
    </div>
<?php include("static/footer.php"); ?>
<?php include("static/script-manager.php"); ?>
</body>
</html>