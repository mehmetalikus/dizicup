<?php 

class Quote
{
    public static function getQuote($conn)
    {
        $query = $conn->query("
            SELECT Quote, QuoteFrom
            FROM series_quotes AS r1 
            JOIN (
                SELECT CEIL(RAND() * (SELECT MAX(QuoteId)
                FROM series_quotes)) AS id
            ) AS r2
            WHERE r1.QuoteId >= r2.id
            LIMIT 1
        ");
        if($query->execute() && $query->rowCount() > 0){
            
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            return [ "Quote" => $data[0]["Quote"], "QuoteFrom" => $data[0]["QuoteFrom"] ];
        }
        else
            return false;
    }
}
