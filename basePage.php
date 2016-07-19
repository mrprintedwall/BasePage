<?php
require("sdc_library/database_handler.inc");
	
class BasePage
{
	var $pageId;
	var $layoutId;
	var $title;
	var $header;	
	var $keywords;
	var $content;
	var $cssLink;	
	var $mapArrayCsv;
	var $revision;
	var $author;
	var $copyright;

	function BasePage()
	{		
		$this->title = "SoftwareDevCom Corporation basePage Class version 2.0";
		$myConnectionParam = new dbParam('localhost', 'user', 'password', 'db_name');
		createDbConnection($dbConnection, $myConnectionParam);
	}
		
	function SetTitle($t)
	{
		$this->title = $t;
	}
	
	function SetHeader($data)
	{
		$this->header = $data;
	}

	function SetCssLink($link)
	{
		$this->cssLink = $link;
	}
	
	function LoadContent()
	{
	}
	
	function loadSection1()
	{
?>		
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
		<html>
			<head>
				<meta name="verify-v1" content="" />
				<title>
					<?php echo $this->title; ?>
				</title>
				<?php
					echo $this->header . "\n";					
				?>
				<script type="text/javascript" src="javascript/ajax.js"></script>
				<script type="text/javascript" src="javascript/imageSwap.js"></script>
				<script type="text/javascript" src="javascript/popupDiv.js"></script>
				<script type="text/javascript" src="javascript/jquery.js"></script>				
				<?php
					echo $this->cssLink . "\n";
				?>
			</head>
			<body class="background_body">
<?php
	}

	function loadSection2()
	{		
		echo $this->LoadContent();
	}
	
	function loadSection3()
	{
?>
			</body>
		</html>
<?php
	}

	function DisplayPage()
	{
		echo "<!--Copyright (C)  SoftwareDevCom Corporation\nSoftware-Website-IT Technical support Company\nwww.softwaredevcom.com-->";
		$this->loadSection1();
		$this->loadSection2();
		$this->loadSection3();
	}
}
?>