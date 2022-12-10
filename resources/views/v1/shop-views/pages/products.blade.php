    @extends('v1.shop-views.layouts.shop-layout')

    @section('v1-shop-title')
    <title>Sản phẩm</title>
    @endsection


    @section('v1-shop-css')
    <link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/hide-input-file.css') }}">
    </link>
    <link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/color-toast.css') }}">
    @endsection

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
    											<a href="#">
    												@foreach ($product->categories as $category)
    												{{$category->name}},
    												@endforeach
    											</a>
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
    							<label>Filters:</label>
    							<a href="#" class="sidebar-filter-clear">Clean All</a>
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
    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="cat-1">
    												<label class="custom-control-label" for="cat-1">Dresses</label>
    											</div><!-- End .custom-checkbox -->
    											<span class="item-count">3</span>
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="cat-2">
    												<label class="custom-control-label" for="cat-2">T-shirts</label>
    											</div><!-- End .custom-checkbox -->
    											<span class="item-count">0</span>
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="cat-3">
    												<label class="custom-control-label" for="cat-3">Bags</label>
    											</div><!-- End .custom-checkbox -->
    											<span class="item-count">4</span>
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="cat-4">
    												<label class="custom-control-label" for="cat-4">Jackets</label>
    											</div><!-- End .custom-checkbox -->
    											<span class="item-count">2</span>
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="cat-5">
    												<label class="custom-control-label" for="cat-5">Shoes</label>
    											</div><!-- End .custom-checkbox -->
    											<span class="item-count">2</span>
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="cat-6">
    												<label class="custom-control-label" for="cat-6">Jumpers</label>
    											</div><!-- End .custom-checkbox -->
    											<span class="item-count">1</span>
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="cat-7">
    												<label class="custom-control-label" for="cat-7">Jeans</label>
    											</div><!-- End .custom-checkbox -->
    											<span class="item-count">1</span>
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="cat-8">
    												<label class="custom-control-label" for="cat-8">Sportwear</label>
    											</div><!-- End .custom-checkbox -->
    											<span class="item-count">0</span>
    										</div><!-- End .filter-item -->
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
    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="brand-1">
    												<label class="custom-control-label" for="brand-1">Next</label>
    											</div><!-- End .custom-checkbox -->
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="brand-2">
    												<label class="custom-control-label" for="brand-2">River Island</label>
    											</div><!-- End .custom-checkbox -->
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="brand-3">
    												<label class="custom-control-label" for="brand-3">Geox</label>
    											</div><!-- End .custom-checkbox -->
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="brand-4">
    												<label class="custom-control-label" for="brand-4">New Balance</label>
    											</div><!-- End .custom-checkbox -->
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="brand-5">
    												<label class="custom-control-label" for="brand-5">UGG</label>
    											</div><!-- End .custom-checkbox -->
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="brand-6">
    												<label class="custom-control-label" for="brand-6">F&F</label>
    											</div><!-- End .custom-checkbox -->
    										</div><!-- End .filter-item -->

    										<div class="filter-item">
    											<div class="custom-control custom-checkbox">
    												<input type="checkbox" class="custom-control-input" id="brand-7">
    												<label class="custom-control-label" for="brand-7">Nike</label>
    											</div><!-- End .custom-checkbox -->
    										</div><!-- End .filter-item -->

    									</div><!-- End .filter-items -->
    								</div><!-- End .widget-body -->
    							</div><!-- End .collapse -->
    						</div><!-- End .widget -->

    						<div class="widget widget-collapsible">
    							<h3 class="widget-title">
    								<a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
    									Price
    								</a>
    							</h3><!-- End .widget-title -->

    							<div class="collapse show" id="widget-5">
    								<div class="widget-body">
    									<div class="filter-price">
    										<div class="filter-price-text">
    											Price Range:
    											<span id="filter-price-range"></span>
    										</div><!-- End .filter-price-text -->

    										<div id="price-slider"></div><!-- End #price-slider -->
    									</div><!-- End .filter-price -->
    								</div><!-- End .widget-body -->
    							</div><!-- End .collapse -->
    						</div><!-- End .widget -->
    					</div><!-- End .sidebar sidebar-shop -->
    				</aside><!-- End .col-lg-3 -->
    			</div><!-- End .row -->
    		</div><!-- End .container -->
    	</div><!-- End .page-content -->
    </main><!-- End .main -->
    @endsection