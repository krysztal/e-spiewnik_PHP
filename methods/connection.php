<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_server = mysql_connect($db_hostname, $db_username, $db_password);
if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());
mysql_select_db('testpl', $db_server) or die ('Can\'t use foo : ' . mysql_error());
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
mysql_query('set names utf8;');


?>