


<?php
if($_SERVER['REQUEST_METHOD']=="POST")
{
	
	
		$name = trim($_POST['username']);
		$surname = trim($_POST['surname']);
		$mail = trim($_POST['email']);
		$contact = trim($_POST['contact']);
		$post = trim($_POST['postalAddress']);
		
		include "../scripts/connect_to_mysql.php";
		$sql = mysql_query("INSERT INTO user(Name,Surname,E_mail,Contact,Address)
		VALUES('$name','$surname','$mail','$contact','$post')") or die(mysql_error());
		
		
	
		
		
		
}
		
?>




<?php
include_once("template_header.php");

?>
          




<div align="left" style="margin-left:24px;">
<h2>USER REGISTRATION FORM</h2>
<form action="regis.php" method="POST">
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
  
  <td> <label>
    <input type="submit" name="button" id="button" value="Add This item Now">
    </label>
    </td>
</table>


</form>





</div>



</body>
</html>

<br/>
<br/>
<br/>


<?php
include_once("template_Footer.php");

?>