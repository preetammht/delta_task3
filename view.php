<?php include('server.php'); ?>
<?php 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['id']);
  	header("location: login.php");
  }
  
  $idea=$_SESSION['id'];

  $d=$_SESSION['tempd'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
  
  <style type="text/css">
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
}

.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */
  </style>

</head>
<body style="background-color: grey;">

<div class="navbar">
  <a href="server.php?hom=<?php echo "hom"; ?>">Home</a>
  <a href="index.php?logout='1'" >Logout</a>
  <div class="dropdown">
    <button class="dropbtn" onclick="myFunction1()">Create
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" id="myDropdown1">
      <a href="create.php?pa=<?php echo "wantcreate"; ?>"> Personal appointment </a> 
      <a href="create.php?ao=<?php echo "wantcreate"; ?>" >Appointment with other user</a>
    </div>
  </div> 
</div>
<br>
  
<?php if(isset($_GET['v1'])):
    $td=strtotime("+0 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
  $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
             <h1 style="color: pink,text-align:center;">    <?php echo date("d-m-Y ", $d);?> </h1>
  <?php   while($ro = mysqli_fetch_array($res)):?>
           <div style="border-bottom: 6px solid red;">
           <h1 style="color: blue,text-align:center;"> <?php echo $ro['descr'];?> </h1>
           <p style="font-size: 30px,text-align:center;"><?php echo $ro['s_time']."to".$ro['e_time'] ?>;</p>
           </div>
    <br> 
    <?php endwhile;?>
    <?php endif;?> 

<?php if(isset($_GET['v2'])):
    $td=strtotime("+1 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
  $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
             <h1 style="color: pink,text-align:center;">    <?php echo date("d-m-Y ", $d);?> </h1>
  <?php   while($ro = mysqli_fetch_array($res)):?>
           <div style="border-bottom: 6px solid red;">
           <h1 style="color: blue,text-align:center;"> <?php echo $ro['descr'];?> </h1>
           <p style="font-size: 30px,text-align:center;"><?php echo $ro['s_time']."to".$ro['e_time'] ?>;</p>
           </div>
    <br> 
    <?php endwhile;?>
    <?php endif;?>

<?php if(isset($_GET['v3'])):
    $td=strtotime("+2 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
  $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
             <h1 style="color: pink,text-align:center;">    <?php echo date("d-m-Y ", $d);?> </h1>
  <?php   while($ro = mysqli_fetch_array($res)):?>
           <div style="border-bottom: 6px solid red;">
           <h1 style="color: blue,text-align:center;"> <?php echo $ro['descr'];?> </h1>
           <p style="font-size: 30px,text-align:center;"><?php echo $ro['s_time']."to".$ro['e_time'] ?>;</p>
           </div>
    <br> 
    <?php endwhile;?>
    <?php endif;?>                     

<?php if(isset($_GET['v4'])):
    $td=strtotime("+3 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
  $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
             <h1 style="color: pink,text-align:center;">    <?php echo date("d-m-Y ", $d);?> </h1>
  <?php   while($ro = mysqli_fetch_array($res)):?>
           <div style="border-bottom: 6px solid red;">
           <h1 style="color: blue,text-align:center;"> <?php echo $ro['descr'];?> </h1>
           <p style="font-size: 30px,text-align:center;"><?php echo $ro['s_time']."to".$ro['e_time'] ?>;</p>
           </div>
    <br> 
    <?php endwhile;?>
    <?php endif;?>

<?php if(isset($_GET['v5'])):
    $td=strtotime("+4 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
  $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
             <h1 style="color: pink,text-align:center;">    <?php echo date("d-m-Y ", $d);?> </h1>
  <?php   while($ro = mysqli_fetch_array($res)):?>
           <div style="border-bottom: 6px solid red;">
           <h1 style="color: blue,text-align:center;"> <?php echo $ro['descr'];?> </h1>
           <p style="font-size: 30px,text-align:center;"><?php echo $ro['s_time']."to".$ro['e_time'] ?>;</p>
           </div>
    <br> 
    <?php endwhile;?>
    <?php endif;?>
 <?php if(isset($_GET['v6'])):
    $td=strtotime("+5 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
  $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
             <h1 style="color: pink,text-align:center;">    <?php echo date("d-m-Y ", $d);?> </h1>
  <?php   while($ro = mysqli_fetch_array($res)):?>
           <div style="border-bottom: 6px solid red;">
           <h1 style="color: blue,text-align:center;"> <?php echo $ro['descr'];?> </h1>
           <p style="font-size: 30px,text-align:center;"><?php echo $ro['s_time']."to".$ro['e_time'] ?>;</p>
           </div>
    <br> 
    <?php endwhile;?>
    <?php endif;?>
    

<?php if(isset($_GET['v7'])):
    $td=strtotime("+6 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
  $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
             <h1 style="color: pink,text-align:center;">    <?php echo date("d-m-Y ", $d);?> </h1>
  <?php   while($ro = mysqli_fetch_array($res)):?>
           <div style="border-bottom: 6px solid red;">
           <h1 style="color: blue,text-align:center;"> <?php echo $ro['descr'];?> </h1>
           <p style="font-size: 30px,text-align:center;"><?php echo $ro['s_time']."to".$ro['e_time'] ?>;</p>
           </div>
    <br> 
    <?php endwhile;?>
    <?php endif;?>       
</body>
<script>


function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show");
   var myDropdown = document.getElementById("myDropdown2");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
}}
function myFunction2() {
    document.getElementById("myDropdown2").classList.toggle("show");
    var myDropdown = document.getElementById("myDropdown1");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
}}

window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
    var myDropdown = document.getElementById("myDropdown1");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
      myDropdown = document.getElementById("myDropdown2");
      if (myDropdown.classList.contains('show')) {
        myDropdown.classList.remove('show');
      }
  }
}
</script>
</html>

