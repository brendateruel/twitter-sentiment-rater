<?php

mysql_connect('mysqlv103', 'brendateruel', 'Brenda2438');  
mysql_select_db('twitter_sentiment');

include "module/AlchemyAPI_CURL.php";
include "module/AlchemyAPIParams.php";

$alchemyObj = new AlchemyAPI();
$alchemyObj->loadAPIKey("api_key.txt");

$a = "this%20is%20my%20test%20text";

$result = $alchemyObj->TextGetTextSentiment($a);
echo "$result<br /><br />\n";


  
?>

