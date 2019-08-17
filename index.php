<?php require_once("Sessions.php");?>

<?php require_once("Sessions1.php")?>


<?php 
if (isset($_POST["Submit"])){
	
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "phpparcel";

try{
 
 $conn = new mysqli($server, $user, $pass, $dbname );
 
 
}catch (Exception $e){
 // report error message
 echo $e->getMessage();
}
	




	
	$Name = mysqli_real_escape_string($conn,$_POST["Name"]);
	$Comment = mysqli_real_escape_string($conn,$_POST["Comment"]);
	
	date_default_timezone_set("Asia/Karachi");
	$CurrentTime = time();
	$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
	$DateTime;
	$PostId = $_GET["id"];
	
	if (empty($Name) || empty($Comment)){
		$_SESSION["ErrorMessage"] = "All Fields are required";
	}
	
	elseif(strlen($Comment)>500){
		$_SESSION["ErrorMessage"] = "Only 500 Characters are Allowed in Comment";
	}
	else {
		$Query = "INSERT into comments (datetime,name,comment,status) VALUES ('$DateTime', '$Name' , '$Comment' ,'OFF') "; 
		$Execute = mysqli_query($conn,$Query);
		if($Execute){
		$_SESSION["SuccessMessage"] = "Comment Submitted Successfully";
		
		}else{
			$_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
			Redirect_to("index.php");
		}
	}
}
?>

<?php
if (isset($_POST["comment"])){
	
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "phpparcel";
try{
 
 $conn = new mysqli($server, $user, $pass, $dbname );
 
 
}catch (Exception $e){
 // report error message
 echo $e->getMessage();
}
	
	$Name = mysqli_real_escape_string($conn,$_POST["name"]);
	$Email = mysqli_real_escape_string($conn,$_POST["email"]);
	$Feedback = mysqli_real_escape_string($conn,$_POST["feedback"]);
	
	date_default_timezone_set("Asia/Karachi");
	$CurrentTime = time();
	$DateTime=strftime("%B-%d-%Y %H:%M:%S",$CurrentTime);
	$DateTime;
	$PostId = $_GET["id"];
	
	if (empty($Name) || empty($Email) || empty($Feedback)){
		$_SESSION["ErrorMessage1"] = "All Fields are required";
	}
	
	elseif(strlen($Feedback)>500){
		$_SESSION["ErrorMessage1"] = "Only 500 Characters are Allowed in Comment";
	}
	else {
		$Query1 = "INSERT into feedback (datetime,name,email,feedback) VALUES ('$DateTime', '$Name' , '$Email' ,'$Feedback') "; 
		$Execute1 = mysqli_query($conn,$Query1);
		if($Execute1){
		$_SESSION["SuccessMessage1"] = "Feedback Submitted Successfully";
		
		}else{
			$_SESSION["ErrorMessage1"] = "Something Went Wrong. Try Again !";
			Redirect_to("index.php");
		}
	}
}
	

?>

<!DOCTYPE html>
<html lang = "en">
<head>
<title>Fastest Courior</title>
<meta charset = "utf-8">
<meta name  = "viewport" content = "width = device-width" , initial-scale = "1">
<link rel = "stylesheet" href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<link rel = "stylesheet" href = "style.css">

<style>
#link{
	text-decoration:none;
	display:inline-block;
	
}

</style>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
		<span class="icon-bar"></span>  
		<span class = "icon-bar"></span>		
      </button>
      <a class="navbar-brand" href="index.php">Express Parcel Delivers</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#customer">CUSTOMER</a></li>
		<li><a href="#calculator">CALCULATOR</a></li>
        <li><a href="#contact">CONTACT US</a></li>
       <li><button class = "btn btn-info btn-lg" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button></li>

<div id="id01" class="modal">
  
  <div class = "container bg-grey">
  <center>
  <h2><a id = "link" href= "admin.php">As an Admin</a></h2>
   </center>
  </div>
  
  <div class = "container bg-grey">
  <center>
  <h2><a id = "link" href= "Manager.php">As a Manager</a></h2>
  </center>
  </div>
  
  <div class = "container bg-grey">
  <center>
  <h2><a id = "link" href= "User.php">As a User</a></h2>
  </center>
  </div>
	
    <div class="container" style="background-color:#f1f1f1" >

      <button  class = "btn btn-info center-block" type="button" onclick="document.getElementById('id01').style.display='none'" >Cancel</button>
      
    </div>

</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

		
      </ul>
    </div>
</nav>

<div class = "jumbotron text-center">
<h1>Express Parcel Delivers </h1>
<p>We believe in Speed</p>
<div class = "form-inline">
<div style =z-index:1; class = "input-group">

				
					<a href = "trackingid.php">
		<span class = "btn btn-info btn-lg">Track Your Parcel</span></a>
					
					
	
	
				</div>
		</div>
	</div>
</div>

        
	


<div id ="about" class = "container-fluid">
<div class = "row">
<div class = "col-sm-8">
<h2 style =padding:20px;padding-bottom:30px;>About Us</h2>
<h4 style = padding-left:20px;>We at Express Parcel Delivery believe if you can’t transport swiftly, you shouldn’t transport at all! In today’s world speed is the underlying criteria for any business:</h4>
 <p style =font-weight:100;font-size:15px;padding:20px;><strong>But it doesn’t end with just speed, your goods should also reach safe and secure!</strong> Express Parcel delivers with speed and surety.To achieve both
security and speed, much groundwork and infrastructure has been laid out. Today we can affirm with total assurance, we will live to your expectations of being
 swift, safe and secure.


Express Parcel Delivery offers cost effective, door to door express and logistics services .
We believe in keeping a constant tab on your needs as a customer, and in anticipating emerging trends, also	 expanding strategically and constantly updating cutting-edge 
technologies and state-of-the-art tracking systems. All this has given Express Parcel Deliver's excellent reach speed, punctuality and above all competitive 
rate efficiencies. </p>
</div>
<div class = "col-sm-4">
<span class = "glyphicon glyphicon-signal logo"></span>
</div>
</div>
</div>



<div id = "customer" class = "container-fluid bg-grey">
<div class = "row">
<div class = "col-sm-12">
<h2 style=padding-left:20px;> What Our Customer Says </h2>	
</div>
</div>

<div class = "row">
<div class = "col-sm-8">
<div class="pre-scrollable">

<?php 
$server = "localhost";
$user = "root";
$pass = "";
$dbname = "phpparcel";
try{

 $conn = new mysqli($server, $user, $pass, $dbname );
 
 
}catch (Exception $e){
 // report error message
 echo $e->getMessage();
}

$ExtractingCommentQuery="select * from comments where status = 'ON' ORDER BY datetime desc";
$execute = mysqli_query($conn,$ExtractingCommentQuery);
while($DataRows=mysqli_fetch_array($execute)){
	$Comment_date=$DataRows["datetime"];
	$CommenterName = $DataRows["name"];
	$CommentbyUser = $DataRows["comment"];

?>
<div class = "CommentBlock">

<img style="margin-left:10px;margin-top:10px;" class ="pull-left" src="comment.png" width=70px; height=70px;>
	<p style =margin-left:90px; class = "Comment-info"><?php echo $CommenterName;?></p>
	<p style =margin-left:90px;class ="description"><?php echo $Comment_date;?></p>
	<p style =margin-left:90px;class = "Comment"><?php echo $CommentbyUser;?></p>
</div>


<hr>
<?php } ?>
</div>
</div>

<div class = "col-sm-4">
<h4>Let's Share Your Thoughts With Us</h4>
<?php echo Message();
	 echo SuccessMessage(); ?>
<form action = "index.php?id=<?php echo $PostId; ?>" method="post">
		<fieldset>
		<div class = "form-group">
		<label for = "Name"><span class = "FieldInfo">Name:</span></label>
		<input class = "form-control" type ="text" name = "Name" id = "Name" placeholder = "Name">
		</div>
		<div class = "form-group">
		<label for = "commentarea"><span class = "FieldInfo">Comment:</span></label>
		<textarea class = "form-control" name = "Comment" id = "commentarea"></textarea>
		<br>
		</div>
		<input class = "btn btn-primary pull-right" type = "Submit" name = "Submit" Value = "Add Comment">
		</fieldset>
		</form>
	</div>
	</div>
</div>

<div id ="calculator" class = "container-fluid">
<div class = "row">
<div class = "col-sm-12">
<h2 style =padding-left:20px;>Calculate Your Parcel Price</h2>

		<div class = "row">
		<fieldset>
		<div class = "col-sm-4 form-group">
		<label for = "height"><span class = "FieldInfo">Height:</span></label>
		<input class = "form-control" type ="text" name = "height" id = "height" placeholder = "Height">
		</div>
		<div class = "col-sm-4 form-group">
		<label for = "weight"><span class = "FieldInfo">Weight:</span></label>
		<input class = "form-control" type ="text" name = "weight" id = "weight" placeholder = "Weight">
		
		</div>
	</div>
		
		<div class = "row">
		<div class = "col-sm-4 form-group">
		<label for = "weight"><span class = "FieldInfo">Mode:</span></label>
		<select class = "form-control" id = "mode" name ="weight">
		<option id = "air">Air</option>
		<option id = "sea">Seaways</option>
		<option id = "local"> Local Transport</option>
		</select>
		<br>
		
		</div>
		
		
		</div>
		</fieldset>
		<div class = "row">
		<div class =  "col-sm-12 form-group">
		<button class ="btn btn-default btn-lg" onclick="calculate()"> Calculate</button>
		<h1 id = "answer"></h1>
		<script>
		function calculate(){
			var field1=document.getElementById("height").value;
			var field2=document.getElementById("weight").value;
			var field3 = 100;
			var field7 = 80;
			var field8 = 50;
			if(field4=document.getElementById("mode").value){
				if(document.getElementById("mode").value == document.getElementById("air").value){
			var result = (parseFloat(field1)*parseFloat(field2))*parseFloat(field3);
			 if(!isNaN(result)){
				 document.getElementById("answer").innerHTML="You Will have to Pay "+result;
			 }
			}
			if(document.getElementById("mode").value == document.getElementById("sea").value){
				var result = (parseFloat(field1)*parseFloat(field2))*parseFloat(field7);
			 if(!isNaN(result)){
				 document.getElementById("answer").innerHTML="You Will have to Pay "+result;
				
			}
			}
			
			if(document.getElementById("mode").value == document.getElementById("local").value){
				var result = (parseFloat(field1)*parseFloat(field2))*parseFloat(field8);
			 if(!isNaN(result)){
				 document.getElementById("answer").innerHTML="You Will have to Pay "+result;
			 }
			}
			
			}
			
			
			
		}
		</script>
		
		</div>
		</div>
		
		
			
		
</div>
</div>
</div>
</div>

<div id= "contact"  class = "container-fluid bg-grey">
<div class = "row">
<div class = "col-sm-12">
<h2 style =padding-left:20px;>Contact Us</h2>
</div>
</div>
<div class = "row"> 
<div class = "col-sm-5">
				<p style =padding-left:20px;font-size:20px;>Contact Us and we will be back to you with in 24 hours</h2>
				<p style =padding-left:20px;font-size:20px;><span class = "glyphicon glyphicon-phone"> +917888604070</span></p>
				<p style =padding-left:20px;font-size:20px;><span class = "glyphicon glyphicon-envelope"> sharmashekhar50@gmail.com</span></p> 
</div>
<div class = "col-sm-7">

	<div class = "row">
	<?php echo Message1();
	 echo SuccessMessage1(); ?>
	<form action = "index.php" method = "post">
	<fieldset>
		<div class = "col-sm-6 form-group">
			<input class = "form-control" id = "name" name = "name" placeholder = "Name" type = "text" required>
		</div>
		
		<div class = "col-sm-6 form-group">
			<input class = "form-control" id = "email" name = "email" placeholder = "Email" type = "email" required>
		</div>
		</div>
		<textarea class = "form-control" id = "comments" name="feedback" placeholder = "Feedback" rows = "5"></textarea><br>


	<div class = "row">
		<div class = "col-sm-12 form-group">
			<input class ="btn btn-default pull-right" type ="submit" name = "comment" value="Send"> 
			
</div>
</div>
</form>
</fieldset>
</div>
</div>






<div class = "footer">
<hr>
<p> Designed By Shekhar Sharma<br>2016CSC1098<br>Guru Nanak Dev University</p>
<hr>
</div>
</body>
</html>
