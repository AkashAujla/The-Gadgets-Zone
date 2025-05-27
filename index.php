<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">
	
	<?php include 'includes/navbar.php'; ?>
	<?php include 'includes/header 2.php'; ?>
		
	  <div class="content-wrapper">
	    <div class="container">

	    
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-15">
				
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
					</br>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
						  <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li> 
						  <li data-target="#carousel-example-generic" data-slide-to="5" class=""></li>
						</ol>
		     <div class="carousel-inner">
		         <div class="item active">
		             <img src="images/BANNNER12.jpg" alt="First slide">
		                 </div>
						  <div class="item">
		             <a href='http://localhost/ecommerce/product.php?product=iphone-16-pro-max-1-tb'>
                         <img src='images/iPhone16.jpg' alt="fifth  slide" >
						  </a>
							</div>
		        
				 
				<div class="item">
                      <a href='http://localhost/ecommerce/category.php?category=Headphones'>
                          <img src='images/fsfsd.jpg'  >
                             </a>
		                  </div>
		        
				<div class="item">
		                    <center>
		<div>
		<?php include 'home/image links.php'; ?>
		
		 </center>
	      </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		           
					<br><br><br><br><br><br>
					
				 </div>
	
 	<?php include 'home/shopnow.php'; ?>
	
	</br></br>
	
	<?php include 'home/box.php'; ?>
	</br>
	<div>
	<?php include 'home/top selling.php'; ?>
	</div>
	<div><div>
	<?php include 'home/sallee.php'; ?>
	</div></div><div><div>
	<?php include 'chatbot/chatbot.php'; ?>
	</div></div><div>
	<?php include 'home/suggest.php'; ?>
	</div>
</br></br>

	      <!-- 
	    
	        <div class="col-sm-20">
<div class="col-sm-20">
<div class="box box-solid" style="width:100%;" "height:00%;">
<div class="col-sm-15">
<div class="row">
	        	<div class="col-sm-100">
		           
					
	
		             		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-2'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='90%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#36; ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-3'></div><div class='col-sm-3'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-3'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> </div></div></div></div>-->
					
					<div>
	        	
                     <div class="col-sm-4" align='right'>
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>
                </div>
	    </div>
		</section>
	  </div>
	 
  <div>
  	<?php include 'includes/footer.php'; ?>
</div>
 

<?php include 'includes/scripts.php'; ?>

</body>
</html>