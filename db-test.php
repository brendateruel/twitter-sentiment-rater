<?php

mysql_connect('mysqlv103', 'brendateruel', 'Brenda2438');  
mysql_select_db('twitter_sentiment');

require("twitteroauth/twitteroauth-xml.php");
session_start();

if(!empty($_SESSION['username'])){  
    $twitteroauth = new TwitterOAuth('JlVI5JLcRgiHOX8LhUhCmw', 'AzFZeQZ7zhhN397iLSPNC36MUryUBPufvqt8i1NI', $_SESSION['oauth_token'], $_SESSION['oauth_secret']);  
}  

$result = mysql_query("SELECT COUNT(*) AS `Rows`, `user_handle` FROM `temp_timeline` GROUP BY `user_handle` ORDER BY `user_handle`");

if (!$result) {
    $message  = 'Invalid query: ' . mysql_error() . "\n";
    $message .= 'Whole query: ' . $query;
    die($message);
}

// Use result
// Attempting to print $result won't allow access to information in the resource
// One of the mysql result functions must be used
// See also mysql_result(), mysql_fetch_array(), mysql_fetch_row(), etc.
while ($row = mysql_fetch_assoc($result)) {
    echo $row['user_handle'];
}

?>

<html>

<h2>Hello <?=(!empty($_SESSION['username']) ? '@' . $_SESSION['username'] : 'Guest'); ?></h2>
<p></p>

</html>