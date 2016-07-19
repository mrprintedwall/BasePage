<?php

	function arrayUrlPost()
	{		
		$x = array();		
		foreach($_POST as $key)
		{
			//echo trim($key) . "<br/>";			
			array_push($x, trim($key));			
		}
		return array_reverse($x);
	}
	
	function arrayUrl()
	{
		$x = array();		
		foreach($_GET as $key)
		{
			array_push($x, trim($key));			
		}
		return array_reverse($x);
	}
	
	function open_image($file)
	{
        // Get extension
        $extension = strrchr($file, '.');
        $extension = strtolower($extension);

        switch($extension) {
                case '.jpg':
                case '.jpeg':
                        $im = @imagecreatefromjpeg($file);
                        break;
                case '.gif':
                        $im = @imagecreatefromgif($file);
                        break;
                case '.png':
                	{
                		$im = @imagecreatefrompng($file);
                		break;
                	}
                // ... etc

                default:
                        $im = false;
                        break;
        }

        return $im;
	}
	
	function checkEmail($email)	
	{
 		if (!preg_match('/^[a-zA-Z0-9]+[a-zA-Z0-9\._-]*@[a-zA-Z0-9_-]+[a-zA-Z0-9\._-]/', $email)) 
 		{
  			return false;
 		}
 		return true;
	}

	function evalMap($str)
	{	
		$finalString = "";														
		for($startpos = 0;;)
		{
			$searchResult = strpos($str, '$', $startpos);
			if($searchResult != FALSE)
			{																
				$pos = $searchResult;
				$finalString = $finalString . substr($str, $startpos, $pos);
				$variableSearchStartPos = $pos;																
				$variableSearchEndPos = strpos($str, ';', $variableSearchStartPos);
				$cutLength = $variableSearchEndPos - $pos;
				$foundVariable = substr($str, $pos, $cutLength);														
				$tmp = eval("\$finalString = \$finalString . $foundVariable" . ";");
				$startpos = $variableSearchEndPos + 1;																
			}
			else
			{																
				$finalString = $finalString . substr($str, $startpos, strlen($str) - $startpos);																										
				break;
			}
		}
		return $finalString;
	}
	
	function evalMapArray($str, $dumpContentArray)
	{	
		$finalString = "";														
		for($startpos = 0;;)
		{
			$searchResult = strpos($str, '$', $startpos);
			if($searchResult != FALSE)
			{
				$pos = $searchResult;
				$finalString = $finalString . substr($str, $startpos, $pos);				
				$variableSearchStartPos = $pos;																
				$variableSearchEndPos = strpos($str, ';', $variableSearchStartPos);
				$cutLength = $variableSearchEndPos - $pos;								
				$foundVariable = substr($str, $variableSearchStartPos, $cutLength);
				$str = substr($str, $variableSearchEndPos+1, strlen($str));
				$buffer = "";				
				eval("\$buffer = $foundVariable" . ";");
				$finalString = $finalString . $buffer;
				$startpos = 0;																
			}
			else
			{																
				$finalString = $finalString . substr($str, $startpos, strlen($str) - $startpos);																								
				break;
			}
		} 		
		return $finalString;
	}
	
	//This function separates the extension from the rest of the file name and returns it
	function findexts ($filename)
	{
		$filename = strtolower($filename) ;
		$exts = split("[/\\.]", $filename) ;
		$n = count($exts)-1;
		$exts = $exts[$n];
		return $exts;
	}
	
	function mysql_fetch_all($result)
	{
		$return = array();
		while($row=mysql_fetch_array($result, MYSQL_NUM))
		{
      		$return[] = $row;
      		//echo $row[2];
   		}
   		return $return;
	}	
?>