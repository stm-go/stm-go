<!doctype html>
<html lang="en">

<head>

   

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="@yield('meta-description')">
	<meta name="keywords" content="@yield('meta-keywords')">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="google-site-verification" content="gNVJCgt1iBa3zHwQJlza2UJCsRoVPS9wKLMOtmPm328" />

    <!--====== Title ======-->
    <title>{{ $setting->website_title }}</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('assets/front/img/'.$setting->fav_icon) }}" type="image/png">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/plugin.css">

    @if(request()->path() == 'products')  
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/jquery-ui.css">
    @endif

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/new.css">
    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/dynamic-css.css">

    @yield('style')

    @if(request()->path() != '/')
    <style>
        .site-logo a img{
            filter: brightness(0) invert(1);
        }
    </style>
    @endif

   
    @if ($setting->is_dark == '1')
        <link rel="stylesheet" href="{{ asset('/') }}assets/front/css/dark.css">
    @endif

    @if($currentLang->direction == 'rtl')
	<!-- RTL css -->
	<link rel="stylesheet" href="{{ asset('/') }}assets/front/css/rtl.css">
	@endif

    <link rel="stylesheet" href="{{ asset('assets/front/') }}/css/dynamic-css.php?color={{ $commonsetting->base_color }}&gcolor1={{ $commonsetting->gcolor1 }}&gcolor2={{ $commonsetting->gcolor2 }}&gcolor3={{ $commonsetting->gcolor3 }}">


</head>

<body class="  @if(Request::is('/'))  @else innerpage @endif @if($commonsetting->theme_version == 'theme7' || $commonsetting->theme_version == 'theme8' ) gradint_body @endif">
 
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQ8FT3Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
    @if ($visibility->is_preloader)
        <!--====== PRELOADER PART START ======-->
        <div id="preloader" style="background-color: {{ $commonsetting->preloader_bg_color }}">
            <div class="image">
                <img src="{{asset('assets/front/img/'. $commonsetting->preloader_icon )}}" alt="">
            </div>
        </div>
        <!--====== PRELOADER PART START ======-->
    @endif


    <!--====== HEADER PART START ======-->

    @include('front.partials.menu')

    <!--====== HEADER PART ENDS ======-->



	@yield('content')

     <!--    announcement banner section start   -->
    <a class="announcement-banner absulute" href="{{asset('assets/front/img/'.$setting->announcement)}}"></a>
    <!--    announcement banner section end   --> 

    <!--====== footer PART START ======-->

    @include('front.partials.footer')

    <!--====== footer PART ENDS ======-->

    {{-- Whatsapp Footer --}}
	<a href="https://api.whatsapp.com/send?l=pt&amp;phone=554430267597"><img src="assets/front/images/whats.png" style="height:60px; position:fixed; bottom: 22px; right: 22px; z-index:1000;" data-selector="img"></a>
   
    {{-- Quick Call Area  End--}}
    <!--====== BACK TO TOP ======-->
    <div class="back-to-top">
        <a href="#"> <i class="fas fa-arrow-up"></i> </a>
    </div>
    <!--====== BACK TO TOP ======-->



	{{-- Cookie alert dialog start --}}
	@if ($visibility->is_cooki_alert == 1)
		@include('cookieConsent::index')
	@endif
	{{-- Cookie alert dialog end --}}

    <input type="hidden" id="main_url" value="{{ route('front.index') }}">

    @php
        $mainbs = [];
        $mainbs['is_announcement'] = $setting->is_announcement;
        $mainbs['announcement_delay'] = $setting->announcement_delay;
        $mainbs['slider_overlay'] = $commonsetting->slider_overlay;
        $mainbs = json_encode($mainbs);
    @endphp

    <script>
        var mainbs = {!! $mainbs !!};
    </script>

    <!--====== jquery js ======-->
    <script src="{{ asset('assets/front/') }}/js/plugin.js"></script>

    @if(request()->path() == 'products')  
    <script src="{{ asset('assets/front/') }}/js/jquery-ui.js"></script>
    @endif

    <!--====== Main js ======-->
    <script src="{{ asset('assets/front/') }}/js/main.js"></script>
    <script src="{{ asset('assets/front/') }}/js/main2.js"></script>
    <script src="{{ asset('assets/front/') }}/js/product.js"></script>

    @yield('script')



@if($visibility->is_tawk_to	== 1)
{!!  $commonsetting->tawk_to !!}
@endif


@if($visibility->is_messenger	== 1)
{!!  $commonsetting->messenger !!}
@endif


@if (session()->has('success'))
    <script>
        $(function() {
            // Form Submit Success Message alert
            $message = '{{session('success')}}';

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            
            Toast.fire({
                icon: 'success',
                title: $message
            })
        });
    </script>
@endif

@if (session()->has('warning'))
    <script>
        $(function() {
            // Form Submit Success Message alert
            $message = '{{session('warning')}}';

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            
            Toast.fire({
                icon: 'warning',
                title: $message
            })
        });
    </script>
@endif

@if (session()->has('error'))
    <script>
        $(function() {
            // Form Submit Success Message alert
            $message = '{{session('error')}}';

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            
            Toast.fire({
                icon: 'error',
                title: $message
            })
        });
    </script>
@endif
	
	 <!--Start of Google Analytics script-->
    @if ($visibility->is_google_analytics == 1)
    {!! $commonsetting->google_analytics!!}
    @endif
    <!--End of Google Analytics script-->
	
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WQ8FT3Z');</script>
	<!-- End Google Tag Manager -->

</body>

</html>
