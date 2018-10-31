<?php require "static/head.php" ?>
<body>
<?php require "static/header.php" ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-xs-12 col-sm-12">
            <p class="view-titles pull-left" id="seriesName">
                <a class="seriesname" href="<?= site_url("dizi/".$_EPISODE->getSeriesName())?>"><?= $_EPISODE->getSeriesName() ?></a> | <?= $_EPISODE->getEpisodeName() ?> 
            </p>
            <p class="view-titles pull-right" id="imdbScore">
                IMDB: <span class="score"><?= $_EPISODE->getEpisodeIMDB() ?></span>
            </p><br><hr>            
            <video id="player" playsinline controls class="video-js width-height-100" poster="<?= $_EPISODE->getSeriesMiniPosterImage() ?>">
                <source src="<?= $_EPISODE->getEpisodeVideoURL()?>" type="video/mp4">
                <!-- Captions are optional -->
                <track kind="captions" label="Türkçe Altyazı" src="<?= assets_url("srt/" . $_EPISODE->getEpisodeSubtitlePath()) ?>" srclang="tr" default>
                
            </video>
            <?= previousChapter($_EPISODE, $db) ?>
            <?= nextChapter($_EPISODE, $db) ?>
        </div>
    <div class="col-md-4 hidden-xs hidden-sm mar0 pad0 series-episodes-list">
        <ul class="list-group episode-list">
        <?php foreach($episodesList as $list): ?>
            <li class="list-group-item">
            <a href="<?= site_url("dizi/") . permalink(strtolower($list["SeriesName"])) . "/sezon-" . $list["EpisodeSeason"] . "-bolum-" . $list["EpisodeChapter"] ?>" class="noUnderline">
                    <?= "Sezon " . $list["EpisodeSeason"] . " Bölüm " . $list["EpisodeChapter"] . " | <small>" . $list["EpisodeName"] . "</small>" ?>
                </a>
            </li>
        <?php endforeach ?>
        </ul>
    </div>
</div>

<?php require "static/footer.php" ?>
<?php require "static/script-manager.php" ?>
</body>
</html>