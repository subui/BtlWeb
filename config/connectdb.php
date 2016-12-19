<?php
	/*
	*	Kết nối tới MySQL
	*/
	//require 'config.php';

	$_connection = @mysql_pconnect("localhost", "root", "") or die('Not connected MySQL');
	/*
	*  Select database
	*/
	$_selecteddb = mysql_select_db("btlweb2016", $_connection) or die('Not selected database');
	/* Yêu cầu lưu trữ UTF8 (tiếng việt) */
	mysql_query('SET NAMES UTF8',$_connection);
	mysql_set_charset("utf8");
?>