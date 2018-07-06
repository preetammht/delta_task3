<?php
session_start();

$username = "";
$email    = "";
$errors = array(); 
$er= array();


$db = mysqli_connect('localhost', 'root', '', 'appointments');

if (isset($_POST['reg_user'])) {

  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { 
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  
  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);


  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	$_SESSION['er'] = "";

     if(date("l")=="Monday")
         $_SESSION['today']=strtotime("today");
     else
          $_SESSION['today']=strtotime("previous monday");
      
            $_SESSION['tempd'] = $_SESSION['today'] ;

    $r = mysqli_query($db, "SELECT * FROM users where username like '$username' ") ; 
      while ($ss = mysqli_fetch_array($r)){
           $_SESSION['id']=$ss['id'];
      }

  	header('location: index.php');
      }
  }


if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      $_SESSION['er'] = "";
       if(date("l")=="Monday")
         $_SESSION['today']=strtotime("today");
     else
          $_SESSION['today']=strtotime("previous monday");
      
            $_SESSION['tempd'] = $_SESSION['today'] ;

      $r = mysqli_query($db, "SELECT * FROM users where username like '$username' ") ; 
      while ($ss = mysqli_fetch_array($r)){
           $_SESSION['id']=$ss['id'];}

      header('location: index.php');
    }else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}

if(isset($_GET['hom']))
{$_SESSION['tempd'] = $_SESSION['today'] ;
  header('location: index.php');}

if(isset($_GET['pr']))
{
   $_SESSION['tempd']=strtotime("-7 days",$_SESSION['tempd']);
	header('location: index.php');
}  
if(isset($_GET['nx']))
{
   $_SESSION['tempd']=strtotime("+7 days",$_SESSION['tempd']);
	header('location: index.php');
}  


if(isset($_POST['crap'])){
     $t=mysqli_real_escape_string($db, $_POST['aptit']);
     $d=mysqli_real_escape_string($db, $_POST['apdes']);
     $da=$_POST['appodat'];
     $st=$_POST['stime'];
     $et=$_POST['etime'];
    $da=date('Y-m-d',strtotime($da));
    $st=date('H:i:s',strtotime($st));
    $et=date('H:i:s',strtotime($et));
    $id= $_SESSION['id'];
    $query = "";
    $results = mysqli_query($db, $query);
    $query = "INSERT INTO apt (id,title,descr,dated,s_time,e_time)
          VALUES ('$id','$t','$d', '$da','$st','$et')";

    mysqli_query($db, $query);

 header("location:index.php");

}


if(isset($_POST['crap2'])){
     $u=mysqli_real_escape_string($db, $_POST['apu']);
      $user_check_query = "SELECT * FROM users WHERE username='$u' LIMIT 1";
      $re = mysqli_query($db, $user_check_query);
     $user = mysqli_fetch_assoc($re);
  
    if ($user) { 
       if ($user['username'] === $u) {
       	$_SESSION['er'] = "";
     $t=mysqli_real_escape_string($db, $_POST['aptit2']);
     $d=mysqli_real_escape_string($db, $_POST['apdes2']);
     $da=$_POST['appodat2'];
     $st=$_POST['stime2'];
     $et=$_POST['etime2'];
    $da=date('Y-m-d',strtotime($da));
    $st=date('H:i:s',strtotime($st));
    $et=date('H:i:s',strtotime($et));
    $u2=$_SESSION['username'];
    $id= $_SESSION['id'];
    $query = "";
    $results = mysqli_query($db, $query);
    $query = "INSERT INTO apt2 (id,us1,us2,title,descr,dated,s_time,e_time)
          VALUES ('$id','$u2','$u','$t','$d', '$da','$st','$et')";

    mysqli_query($db, $query);

 header("location:index.php");
          
        } }
            else{$_SESSION['er']="no such user found";
          header("location:create.php"); }

}


if(isset($_GET['c1']))
	{ $td=strtotime("+0 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
      $res = mysqli_query($db, "DELETE FROM apt where id='$idea' and dated='$td'");  
    header("location:index.php");}
if(isset($_GET['c2']))
	{ $td=strtotime("+1 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
      $res = mysqli_query($db, "DELETE  FROM apt where id='$idea' and dated='$td' "); 
        header("location:index.php"); }

if(isset($_GET['c3']))
	{ $td=strtotime("+2 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
         $idea=$_SESSION['id']; 
      $res = mysqli_query($db, "DELETE  FROM apt where id='$idea' and dated='$td'"); 
      header("location:index.php"); }
if(isset($_GET['c4']))
	{ $td=strtotime("+3 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
      $res = mysqli_query($db, "DELETE  FROM apt where id='$idea' and dated='$td'");  
      header("location:index.php");}
if(isset($_GET['c5']))
	{ $td=strtotime("+4 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
      $res = mysqli_query($db, "DELETE FROM apt where id='$idea' and dated='$td'"); 
        header("location:index.php"); }
if(isset($_GET['c6']))
	{ $td=strtotime("+5 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
        $idea=$_SESSION['id'];
      $res = mysqli_query($db, "DELETE FROM apt where id='$idea' and dated='$td'"); 
        header("location:index.php"); }
if(isset($_GET['c7']))
	{ $td=strtotime("+6 days",$_SESSION['tempd']);
        $td=date("Y-m-d",$td);
       $idea=$_SESSION['id'];
      $res = mysqli_query($db, "DELETE  FROM apt where id='$idea' and dated='$td'");  
        header("location:index.php"); }


if(isset($_GET['ac1']))
{
	 $i=$_GET['ac1'];
	 $u1=$_GET['ac2'];
	 $t=mysqli_real_escape_string($db,$_GET['ac3']);
     $d=mysqli_real_escape_string($db,$_GET['ac4']);
     $da=$_GET['ac5'];
     $st=$_GET['ac6'];
     $et=$_GET['ac7'];
   /* $da=date('Y-m-d',strtotime($da));
    $st=date('H:i:s',strtotime($st));
    $et=date('H:i:s',strtotime($et)); */
    $u2=$_SESSION['username'];
    $id= $_SESSION['id'];
   
    $query = "INSERT INTO apt (id,title,descr,dated,s_time,e_time)
          VALUES ('$i','$t','$d', '$da','$st','$et')";
    mysqli_query($db, $query);
    $query = "INSERT INTO apt (id,title,descr,dated,s_time,e_time)
          VALUES ('$id','$t','$d', '$da','$st','$et')";
    mysqli_query($db, $query);
   $query = "INSERT INTO notif (id,usn,title,aor)
          VALUES ('$i','$u2','$t',1)";
    mysqli_query($db, $query);
   $query = "DELETE from apt2 where us2 like '$u2' and id='$i' and title='$t'; ";  
   mysqli_query($db, $query);
   header("location:index.php"); 
}

if(isset($_GET['re1']))
{
	 $i=$_GET['re1'];
	 $u1=$_GET['re2'];
	 $t=mysqli_real_escape_string($db,$_GET['re3']);
     $d=mysqli_real_escape_string($db,$_GET['re4']);
     $da=$_GET['re5'];
     $st=$_GET['re6'];
     $et=$_GET['re7'];
   /* $da=date('Y-m-d',strtotime($da));
    $st=date('H:i:s',strtotime($st));
    $et=date('H:i:s',strtotime($et)); */
    $u2=$_SESSION['username'];
    $id= $_SESSION['id'];
   
   $query = "INSERT INTO notif (id,usn,title,aor)
          VALUES ('$i','$u2','$t',0)";
    mysqli_query($db, $query);
   $query = "DELETE from apt2 where us2 like '$u2' and id='$i' and title='$t'; ";  
   mysqli_query($db, $query);
   header("location:index.php"); 
}

if(isset($_GET['nr1']))
{  $i=$_GET['nr1'];
   $u=mysqli_real_escape_string($db,$_GET['nr2']);
   $t=mysqli_real_escape_string($db,$_GET['nr3']);
   $query = "DELETE from notif where usn like '$u' and id='$i' and title='$t'; ";  
   mysqli_query($db, $query);
   header("location:index.php"); 

}
if(isset($_GET['na1']))
{  $i=$_GET['na1'];
   $u=mysqli_real_escape_string($db,$_GET['na2']);
   $t=mysqli_real_escape_string($db,$_GET['na3']);
   $query = "DELETE from notif where usn like '$u' and id='$i' and title='$t'; ";  
   mysqli_query($db, $query);
   header("location:index.php"); 

}

?>