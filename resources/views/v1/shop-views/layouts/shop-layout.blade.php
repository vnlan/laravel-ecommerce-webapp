<!DOCTYPE html>
<html lang="en">


<!-- molla/index-4.html  22 Nov 2019 09:53:08 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <title>Molla - Bootstrap eCommerce Template</title> -->
    @yield('v1-shop-title')
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Molla - Bootstrap eCommerce Template">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('v1/themes/molla-shop-template/assets/images/icons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('v1/themes/molla-shop-template/assets/images/icons/favicon-32x32.png')}} ">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('v1/themes/molla-shop-template/assets/images/icons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('v1/themes/molla-shop-template/assets/images/icons/site.html')}} ">
    <link rel="mask-icon" href="{{asset('v1/themes/molla-shop-template/assets/images/icons/safari-pinned-tab.svg')}}" color="#666666">
    <link rel="shortcut icon" href="{{asset('v1/themes/molla-shop-template/assets/images/icons/favicon.ico')}} ">
    <meta name="apple-mobile-web-app-title" content="Molla">
    <meta name="application-name" content="Molla">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('v1/themes/molla-shop-template/assets/images/icons/browserconfig.xml')}} ">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{asset('v1/themes/molla-shop-template/assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css')}} ">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('v1/themes/molla-shop-template/assets/css/bootstrap.min.css')}} ">
    <link rel="stylesheet" href="{{asset('v1/themes/molla-shop-template/assets/css/plugins/owl-carousel/owl.carousel.css')}} ">
    <link rel="stylesheet" href="{{asset('v1/themes/molla-shop-template/assets/css/plugins/magnific-popup/magnific-popup.css')}} ">
    <link rel="stylesheet" href="{{asset('v1/themes/molla-shop-template/assets/css/plugins/jquery.countdown.css')}} ">
    <link rel="stylesheet" href="{{asset('v1/themes/molla-shop-template/assets/css/plugins/nouislider/nouislider.css')}}">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('v1/themes/molla-shop-template/assets/css/style-custom-new.css')}} ">

    <link rel="stylesheet" href="{{asset('v1/themes/molla-shop-template/assets/css/skins/skin-demo-4-custom-new.css')}} ">
    <link rel="stylesheet" href="{{asset('v1/themes/molla-shop-template/assets/css/demos/demo-4-custom-new.css')}} ">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('v1-shop-css')
</head>

<body>
    <div class="page-wrapper">

        @include('v1.shop-views.partials.header')



        @yield('v1-shop-content')

        @include('v1.shop-views.partials.footer')






    </div><!-- End .page-wrapper -->
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    @include('v1.shop-views.partials.mobile-menu')

    <!-- Sign in / Register Modal -->
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Đăng nhập</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Đăng ký</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="{{route('shop.auth.login')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="singin-email">Email *</label>
                                            <input type="email" class="form-control" id="singin-email" name="email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="singin-password">Mật khẩu *</label>
                                            <input type="password" class="form-control" id="singin-password" name="password" required>
                                        </div><!-- End .form-group -->
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">Ghi nhớ đăng nhập</label>
                                        </div><!-- End .custom-checkbox -->


                                        <div class="form-footer">


                                            <button type="submit" class="btn btn-outline-primary-2">

                                                <span style="font-size: 16px;">Đăng nhập</span>
                                                <!-- <i class="icon-long-arrow-right"></i> -->
                                            </button>


                                            <!-- <a href="#" class="forgot-link">Forgot Your Password?</a> -->
                                        </div><!-- End .form-footer -->
                                    </form>
                                    <div class="form-choice">
                                        <p class="text-center">Hoặc đăng nhập với</p>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-g">
                                                    <i class="icon-google"></i>
                                                    Google
                                                </a>
                                            </div><!-- End .col-6 -->
                                            <div class="col-sm-6">
                                                <a href="#" class="btn btn-login btn-f">
                                                    <i class="icon-facebook-f"></i>
                                                    Facebook
                                                </a>
                                            </div><!-- End .col-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .form-choice -->
                                </div><!-- .End .tab-pane -->
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="{{route('shop.auth.register')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="register-email">Email *</label>
                                            <input type="email" name="email" class="form-control" placeholder="Nhập email" id="register-email" name="register-email" required>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="register-password">Mật khẩu *</label>
                                            <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" id="register-password" name="register-password" required>
                                        </div><!-- End .form-group -->

                                        <label>Họ và tên *</label>
                                        <input type="text" name="display_name" placeholder="Nhập họ và tên" class="form-control" required>
                                        
                                        <label>Số điện thoại*</label>
                                        <input type="tel" name="phone" placeholder="Nhập số điện thoại" class="form-control" required>
                                        
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>Ngày sinh * </label>
                                                <input type="date" name="dob" placeholder="Nhập ngày sinh" class="form-control" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Giới tính *</label>
                                                <select name="gender" class="form-control">
                                                    <option value="0">Nam</option>
                                                    <option value="1">Nữ</option>
                                                </select>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                      


                                        <label>Địa chỉ *</label>
                                        <textarea class="form-control" name="address" rows="4" placeholder="Nhập địa chỉ" required></textarea>


                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">Tôi đồng ý với <a href="#">Chính sách bảo mật</a> *</label>
                                        </div><!-- End .custom-checkbox -->

                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span style="font-size: 16px;;">Đăng kí ngay</span>
                                        </button>
                                    </form>
                           
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->


    <!-- Plugins JS File -->
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/jquery.waypoints.min.js')}} "></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/superfish.min.js')}} "></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/owl.carousel.min.js')}} "></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/bootstrap-input-spinner.js')}} "></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/jquery.plugin.min.js')}} "></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/jquery.magnific-popup.min.js')}} "></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/nouislider.min.js')}}"></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/wNumb.js')}}"></script>
    <!-- Main JS File -->
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/main.js')}} "></script>
    <script src="{{asset('v1/themes/molla-shop-template/assets/js/demos/demo-4.js')}} "></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @if (session('success'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: 'success',
            title: "{{ Session::get('success') }}"
        })
    </script>
    @endif

    @if (session('error'))
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: 'error',
            title: "{{ Session::get('error') }}"
        })
    </script>
    @endif

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <script>
        Swal.fire({
            toast: true,
            position: 'top-right',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast'
            },
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            icon: 'error',
            title: "{{ Session::get('error') }}"
        })
    </script>

    @endforeach
    @endif
    @yield('v1-shop-js')
</body>


<!-- molla/index-4.html  22 Nov 2019 09:54:18 GMT -->

</html>