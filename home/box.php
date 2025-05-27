

<body>
 <div id="hot-deal" class="section mainn mainn-raised">
	  
  
        
			<center>
			<h2 id="counter" class=" header header1">
		
         	<ul class="hot-deal-countdown">
			
<?php 


 $dateTime = strtotime('june 15, 2025 18:00:00');
 $getDateTime = date("F d, Y H:i:s", $dateTime); 

?>

</h2>
<style>	
.header{
		border: 0;
  color: white;
  border-radius: 30px;
  padding: 17px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;

  margin: 9px 2px;
}
  
.header1 {background-color: #D10024e6;} /* red */
</style>
</center>
<center>
              
			   <b><p class="text-uppercase"style="font-size:30px ">hot deal this week</p></b>
                           <p style="font-size:30px ">New Collection Up to 50% OFF</p>
             
			  <b><button class="button button1" style="font-size:15px" onclick="location.href='new.php'"> SHOP NOW </button></b>
			  <style>
.button {
  border: 0;
  color: white;
  border-radius: 30px;
  padding: 17px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;

  margin: 9px 2px;
  cursor: pointer;
}

.button1 {background-color: #D10024e6;} /* red */

</style>
							
							</ul></center>
							  
       
    </div>
	</div> </div>
</div>

<!-- Script -->
<script>
        var countDownTimer = new Date("<?php echo "$getDateTime"; ?>").getTime();
        // Update the count down every 1 second
        var interval = setInterval(function() {
            var current = new Date().getTime();
            // Find the difference between current and the count down date
            var diff = countDownTimer - current;
            // Countdown Time calculation for days, hours, minutes and seconds
            var days = Math.floor(diff / (1000 * 60 * 60 * 24));
            var hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((diff % (1000 * 60)) / 1000);

            document.getElementById("counter").innerHTML = days + "Day : " + hours + "h " +
            minutes + "m " + seconds + "s ";
          
            if (diff < 0) {
                clearInterval(interval);
                document.getElementById("counter").innerHTML = "EXPIRED";
            }
        }, 1000);
</script>

		
</body>
<style>
#hot-deal.section {
  padding: 55px 10px;
 
  background-color: #E4E7ED;
  background-image: url('img/hotdeal.png');
  background-position: center;
  background-repeat: no-repeat;
 
}
.hot-deal .hot-deal-countdown>li {
  border: 0;
  color: white;
  border-radius: 30px;
  padding: 17px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;

margin: 97px 2px;}
 

</style>

<br>