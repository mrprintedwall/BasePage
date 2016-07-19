<?php
	global $dbConnection, $sqlQuery, $dbName;
	
	class dbParam
	{
		var $host;
		var $userName;
		var $userPassword;
		var $databaseName;
		function dbParam($h, $uname, $pwd, $db_name)
		{
			$this->host = trim($h, ' ');
			$this->userName = trim($uname, ' ');
			$this->userPassword = trim($pwd, ' ');
			$this->databaseName = trim($db_name, ' ');
		}	
		function setHost($h)
		{
			if(!isset($h))
			{
				$h = '';
			}
		}
		function displayParam()
		{
			echo '<br>' . 'Welcome to SoftwareDevCom Corporation dbParam Class' . '<br>';
			echo 
			'-------------------------<br>
			HOST: ' . $this->host . '<br>
			USERNAME: ' . $this->userName . '<br>
			PASSWORD: ' . $this->userPassword . '<br>
			DATABASE NAME: ' . $this->databaseName . '<br>
			--------------------------<br>
			';
		}
	}
	
	function setContentDbConnection()
	{
		//$myConnectionParam = new dbParam('localhost', 'root', 'a1gorithm', 'destinyrx4');
		//$myConnectionParam = new dbParam('softwaredevcom.com', 'software_destiny', '00unlock', 'software_destinyrx');
		$myConnectionParam = new dbParam('localhost', 'destinyrx', 'a1gorithm', 'destinyrx_destinyrx');
		createDbConnection($dbConnection, $myConnectionParam);		
	}
		
	function setUsersDbConnection()
	{		
		//$myConnectionParam = new dbParam('localhost', 'root', 'a1gorithm', 'destinyrx4');
		//$myConnectionParam = new dbParam('softwaredevcom.com', 'software_destiny', '00unlock', 'software_destinyrx');
		$myConnectionParam = new dbParam('localhost', 'destinyrx', 'a1gorithm', 'destinyrx_destinyrx');
		createDbConnection($dbConnection, $myConnectionParam);		
	}	
	
	function createDbConnection(&$dbRef, $paramObj)
	{
		$dbRef = NULL;
		$dbRef = mysql_pconnect($paramObj->host, $paramObj->userName, $paramObj->userPassword);
		if(!$dbRef)
		{
			echo 'Can\'t connect to the database server';
		}
		else
		{
			$dbName = mysql_select_db($paramObj->databaseName) or die('Database not found');
		}
	}
	function loadDbContent($i)
	{
		setContentDbConnection();
		$result = mysql_query("select ContentFile from content where idContent = '" . stripslashes($i) . "'");
		mysql_close();
		return mysql_result($result, 0);	
	}
	
	function loadDbWebPage($i)
	{
		setContentDbConnection();
		$result = mysql_query("select * from page where page.idPage=$i");
		mysql_close();		
		return $result;
	}
	
	function loadDbJForm($i)
	{
		setContentDbConnection();
		$result = mysql_query("select content from jforms where idJForms = '" . stripslashes($i) . "'");
		mysql_close();
		return mysql_result($result, 0);
	}

	function updateDbContent($i, $pcontent)
	{
		setContentDbConnection();
		mysql_query("UPDATE content SET ContentFile = '" . stripslashes($pcontent) . "' WHERE idContent = '" . stripslashes($i) . "'");
		mysql_close();
	}
?>