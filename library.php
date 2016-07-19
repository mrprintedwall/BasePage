<?php
	include("basePage.php");
	include("sdc_library/sdclibrary.php");
	include("layouts.php");
	include("class/CNavigation.php");
	include("class/CProduct.php");
	include("class/CMember.php");
	include("class/CCart.php");
	include("class/COrders.php");
	
	function OrderListBalancer()
	{
		$result = Order::GetAllCustomerOrders();
		while(($row = mysql_fetch_assoc($result)))
		{
			$myOrderObj = new Order($row['idCustomerOrder']);
			/* echo "
			-----------------------------------------------------<br />
			ORDER ID: $myOrderObj->OrderId<br />
			-----------------------------------------------------<br />
			NAME: $myOrderObj->FirstName $myOrderObj->LastName<br />
			ADDRESS: $myOrderObj->ShippingAddress<br />
			CITY: $myOrderObj->ShippingCity<br />
			STATE | PROVINCE: $myOrderObj->StateOrProvince<br />
			ZIP | POSTAL CODE: $myOrderObj->ZipOrPostalCode<br />
			COUNTRY: $myOrderObj->Country<br />
			EMAIL: $myOrderObj->Email<br />
			PHONE: $myOrderObj->Phone<br />
			PAYMENT: $myOrderObj->PaymentType<br />
			TRANSACTION ID: $myOrderObj->TransactionId<br />
			SESSION_ID: $myOrderObj->UserId<br />
			-----------------------------------------------------<br />
			ORDER DETAILS<br/>
			-----------------------------------------------------<br />
			"; */	

			setContentDbConnection();
			$orderlistResult = mysql_query("select * from customerorderlist 
			left join product on product.idProduct = customerorderlist.Product_idProduct
			where customerorderlist.CustomerOrder_idCustomerOrder = '$myOrderObj->OrderId'");
			mysql_close();
			if(mysql_num_rows($orderlistResult) >= 1)
			{
				/*while(($row1 = mysql_fetch_assoc($orderlistResult)))
				{
					echo $row1['productName'] . " --- " . $row1['quantity'] . "<br/>";
				}*/
			}
			else
			{
				/*echo "CALIBRATED!<br />
				$myOrderObj->OrderId<br />
				$myOrderObj->UserId<br/>";*/
				setContentDbConnection();
				mysql_query("update customerOrderList
				set CustomerOrder_idCustomerOrder = '$myOrderObj->OrderId'
				where SystemUser_idSystemUser = '$myOrderObj->UserId';
				");
				mysql_close();
			}
			//echo "-----------------------------------------------------<br />";
		}
	}
	
	function SetupFormInformation()
	{		
		$dumpContent = LoadNavigationCategory();
		return $dumpContent;
	}
	
	function SetupCategorySwatch()
	{
		$myNavigationObj = new Navigation();
		$result = $myNavigationObj->LoadCategories();
		$content = "";
		$content .= "<table>";
		for($i = 0; $i < count($result); ++$i)
		{
			$nav = $i+1;
			$result_row = $result[$i];			
			$categoryName = $result_row[1];

			$content = $content . "
			<tr>\n
				<td>\n 					
					&nbsp;&nbsp;&nbsp;$categoryName\n";															
			$productGroupListResult = $myNavigationObj->LoadCategoriesItems($result_row[0]);
			for($j = 0; $j < count($productGroupListResult); ++$j)
			{
				$row = $productGroupListResult[$j];
				$productGroupItemId = $row[2];
				$productGroupItemName = $row[3];											
				$content = $content . "menu$nav" . "[$j]='<a href=\"product.php?p=$productGroupItemId\" class=\"left_sub_nav\">$productGroupItemName</a>';\n";
			}
			
			$content = $content . "					
				</td>
			</tr>";									
		}
		$content .= "</table>";
		return $content;
	}
	
	//function SetupStoreFrontFormInformation()
	//{
	//	$dumpContent = "";
	//	$dumpContent = LoadStoreFrontNavigationCategory();
	//	return $dumpContent;
	//}
	
	function HitAudit()
	{
		$ip = $_SERVER['REMOTE_ADDR']; 
		$browser = $_SERVER['HTTP_USER_AGENT'];
		$referer = "";
		if(isset($_SERVER['HTTP_REFERER']))
		{
			$referer = $_SERVER['HTTP_REFERER'];
		}
		$requestor = $_SERVER['REQUEST_URI'];	
		setContentDbConnection();
		mysql_query("insert into hitaudit values(null, '$ip', '$browser', '$referer', '$requestor', null)");
		mysql_close();
	}
	
	function SystemTester()
	{
		for($i = 1; $i < 100000000;)
		{
			$i = $i + 0.1;
		}	
	}
	
	function LoadNavigationCategory()
	{
		$myNavigationObj = new Navigation();
		$result = $myNavigationObj->LoadCategories();
		$content = "";
		
		for($i = 0; $i < count($result); ++$i)
		{
			$nav = $i+1;
			$result_row = $result[$i];			
			$categoryName = $result_row[1];

			$content = $content . "
			<tr>\n
				<td class=\"nav_content_bg_td\" onClick=\"return dropdownmenu(this, event, menu$nav, '200px' )\" onMouseout=\"delayhidemenu();this.style.background='#d2d4d4'\" onMouseover=\"this.style.background='#c1e5e5';this.style.cursor='pointer'\">\n 					
					&nbsp;&nbsp;&nbsp;$categoryName\n					
					<script type=\"text/javascript\">\n
					var menu$nav=new Array();\n";			
			$productGroupListResult = $myNavigationObj->LoadCategoriesItems($result_row[0]);
			for($j = 0; $j < count($productGroupListResult); ++$j)
			{
				$row = $productGroupListResult[$j];
				$productGroupItemId = $row[2];
				$productGroupItemName = $row[3];											
				$content = $content . "menu$nav" . "[$j]='<a href=\"product.php?p=$productGroupItemId\" class=\"left_sub_nav\">$productGroupItemName</a>';\n";
			}
			
			$content = $content . "
					</script>
				</td>
			</tr>";									
		}
		return $content;
	}

	function LoadStoreFrontNavigationCategory()
	{
		$myNavigationObj = new StoreFrontNavigation();
		$result = $myNavigationObj->LoadCategories();
		$content = "";
		
		for($i = 0; $i < count($result); ++$i)
		{
			$nav = $i+1;
			$result_row = $result[$i];			
			$categoryName = $result_row[1];

			$content = $content . "
			<tr>\n
				<td class=\"nav_content_bg_td\" onClick=\"return dropdownmenu(this, event, menu$nav, '200px' )\" onMouseout=\"delayhidemenu();this.style.background='#d2d4d4'\" onMouseover=\"this.style.background='#c1e5e5';this.style.cursor='pointer'\">\n 					
					&nbsp;&nbsp;&nbsp;$categoryName\n					
					<script type=\"text/javascript\">\n
					var menu$nav=new Array();\n";			
			$productGroupListResult = $myNavigationObj->LoadCategoriesItems($result_row[0]);
			for($j = 0; $j < count($productGroupListResult); ++$j)
			{
				$row = $productGroupListResult[$j];
				$productGroupItemId = $row[2];
				$productGroupItemName = $row[3];											
				$content = $content . "menu$nav" . "[$j]='<a href=\"storeFrontProduct.php?p=$productGroupItemId\" class=\"left_sub_nav\">$productGroupItemName</a>';\n";
			}
			
			$content = $content . "
					</script>
				</td>
			</tr>";
		}
		return $content;
	}
	
	/**
	 * This class will be created at the first
	 * stage of the web development. It should
	 * inherit the BasePage class to enable other
	 * web page handling capabliities included on that
	 * class.
	 * 
	 * @author John Voltaire M. Pili
	 * @copyright SoftwareDevCom Corporation 
	 */	
	class WPage extends BasePage
	{
		var $dumpContentArray = "";
		
		/**
		 * The basePage 2.0 contructor
		 *
		 * @param int $dbId
		 * @param mixed[] $dumpContentArray
		 * @return WPage
		 */
		function WPage($dbId, $dumpContentArray = "")
		{
			$this->header = $this->header . '<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">';			
			$result = loadDbWebPage($dbId);
			$result_rows = mysql_fetch_row($result);
			$pageInfo = $result_rows;
			$this->dumpContentArray = $dumpContentArray;
						
			if(isset($pageInfo))
			{				
				$this->pageId = $pageInfo[0];
				$this->layoutId = $pageInfo[2];
				$this->title = $pageInfo[3];
				$this->author = $pageInfo[5];
				$this->revision = $pageInfo[4];
				$this->mapArrayCsv = $pageInfo[10];
			}
			else
			{
				die("Web page not found<br />");	
			}
		}

		function loadSection2()
		{		
			$this->SetLayout($this->layoutId);
		}
		
		/**
		 * SetLayout(x) function or handler is in-charge 
		 * for the loading of the layout. This can be
		 * edited if your layout collection exceeds the
		 * switch case values of this function.
		 * 
		 * @author John Voltaire M. Pili
		 * @copyright SoftwareDevCom Corporation
		 * 
		 * @param int $layoutCode
		 * @return mixed string
		 */		
		function SetLayout($layoutCode)
		{		
			switch($layoutCode)
			{
				case 1:
				{								
					$mapSlices1 = explode(",", $this->mapArrayCsv);
					$arrayMaps = array();
					for($i = 0; $i < count($mapSlices1); ++$i)
					{
						$x = explode("=", $mapSlices1[$i]);							
						$tmp = array($x[0] => $x[1]);
						$arrayMaps = array_merge($arrayMaps, $tmp);
					}
					return layout1($arrayMaps, $this->dumpContentArray);
					break;
				}
				case 2:
				{
					$mapSlices1 = explode(",", $this->mapArrayCsv);
					$arrayMaps = array();
					for($i = 0; $i < count($mapSlices1); ++$i)
					{
						$x = explode("=", $mapSlices1[$i]);							
						$tmp = array($x[0] => $x[1]);
						$arrayMaps = array_merge($arrayMaps, $tmp);
					}						
					return layout2($arrayMaps, $this->dumpContentArray);
					break;
				}
				case 4:
				{
					$mapSlices1 = explode(",", $this->mapArrayCsv);
					$arrayMaps = array();
					for($i = 0; $i < count($mapSlices1); ++$i)
					{
						$x = explode("=", $mapSlices1[$i]);							
						$tmp = array($x[0] => $x[1]);
						$arrayMaps = array_merge($arrayMaps, $tmp);
					}						
					return layout4($arrayMaps, $this->dumpContentArray);
					break;
				}
				default:
				{						
					break;
				}
			}
		}
	
		function DumpCssDb($dbId)
		{
			setContentDbConnection();
			$result = mysql_query("select * from contentcss where idContentCss=$dbId");
			mysql_close();
			$result_rows = mysql_fetch_row($result);	
			$this->cssLink = $result_rows[1];
		}
	}

?>