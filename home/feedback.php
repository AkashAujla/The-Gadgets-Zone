<!DOCTYPE html>
<html>
<head>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<style>
*{box-sizing:border-box;}
body{font-family: 'Open Sans', sans-serif; color:#333; font-size:14px; background-color:#dadada; padding:100px;}
.form_box{width:400px; padding:10px; background-color:white;}
input{padding:5px;  margin-bottom:5px;}
input[type="submit"]{border:none; outlin:none; background-color:#679f1b; color:white;}
.heading{background-color:#ac1219; color:white; height:40px; width:100%; line-height:40px; text-align:center;}
.shadow{
  -webkit-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
-moz-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);}
.pic{text-align:left; width:33%; float:left;}
</style>
<body>
 <div class="form_box shadow">
 <form method="post" >
 <div class="heading">
   Feedback Form in PHP
 </div>
 <br/>
 <p>What do you think about the quality of our blog?</p>
 <div>
   <div class="pic">
     <img src="bad.png" alt=""> <br/>
     <input type="radio" name="quality" value="0"> Bad
   </div>
   <div class="pic">
     <img src="neutral.png" alt=""> <br/>
     <input type="radio" name="quality" value="1"> Okay
   </div>
   <div class="pic">
     <img src="good.png" alt=""> <br/>
     <input type="radio" name="quality" value="2"> Good
   </div>
 </div>
 
 <p>Do you have any suggestion for us? </p>
 <textarea name=" suggestion" rows="8" cols="40"></textarea>
  <input type="submit" name="submit" value="Submit Form">
</form>
 </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
$name = $POST['name'];
$email =$POST['email']; 
$city = $_POST["city"];
$host ="localhost";
$user ="root";
$pass= "";
$dbname ="ecomm";

Sconn=mysqli_connect(Shost, Suser, Spass, Sdbname);

$sql = "INSERT INTO feedback(name, email, mobile, city) values ("name", "Small", "Smobile", "Scity")" 
mysqli_query($conn, $sql)
