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
<body>

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

<?php     $us=$_SESSION['username'];
   $re = mysqli_query($db, "SELECT * FROM apt2 where us2 like '$us'" ); 
     while($ro = mysqli_fetch_array($re)):?> 
<div class="hello">
	<p><?php echo "hi there! Mr.".$ro['us1']." wants to make an appointment with u. title:".$ro['title']." ..dated:".$ro['dated']
	 ."   and time:".$ro['s_time']."to".$ro['e_time'] ;?></p>
	<a href="server.php?ac1=<?php echo $ro['id']; ?>&ac2=<?php echo  $ro['us1']; ?>&ac3=<?php echo  $ro['title']; ?>&ac4=<?php echo  $ro['descr']; ?>&ac5=<?php echo  $ro['dated']; ?>&ac6=<?php echo  $ro['s_time']; ?>&ac7=<?php echo  $ro['e_time']; ?>">accept</a>
	<a href="server.php?re1=<?php echo $ro['id']; ?>&re2=<?php echo  $ro['us1']; ?>&re3=<?php echo  $ro['title']; ?>&re4=<?php echo  $ro['descr']; ?>&re5=<?php echo  $ro['dated']; ?>&re6=<?php echo  $ro['s_time']; ?>&re7=<?php echo  $ro['e_time']; ?>">reject</a>

</div>
   <br>
   <?php endwhile;?>

<?php     $id= $_SESSION['id'];
   $re = mysqli_query($db, "SELECT * FROM notif where id= '$id' " ); 
     while($ro = mysqli_fetch_array($re)):?> 
     <?php if($ro['aor']==0):?>
<div class="hello">
	<p><?php echo "hi there! your request to Mr.".$ro['usn']." titled: ".$ro['title']."  has been rejected.."  ;?></p>
	<a href="server.php?nr1=<?php echo $ro['id'];?>&nr2=<?php echo  $ro['usn']; ?>&nr3=<?php echo  $ro['title']; ?>">ok</a>
</div>
   <br>
   <?php else:?>
<div class="hello">
	<p><?php echo "hi there! your request to Mr.".$ro['usn']." titled: ".$ro['title']."  has been accepted.."  ;?></p>
	<a href="server.php?na1=<?php echo $ro['id'];?>&na2=<?php echo  $ro['usn']; ?>&na3=<?php echo  $ro['title']; ?>">ok</a>
</div>
   <br>
    <?php endif; ?>
   <?php endwhile;?>

<div class="hello"><?php echo "Hello!  ".$_SESSION['username']."...Click on dates to get view of your day"; ?></div>
<br>
<br>
<a class="button" href="server.php?pr=<?php echo "pr"; ?>">PREVIOUS</a>
<a class="button button2" href="server.php?nx=<?php echo "nx"; ?>">NEXT</a>



<div style="overflow-x:auto;">
  <table class="table">
    <tr>
      <th> <a href="view.php?v1=<?php echo "wantcreate"; ?>" class="nou">MONDAY|<?php echo date("d-m-Y ", $d);?></a></th>
      <?php $d=strtotime("+1 day",$d);?>
      <th> <a href="view.php?v2=<?php echo "wantcreate"; ?>" class="nou">TUESDAY|<?php echo date("d-m-Y ", $d);?></a></th>
      <?php $d=strtotime("+1 day",$d);?>
      <th> <a href="view.php?v3=<?php echo "wantcreate"; ?>" class="nou">WEDNESDAY|<?php echo date("d-m-Y ", $d);?></a></th>
      <?php $d=strtotime("+1 day",$d);?>
      <th> <a href="view.php?v4=<?php echo "wantcreate"; ?>" class="nou">THURSDAY|<?php echo date("d-m-Y ", $d);?></a></th>
      <?php $d=strtotime("+1 day",$d);?>
      <th> <a href="view.php?v5=<?php echo "wantcreate"; ?>" class="nou">FRIDAY|<?php echo date("d-m-Y ", $d);?></a></th>
      <?php $d=strtotime("+1 day",$d);?>
      <th> <a href="view.php?v6=<?php echo "wantcreate"; ?>" class="nou">SATURDAY|<?php echo date("d-m-Y ", $d);?></a></th>
      <?php $d=strtotime("+1 day",$d);?>
      <th> <a href="view.php?v7=<?php echo "wantcreate"; ?>" class="nou">SUNDAY|<?php echo date("d-m-Y ", $d);?></a></th>
    </tr>
    <tr>
    	<td>
    <?php   $td=strtotime("-6 days",$d);
        $td=date("Y-m-d",$td);

      $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
    <?php while($ro = mysqli_fetch_array($res)):?>
    <div class="datap">
    	<h5 style="text-decoration:underline;color: green;font-size: 20px;"><?php echo $ro['title'] ;?></h5>
    	<p><?php echo $ro['descr'] ;?></p>
    	<p><?php echo $ro['dated'] ;?><p>	
        <p><?php echo $ro['s_time']." to ".$ro['e_time']; ?></p>  	
    </div>
    <?php endwhile;?>
     </td>

     <td>
    <?php   $td=strtotime("-5 days",$d);
        $td=date("Y-m-d",$td);

      $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
    <?php while($ro = mysqli_fetch_array($res)):?>
    <div class="datap">
    	<h5 style="text-decoration:underline;color: green;font-size: 20px;"><?php echo $ro['title'] ;?></h5>
    	<p><?php echo $ro['descr'] ;?></p>
    	<p><?php echo $ro['dated'] ;?><p>	
        <p><?php echo $ro['s_time']." to ".$ro['e_time']; ?></p>  	
    </div>
    <?php endwhile;?>
     </td>

     <td>
    <?php   $td=strtotime("-4 days",$d);
        $td=date("Y-m-d",$td);

      $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
    <?php while($ro = mysqli_fetch_array($res)):?>
    <div class="datap">
    	<h5 style="text-decoration:underline;color: green;font-size: 20px;"><?php echo $ro['title'] ;?></h5>
    	<p><?php echo $ro['descr'] ;?></p>
    	<p><?php echo $ro['dated'] ;?><p>	
        <p><?php echo $ro['s_time']." to ".$ro['e_time']; ?></p>  	
    </div>
    <?php endwhile;?>
     </td>

     <td>
    <?php   $td=strtotime("-3 days",$d);
        $td=date("Y-m-d",$td);

      $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
    <?php while($ro = mysqli_fetch_array($res)):?>
    <div class="datap">
    	<h5 style="text-decoration:underline;color: green;font-size: 20px;"><?php echo $ro['title'] ;?></h5>
    	<p><?php echo $ro['descr'] ;?></p>
    	<p><?php echo $ro['dated'] ;?><p>	
        <p><?php echo $ro['s_time']." to ".$ro['e_time']; ?></p>  	
    </div>
    <?php endwhile;?>
     </td>

     <td>
    <?php   $td=strtotime("-2 days",$d);
        $td=date("Y-m-d",$td);

      $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
    <?php while($ro = mysqli_fetch_array($res)):?>
    <div class="datap">
    	<h5 style="text-decoration:underline;color: green;font-size: 20px;"><?php echo $ro['title'] ;?></h5>
    	<p><?php echo $ro['descr'] ;?></p>
    	<p><?php echo $ro['dated'] ;?><p>	
        <p><?php echo $ro['s_time']." to ".$ro['e_time']; ?></p>  	
    </div>
    <?php endwhile;?>
     </td>

     <td>
    <?php   $td=strtotime("-1 days",$d);
        $td=date("Y-m-d",$td);

      $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
    <?php while($ro = mysqli_fetch_array($res)):?>
    <div class="datap">
    	<h5 style="text-decoration:underline;color: green;font-size: 20px;"><?php echo $ro['title'] ;?></h5>
    	<p><?php echo $ro['descr'] ;?></p>
    	<p><?php echo $ro['dated'] ;?><p>	
        <p><?php echo $ro['s_time']." to ".$ro['e_time']; ?></p>  	
    </div>
    <?php endwhile;?>
     </td>

     <td>
    <?php   $td=strtotime("-0 days",$d);
        $td=date("Y-m-d",$td);

      $res = mysqli_query($db, "SELECT * FROM apt where id='$idea' and dated='$td' order by s_time"); ?>
    <?php while($ro = mysqli_fetch_array($res)):?>
    <div class="datap">
    	<h5 style="text-decoration:underline;color: green;font-size: 20px;"><?php echo $ro['title'] ;?></h5>
    	<p><?php echo $ro['descr'] ;?></p>
    	<p><?php echo $ro['dated'] ;?><p>	
        <p><?php echo $ro['s_time']." to ".$ro['e_time']; ?></p>  	
    </div>
    <?php endwhile;?>
     </td>

    </tr>
    <tr>
    	<td><a class="button button2" href="server.php?c1=<?php echo "nx"; ?>">Clear</a></td>
    	<td><a class="button button2" href="server.php?c2=<?php echo "nx"; ?>">Clear</a></td>
    	<td><a class="button button2" href="server.php?c3=<?php echo "nx"; ?>">Clear</a></td>
    	<td><a class="button button2" href="server.php?c4=<?php echo "nx"; ?>">Clear</a></td>
    	<td><a class="button button2" href="server.php?c5=<?php echo "nx"; ?>">Clear</a></td>
    	<td><a class="button button2" href="server.php?c6=<?php echo "nx"; ?>">Clear</a></td>
    	<td><a class="button button2" href="server.php?c7=<?php echo "nx"; ?>">Clear</a></td>

    </tr>

  </table>
</div>




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

