<?php 
/**
 * @author Mehmet Ali KUŞ
 * @mail mehmetali.kus@hotmail.com
 * @date 29 October 2018
*/
class DateShorter
{
    private static $monthIndexs = [
        '01',
        '02',
        '03',
        '04',
        '05',
        '06',
        '07',
        '08',
        '09',
        '10',
        '11',
        '12'
    ];
    private static $shortMonthNames = [];

    public static function setLanguage($lang = "tr")
    {
        if($lang == "en")
        {
            self::$shortMonthNames = [
                'Jan', 
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov', 
                'Dec'  
            ];
        }
        else if($lang == "tr")
        {
            self::$shortMonthNames = [
                'Oca', 
                'Şub',
                'Mar',
                'Nis',
                'May',
                'Haz',
                'Tem',
                'Ağu',
                'Eyl',
                'Eki',
                'Kas', 
                'Ara'  
            ];  
        }
    }
    
    public static function Output($dateTime, $lang = "tr")
    {
        self::setLanguage($lang);
        $date = explode(" " , $dateTime);
        $date = explode("-", $date[0]);
        return $date[2] . " " . $c = str_replace(self::$monthIndexs, self::$shortMonthNames, $date[1]);
    }
}