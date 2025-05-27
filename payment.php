
    <!-- custom css file link  -->
    <link rel="stylesheet" href="index.php">

</head>
<body>

	  <div class="content-wrapper">
	    <div class="container3">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-15 ">

    <form action="index.php">

        <div class="row">

            <div class="col">

                <h3 class="title">billing address</h3>

                <div class="inputBox">
				<label for="fname"><i class="fa fa-user" ></i> Full Name</label>
						<input type="text" id="fname" class="form-control" name="firstname" pattern="^[a-zA-Z ]+$"  value="Akashdeep Singh"  required>
                    
                </div>
				<div>
                <label for="email"><i class="fa fa-envelope"></i> Email</label>

                    <input type="text" id="email" name="email" class="form-control" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$" value="akashaujla@gmail.com"required>
                </div>
                <div class="inputBox">
<label for="address"><i class="fa fa-address-card-o"></i> Address</label>
						<input type="text" id="address" name="address" class="form-control" value="India-Punjab" required>
                </div>
                <div class="inputBox" >
                   <label for="city"><i class="fa fa-institution"></i> City</label>
                    <input type="text" id="city" name="city" class="form-control" value="Khanna" pattern="^[a-zA-Z ]+$" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                       <label for="state">State</label>
							<input type="text" id="state" name="state" class="form-control" pattern="^[a-zA-Z ]+$" required>
                    </div>
				
                    <div class="inputBox">
                        <label for="zipcode">Zip code</label>
                        <input type="number" id ="zipcode" name= "Zip code" class= "from-control"placeholder="123 456"required>
                    </div>
                </div>
<div>
    <label><input type="CHECKBOX" name="q"class="roomselect" value="conform" required> Shipping address same as billing
					</label></div>
            </div>

            <div class="col">
<b>

						<h3>Payment</h3>
						<label for="fname">Accepted Cards</label>
						<div class="icon-container">
						<i class="fa fa-cc-visa" style="color:navy;"></i>
						<i class="fa fa-cc-amex" style="color:blue;"></i>
						<i class="fa fa-cc-mastercard" style="color:red;"></i>
						<i class="fa fa-cc-discover" style="color:orange;"></i>
						</div>
                <div class="inputBox">
<label for="cname">Name on Card</label>
						<input type="text" id="cname" name="cardname" class="form-control" pattern="^[a-zA-Z ]+$" required>
						
						<div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="number" class="form-control" id="cardNumber" minlength="9" name="cardNumber" required>
                </div>
               
                <div class="inputBox">
                   <label for="expdate">Exp Date</label>
						<input type="number" id="expdate" name="expdate" class="form-control" pattern="^((0[1-9])|(1[0-2]))\/(\d{2})$" max="12"placeholder="Month"required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" placeholder="2022" id="expdate" name="expdate" class="form-control" min="2023"pattern="^((0[1-9])|(1[0-2]))\/(\d{2})$" placeholder="year"required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="number" maxlength="3" placeholder="124"required>
						</b>
                    </div>
                </div>

            </div>
			
						
				<input type="hidden" name="total_count" value="'.$total_count.'">
					<input type="hidden" name="total_price" value="'.$total.'">
        </div 	
<div>
        <input type="submit" id="submit"value="proceed to checkout" class="submit-btn" onclick="location.href='index.php'"class="checkout-btn"> 
</div>
    </form>
<!--  -->

	<style>



@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600&display=swap');

*{
  font-family: 'Poppins', sans-serif;
  margin:20; padding:40;
  box-sizing: border-box;
  outline: none; border:none;
  text-transform: capitalize;
  transition: all .2s linear;
}

.container3{
 
  justify-content: center;
  align-items: center;
  padding:80px;
  min-height: 100vh;
 
}

.container3 form{
  padding:20px;
  width:700px;
  background: #fff;
  box-shadow: 0 5px 10px rgba(0,0,0,.1);
}

.container3 form .row{
  display: flex;
  flex-wrap: wrap;
  gap:15px;
}

.container3 form .row .col{
  flex:1 1 250px;
}

.container3 form .row .col .title{
  font-size: 20px;
  align-items: left;
  color:#333;
  padding-bottom: 5px;
  text-transform: uppercase;
}

.container3 form .row .col .inputBox{
  margin:15px 0;
}

.container3 form .row .col .inputBox span{
  margin-bottom: 10px;
  display: block;
}

.container3 form .row .col .inputBox input{
  width: 100%;
  border:1px solid #ccc;
  padding:10px 15px;
  font-size: 15px;
  text-transform: none;
}

.container3 form .row .col .inputBox input:focus{
  border:1px solid #000;
}

.container3 form .row .col .flex{
  display: flex;
  gap:15px;
}

.container3 form .row .col .flex .inputBox{
  margin-top: 5px;
}

.container3 form .row .col .inputBox img{
  height: 34px;
  margin-top: 5px;
  filter: drop-shadow(0 0 1px #000);
}

.container3 form .submit-btn{
  width: 100%;
  padding:12px;
    border-radius: 10px;
  font-size: 17px;
  background: #27ae60;
  color:#fff;
  margin-top: 5px;
  cursor: pointer;
}

.container3 form .submit-btn:hover{
  background: #2ecc71;
}</style>
</div>    
    
</body>
</html>