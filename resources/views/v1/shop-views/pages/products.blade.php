    @extends('v1.shop-views.layouts.shop-layout')

    @section('v1-shop-title')
    <title>Sản phẩm</title>
    @endsection


    @section('v1-shop-css')
    <link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/hide-input-file.css') }}">
    </link>
    <link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/color-toast.css') }}">
    @endsection

	@section('v1-shop-js')
    <script type="text/javascript" src="{{ asset('v1/resources/js/shop-page/reuseable/filter-price.js') }}"></script>
    @endsection


    <style>
    	.slider {
    		-webkit-appearance: none;
    		width: 100%;
    		height: 15px;
    		border-radius: 5px;
    		background: #d3d3d3;
    		outline: none;
    		opacity: 0.7;
    		-webkit-transition: .2s;
    		transition: opacity .2s;
    	}

    	.slider::-webkit-slider-thumb {
    		-webkit-appearance: none;
    		appearance: none;
    		width: 25px;
    		height: 25px;
    		border-radius: 50%;
    		background: #c96;
    		cursor: pointer;
    	}

    	.slider::-moz-range-thumb {
    		width: 25px;
    		height: 25px;
    		border-radius: 50%;
    		background: #04AA6D;
    		cursor: pointer;
    	}
    </style>



    @section('v1-shop-content')
    <div class="my-3"></div>
    <main class="main">
    	<div class="page-header text-center" style="background-image: url('v1/themes/molla-shop-template/assets/images/page-header-bg.jpg')">
    		<div class="container">
    			<h1 class="page-title">Sản phẩm
    				<!-- <span>Shop</span> -->
    			</h1>
    		</div><!-- End .container -->
    	</div><!-- End .page-header -->
    	<nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
    		<div class="container">
    			<ol class="breadcrumb">
    				<li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
    				<li class="breadcrumb-item"><a href="#">Cửa hàng</a></li>
    				<li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
    			</ol>
    		</div><!-- End .container -->
    	</nav><!-- End .breadcrumb-nav -->

    	<div class="page-content">
    		<div class="container">
    			<form action="{{route('shop.products.filter-by-multiple')}}" method="post" enctype="multipart/form-data">
    				@csrf
    				<div class="row">
    					<div class="col-lg-9">
    						<!-- <div class="toolbox">
                				<div class="toolbox-left">
                					<div class="toolbox-info">
                						Showing <span>9 of 56</span> Products
                					</div>
                				</div>

                				<div class="toolbox-right">
                					<div class="toolbox-sort">
                						<label for="sortby">Sort by:</label>
                						<div class="select-custom">
											<select name="sortby" id="sortby" class="form-control">
												<option value="popularity" selected="selected">Most Popular</option>
												<option value="rating">Most Rated</option>
												<option value="date">Date</option>
											</select>
										</div>
                					</div>
                					<div class="toolbox-layout">
                						<a href="category-list.html" class="btn-layout">
                							<svg width="16" height="10">
                								<rect x="0" y="0" width="4" height="4" />
                								<rect x="6" y="0" width="10" height="4" />
                								<rect x="0" y="6" width="4" height="4" />
                								<rect x="6" y="6" width="10" height="4" />
                							</svg>
                						</a>

                						<a href="category-2cols.html" class="btn-layout">
                							<svg width="10" height="10">
                								<rect x="0" y="0" width="4" height="4" />
                								<rect x="6" y="0" width="4" height="4" />
                								<rect x="0" y="6" width="4" height="4" />
                								<rect x="6" y="6" width="4" height="4" />
                							</svg>
                						</a>

                						<a href="category.html" class="btn-layout active">
                							<svg width="16" height="10">
                								<rect x="0" y="0" width="4" height="4" />
                								<rect x="6" y="0" width="4" height="4" />
                								<rect x="12" y="0" width="4" height="4" />
                								<rect x="0" y="6" width="4" height="4" />
                								<rect x="6" y="6" width="4" height="4" />
                								<rect x="12" y="6" width="4" height="4" />
                							</svg>
                						</a>

                						<a href="category-4cols.html" class="btn-layout">
                							<svg width="22" height="10">
                								<rect x="0" y="0" width="4" height="4" />
                								<rect x="6" y="0" width="4" height="4" />
                								<rect x="12" y="0" width="4" height="4" />
                								<rect x="18" y="0" width="4" height="4" />
                								<rect x="0" y="6" width="4" height="4" />
                								<rect x="6" y="6" width="4" height="4" />
                								<rect x="12" y="6" width="4" height="4" />
                								<rect x="18" y="6" width="4" height="4" />
                							</svg>
                						</a>
                					</div>
                				</div>
                			</div> -->
    						<!-- End .toolbox -->

    						<div class="products mb-3">
    							<div class="row justify-content-center">
    								<!-- <div class="col-6 col-md-4 col-lg-4">
                                        <div class="product product-7 text-center">
                                            <figure class="product-media">
                                                <span class="product-label label-new">New</span>
                                                <a href="product.html">
                                                    <img src="assets/images/products/product-4.jpg" alt="Product image" class="product-image">
                                                </a>

                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                </div>

                                                <div class="product-action">
                                                    <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                                                </div>
                                            </figure>

                                            <div class="product-body">
                                                <div class="product-cat">
                                                    <a href="#">Women</a>
                                                </div>
                                                <h3 class="product-title"><a href="product.html">Brown paperbag waist pencil skirt</a></h3>
                                                <div class="product-price">
                                                    $60.00
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div>
                                                    </div>
                                                    <span class="ratings-text">( 2 Reviews )</span>
                                                </div>

                                                <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="assets/images/products/product-4-thumb.jpg" alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="assets/images/products/product-4-2-thumb.jpg" alt="product desc">
                                                    </a>

                                                    <a href="#">
                                                        <img src="assets/images/products/product-4-3-thumb.jpg" alt="product desc">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
    								@foreach ($products as $product)

    								<div class="col-6 col-md-4 col-lg-4">
    									<div class="product product-7 text-center">
    										<figure class="product-media">
    											<a href="{{route('shop.products.detail',['id' => $product->id])}}">
    												<img src="{{$product->feature_image_path}}" alt="Product image" class="product-image">
    											</a>
    											<!-- 
                                                <div class="product-action-vertical">
                                                    <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                                    <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                                    <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a>
                                                </div> -->
    											<!-- End .product-action-vertical -->

    											<div class="product-action">
    												<a href="{{route('shop.cart.addOne',['id' => $product->id])}}" class="btn-product btn-cart"><span>Thêm vào giỏ hàng</span></a>
    											</div><!-- End .product-action -->

    										</figure><!-- End .product-media -->

    										<div class="product-body">
    											<div class="product-cat font-weight-normal">

    												<a href="{{route('shop.products.filter-by-brand',['id' => $product->companies->id])}}">

    													{{$product->companies->company_name}} -
    												</a>
    												@foreach ($product->categories as $category)
    												<a href="{{route('shop.products.filter-by-category',['id' => $category->id])}}">
    													{{$category->name}},
    												</a>
    												@endforeach
    											</div><!-- End .product-cat -->
    											<h3 class="product-title"><a href="{{route('shop.products.detail',['id' => $product->id])}}">{{$product->name}}</a></h3><!-- End .product-title -->
    											<div class="product-price">
    												{{number_format($product->price)}}đ
    											</div><!-- End .product-price -->
    											<!-- <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 0%;"></div>
                                                    </div>
                                                    <span class="ratings-text">( 0 Reviews )</span>
                                                </div> -->


    											<!-- <div class="product-nav product-nav-thumbs">
                                                    <a href="#" class="active">
                                                        <img src="assets/images/products/product-5-thumb.jpg" alt="product desc">
                                                    </a>
                                                    <a href="#">
                                                        <img src="assets/images/products/product-5-2-thumb.jpg" alt="product desc">
                                                    </a>
                                                </div> -->
    											<!-- End .product-nav -->
    										</div><!-- End .product-body -->
    									</div><!-- End .product -->
    								</div><!-- End .col-sm-6 col-lg-4 -->
    								@endforeach

    							</div><!-- End .row -->
    						</div><!-- End .products -->

    						<nav class="d-flex justify-content-center">
    							<!-- <ul class="pagination justify-content-center">
							        <li class="page-item disabled">
							            <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
							                <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
							            </a>
							        </li>

									<li class="page-item active" aria-current="page"><a class="page-link" href="#">$i+1</a></li>
								
							     
							        <li class="page-item"><a class="page-link" href="#">2</a></li>
							        <li class="page-item"><a class="page-link" href="#">3</a></li>
							        <li class="page-item-total">of 6</li>
							        <li class="page-item">
							            <a class="page-link page-link-next" href="#" aria-label="Next">
							                Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
							            </a>
							        </li>
							    </ul> -->

    							{{ $products->links('pagination::bootstrap-4') }}
    						</nav>
    					</div><!-- End .col-lg-9 -->



    					<aside class="col-lg-3 order-lg-first">
    						<div class="sidebar sidebar-shop">
    							<div class="widget widget-clean">
    								<label>Bộ lọc:</label>
    								<a href="#" class="sidebar-filter-clear">Xóa bộ lọc</a>
    							</div><!-- End .widget widget-clean -->



    							<div class="widget widget-collapsible">
    								<h3 class="widget-title">
    									<a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
    										Danh mục
    									</a>
    								</h3><!-- End .widget-title -->

    								<div class="collapse show" id="widget-1">
    									<div class="widget-body">
    										<div class="filter-items filter-items-count">
    											@foreach ($categories as $category)


    											<div class="filter-item">
    												<div class="custom-control custom-radio">
    													<input type="radio" name="category" value="{{$category->id}}" class="custom-control-input" id="cat-{{$category->id}}">
    													<label class="custom-control-label" for="cat-{{$category->id}}">{{$category->name}}</label>
    												</div><!-- End .custom-checkbox -->

    											</div><!-- End .filter-item -->
    											@endforeach











    										</div><!-- End .filter-items -->
    									</div><!-- End .widget-body -->
    								</div><!-- End .collapse -->
    							</div><!-- End .widget -->





    							<div class="widget widget-collapsible">
    								<h3 class="widget-title">
    									<a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
    										Hãng sản xuất

    									</a>
    								</h3><!-- End .widget-title -->

    								<div class="collapse show" id="widget-4">
    									<div class="widget-body">
    										<div class="filter-items">

    											@foreach ($brands as $brand)


    											<div class="filter-item">
    												<div class="custom-control custom-radio">
    													<input type="radio" class="custom-control-input" name="product_company" value="{{$brand->id}}" id="brand-{{$brand->id}}">
    													<label class="custom-control-label" for="brand-{{$brand->id}}">{{$brand->company_name}}</label>
    												</div><!-- End .custom-checkbox -->
    											</div><!-- End .filter-item -->



    											@endforeach







    										</div><!-- End .filter-items -->
    									</div><!-- End .widget-body -->
    								</div><!-- End .collapse -->
    							</div><!-- End .widget -->

    							<div class="widget widget-collapsible">
    								<h3 class="widget-title">
    									<a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
    										Giá cả
    									</a>
    								</h3><!-- End .widget-title -->

    								<div class="collapse show" id="widget-5">
    									<div class="widget-body">
    										<div class="filter-price">
    											<div class="filter-price-text">
    												Khoảng giá:
    												<span id="filter-price-range"></span>
    											</div><!-- End .filter-price-text -->

    											<!-- 
    											<div class="slider">


    												<div id="price-slider"></div>
    											</div> -->

    											<div class="slidecontainer mb-3">
    												<input type="range" min="{{$minPrice}}" max="{{$maxPrice}}" value="{{$maxPrice}}" step="100" class="slider" name="slider_price" id="myRange">
    											</div>
    											<div class="row">
													<div class="col-md-6">
														Thấp nhất (đ)
														<input type="number" min="{{$minPrice}}"  value="{{$minPrice}}" class="form-control" placeholder="min" name="min_price" id="min_price" >
													</div>
														
    												<div class="col-md-6">
														Cao nhất (đ)
														<input type="number" min="{{$minPrice}}" value="{{$maxPrice}}" class="form-control" placeholder="max" name="max_price" id="max_price" >
													</div>
    											</div>





    										</div><!-- End .widget-body -->
    									</div><!-- End .collapse -->
    								</div><!-- End .widget -->










    								<button type="submit" class="btn btn-primary">Tiến hành lọc</button>


    							</div><!-- End .sidebar sidebar-shop -->
    					</aside><!-- End .col-lg-3 -->



    				</div><!-- End .row -->

    			</form>
    		</div><!-- End .container -->
    	</div><!-- End .page-content -->
    </main><!-- End .main -->
    @endsection


