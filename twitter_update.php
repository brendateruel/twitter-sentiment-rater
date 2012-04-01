<?php

mysql_connect('mysqlv103', 'brendateruel', 'Brenda2438');  
mysql_select_db('twitter_sentiment');

require("twitteroauth/twitteroauth-xml.php");
session_start();

print 'check the db now';

if(!empty($_SESSION['username'])){  
    $twitteroauth = new TwitterOAuth('JlVI5JLcRgiHOX8LhUhCmw', 'AzFZeQZ7zhhN397iLSPNC36MUryUBPufvqt8i1NI', $_SESSION['oauth_token'], $_SESSION['oauth_secret']);  
}  

$home_timeline = $twitteroauth->get('statuses/home_timeline', array('count' => 200));  


foreach($home_timeline->status as $status) {
	$user = $status->user;
	$date_time = date("Y-m-d H:i:s", strtotime($status->created_at)); 
	$query = mysql_query("INSERT INTO friends (user_handle, user_image_URL) VALUES ('{$user->screen_name}', '{$user->profile_image_url}')");  
	$query = mysql_query("INSERT INTO temp_timeline (user_handle, status_id, date_time, tweet) VALUES ('{$user->screen_name}', '{$status->id}', '{$date_time}', '{$status->text}')");  
	$query = mysql_query("SELECT * FROM friends");  
	$result = mysql_fetch_array($query);
	print_r($result);
	mysql_free_result($query);
	mysql_free_result($result);
}

?>

<html>

<h2>Hello <?=(!empty($_SESSION['username']) ? '@' . $_SESSION['username'] : 'Guest'); ?></h2>
<p></p>

</html>