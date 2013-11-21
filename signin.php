<form action="signin.php" method="post">
Email :
<input type="email" name="email">
Password:
<input type="password" name="password">
<input type="submit" name="signin" value="SignIn"/>
</form>
<?php
ob_start();
include("autoload.php");
$register = new Session();
if(isset($_POST["signin"])){
$email=$_REQUEST["email"];
$password=$_REQUEST["password"];
$objMain=new MainDAO();
$returnString="";
$userId=$objMain->loginUser($email,$password);
	if($userId!=-1){
		$returnString="[{status:true,msg:'Authentic User'}]";
		//$register["userId"]=$userId;
		header( 'Location: dashboard.php' ) ;
	}
	else{
		$returnString="[{status:false,msg:'No data'}]";
	}
}
echo $returnString;
?>




