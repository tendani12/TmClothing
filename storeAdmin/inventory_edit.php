<html>
<head>
<title>
<link href="style.css" rel="stylesheet" type="text/css" />
</title>
</head>
</html>



<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors','1');
?>

<?php
//if(isset($_GET['yestadae'])



if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	if(!isset($_GET['pid']))
	{
		
	
		
		include "../scripts/connect_to_mysql.php";
		
		$sql = mysql_query("SELECT * FROM products WHERE id='$targetID' LIMIT 1");
		$prouctCount = mysql_num_rows($sql);
		if($prouctCount > 0)
		{
			while($row = mysql_fetch_array($sql))
			$product_name = trim($_POST['product_name']);
			$pruduct_name = $row["$pruduct_name"];
			$id =$row["id"];
			$price = $row["price"];
			$category = $row["category"];
			$subcategory = $row["subcategory"];
			$details = $row["details"];
			$date_added = strftime("%b %d, %y",strftime($row["date_added"]));
			
		}else {
				echo "Sorry dude that crap don't exists.";
				exit();
			 }
	}
}
	
?>

<?php


	if(isset($_POST['product_name']))
	{
		$pid = trim($_POST['thisID']);
		$product_name = trim($_POST['product_name']);
		$price = trim($_POST['price']);
		$category = trim($_POST['category']);
		$subcategory = trim($_POST['subcategory']);
		$details = trim($_POST['details']);
		include "../scripts/connect_to_mysql.php";
		$sql = mysql_query("UPDATE  products SET product_name = '$product_name', price ='$price',details ='$details',price ='$price',catergory ='$category', subcategory         ='$subcategory', WHERE id = '$pid'");
	
		if($_FILES['fileField']['tmp_name']!= "")
		{
			$newname = "$pid.jpg";
			move_uploaded_file($_FILES['fileField']['tmp_name'],"../inventory_images/$newname");
		}
		header("location: inventory_list.php");
		exit();
		
	}
		
		

		
?>


<?php
include_once("../template_header.php");

?>
          



	


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form action "inventory_edit.php" enctype = "multipart/form-data" name = "myForm" id = "myform" method = "POST">

<table width="90%" border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width = "20%">Product Name</td>
    <td width="80%"><label>
    <input name = "product_name" type="text" id="product_name" size ="64" value="<?php
	
	 echo $product_name;?>"/>
    </label>
    </td>
  </tr>
  <tr>
    <td align="right">Product Price</td>
    <td><label>
    
    <input name="price" type="text" id = "price" size = "12" value="<?php echo $price;?>"/>
    </label>
    </td>
  </tr>
  <tr>
    <td align="right">Category</td>
    <td><label>
    <select name="category"  id = "category" >
    <option value=""></option>
    <option value="Clothing">Clothing</option>
    <option value="Electronics">Electronics</option>
    </select>
    </label>
    </td>
  </tr>
  <tr>
    <td align="right">Subcategory</td>
    <td><select name="subcategory"  id="subcategory">
    <option value=""></option>
    <option value="<?php echo $subcategory;?>"><?php echo 	$subcategory;?></option>
    <option value="Hats">Hats</option>
    <option value="Pants">Pants</option>
    <option value="Shirts">Shirts</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Product Details</td>
    <td><label>
    <textarea name="details" cols="64" rows="5"><?php echo $details;?></textarea>
    </label>
    </td>
  </tr>
  <tr>
    <td>Product image</td> 
    <td><label>
    <input type="file" name="fileField" id ="fileField"/>
    </label>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td> <label>
    <input name="thisID" type="hidden"value="<?php echo $targetID;?>"/>
    <input type="submit" name="button" id="button" value="Make Changes"/>
    </label>
    </td>
  </tr>
</table>



</form>
<br/>
<br/>

	 <?php
	include_once("../template_Footer.php"); 
	?>








</body>
</html>








