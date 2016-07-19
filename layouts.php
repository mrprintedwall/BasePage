<?php
/**
* @package layouts.php
* @copyright SoftwareDevCom Corporation
* @author  John Voltaire M. Pili
*/

/**
 * This is the layout for the website, this uses a map to direct the database content
 *
 * @param mixed_array $mapArrayWithKeys
 */
function layout1($mapArrayWithKeys, $dumpContentArray="")
{
?>
	<table class="mainCanvass" width="100%">
		<tr>
			<td>
				<table border="0" width="793" align="center" class="background_color_main_table" cellpadding="0" cellspacing="0">					
					<tr>
						<td align="center" valign="bottom" colspan="2" id="map1">
						<!-- START HEADER AREA -->
							<?php
								if(isset($mapArrayWithKeys['map1']))
								{
									echo loadDbContent($mapArrayWithKeys['map1']);
								}
							?>			
						</td>
					</tr>
					<tr>		
						<td align="left" valign="top" colspan="3" class="topNavTd">
						<!-- START TOP NAVIGATION -->
							<?php
								if(isset($mapArrayWithKeys['map5']))
								{
									echo loadDbContent($mapArrayWithKeys['map5']);
								}
							?>
						<!-- END TOP NAVIGATION -->				
						</td>		
					</tr>		
					<tr>		
						<td width="100%">
							<!-- START CENTER MAIN -->
							<?php								
								$str = loadDbContent($mapArrayWithKeys['map2']);														
								echo evalMapArray($str, $dumpContentArray);
							?>
							<!-- END CENTER MAIN -->
						</td>		
					</tr>
					<tr>
						<td colspan="2">
							<!-- START BOTTOM NAVIGATION -->
							<?php
								if(isset($mapArrayWithKeys['map3']))
								{
									echo loadDbContent($mapArrayWithKeys['map3']);
								}
							?>
							<!-- END BOTTOM NAVIGATION -->		
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<!-- START FOOTER TABLE -->
							<?php
								if(isset($mapArrayWithKeys['map4']))
								{
									echo loadDbContent($mapArrayWithKeys['map4']);
								}
							?>
							<!-- END FOOTER TABLE -->							
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
<?php
}
?>

<?php
function layout2($mapArrayWithKeys, $dumpContentArray = "")
{
?>
	<table class="mainCanvass" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<table border="0" width="793" align="center" class="background_color_main_table" cellpadding="0" cellspacing="0">
						<tr>
							<td align="center" valign="bottom" colspan="2" id="map1">
							<!-- START HEADER AREA -->
								<?php
									if(isset($mapArrayWithKeys['map1']))
									{
										echo loadDbContent($mapArrayWithKeys['map1']);
									}
								?>							
							<!-- END HEADER AREA -->		
							</td>
						</tr>
						<tr>		
							<td align="left" valign="top" colspan="3" class="topNavTd">
							<!-- START TOP NAVIGATION -->
								<?php
									if(isset($mapArrayWithKeys['map2']))
									{
										echo loadDbContent($mapArrayWithKeys['map2']);
									}
								?>
							<!-- END TOP NAVIGATION -->				
							</td>		
						</tr>
						<tr>		
							<td align="center" width="100%">
								<!-- START CENTER MAIN -->
								<table border="0" width="100%" class="index_content_main_bg_table" cellpadding="0" cellspacing="2">
									<tr>
										<td width="80px" align="center" valign="top">
										<!-- START LEFT NAVIGATION -->
											<?php												
												$str = loadDbContent($mapArrayWithKeys['map3']);														
												echo evalMapArray($str, $dumpContentArray);
											?>
										<!-- END LEFT NAVIGATION -->
										</td>																
										<td valign="top">
										<!-- START CONTENT AREA -->
											<?php
											$str = loadDbContent($mapArrayWithKeys['map4']);														
											echo evalMapArray($str, $dumpContentArray);
											?>						
										<!-- END CONTENT AREA -->
										</td>
									</tr>
								</table>
								<!-- END CENTER MAIN -->
							</td>		
						</tr>
						<tr>
							<td colspan="5">
								<!-- START BOTTOM NAVIGATION -->
									<?php
									if(isset($mapArrayWithKeys['map5']))
									{
										echo loadDbContent($mapArrayWithKeys['map5']);
									}
									?>
								<!-- END BOTTOM NAVIGATION -->		
							</td>
						</tr>
						<tr>
							<td colspan="5">				
								<!-- START FOOTER TABLE -->
								<?php
									if(isset($mapArrayWithKeys['map6']))
									{
										echo loadDbContent($mapArrayWithKeys['map6']);
										//echo "<strong>" . $_SESSION['paymentMode'] . "</strong>";
									}
								?>
								<!-- END FOOTER TABLE -->
							</td>
						</tr>				
					</table>
				</td>
			</tr>			
		</table>
<?php
}
?>

<?php
function layout3($mapArrayWithKeys)
{
?>
	<table class="mainCanvass" width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<table border="0" width="793" align="center" class="background_color_main_table" cellpadding="0" cellspacing="0">
						<tr>
							<td align="center" valign="bottom" colspan="2" id="map1">
							<!-- START HEADER AREA -->
								<?php
									if(isset($mapArrayWithKeys['map1']))
									{
										echo loadDbContent($mapArrayWithKeys['map1']);
									}
								?>							
							<!-- END HEADER AREA -->		
							</td>
						</tr>
						<tr>		
							<td align="left" valign="top" colspan="3" class="topNavTd">
							<!-- START TOP NAVIGATION -->
								<?php
									if(isset($mapArrayWithKeys['map2']))
									{
										echo loadDbContent($mapArrayWithKeys['map2']);
									}
								?>
							<!-- END TOP NAVIGATION -->				
							</td>		
						</tr>
						<tr>		
							<td align="center" width="100%">
								<!-- START CENTER MAIN -->
								<table border="0" width="100%" class="index_content_main_bg_table" cellpadding="0" cellspacing="2">
									<tr>
										<td width="80px" align="center" valign="top">
										<!-- START LEFT NAVIGATION -->
											<?php
												if(isset($mapArrayWithKeys['map3']))
												{
													echo loadDbContent($mapArrayWithKeys['map3']);
												}
											?>
										<!-- END LEFT NAVIGATION -->
										</td>						
										<td valign="top">
										<!-- START CONTENT AREA -->
											<?php
											if(isset($mapArrayWithKeys['map4']))
											{
												echo loadDbContent($mapArrayWithKeys['map4']);
											}
											else
											{
												echo "xxx";
											}
											?>						
										<!-- END CONTENT AREA -->
										</td>
									</tr>
								</table>
								<!-- END CENTER MAIN -->
							</td>		
						</tr>
						<tr>
							<td colspan="5">
								<!-- START BOTTOM NAVIGATION -->
									<?php
									if(isset($mapArrayWithKeys['map5']))
									{
										echo loadDbContent($mapArrayWithKeys['map5']);
									}
									?>
								<!-- END BOTTOM NAVIGATION -->		
							</td>
						</tr>
						<tr>
							<td colspan="5">				
								<!-- START FOOTER TABLE -->
								<?php
									if(isset($mapArrayWithKeys['map6']))
									{
										echo loadDbContent($mapArrayWithKeys['map6']);									
									}
								?>
								<!-- END FOOTER TABLE -->
							</td>
						</tr>				
					</table>
				</td>
			</tr>			
		</table>
<?php
}
?>

<?php
function layout4($mapArrayWithKeys, $dumpContentArray = "")
{
?>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>
					<table border="0" width="100%" cellpadding="0" cellspacing="0">
						<tr>
							<td align="center" valign="bottom" colspan="2" id="map1">
							<!-- START HEADER AREA -->
								<?php
									if(isset($mapArrayWithKeys['map1']))
									{
										echo loadDbContent($mapArrayWithKeys['map1']);
									}
								?>							
							<!-- END HEADER AREA -->		
							</td>
						</tr>
						<tr>		
							<td align="left" valign="top" colspan="3" class="topNavTd">
							<!-- START TOP NAVIGATION -->
								<?php
									if(isset($mapArrayWithKeys['map2']))
									{
										echo loadDbContent($mapArrayWithKeys['map2']);
									}
								?>
							<!-- END TOP NAVIGATION -->				
							</td>		
						</tr>
						<tr>		
							<td align="center" width="100%" valign="top">
								<!-- START CENTER MAIN -->
								<table border="0" width="100%" class="index_content_main_bg_table" cellpadding="0" cellspacing="2">
									<tr>										
										<td valign="top">
										<!-- START CONTENT AREA -->
											<?php
											$str = loadDbContent($mapArrayWithKeys['map3']);														
											echo evalMapArray($str, $dumpContentArray);
											?>					
										<!-- END CONTENT AREA -->
										</td>
									</tr>
								</table>
								<!-- END CENTER MAIN -->
							</td>		
						</tr>
						<tr>
							<td colspan="5">
								<!-- START BOTTOM NAVIGATION -->
									<?php
									if(isset($mapArrayWithKeys['map4']))
									{
										echo loadDbContent($mapArrayWithKeys['map4']);
									}
									?>
								<!-- END BOTTOM NAVIGATION -->		
							</td>
						</tr>
						<tr>
							<td colspan="5">				
								<!-- START FOOTER TABLE -->
								<?php
									if(isset($mapArrayWithKeys['map5']))
									{
										echo loadDbContent($mapArrayWithKeys['map5']);									
									}
								?>
								<!-- END FOOTER TABLE -->
							</td>
						</tr>				
					</table>
				</td>
			</tr>			
		</table>
<?php
}
?>