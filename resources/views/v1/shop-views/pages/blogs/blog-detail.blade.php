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
        			<h1 class="page-title">Chi tiết bài viết</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="/blogs">Bài viết</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Chi tiết</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-9">
                            <article class="entry single-entry">
                                <figure class="entry-media">
                                    <img src="{{optional($blog)->avatar_path}}" alt="image desc">
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <span class="entry-author">
                                            Người viết: <a href="#">{{$blog->employee->display_name}}</a>
                                        </span>
                                        <span class="meta-separator">|</span>
                                        <a href="#">{{$blog->created_at}}</a>
                                   
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        {{$blog->title}}.
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                        Danh mục: <a href="#">{{$blog->blog_category}}</a>
                                    
                                    </div><!-- End .entry-cats -->

                                    <div class="entry-content editor-content">
                                      {!! $blog->content !!}
                                    </div><!-- End .entry-content -->

                                    <div class="entry-footer row no-gutters flex-column flex-md-row">
                                        <!-- <div class="col-md">
                                            <div class="entry-tags">
                                                <span>Tags:</span> <a href="#">photography</a> <a href="#">style</a>
                                            </div>
                                        </div> -->

                                        <div class="col-md-auto mt-2 mt-md-0">
                                            <div class="social-icons social-icons-color">
                                                <span class="social-label">Chia sẻ bài viết:</span>
                                                <a href="#" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                                <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                                <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                                <a href="#" class="social-icon social-linkedin" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
                                            </div><!-- End .soial-icons -->
                                        </div><!-- End .col-auto -->
                                    </div><!-- End .entry-footer row no-gutters -->
                                </div><!-- End .entry-body -->

                                <div class="entry-author-details">
                                    <figure class="author-media">
                                        <a href="#">
                                            <img src="{{optional($blog)->employee->avatar_path}}" class="img-fit" alt="User name">
                                        </a>
                                    </figure><!-- End .author-media -->

                                    <div class="author-body">
                                        <div class="author-header row no-gutters flex-column flex-md-row">
                                            <div class="col">
                                                <h4><a href="#">{{$blog->employee->display_name}}</a></h4>
                                            </div><!-- End .col -->
                                            <div class="col-auto mt-1 mt-md-0">
                                                <a href="#" class="author-link">Xem thêm bài viết của  {{$blog->employee->display_name}}<i class="icon-long-arrow-right"></i></a>
                                            </div><!-- End .col -->
                                        </div><!-- End .row -->

                                        <div class="author-content">
                                            <p>Người viết bài - nhà sáng tạo nội dung website </p>
                                        </div><!-- End .author-content -->
                                    </div><!-- End .author-body -->
                                </div><!-- End .entry-author-details-->
                            </article><!-- End .entry -->



                            <div class="reply">
                                <div class="heading">
                                    <h3 class="title">Để lại bình luận</h3><!-- End .title -->
                                    <p class="title-desc">Thông tin của bạn được bảo mật. Trường dấu * là bắt buộc</p>
                                </div><!-- End .heading -->

                                <form action="#">
                                    <label for="reply-message" class="sr-only">Bình luận *</label>
                                    <textarea name="reply-message" id="reply-message" cols="30" rows="4" class="form-control" required placeholder="Bình luận"></textarea>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="reply-name" class="sr-only">Họ tên *</label>
                                            <input type="text" class="form-control" id="reply-name" name="reply-name" required placeholder="Họ tên">
                                        </div><!-- End .col-md-6 -->

                                        <div class="col-md-6">
                                            <label for="reply-email" class="sr-only">Email *</label>
                                            <input type="email" class="form-control" id="reply-email" name="reply-email" required placeholder="Email">
                                        </div><!-- End .col-md-6 -->
                                    </div><!-- End .row -->

                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>Thêm bình luận</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- End .reply -->
                		</div><!-- End .col-lg-9 -->

                		<aside class="col-lg-3">
                			<div class="sidebar">
                				<div class="widget widget-search">
                                    <h3 class="widget-title">Tìm kiếm</h3><!-- End .widget-title -->

                                    <form action="#">
                                        <label for="ws" class="sr-only">Search in blog</label>
                                        <input type="search" class="form-control" name="ws" id="ws" placeholder="Tìm kiếm trong bài viết" required>
                                        <button type="submit" class="btn"><i class="icon-search"></i><span class="sr-only">Tìm kiếm</span></button>
                                    </form>
                				</div><!-- End .widget -->

        

                                <div class="widget">
                                    <h3 class="widget-title">Bài viết khác</h3><!-- End .widget-title -->

                                    <ul class="posts-list">
                                        @foreach ($randomBlogs as $randomBlog)
                                            
                                        <li>
                                            <figure>
                                                <a href="{{route('shop.blogs.detail',['id' => $randomBlog->id])}}">
                                                    <img src="{{optional($randomBlog)->avatar_path}}" alt="post">
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
                                    
                                    <div class="banner-sidebar">
                                        <a href="#">
                                            <img src="https://laz-img-sg.alicdn.com/p/f03c8beb7fa185eaaf18fdc86e548237.jpg" alt="banner">
                                        </a>
                                    </div><!-- End .banner-ad -->
                                </div><!-- End .widget -->

        

                                <div class="widget widget-text">
                                    <h3 class="widget-title">Về bài viết</h3><!-- End .widget-title -->

                                    <div class="widget-text-content">
                                        <p>Blog là nơi chia sẻ nhũng kiến thức, kinh nghiệm và trải nghiệm về lĩnh vực đồng hồ của chúng tôi.
                                             Hi vọng có thể giúp ích cho bạn trong việc lựa chọn đồng hồ phù hợp</p>
                                    </div><!-- End .widget-text-content -->
                                </div><!-- End .widget -->
                			</div><!-- End .sidebar sidebar-shop -->
                		</aside><!-- End .col-lg-3 -->
                	</div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

@endsection