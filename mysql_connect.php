<?php
	require_once('mysql_config.php');

	$mysql_connect = new mysqli(HOST, USERNAME, PASSWORD, DATEBASE);

	// 如果连接有错误, 显示错误信息
	if ($mysql_connect->connect_error) {
	    die('Connect Error (' . $mysql_connect->connect_errno . ') '
	            . $mysql_connect->connect_error);
	}

	/*echo 'Success... ' . $mysql_connect->host_info . "\n";
	/* $mysql_connect->close(); */
?>