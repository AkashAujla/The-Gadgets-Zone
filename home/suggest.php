<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Most Viewed Today</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul id="trending" style="list-style: none; padding: 0; display: flex; flex-wrap: wrap; gap: 20px; justify-content: space-between;">
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
	  			$stmt->execute(['now'=>$now]);
	  			foreach($stmt as $row){
	  				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
	  				echo "
	  					<li style='
	  						width: 250px;
	  						height: 350px;
	  						display: flex;
	  						flex-direction: column;
	  						align-items: center;
	  						justify-content: space-between;
	  						background: #fff;
	  						border-radius: 12px;
	  						box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
	  						overflow: hidden;
	  						transition: transform 0.3s ease, box-shadow 0.3s ease;
	  						padding: 10px;
	  						cursor: pointer;
	  					'>
	  						<a href='product.php?product=".$row['slug']."' style='text-decoration: none;'>
	  							<img src='".$image."' alt='' style='max-width: 100%; max-height: 60%; object-fit: contain; border-radius: 8px;'>
	  							<h4 style='margin-top: 10px; font-size: 18px; font-weight: bold; color: #333;'>".$row['name']."</h4>
	  							<p style='font-size: 14px; color: #777;'>Price: $".$row['price']."</p>
	  						</a>
	  					</li>
	  				";
	  			}

	  			$pdo->close();
	  		?>
	  		</ul>
	  	</div>
	</div>
</div>

<style>
	/* Reset list-style and ensure no unwanted symbols */
	#trending {
		list-style: none; /* Remove bullets or checkmarks */
		padding: 0;
	}

	/* Hover effect for scaling the box */
	#trending li:hover {
		transform: scale(1.05); /* Scale the item on hover */
		box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Increase shadow effect on hover */
	}

	/* Aligning content within each product box */
	#trending li a {
		display: flex;
		flex-direction: column;
		align-items: center;
		text-align: center;
	}

	/* Ensuring images are well-sized and proportionate */
	#trending li img {
		max-width: 100%;
		max-height: 60%;
		object-fit: contain;
		border-radius: 8px;
	}

	/* Styling for the product name and price */
	#trending li h4 {
		font-size: 16px;
		font-weight: bold;
		color: #333;
		margin: 5px 0;
	}

	#trending li p {
		font-size: 14px;
		color: #555;
	}

	/* Responsiveness for smaller screens */
	@media (max-width: 768px) {
		#trending li {
			width: 200px;
			height: auto;
		}
	}
</style>
