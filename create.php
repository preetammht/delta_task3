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
<p ><?php echo $_SESSION['er'] ;?></p>

<?php if (isset($_GET['pa'])): ?>
  <form method="post" action="server.php">
    <div class="input-group">
      <label>TITLE</label>
      <input type="text" name="aptit" >
    </div>
    <br>
    <div class="input-group">
       <textarea name="apdes" rows="10" cols="70">description</textarea>
    </div>
    <br>
    <div class="input-group">
    <label>DATE:</label>
    <input type="date" id="start" name="appodat"
               value="2018-07-22"
               min="2018-01-01" max="2018-12-31" /> </div>
    <div class="input-group">
     <label for="appt-time">Start Time:</label>
        <input type="time" id="appt-time" name="stime"
                 required /></div>

     <div class="input-group">          
      <label for="appt-time">End Time:</label>
        <input type="time" id="appt-time" name="etime"
                required /></div>                   

      <button type="submit" class="btn" name="crap">Create</button>
    
  </form>
<?php endif;?>


<?php if (isset($_GET['ao'])): ?>
  <form method="post" action="server.php">
    <div class="input-group">
      <label>Username of person you want to invite:</label>
      <input type="text" name="apu" placeholder="enter a valid user name" >
    </div>


    <div class="input-group">
      <label>TITLE</label>
      <input type="text" name="aptit2" >
    </div>
    <br>
    <div class="input-group">
       <textarea name="apdes2" rows="10" cols="70">description</textarea>
    </div>
    <br>
    <div class="input-group">
    <label>DATE:</label>
    <input type="date" id="start" name="appodat2"
               value="2018-07-22"
               min="2018-01-01" max="2018-12-31" /> </div>
    <div class="input-group">
     <label for="appt-time">Start Time:</label>
        <input type="time" id="appt-time" name="stime2"
                 required /></div>

     <div class="input-group">          
      <label for="appt-time">End Time:</label>
        <input type="time" id="appt-time" name="etime2"
                required /></div>                   

      <button type="submit" class="btn" name="crap2">Create</button>
    
  </form>
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

