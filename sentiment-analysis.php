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

$tweet = mysql_query("SELECT tweet, status_ID FROM temp_timeline WHERE user_handle='bergatron'");  

$text = array();
$status_id = array();

while ($result = mysql_fetch_assoc($tweet)) {
	$text[] = $result['tweet'];
	$status_id[] = $result['status_ID'];
}
print_r($text);


print_r($status_id);

$url = "http://www.viralheat.com/"




  
?>