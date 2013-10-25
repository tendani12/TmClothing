<?php
session_start();
if(!isset($_SESSION["manager"]))
{
	header("location: index.php");
	exit();
	}
	if(isset($_POST["username"]) && isset($_POST["password"]))
	{
		$manager = trim($_POST["username"]);
		$password = trim($_POST["password"]);
		include "../scripts/connect_to_mysql.php";
	$sql = mysql_query("SELECT * FROM admin WHERE  username = '$manager' AND password = '$password'");
	$existCount = mysql_num_rows($sql);
	
	if($existCount==1)
	{
		while($row = mysql_fetch_array($sql))
		{
			$id = $row["id"];
			}
			
			$_SESSION["id"] =$id;
			$_SESSION["manager"] = $manager;
			$_SESSION["password"] =$password;
			
			header("location:index.php");
			exit();
			
	}else
	{
		
			echo 'information is incorrect,try again <a href="index.php">Click Here</a>';
			
		}
		
		}
?>
<?php

//delete
if(isset($_GET['deleteid']))
{
echo 'Do you really want to delete product with ID of '.$_GET['deleteid']. '? <a href="inventory_list.php?yesdelete='.$_GET['deleteid'].'">Yes</a>|<a href ="inventory_list.php">No</a>';
exit();
}
//if(isset($_GET['yestadae'])
if(isset($_GET['yesdelete']))
{
	$id_to_delete = $_GET['yesdelete'];
	include "../scripts/connect_to_mysql.php";
	$sql = mysql_query("DELETE FROM products WHERE id='$id_to_delete'LIMIT 1") or die(mysql_error());
	
	$pictodelete = ("../inventory_images/$id_to_delete.jpg");
	if(file_exists($pictodelete)){
		unlink($pictodelete);
	
	}
	header("location: inventory_list.php");
	exit();
}
	
?>

<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
	if(isset($_POST['product_name']))
	{
		$product_name = trim($_POST['product_name']);
		$price = trim($_POST['price']);
		$category = trim($_POST['category']);
		$subcategory = trim($_POST['subcategory']);
		$details = trim($_POST['details']);
		include "../scripts/connect_to_mysql.php";
		$sql = mysql_query("SELECT id FROM products WHERE product_name = '$product_name' LIMIT 1");
		$productMatch = mysql_num_rows($sql);
		if($productMatch >0)
		{
			echo "sorry you tried to place a duplicate";
			exit();
			}
		
		}
		$sql = mysql_query("INSERT INTO products(product_name,price,details,category,subcategory,date_added)
		VALUES('$product_name','$price','$details','$category','$subcategory',now())") or die(mysql_error());
		$pid = mysql_insert_id();
		$newname = "$pid.jpg";
		move_uploaded_file($_FILES['fileField']['tmp_name'],"../inventory_images/$newname");
		header("location: inventory_list.php");
		exit();
		
		
		
}
		
?>


<?php
//this block grabs the whole list for viewing
	$product_list = "";
	include "../scripts/connect_to_mysql.php";
	$sql = mysql_query("SELECT * FROM products");
	$productsCount = mysql_num_rows($sql);
	if($productsCount>0)
	{
			$products = array();
			while($row = mysql_fetch_array($sql))
			{
				$id = $row["id"];
				$product_name =$row["product_name"];
				$date_added = strftime("%b %d,%Y",strtotime($row["date_added"]));
				
				$product_list="$date_added-$id-$product_name&nbsp;&nbsp;&nbsp;<a href = 'inventory_edit.php?pid=$id'>edit</a> &bull;<a href = 'inventory_list.php?deleteid=$id'>delete</a><br/>";
				 array_push($products, $product_list);
				
				}
		
		}else
		{
			$product_list = "you have no products";
			}
			


?>

<?php
include_once("../template_header.php");

?>
          


<div ><a href="inventory_list.php#inventoryForm">+add new store item</a></div>

<div align="left" style="margin-left:24px;">
<h2>INVENTORY LIST</h2>
<p>DD</p>
<p>&nbsp;</p>




</div>
<a name = "inventoryForm" id="inventoryForm"></a>
<h3 align="center">
Add New Inventory item Form
</h3>

<?php 
	for($x=0;$x<count($products);$x++)
	{
		echo $products[$x];
		
		}
?>
</body>
</html>
<form action "inventory_list.php" enctype = "multipart/form-data" name = "myForm" id = "myform" method = "post">
<table width="90%" border="0" cellspacing="0" cellpadding="6">
  <tr>
    <td width = "20%">Product Name</td>
    <td width="80%"><label>
    <input name = "product_name" type="text" id="product_name" size ="64"/>
    </label>
    </td>
  </tr>
  <tr>
    <td align="right">Product Price</td>
    <td><label>
    $
    <input name="price" type="text" id = "price" size = "12"/>
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
    <option value="Hats">Hats</option>
    <option value="Pants">Pants</option>
    <option value="Shirts">Shirts</option>
    </select>
    </td>
  </tr>
  <tr>
    <td>Product Details</td>
    <td><label>
    <textarea name="details" cols="64" rows="5"></textarea>
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
    <input type="submit" name="button" id="button" value="Add This item Now">
    </label>
    </td>
  </tr>
</table>



</form>
<br/>
<br/>
<br/>


<?php
include_once("../template_Footer.php");

?>