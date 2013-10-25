<html>
<head>
<title>
<link href="style.css" rel="stylesheet" type="text/css" />
</title>
</head>
</html>

<?php

session_start();
if(!isset($_SESSION["manager"]))
{
	header("location: lol.php");
	exit();
	}

?>
 
<?php
include_once("../template_header.php");
/*include "../scripts/connect_to_mysql.php";
$danamicList = "";
$sql = mysql_query("SELECT * FROM products ORDER_BY date_added DESC LIMIT 6");
$productCount = mysql_num_rows($sql);
if($productCount > 0)
{
	while($row = mysql_fetch_array($sql))
	{
		$id = $row["pid"];
		$product_name = $row["product_name"];
		$price = $row["price"];
		$date_added = strftime("%b %d, %y", strtotime($row["date_added"]));
		$danamicList.="Product ID: $id - <strong> $product_name</strong> - $$price - <em> Added $date_added</em> $nbsp; $nbsp 
		href ='invetory_edit.php?pid=$id'edit</a> $bull; <a href='inventory_list.php?delteid=$id'>delete<a/><br />";
		 
	}
}
else{
		$danamicList = "We have no products listed in our strore yet";
	}*/
?>
            <p> Hello store manager what woulld you like to do today<a href="inventory_list.php">? </a></p>
            <p><a href="inventory_list.php">manage inventory</a></p>
            <div  id="pageContent">
  <br/>
  
<br/>
<br/>
<br/>

</div>

</div>

<?php
include_once("../template_Footer.php");

?>
