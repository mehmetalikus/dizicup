<?php 

/**
* @author Mehmet Ali KUŞ
* @mail mehmetali.kus@hotmail.com
*/

class Episode extends Series
{
	
	private $episodeId;
	private $episodeName;
	private $episodeChapter;
    private $episodeSeason;
    private $episodeVideoURL;
	private $episodeDate;
	private $episodeIMDB;
    private $episodeViewCount;
    private $episodeSubtitle;
    private $episodeSubtitlePath;


    /**
     * @return mixed
     */
    public function getEpisodeId()
    {
        return $this->episodeId;
    }

    /**
     * @param mixed $episodeId
     *
     * @return self
     */
    public function setEpisodeId($episodeId)
    {
        $this->episodeId = $episodeId;

        return $this;
    }

    /**
 	* @return mixed
 	*/
    public function getEpisodeName()
    {
        return $this->episodeName;
    }

    /**
     * @param mixed $episodeName
     *
     * @return self
     */
    public function setEpisodeName($episodeName)
    {
        $this->episodeName = $episodeName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEpisodeChapter()
    {
        return $this->episodeChapter;
    }

    /**
     * @param mixed $episodeChapter
     *
     * @return self
     */
    public function setEpisodeChapter($episodeChapter)
    {
        $this->episodeChapter = $episodeChapter;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEpisodeSeason()
    {
        return $this->episodeSeason;
    }

    /**
     * @param mixed $episodeSeason
     *
     * @return self
     */
    public function setEpisodeSeason($episodeSeason)
    {
        $this->episodeSeason = $episodeSeason;

        return $this;
    }

    public function getEpisodeVideoURL()
    {
        return $this->episodeVideoURL;
    }

    public function setEpisodeVideoURL($episodeVideoURL)
    {
        $this->episodeVideoURL = $episodeVideoURL;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEpisodeDate()
    {
        return $this->episodeDate;
    }

    /**
     * @param mixed $episodeDate
     *
     * @return self
     */
    public function setEpisodeDate($episodeDate)
    {
        $this->episodeDate = $episodeDate;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEpisodeIMDB()
    {
        return $this->episodeIMDB;
    }

    /**
     * @param mixed $episodeIMDB
     *
     * @return self
     */
    public function setEpisodeIMDB($episodeIMDB)
    {
        $this->episodeIMDB = $episodeIMDB;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEpisodeViewCount()
    {
        return $this->episodeViewCount;
    }

    /**
     * @param mixed $episodeViewCount
     *
     * @return self
     */
    public function setEpisodeViewCount($episodeViewCount)
    {
        $this->episodeViewCount = $episodeViewCount;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getEpisodeSubtitle()
    {
        return $this->getEpisodeSubtitle;
    }


    public function setEpisodeSubtitle($episodeSubtitle){
        $this->episodeSubtitle = $episodeSubtitle;
        return $this;
    }


    public function getEpisodeSubtitlePath()
    {
        return $this->episodeSubtitlePath;
    }


    public function setEpisodeSubtitlePath($episodeSubtitlePath){
        $this->episodeSubtitlePath = $episodeSubtitlePath;
        return $this;
    }

    

        
    public function getEpisode($seriesName, $episodeSeason, $episodeChapter, $conn){

        $query = $conn->prepare("
            SELECT s.SeriesId, s.SeriesName, s.SeriesPosterImage, s.SeriesMiniPosterImage, se.EpisodeId, se.EpisodeName, se.EpisodeChapter, se.EpisodeSeason, se.EpisodeVideoURL as url, se.ViewCount, se.EpisodeIMDB, se.EpisodeSubtitlePath 
            FROM series s 
            INNER JOIN series_episodes se ON se.SeriesID = s.SeriesId 
            WHERE s.SeriesName = :sName AND se.EpisodeSeason = :epSeason AND se.EpisodeChapter = :epChapter 
        ");
        $query->bindValue(":sName", $seriesName);
        $query->bindValue(":epSeason", $episodeSeason);
        $query->bindValue(":epChapter", $episodeChapter);

        if($query->execute() && $query->rowCount() > 0)
        {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;
            
            $this->setEpisodeId($data[0]["EpisodeId"]);
            $this->setEpisodeName($data[0]["EpisodeName"]);
            $this->setEpisodeChapter($data[0]["EpisodeChapter"]);
            $this->setEpisodeSeason($data[0]["EpisodeSeason"]);
            $this->setEpisodeVideoURL($data[0]["url"]);
            $this->setEpisodeIMDB($data[0]["EpisodeIMDB"]);
            $this->setEpisodeViewCount($data[0]["ViewCount"]);
            $this->setEpisodeSubtitlePath($data[0]["EpisodeSubtitlePath"]);
            $this->setSeriesId($data[0]["SeriesId"]);
            $this->setSeriesName($data[0]["SeriesName"]);
            $this->setSeriesPosterImage($data[0]["SeriesPosterImage"]);
            $this->setSeriesMiniPosterImage($data[0]["SeriesMiniPosterImage"]);

        }
        else
            return false;

    }

    public static function getSeriesEpisodeList($serName, $conn){
        
        $query = $conn->prepare("
            SELECT s.SeriesName, se.EpisodeName, se.EpisodeSeason, se.EpisodeChapter 
            FROM series_episodes se
            INNER JOIN series s ON s.SeriesId = se.SeriesID
            WHERE s.SeriesName = :serName
        ");
        $query->bindValue(":serName", $serName);
        if($query->execute() && $query->rowCount() > 0)
        {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;
            
            return $data;
        }
        else
            return false;
    }

    public static function nextChapter(Episode $episode, $conn){
        
        $query = $conn->prepare("
            SELECT s.seriesName, se.EpisodeChapter, se.EpisodeSeason FROM series_episodes se
            INNER JOIN series s ON s.SeriesId = se.SeriesID
            WHERE s.SeriesId = :serId AND se.EpisodeId > :epId
            ORDER BY se.EpisodeId ASC
            LIMIT 1
        ");
        $query->bindValue(":serId", $episode->getSeriesId());
        $query->bindValue(":epId", $episode->getEpisodeId());
        if($query->execute() && $query->rowCount() > 0)
        {
            $data = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            $conn = null;

            $seriesName = permalink($data["seriesName"]);
            $episodeChapter = $data["EpisodeChapter"];
            $episodeSeason = $data["EpisodeSeason"];

            return $seriesName . "/" . "sezon-" . $episodeSeason . "-bolum-" . $episodeChapter;
        }
        else
            return false;
    }

    public static function previousChapter(Episode $episode, $conn){
 
        $query = $conn->prepare("
            SELECT s.seriesName, se.EpisodeChapter, se.EpisodeSeason FROM series_episodes se
            INNER JOIN series s ON s.SeriesId = se.SeriesID
            WHERE s.SeriesId = :serId AND se.EpisodeId < :epId
            ORDER BY se.EpisodeId DESC
            LIMIT 1
        ");
        $query->bindValue(":serId", $episode->getSeriesId());
        $query->bindValue(":epId", $episode->getEpisodeId());
        if($query->execute() && $query->rowCount() > 0)
        {
            $data = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            $conn = null;

            $seriesName = permalink($data["seriesName"]);
            $episodeChapter = $data["EpisodeChapter"];
            $episodeSeason = $data["EpisodeSeason"];

            return $seriesName . "/" . "sezon-" . $episodeSeason . "-bolum-" . $episodeChapter;
        }
        else
            return false;
    }

    public static function getSeasonEpisodes($seasonNo, $seriesName, $conn){

        $query = $conn->prepare("
            SELECT s.SeriesName, se.EpisodeName, se.EpisodeChapter, se.EpisodeSeason 
            FROM series_episodes se
            INNER JOIN series s ON s.SeriesId = se.SeriesID
            WHERE s.SeriesName = :serName AND se.EpisodeSeason = :seasonNo
        ");
        $query->bindValue(":serName", $seriesName);
        $query->bindValue(":seasonNo", $seasonNo);

        if($query->execute() && $query->rowCount() > 0){
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        else
            return false;
    }

    public static function getEpisodeCount($seriesId, $conn){
        
        $query = $conn->prepare("
            SELECT COUNT(EpisodeId)
            FROM series_episodes
            WHERE seriesId = :serId
        ");
        $query->bindValue(":serId", $seriesId);
        if($query->execute() && $query->rowCount() > 0)
            return $query->fetchColumn();
        else
            return false;
    }

}


