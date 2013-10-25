<?php
 session_start();
 
if(isset($_GET['pid']))
{
	mysql_connect('localhost','root','itn30at') or die(mysql_error());
	mysql_select_db('storedb') or die(mysql_error());
	
	
	if(isset($_GET['pid']))
	{
		$data = mysql_query("SELECT id,quantity FROM products WHERE  id ='".mysql_real_escape_string((int)$_GET['pid'])."' ");
		while($q_row = mysql_fetch_assoc($data))
		{
			if($q_row['quantity'] != $_SESSION['cart_'.(int)$_GET['pid']])
			{
				$_SESSION['cart_'.(int)$_GET['pid']]+='1';
			}
		}
		header('Location: product_list.php');
	}
		

	/*if(!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"])< 1){
		$_SESSION["cart_array"]=array(1=>array("item_id"=>$pid,"quantity" =>1));
		
	}
	else
	
	foreach($_SESSION["cart_array"]as $each_item){
		
		$i++;
		while(list($key,$value)= each($each_item)){
		if($key == "item_id" && $value == $pid)
		{
		array_splice($_SESSION["cart_array"],$i-1,1,array(array("item_id"=>$pid,"quantity"=>$each_item['quantity']+1)));
		
		}
		}
	}
		if($wasfound = false){
		array_push($_SESSION["cart_array"],array("item_id" =>$pid,"quantity" =>1));
		echo 'added';
		}*/
		}
		
function products()
	{
		mysql_connect('localhost','root','itn30at') or die(mysql_error());
		mysql_select_db('storedb') or die(mysql_error());
	
		$query = mysql_query("SELECT * FROM products ");
		
		if(mysql_num_rows($query)==0)
		{
			echo 'No product to dispay';
		}
		else
		{
			echo "<table  border='0'>";
			echo "<tr>";
			echo "<th scope='row' bgcolor='#CC3300'>"."<br />Image: ";
			echo "<th scope='row' bgcolor='#CC3300'>"."<br />Name: ";
			echo "<th scope='row' bgcolor='#CC3300'>"."<br />Detail: ";
			echo "<th scope='row' bgcolor='#CC3300'>"." <br />Price: ";
			echo "<th scope='row' bgcolor='#CC3300'>"." <br />Category";
			echo "<th scope='row' bgcolor='#CC3300'>"." <br />SubCategory";
			echo "<th scope='row' bgcolor='#CC3300'>"." <br />add";
			echo "</tr>";
			while($row = mysql_fetch_assoc($query))
			{
				$id=$row['id'];
				echo "<tr>";
				echo "<td>".'<img src="inventory_images/'.$id.'.jpg" width="50" height="50" alt=""/>';
				echo "<td>". '<p>'.$row['product_name'];
				echo "<td>".$row['details'];
				echo "<td>".'R'.$row['price'];
				echo "<td>".$row['category'];
				echo "<td>".$row['subcategory'];
				echo "<td>".$row['quantity'];
				echo "<td>".'<a href="cart.php?pid='.$row['id'].'">add cart</a></p>'.'</td>';
			}	echo "</tr>";
			echo "</table>";
			
		}
	}
	
	function add_products()
	{
		@ $db = new mysqli('localhost','root','itn30at','storedb');
		$query = "insert into products values
				(NULL,'".$_SESSION['product_name']."', '".$_SESSION['product_name']."','".$_SESSION['price']."','".$_SESSION['details']."','".$_SESSION['category']."', '".$_SESSION['subcategory']."','".$_SESSION['date_added']."',,'".$_SESSION['quantity']."')";
														
													$result = $db->query($query);
			
	}
	
	function Add_cart()
	{
		mysql_connect('localhost','root','itn30at') or die(mysql_error());
		mysql_select_db('storedb') or die(mysql_error());
		
		$total = 0;
 $tot = 0;
		foreach($_SESSION as $name => $value)
		{
			 if($value>0)
			 {
				if(substr($name, 0, 5)=='cart_')
				{
					$db_id= substr($name, 5, (strlen($name)-5));
					$data = mysql_query("SELECT * FROM products WHERE  id =".mysql_real_escape_string((int)$db_id));
					
					echo "<table  border='0'>";
					echo "<tr>";
					echo "<th scope='row' bgcolor='#CC3300'>"."<br />Name: ";
					echo "<th scope='row' bgcolor='#CC3300'>"."<br />Detail: ";
					echo "<th scope='row' bgcolor='#CC3300'>"." <br />Price: ";
					echo "<th scope='row' bgcolor='#CC3300'>"." <br />Category";
					echo "<th scope='row' bgcolor='#CC3300'>"." <br />SubCategory";
					echo "<th scope='row' bgcolor='#CC3300'>"." <br />Total";
					echo "<th scope ='row' bgcolor='#cc3300'>"."<br />Quantity";
					echo "<th scope='row' bgcolor='#CC3300'>"." <br />add";
					echo "</tr>";
					while($row=mysql_fetch_assoc($data))
					{
						$tot = $row['price']*$value;
						$total+=$tot;
						echo "<tr>";
						echo "<td>". $row['product_name'];
						echo "<td>". $row['details'];
						echo "<td>".' R'.$row['price'];
						echo "<td>". $row['category'];
						echo "<td>". $row['subcategory'];
						echo "<td>".'R'.$total ;
						echo "<td>".$value;
						echo "<td>".' <a href="cart.php?pid='.$db_id.'">[add]</a>';
					}
					echo "</tr>";
					echo "</table>";
				} 
				$total+=$tot;
			 }
			
		}
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
            <a href="indexza.php">services</a>
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
            <td width="20%" valign="top"><br/></td>
            <td width ="80%" valign="top"><?php echo Add_cart(); ?></td>
            </tr>
            </table>
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
