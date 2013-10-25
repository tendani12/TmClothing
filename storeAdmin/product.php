 

<?php

	
	include "../scripts/connect_to_mysql.php";
	
		if(isset($_GET['id']))
		{
		
			$id = preg_replace('#[^0-9]#i',' ',$_GET['id']);
		
				//echo "no product in the system with that ID.";
				
				$sql = mysql_query("SELECT * FROM products WHERE id = '$id' LIMIT 1 ");
				$productCount = mysql_num_rows($sql);
				if($productCount > 0)
				{
					while($row = mysql_fetch_array($sql))
					{
				
						$id = $row["id"];
						$product_name = $row["product_name"];
						$price = $row["price"];
						$details = $row["details"];
						$category = $row["category"];
						$subcategory = $row["subcategory"];
						$date_added = strftime("%b %d, %y", strtotime($row["date_added"]));
					}
				}
				else
				{
					echo "That item does not exist";
					exit;
				}
				
	
				echo "Data to render this page is missing";
				exit;
		}
	
?>

 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style.css" rel="stylesheet" type="text/css" />
<title><?php echo $product_name;?></title>

</head>

<body>





   <table width="100%" border=01" cellspacing ="0" cellpadding = "15">
  <tr>
    <td td width="20%" valign ="top" ><img style="border:#666 1px solid" src="inventory_images/<?php echo $id;?>;.jpg" width="142" height="188 alt = "$product_name"/>"<br/>
     <a href=""project1/inventory_images/<?php echo $id;?>.jpg"">view Full size image</a></td>
    <td width="80%" valign="top"><h3> <?php echo $product_name;?> </h3>
    <p><?php echo $price; ?><br/>
    <br/>
    <?php echo "$subcategory $catergory"; ?> <br/>
    <br/>
    <?php echo $details;?>
    <br/>
    </p>
    <p>ADD TO CART<br/>
    </p></td>
    </tr>
 
</table>












</body>
</html>

      

  <br/>

<br/>
<br/>
<br/>

</div>
</div>

<?php
include_once("template_Footer.php");

?>
