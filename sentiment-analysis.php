<?php

mysql_connect('mysqlv103', 'brendateruel', 'Brenda2438');  
mysql_select_db('twitter_sentiment');

  /**
   * GET wrapper for oAuthRequest.
   */
  function get($url, $parameters = array()) {
    $response = $this->oAuthRequest($url, 'GET', $parameters);
    if ($this->format === 'xml' && $this->decode_xml) {
      return simplexml_load_string($response);
    }
    return $response;
  }

$text = mysql_query("SELECT tweet FROM temp_timeline WHERE status_ID='186502375752728577'");  
$text2 = array(1);
while ($result = mysql_fetch_assoc($text)) {
	$text2[] = $result;
}

$a = array();
while ($result = mysql_fetch_assoc($text2)) {
	$a[] = $result;
}

print_r($text2);

$b = $a;
print_r($b);

$url = "http://www.viralheat.com/"




  
?>