<!DOCTYPE HTML>
<html>
<div class="col-sm-5">
	       								<div class="box box-solid">
	<center>	       								
<head>
<h1 style="color: green;">
			Check Delivery Time
		</h1> 
	<form>
  <b> Address:</b> <textarea cols="35" rows="2" name="link"></textarea>
   
    
</form>
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
	</script>

</head>
</center>
<button class="button button1"id="setText" ">
		submit
	</button><br>
	</br>
<body >
	<center>
	<b>Delivery Time:</b><input id="input"
		type="number_format"
		class="Disable"
		value="" />
	<br>
	<br>
	
	<script>
		$("#setText").click(function(event) {
			$('#input').val(" Deliver in 2 days       ");
			$('#input').val  (" Deliver in 3 days         ");
		});
	</script>
	</div>
	       							</div></center>
</body>

</html>
		  <style>
.button {
  border: 0;
  color: white;
  border-radius: 5px;
  padding: 5px 10px;
  text-align: right;
  text-decoration: none;
  display: inline-block;
align: right;
float:right;
  margin: 9px 2px;
  cursor: pointer;
}

.button1 {background-color: #000000;} /* red */

</style>
