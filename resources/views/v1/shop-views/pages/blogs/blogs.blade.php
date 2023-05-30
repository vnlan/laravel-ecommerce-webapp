@extends('v1.shop-views.layouts.shop-layout')

@section('v1-shop-title')
<title>Blogs</title>
@endsection


@section('v1-shop-css')
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/hide-input-file.css') }}">
</link>
<link rel="stylesheet" href="{{ asset('v1/resources/css/admin-page/reuseable/color-toast.css') }}">
@endsection

@section('v1-shop-content')

<main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Bài viết</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="/blogs">Bài viết</a></li>
                       
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">

                        @foreach ($blogs as $blog)
                            
                      
                            <article class="entry entry-list">
                                <div class="row align-items-center">
                                    <div class="col-md-5">
                                        <figure class="entry-media">
                                            <a href="{{route('shop.blogs.detail',['id' => $blog->id])}}">
                                                <img src="{{$blog->avatar_path}}" alt="image desc">
                                            </a>
                                        </figure><!-- End .entry-media -->
                                    </div><!-- End .col-md-5 -->

                                    <div class="col-md-7">
                                        <div class="entry-body">
                                            <div class="entry-meta">
                                                <span class="entry-author">
                                                    bởi <a href="#">{{$blog->employee->display_name}}</a>
                                                </span>
                                                <span class="meta-separator">|</span>
                                                <a href="#">{{$blog->created_at}}</a>
                                               
                                            </div><!-- End .entry-meta -->

                                            <h2 class="entry-title">
                                                <a href="{{route('shop.blogs.detail',['id' => $blog->id])}}">{{$blog->title}}</a>
                                            </h2><!-- End .entry-title -->

                                            <div class="entry-cats">
                                               
                                                <a href="#">{{$blog->blog_category}}</a>
                                            </div><!-- End .entry-cats -->

                                            <div class="entry-content">
                                                <p>{{$blog->short_description}} </p>
                                                <a href="{{route('shop.blogs.detail',['id' => $blog->id])}}" class="read-more">Tiếp tục đọc</a>
                                            </div><!-- End .entry-content -->
                                        </div><!-- End .entry-body -->
                                    </div><!-- End .col-md-7 -->
                                </div><!-- End .row -->
                            </article><!-- End .entry -->

                            @endforeach



                			<nav aria-label="Page navigation">
                            {{ $blogs->links('pagination::bootstrap-4') }}   
							</nav>
                		</div><!-- End .col-lg-9 -->

                		<aside class="col-lg-3">
                			<div class="sidebar">
                				<div class="widget widget-search">
                                    <h3 class="widget-title">Tìm kiếm</h3><!-- End .widget-title -->

                                    <form action="#">
                                        <label for="ws" class="sr-only">Tìm kiếm trong blogs</label>
                                        <input type="search" class="form-control" name="ws" id="ws" placeholder="Tìm kiếm trong blog" required>
                                        <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Tìm kiếm</span></button>
                                    </form>
                				</div><!-- End .widget -->
<!-- 
                                <div class="widget widget-cats">
                                    <h3 class="widget-title">Categories</h3>

                                    <ul>
                                        <li><a href="#">Lifestyle<span>3</span></a></li>
                                        <li><a href="#">Shopping<span>3</span></a></li>
                                        <li><a href="#">Fashion<span>1</span></a></li>
                                        <li><a href="#">Travel<span>3</span></a></li>
                                        <li><a href="#">Hobbies<span>2</span></a></li>
                                    </ul>
                                </div> -->

                                <div class="widget">
                                    <h3 class="widget-title">Bài viết khác</h3><!-- End .widget-title -->

                                    <ul class="posts-list">
                                        @foreach ($randomBlogs as $randomBlog)
                                            
                                       
                                        <li>
                                            <figure>
                                                <a href="{{route('shop.blogs.detail',['id' => $randomBlog->id])}}">
                                                    <img src="{{$randomBlog->avatar_path}}" alt="post">
                                                </a>
                                            </figure>

                                            <div>
                                                <span>{{$randomBlog->created_at}}</span>
                                                <h4><a href="{{route('shop.blogs.detail',['id' => $randomBlog->id])}}">{{$randomBlog->title}}</a></h4>
                                            </div>
                                        </li>
                                        @endforeach
                                    </ul><!-- End .posts-list -->
                                </div><!-- End .widget -->

                                <div class="widget widget-banner-sidebar">
                                    <div class="banner-sidebar-title">Mua sắm ngay hôm nay</div><!-- End .ad-title -->
                                    
                                    <div class="banner-sidebar banner-overlay">
                                        <a href="/">
                                            <img src="https://laz-img-sg.alicdn.com/p/f03c8beb7fa185eaaf18fdc86e548237.jpg" alt="banner">
                                        </a>
                                    </div><!-- End .banner-ad -->
                                </div><!-- End .widget -->

                               

                                <div class="widget widget-text">
                                    <h3 class="widget-title">Về Bài viết</h3><!-- End .widget-title -->

                                    <div class="widget-text-content">
                                        <p>Blog là nơi chia sẻ nhũng kiến thức, kinh nghiệm và trải nghiệm về lĩnh vực đồng hồ của chúng tôi.
                                             Hi vọng có thể giúp ích cho bạn trong việc lựa chọn đồng hồ phù hợp</p>
                                    </div><!-- End .widget-text-content -->
                                </div><!-- End .widget -->
                			</div><!-- End .sidebar -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection