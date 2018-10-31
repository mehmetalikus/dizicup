<?php 

$series = seriesFromThisWeek($db);
$quote = getQuote($db);

require view("index");