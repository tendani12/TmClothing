<?php
//this block grabs the whole list for viewing

	include "scripts/connect_to_mysql.php";
	$dynamicList = "";
	$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 6" );
	$productsCount = mysql_num_rows($sql);
	
	if($productsCount>0)
	{
			$products = array();
			while($row = mysql_fetch_array($sql))
			{
				$id = $row["id"];
				$product_name =$row["product_name"];
				$price = $row["price"];
				$date_added = strftime("%b %d,%Y",strtotime($row["date_added"]));
				
				$dynamicList='<table width="211" height="158" border="0" cellspacing="0" cellpadding="6">
        <tr>
          <td width="17%" valign="top"><a href="product.php?id=' . $id .'"><img style="border:#666 1px solid" src="../project1/inventory_images/' . $id .'.jpg" alt="' . $product_name . '"  width="77" height="102" border="1" /></a>
            </td>
          <td width="83%" valign="top">' . $product_name . '
            <br/>$' . $price . '<br/>
            <a href="products.php?id='. $id .'">View Product Details</a></td>
        </tr>
      
    
   
</table> ';
				 array_push($products, $dynamicList);
				
				}
		
		}else
		{
			$dynamicList = "we have  no products";
			}
			
			


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
CREDITS :REALITY SOFTWARE
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
        <div id="logo">TM CLOTHING</div>
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
    <li><a href="admin_login.php">Log in</a></li>
    <li></li>
  </ul>
  </div>
          <div id="text">
            <h1>Welcome</h1>
 		<div align="center" id = "mainWrapper">
        <?php
		
		 include_once("template_header.php"); 
		?>
        <div  id = "pageContent">
        
        <table width="571" height="187" border="1">
  <tr valign="top">
    <td width="89">&nbsp;</td>
    <td width="304" valign="top"><p>newest items added to the store</p>
      <p><?php 
	  
	 
	
		for($x=0;$x<count($products);$x++)
	{
		echo $products[$x];
		
		}
		
		
	  ?> </p>
      <p><br />
      </p>
      <table width="286" height="209" border="1">
        <tr>
          <td width="125" height="154"><p><a href="product.php?"><img style="border:#666 1px solid" src="inventory_images/$id.jpg" width="123" height="108" border="1" /></a></p>
            <p>&nbsp;</p></td>
          <td width="89" valign="top"><p>Product Tiltle</p>
            <p>Product Price</p>
            <p><a href="product.php">View Product</a></p></td>
        </tr>
      </table>
      <p>&nbsp; </p>
      <p>&nbsp;</p></td>
    <td width="156">&nbsp;</td>
  </tr>
</table>

        </div>
        <?php
		
		 include_once("template_footer.php"); 
		?>
        </div>
                    
            <p>&nbsp;</p>
<p>&nbsp;</p>
           </div>
    </div>
    <!-- end main -->
    <!-- footer -->
    <div id="footer">
            <div id="menu_footer"><a href="#">home</a> | <a href="#">about</a> | <a href="#">products</a> | <a href="#">services</a> | <a href="#">pricing</a> | <a href="#">contact</a> | <a href="#">sitemap</a> | <a href="#">testimonials</a> | <a href="#">etc.</a></div>
            <div id="left_footer">&copy; Copyright 2008 <b>Your Website</b></div>
            <div id="right_footer">

<!-- Please do not change or delete this links. Read the license! Thanks. :-) -->
Design by <a href="http://www.realitysoftware.ca" title="Web Design"><strong>Reality Software</strong></a> &amp; <a href="http://www.flashmp3player.org" title="Free Flash MP3 Player"><strong>Flash Music Player</strong></a>

   		</div>
	</div>
    <!-- end footer -->
</div>

</body>

</html>
