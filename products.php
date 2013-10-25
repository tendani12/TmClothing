<?php
//require 'cart.php';

$subcategory="";
$category="";
$product_name ="";
$price = "";
$details = "";

if(isset($_GET['id']))
{
		include "scripts/connect_to_mysql.php";
	$id = $_GET['id'];
	
	$sql = mysql_query("SELECT * FROM products WHERE id = '".$id."' LIMIT 1" );
	$productsCount = mysql_num_rows($sql);
	
	if($productsCount>0)
	{
		//get all
		$products = array();
		while($row = mysql_fetch_array($sql))
			{
				
				$product_name =$row["product_name"];
				$price = $row["price"];
				$details = $row["details"];
				$category = $row["category"];
				$subcategory = $row["subcategory"];
				$date_added = strftime("%b %d,%Y",strtotime($row["date_added"]));
				
			}
		
		
		
		}
		else
		{
			
			echo "that item doesnt exists";
			exit;
			}
	}else
	{
		
		echo "no products";
		exit;
		}
		
		
function product()
{
	mysql_connect('localhost','root','') or die(mysql_error());
	mysql_select_db('e_book_db') or die(mysql_error());
	
	$query = mysql_query("SELECT * FROM products ");
		
		if(mysql_num_rows($query)==0)
		{
			echo 'No product to dispay';
		}
		else
		{
			while($row = mysql_fetch_assoc($query))
			{
				$id = $row['id'];
				echo $id;
				echo '<a href="products.php?id='.$id.'" >add</a></p><br/>';
			}	
			
		}
	
} 

if($_POST['pid'])
{
	$_SESSION['cart_'.$_GET['pid']]+=1;
	header("Location: cart.php");	
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
Created by: Reality Software | www.realitysoftware.ca
Released by: Flash MP3 Player | www.flashmp3player.org
Note: This is a free template released under the Creative Commons Attribution 3.0 license, 
which means you can use it in any way you want provided you keep links to authors intact.
-->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>



<div id="container">
    	<!-- header -->
        <div id="logo"><a href="#">TM CloTHING</a></div>
        <div id="menu">
            <a href="#">home</a>
            <a href="#">about us</a>
            <a href="#">services</a>
            <a href="#">pricing</a>
            <a href="#">contacts</a>
        </div>
        <!--end header -->     
        <!-- main -->
        <div id="main">
          <div id="sidebar">
          	<h2>Lorem Ipsum</h2>
            <ul>
              <li><a href="storeAdmin/lol.php">Log in</a></li>
              <li><a href="#">sidebar link 2</a></li>
              <li><a href="#">sidebar link 3</a></li>
              <li><a href="#">sidebar link 4</a></li>
              <li><a href="#">sidebar link 5</a></li>
            </ul>
          </div>
          <div id="text">
            <h1>Welcome</h1>
 
            <div id = "pageContent">
            <table width="100%" border="0" cellspacing="0" cellpadding="15">
            <tr>
            <td width="20%" valign="top"><img src="inventory_images/<?php echo $id; ?>.jpg" width="142" height="188" alt=""/><br/>
             <a href="project1/inventory_images/<?php  echo $id;?>.jpg" >View Full Size Image</a></td>
            <td width ="80%" valign="top"><h3>xs</h3>
              <p><?php echo $product_name;?></p>
            <p><?php echo $price; ?><br/>
            <br/>
            <?php 
			
/*echo Add_cart();
echo products();*/

?>
            <?php  echo $subcategory." ".$category; ?><br/>
            <br/>
            <?php echo $details;?>
            <br/>
            </p>
            <form id = "form1" name="form1" method="post" action="products.php">
            <input type ="hidden" name="pid" id ="pid" value="<?php echo $id;?>" />
            <input type="submit" name="button" id="button" value="Add to shopping cart" />
            </form>
            </td>
            </tr>
            </table>
</div>
    </div>
    <!-- end main -->
    <!-- footer -->
    <div id="footer">
            <div id="menu_footer"><a href="#">home</a> | <a href="#">about</a> | <a href="#">products</a> | <a href="#">services</a> | <a href="#">pricing</a> | <a href="#">contact</a> | <a href="#">sitemap</a> | <a href="#">testimonials</a> | <a href="#">etc.</a></div>
            <div id="left_footer">&copy; Copyright 2013 <b>Your Website</b></div>
            <div id="right_footer">

<!-- Please do not change or delete this links. Read the license! Thanks. :-) -->
Design by <a href="http://www.realitysoftware.ca" title="Web Design"><strong>Reality Software</strong></a> &amp; <a href="http://www.flashmp3player.org" title="Free Flash MP3 Player"><strong>Flash Music Player</strong></a>

   		</div>
	</div>
    <!-- end footer -->
</div>


</body>

</html>
