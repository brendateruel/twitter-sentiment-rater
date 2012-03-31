<?php

mysql_connect('mysqlv103', 'brendateruel', 'Brenda2438');  
mysql_select_db('twitter_sentiment');

require("twitteroauth/twitteroauth-xml.php");
session_start();

print 'check the db now';

if(!empty($_SESSION['username'])){  
    $twitteroauth = new TwitterOAuth('JlVI5JLcRgiHOX8LhUhCmw', 'AzFZeQZ7zhhN397iLSPNC36MUryUBPufvqt8i1NI', $_SESSION['oauth_token'], $_SESSION['oauth_secret']);  
}  

$home_timeline = $twitteroauth->get('statuses/home_timeline', array('count' => 1));  
$status = $home_timeline->status;
$user = $status->user;

print_r($home_timeline);

$query = mysql_query("INSERT INTO temp_timeline (user_handle) VALUES ('{$user->screen_name}')");  
$query = mysql_query("SELECT * FROM temp_timeline");  
$result = mysql_fetch_array($query);  

print 'check table now';

print_r($user->screen_name);
?>

<html>

<h2>Hello <?=(!empty($_SESSION['username']) ? '@' . $_SESSION['username'] : 'Guest'); ?></h2>

</html>