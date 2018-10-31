<?php 

function getEpisodeFromSeries($seriesName, $episodeSeason, $episodeChapter, $connection){

    $x = new Episode();
    $x->getEpisode($seriesName, $episodeSeason, $episodeChapter, $connection);
    return $x;
}

function getSeriesInformation($seriesId, $connection)
{
    $x = new Series();
    $x->getSeries($seriesId, $connection);
    
    return $x;
}

function getSeriesByName($seriesName, $connection)
{
    $x = new Series();
    return $x->getSeriesByName($seriesName, $connection);
}

function seriesFromThisWeek($connection)
{
    return Series::seriesFromThisWeek($connection);
}

function seriesEpisodeList($serName, $connection)
{
    $serName = explode("-", $serName);
    $serName = implode(" ", $serName);
    
    return Episode::getSeriesEpisodeList($serName, $connection);
}

function getQuote($connection){
    return Quote::getQuote($connection);
}

function nextChapter(Episode $episode, $conn)
{
    $x = Episode::nextChapter($episode, $conn);
    if($x != false){
        return 
        '<a href="'. site_url("dizi/") . $x . '" class="btn btn-primary pull-right" style="margin-top:5px;" >
            Sonraki Bölüm
        </a>';
    }
    else
        return false;

}

function previousChapter(Episode $episode, $conn)
{
    $x = Episode::previousChapter($episode, $conn);
    if($x != false){
        return 
        '<a href="'.site_url("dizi/") . $x .'" class="btn btn-primary pull-left" style="margin-top:5px;" >
            Önceki Bölüm
        </a>';
    }
    return false;
}

function seasonCount($seriesName, $connection)
{
    return Series::seriesSeasonCount($seriesName, $connection);
}

function getSeasonEpisodes($season, $seriesName, $connection)
{
    return Episode::getSeasonEpisodes($season, $seriesName, $connection);
}

function getEpisodeCount($seriesId, $connection)
{
    return Episode::getEpisodeCount($seriesId, $connection);
}
