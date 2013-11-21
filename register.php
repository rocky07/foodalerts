<form action="register.php" method="post">
Full Name:
<input type="text" name="name">
Email :
<input type="email" name="email">
Password:
<input type="password" name="password">
Confirm Password:
<input type="password" name="confirmPassword">
<input type="submit" name="signup" value="SignUp"/>
</form>
<?php
ob_start();
include("autoload.php");
$register = new Session();
if(isset($_POST["signup"])){
$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
$objMain=new MainDAO();
$returnString="";
if($objMain->registerUser($name,$email,$password)){
	$returnString="[{status:true,msg:'User Saved Successfully'}]";
}
else{
	$returnString="[{status:false,msg:'Unable to Save User'}]";
}
}
echo $returnString;
?>


