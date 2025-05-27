     <script id="jsbin-javascript">
(function (global) {
	if(typeof (global) === "undefined")
	{
		throw new Error("window is undefined");
	}
    var _hash = "!";
    var noBackPlease = function () {
        global.location.href += "#";
		// making sure we have the fruit available for juice....
		// 50 milliseconds for just once do not cost much (^__^)
        global.setTimeout(function () {
            global.location.href += "!";
        }, 50);
    };	
	// Earlier we had setInerval here....
    global.onhashchange = function () {
        if (global.location.hash !== _hash) {
            global.location.hash = _hash;
        }
    };
    global.onload = function () {        
		noBackPlease();
		// disables backspace on page except on input fields and textarea..
		document.body.onkeydown = function (e) {
            var elm = e.target.nodeName.toLowerCase();
            if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
                e.preventDefault();
            }
            // stopping event bubbling up the DOM tree..
            e.stopPropagation();
        };		
    };
})(window);
</script>
      <div class="main main-raised"> 
        
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div id="get_category">
				        </div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider" class="noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-origin" style="left: 0%;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="0.0" aria-valuetext="1.00" style="z-index: 5;"></div></div><div class="noUi-connect" style="left: 0%; right: 0%;"></div><div class="noUi-origin" style="left: 100%;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="999.00" style="z-index: 4;"></div></div></div></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div id="get_brand">
				        </div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Top selling</h3>
							<div id="get_product_home">
								<!-- product widget -->
								
								<!-- product widget -->
							</div>
						</div>
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							<div class="store-sort">
								<label>
									Sort By:
									<select class="input-select">
										<option value="0">Popular</option>
										<option value="1">Position</option>
									</select>
								</label>

								<label>
									Show:
									<select class="input-select">
										<option value="0">20</option>
										<option value="1">50</option>
									</select>
								</label>
							</div>
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<li><a href="#"><i class="fa fa-th-list"></i></a></li>
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row" id="product-row">
						<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
							<!-- product -->
							<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
							
							<!-- /product -->
						</div>
						<!-- /store products -->

						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<ul class="store-pagination" id="pageno">
								<li ><a class="active" href="#aside">1</a></li>
								
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul>
						</div>
						<!-- /store bottom filter -->
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
</div><style>

.aside+.aside {
  margin-top: 30px;
}

.aside>.aside-title {
  text-transform: uppercase;
  font-size: 18px;
  margin: 15px 0px 30px;
}

/*-- checkbox Filter --*/

.checkbox-filter>div+div {
  margin-top: 10px;
}

.checkbox-filter .input-radio label, .checkbox-filter .input-checkbox label {
  font-size: 12px;
}

.checkbox-filter .input-radio label small, .checkbox-filter .input-checkbox label small {
  color: #8D99AE;
}

/*-- Price Filter --*/

#price-slider {
  margin-bottom: 15px;
}

.noUi-target {
  background-color: #FFF;
  -webkit-box-shadow: none;
  box-shadow: none;
  border: 1px solid #E4E7ED;
  border-radius: 0px;
}

.noUi-connect {
  background-color: #D10024;
}

.noUi-horizontal {
  height: 6px;
}

.noUi-horizontal .noUi-handle {
  width: 12px;
  height: 12px;
  left: -6px;
  top: -4px;
  border: none;
  background: #D10024;
  -webkit-box-shadow: none;
  box-shadow: none;
  border-radius: 50%;
}

.noUi-handle:before, .noUi-handle:after {
  display: none;
}

.price-filter .input-number {
  display: inline-block;
  width: calc(50% - 7px);
}

/*----------------------------*\
	Store
\*----------------------------*/

.store-filter {
  margin-bottom: 15px;
  margin-top: 15px;
}

/*-- Store Sort --*/

.store-sort {
  display: inline-block;
}

.store-sort label {
  font-weight: 500;
  font-size: 12px;
  text-transform: uppercase;
  margin-right: 15px;
}

/*-- Store Grid --*/

.store-grid {
  float: right;
}

.store-grid li {
  display: inline-block;
  width: 40px;
  height: 40px;
  line-height: 40px;
  background-color: #FFF;
  border: 1px solid #E4E7ED;
  text-align: center;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.store-grid li+li {
  margin-left: 5px;
}

.store-grid li:hover {
  background-color: #E4E7ED;
  color: #D10024;
}

.store-grid li.active {
  background-color: #D10024;
  border-color: #D10024;
  color: #FFF;
  cursor: default;
}

.store-grid li a {
  display: block;
}

/*-- Store Pagination --*/

.store-pagination {
  float: right;
}

.store-pagination li {
  display: inline-block;
  width: 40px;
  height: 40px;
  line-height: 40px;
  text-align: center;
  background-color: #FFF;
  border: 1px solid #E4E7ED;
  -webkit-transition: 0.2s all;
  transition: 0.2s all;
}

.store-pagination li+li {
  margin-left: 5px;
}

.store-pagination li:hover {
  background-color: #E4E7ED;
  color: #D10024;
}

.store-pagination li.active {
  background-color: #D10024;
  border-color: #D10024;
  color: #FFF;
  font-weight: 500;
  cursor: default;
}

.store-pagination li a {
  display: block;
}

.store-qty {
  margin-right: 30px;
  font-weight: 500;
  text-transform: uppercase;
  font-size: 12px;
}
</style>

<div class="aside">
							<h3 class="aside-title">Price</h3>
							<div class="price-filter">
								<div id="price-slider" class="noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-origin" style="left: 0%;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="0.0" aria-valuetext="1.00" style="z-index: 5;"></div></div><div class="noUi-connect" style="left: 0%; right: 0%;"></div><div class="noUi-origin" style="left: 100%;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="999.00" style="z-index: 4;"></div></div></div><div class="noUi-base"><div class="noUi-origin" style="left: 18.4369%;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="55.1" aria-valuenow="18.4" aria-valuetext="185.00" style="z-index: 5;"></div></div><div class="noUi-connect" style="left: 18.4369%; right: 44.8898%;"></div><div class="noUi-origin" style="left: 55.1102%;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="18.4" aria-valuemax="100.0" aria-valuenow="55.1" aria-valuetext="551.00" style="z-index: 4;"></div></div></div></div>
								<div class="input-number price-min">
									<input id="price-min" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
								<span>-</span>
								<div class="input-number price-max">
									<input id="price-max" type="number">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
						</div>