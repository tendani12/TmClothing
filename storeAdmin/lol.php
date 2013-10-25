 <?php
session_start();
if(isset($_SESSION["manager"]))
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
include_once("../template_header.php");

?>

<div  id="pageContent"><br/>

<div align="left" style="margin-left:24px;">
<h2>Please Log in To Manage the store</h2>
<form id = "form1" name="form1" method="post" action="lol.php">
User Name:<br/>
<input name="username" type ="text" id ="username" size"40"/>
<br/><br/>
Password:<br/>
<input name="password" type="password" id="password" size="40">
<br/>
<br/>
<br/>
<input type="submit" name "button" id="button" value = "Log in"/>
</form>
</div>


<?php
include_once("../template_Footer.php");

?>

&copy;reserved</div>
</body>
</html>