<?php
/**
* @author Mehmet Ali KUŞ
* @mail mehmetali.kus@hotmail.com
*/

class Series
{
	
	private $seriesId;
	private $seriesName;
	private $seriesSummary;
	private $seriesYear;
	private $seriesIMDB;
    private $seriesPosterImage;
    private $seriesMiniPosterImage;


	public Function Series(){}

	/**
	* @return mixed
 	*/
    public function getSeriesId()
    {
        return $this->seriesId;
    }

    /**
     * @param mixed $seriesId
     *
     * @return self
     */
    public function setSeriesId($seriesId)
    {
        $this->seriesId = $seriesId;
        return $this;
    }

    /**
     * @return mixed
 	*/

    public function getSeriesName()
    {
        return $this->seriesName;
    }

    /**
     * @param mixed $seriesName
     *
     * @return self
 	*/

    public function setSeriesName($seriesName)
    {
        $this->seriesName = $seriesName;
        return $this;
    }

    /**
     * @return mixed
 	*/

    public function getSeriesSummary()
    {
        return $this->seriesSummary;
    }

    /**
     * @param mixed $seriesSummary
     *
     * @return self
	*/

    public function setSeriesSummary($seriesSummary)
    {
        $this->seriesSummary = $seriesSummary;
        return $this;
    }

    /**
     * @return mixed
 	*/

    public function getSeriesYear()
    {
        return $this->seriesYear;
    }

    /**
     * @param mixed $seriesYear
     *
     * @return self
 	*/

    public function setSeriesYear($seriesYear)
    {
        $this->seriesYear = $seriesYear;
        return $this;
    }

    /**
     * @return mixed
 	*/

    public function getSeriesIMDB()
    {
        return $this->seriesIMDB;
    }

    /**
     * @param mixed $seriesIMDB
     *
     * @return self
 	*/
    
    public function setSeriesIMDB($seriesIMDB)
    {
        $this->seriesIMDB = $seriesIMDB;
        return $this;
    }

    /**
     * @return mixed
 	*/
    
    public function getSeriesPosterImage()
    {
        return $this->seriesPosterImage;
    }

    /**
     * @param mixed $seriesPosterImage
     *
     * @return self
 	*/
    
    public function setSeriesPosterImage($seriesPosterImage)
    {
        $this->seriesPosterImage = $seriesPosterImage;
        return $this;
    }

    public function getSeriesMiniPosterImage()
    {
        return $this->seriesMiniPosterImage;
    }

    public function setSeriesMiniPosterImage($seriesMiniPosterImage)
    {
        $this->seriesMiniPosterImage = $seriesMiniPosterImage;
        return $this;
    }

    public function getSeries(Int $seriesId, Object $conn){

		$query = $conn->prepare("SELECT * FROM series WHERE SeriesId = :seriesId");
		$query->bindValue(":seriesId", $seriesId);
		if($query->execute() && $query->rowCount() > 0)
		{
			$data = $query->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;

            $this->setSeriesId($data[0]["SeriesId"]);
			$this->setSeriesName($data[0]["SeriesName"]);
			$this->setSeriesSummary($data[0]["SeriesSummary"]);
			$this->setSeriesYear($data[0]["SeriesYear"]);
			$this->setSeriesIMDB($data[0]["SeriesIMDB"]);
			$this->setSeriesPosterImage($data[0]["SeriesPosterImage"]);
			$this->setSeriesMiniPosterImage($data[0]["SeriesMiniPosterImage"]);
		}
		else
			return false;
    }

    public function getSeriesByName($seriesName, $conn){
        
        $query = $conn->prepare("
            SELECT * FROM series WHERE SeriesName = :serName
        ");
        $query->bindValue(":serName", $seriesName);
        
        if($query->execute() && $query->rowCount() > 0)
        {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;

            $this->setSeriesId($data[0]["SeriesId"]);
			$this->setSeriesName($data[0]["SeriesName"]);
			$this->setSeriesSummary($data[0]["SeriesSummary"]);
			$this->setSeriesYear($data[0]["SeriesYear"]);
			$this->setSeriesIMDB($data[0]["SeriesIMDB"]);
			$this->setSeriesPosterImage($data[0]["SeriesPosterImage"]);

        }
        else
            return false;
    }

    public static function seriesFromThisWeek($conn)
    {
        $query = $conn->prepare("
            SELECT s.SeriesId, s.SeriesName, s.SeriesPosterImage, s.SeriesMiniPosterImage, se.EpisodeId, se.EpisodeName, se.EpisodeChapter, se.EpisodeSeason, se.EpisodeDate, se.EpisodeIMDB, se.ViewCount, se.EpisodeSubtitle 
            FROM series s 
            INNER JOIN series_episodes se ON se.SeriesID = s.SeriesId
            WHERE se.episodeDate > DATE_SUB(NOW(), INTERVAL 1 WEEK) 
            ORDER BY se.episodeDate DESC
        ");
        if($query->execute() && $query->rowCount() > 0)
        {
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            $conn = null;

            return $data;
        }
        else
            return false;
    }  

    public static function seriesSeasonCount($seriesName, $conn){

        $query = $conn->prepare("
            SELECT MAX(se.EpisodeSeason) as SeasonCount FROM series s 
            INNER JOIN series_episodes se ON se.SeriesID = s.SeriesId
            WHERE s.SeriesName = :serName
        ");
        $query->bindValue(":serName", $seriesName);
        if($query->execute() && $query->rowCount() > 0)
            return $query->fetchColumn();
        else
            return false;
    }

}
