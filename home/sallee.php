<center>
<div class="col-sm-20">
<div class="col-sm-20">
<div class="box box-solid" style="width:100%;" "height:00%;">
<div class="col-sm-15">
		           <h1 class="page-header" align="center"style="font-size:50px; color:black"><b>Deals for you</b></h1>
		       		
<h2 id="counter" class=" header ">
		       		<div class="row">
					 		<div class="col-sm-4">
	       								<div class="box box-solid">
		       								<div class="box-body prod-body">
		       									<img src="images/dell-inspiron-15-5000-15-6.jpg" alt="Denim Jeans" width="100%" height="160px" class="thumbnail" >
  <h5 style="color:black;">DELL Inspiron 15 5000 15.6 </h5>
  <h4><b><span style="color:red;">599</span></b>&nbsp;<del style="color:black;"><span style="color:gray;">$699</span></del></h4>
 
		            			<div class="form-group">
			            			<div class="input-group col-sm-5">
			            				
			            				<span class="input-group-btn">
			            					
							            </span>
							            <input type="hidden" value="196" name="id">
							        </div>
			            			<button type="submit" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
			            		</div>
		            		</form></div>
		       								
	       								</div>
	       							</div>
	       						
	       							<div class="col-sm-4">
	       								<div class="box box-solid">
		       								<div class="box-body prod-body">
		       									<img src="images/acer-predator-vesta-rgb-gaming-ram-32gb-16gbx2.jpg" alt="Denim Jeans" width="100%" height="160px" class="thumbnail" >
  <h5 style="color:black;">Acer Gaming RAM </h5>
  <h4><b><span style="color:red;">710</span></b>&nbsp;<del style="color:black;"><span style="color:gray;">$800</span></del></h4>
 
		            			<div class="form-group">
			            			<div class="input-group col-sm-5">
			            				
			            				<span class="input-group-btn">
			            					
							            </span>
							            <input type="hidden" value="196" name="id">
							        </div>
			            			<button type="submit" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
			            		</div>
		            		</form></div>
		       								
	       								</div>
	       							</div>
	       						
	       							<div class="col-sm-4">
	       								<div class="box box-solid">
		       								<div class="box-body prod-body">
		       									<img src="http://localhost/ecommerce/images/hyperx-cloud-orbit-s-gaming-headset.jpg" alt="Denim Jeans" width="100%" height="160px" class="thumbnail" >
  <h5 style="color:black;">HyperX Headset </h5>
  <h4><b><span style="color:red;">845</span></b>&nbsp;<del style="color:black;"><span style="color:gray;">$860</span></del></h4>
 
		            			<div class="form-group">
			            			<div class="input-group col-sm-7">
			            				
			            				<span class="input-group-btn">
			            					
							            </span>
							            <input type="hidden" value="196" name="id">
							        </div>
			            			<button type="submit" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
			            		</div>
		            		</form></div>
		       								
	       								</div>
	       							</div>
	       				<!--		
	       						<div class="col-sm-4">
	       								<div class="box box-solid">
		       								<div class="box-body prod-body">
		       									<img src="http://localhost/ecommerce/images/micro-center-core-i9-13900k-desktop-processor-24-cores-up-5-8-ghz.jpg" alt="Denim Jeans" width="100%" height="160px" class="thumbnail" >
  <h5 style="color:black;">Micro Center Core i9 </h5>
  <h4><b><span style="color:red;">3050</span></b>&nbsp;<del style="color:black;"><span style="color:gray;">$3199</span></del></h4>
 
		            			<div class="form-group">
			            			<div class="input-group col-sm-7">
			            				
			            				<span class="input-group-btn">
			            					
							            </span>
							            <input type="hidden" value="196" name="id">
							        </div>
			            			<button type="submit" class="btn btn-primary btn-lg btn-flat"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
			            		</div>
		            		</form></div>
		       								
	       								</div>
	       							</div>
	       							-->
								</h2> 
	



</div></div></div>
</center>
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-height : 10px
  max-width: 13px;
  margin: 7px;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 12px;
}

.card button {
  border: none;
  outline: 1;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 90%;
  font-size: 8px;
}

.card button:hover {
  opacity: 0.1;
}
.box-body prod-body {
font-size: 8px;
text-align: center;

body  {
  background-image: url("http://localhost/ecommerce/images/micro-center-core-i9-13900k-desktop-processor-24-cores-up-5-8-ghz.jpg");
  background-color: black;
}
</style>
<script>
$(function(){
  $('#navbar-search-input').focus(function(){
    $('#searchBtn').show();
  });

  $('#navbar-search-input').focusout(function(){
    $('#searchBtn').hide();
  });

  getCart();

  $('#productForm').submit(function(e){
  	e.preventDefault();
  	var product = $(this).serialize();
  	$.ajax({
  		type: 'POST',
  		url: 'cart_add.php',
  		data: product,
  		dataType: 'json',
  		success: function(response){
  			$('#callout').show();
  			$('.message').html(response.message);
  			if(response.error){
  				$('#callout').removeClass('callout-success').addClass('callout-danger');
  			}
  			else{
				$('#callout').removeClass('callout-danger').addClass('callout-success');
				getCart();
  			}
  		}
  	});
  });

  $(document).on('click', '.close', function(){
  	$('#callout').hide();
  });

});

function getCart(){
	$.ajax({
		type: 'POST',
		url: 'cart_fetch.php',
		dataType: 'json',
		success: function(response){
			$('#cart_menu').html(response.list);
			$('.cart_count').html(response.count);
		}
	});
}
</script>