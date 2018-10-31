<?php 
$quote = getQuote($db);

if(isset($_URL[1]) && !isset($_URL[2]))
{
    $_SERIESNAME = explode("-", $_URL[1]);
    $_SERIESNAME = implode(" ", $_SERIESNAME);
    $_SERIES = new Series();
    $_SERIES->getSeriesByName($_SERIESNAME, $db);

    $seasonCount = Series::seriesSeasonCount($_SERIES->getSeriesName(), $db);
    $episodeCount = getEpisodeCount($_SERIES->getSeriesId(), $db);
    require view("dizi-profil");

}

if(isset($_URL[2]) ) {

    $_SERIESNAME = $_URL[1];
    $_SERIESNAME = explode("-", $_SERIESNAME);
    $_SERIESNAME = implode(" ", $_SERIESNAME);
    
    $episodesList = seriesEpisodeList($_SERIESNAME, $db);
    $episode = explode("-", $_URL[2]); // season-1-chapter-1
    
    if(count($episode) == 4){
        $_SEASON = $episode[1];
        $_CHAPTER = $episode[3];
        $_EPISODE = getEpisodeFromSeries($_SERIESNAME, $_SEASON, $_CHAPTER, $db);

        if(!$_EPISODE)
            Header("Location: " . site_url());   
        
        require view("dizi");
    }
}
