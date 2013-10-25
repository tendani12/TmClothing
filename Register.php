<?php
	$userName = trim($_POST['']);
	$pass = trim($_POST['']);
	
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Untitled Document</title>
</head>
<?php
include_once("../template_header.php");

?>

<body>
<form action="Register.php" method="POST">
<table width="200" border="1">
  <tr>
    <td>Name:</td>
    <td><input name="username" type="text" /></td>
  </tr>
  <tr>
    <td>Surname:</td>
    <td><input name="surname" type="text" /></td>
  </tr>
  <tr>
    <td>Email:</td>
    <td><input name="email" type="text" /></td>
  </tr>
  <tr>
    <td>Contacts Number:</td>
    <td><input name="contact" type="text" /></td>
  </tr>
  <tr>
    <td>Postal Address:</td>
    <td><input name="postalAddress" type="text" /></td>
  </tr>
</table>
<td><input name="Submit" type="submit" value="Submit" /></td>

</form>
</body>
</html>
<?php
include_once("../template_Footer.php");

?>
