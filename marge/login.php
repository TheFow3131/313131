<?php
session_start();
ob_start();
include('pass.php');
error_reporting(0);
if(isset($_SESSION["login"])){
header('Location:index.php');
}else{
?>
<title>Login</title>
<meta charset="utf-8">
<link rel="icon" type="image/png" href="../files/linux.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<center>
    
<form action="" method="POST">
<input name="password" class="pass" type="password" placeholder="Password" /> <input class="btn" type="submit" value="Login" /><br>
<span class="tooltip">
  <span class="tooltiptext">Taşşaklıları seven sakin biri..</span>
</span>
</center>
</form>
<style>
body{
	background:#FFF;
	color:#444;
}
.pass{
    padding:5;
	height:30px;
	color:#333;
	outline: none;
	border:1px solid #999;
}
.pass:focus,.pass:hover{
    padding:5;
	height:30px;
	color:#333;
	border:1px solid #06c4d1;
    box-shadow: 0px 0px 2px #96a4e1;
}
.btn{
	height:30px;
	color:#444;
	outline:none;
	border:1px solid #999;
}
.btn:hover{
	height:30px;
	outline:none;
	border:1px solid #06c4d1; 
    box-shadow: 0px 0px 2px #96a4e1;
}
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  top: 150%;
  left: 50%;
  margin-left: -60px;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  bottom: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: transparent transparent black transparent;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
<?php } 
if(($_POST["password"]==$pass)){
$_SESSION["login"] = "true";
$_SESSION["pass"] = $pass;
header("Location:index.php");
}
?>