<?php 

class Actor
{
    
    private $actorId;
    private $actorName;
    private $actorImage;


    public static function Series($actorId, $conn){

        $query = $conn->prepare("
            SELECT s.SeriesName  FROM series s 
            INNER JOIN starring str ON str.serId = s.SeriesId
            INNER JOIN actor a ON a.actorId = str.actId
            WHERE str.actId = :id
        ");
        $query->bindValue(":id", $actorId);

        if($query->execute() && $query->rowCount() > 0)
            return $query->fetchAll(PDO::FETCH_ASSOC);
        else
            return false;
    }

    public static function Starring($seriesId, $conn){

        $query = $conn->prepare("
            SELECT a.actorId, a.actorName, a.actorImage
            FROM actor a 
            INNER JOIN starring str ON str.actId = a.actorId
            WHERE str.serId = :serId
        ");
        $query->bindValue(":serId", $seriesId);
        
        if($query->execute() && $query->rowCount() > 0)
            return $query->fetchAll(PDO::FETCH_ASSOC);
        else
            return false;

    }

}
