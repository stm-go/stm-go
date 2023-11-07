<!doctype html>
<html lang="en">

<head>

   

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="<?php echo $__env->yieldContent('meta-description'); ?>">
	<meta name="keywords" content="<?php echo $__env->yieldContent('meta-keywords'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<meta name="google-site-verification" content="gNVJCgt1iBa3zHwQJlza2UJCsRoVPS9wKLMOtmPm328" />

    <!--====== Title ======-->
    <title><?php echo e($setting->website_title); ?></title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo e(asset('assets/front/img/'.$setting->fav_icon)); ?>" type="image/png">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="<?php echo e(asset('assets/front/')); ?>/css/plugin.css">

    <?php if(request()->path() == 'products'): ?>  
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/')); ?>/css/jquery-ui.css">
    <?php endif; ?>

    <!--====== Style css ======-->
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/')); ?>/css/style.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/')); ?>/css/new.css">
    <link rel="stylesheet" href="<?php echo e(asset('assets/front/')); ?>/css/dynamic-css.css">

    <?php echo $__env->yieldContent('style'); ?>

    <?php if(request()->path() != '/'): ?>
    <style>
        .site-logo a img{
            filter: brightness(0) invert(1);
        }
    </style>
    <?php endif; ?>

   
    <?php if($setting->is_dark == '1'): ?>
        <link rel="stylesheet" href="<?php echo e(asset('/')); ?>assets/front/css/dark.css">
    <?php endif; ?>

    <?php if($currentLang->direction == 'rtl'): ?>
	<!-- RTL css -->
	<link rel="stylesheet" href="<?php echo e(asset('/')); ?>assets/front/css/rtl.css">
	<?php endif; ?>

    <link rel="stylesheet" href="<?php echo e(asset('assets/front/')); ?>/css/dynamic-css.php?color=<?php echo e($commonsetting->base_color); ?>&gcolor1=<?php echo e($commonsetting->gcolor1); ?>&gcolor2=<?php echo e($commonsetting->gcolor2); ?>&gcolor3=<?php echo e($commonsetting->gcolor3); ?>">


</head>

<body class="  <?php if(Request::is('/')): ?>  <?php else: ?> innerpage <?php endif; ?> <?php if($commonsetting->theme_version == 'theme7' || $commonsetting->theme_version == 'theme8' ): ?> gradint_body <?php endif; ?>">
 
	<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WQ8FT3Z"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
	
    <?php if($visibility->is_preloader): ?>
        <!--====== PRELOADER PART START ======-->
        <div id="preloader" style="background-color: <?php echo e($commonsetting->preloader_bg_color); ?>">
            <div class="image">
                <img src="<?php echo e(asset('assets/front/img/'. $commonsetting->preloader_icon )); ?>" alt="">
            </div>
        </div>
        <!--====== PRELOADER PART START ======-->
    <?php endif; ?>


    <!--====== HEADER PART START ======-->

    <?php echo $__env->make('front.partials.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--====== HEADER PART ENDS ======-->



	<?php echo $__env->yieldContent('content'); ?>

     <!--    announcement banner section start   -->
    <a class="announcement-banner absulute" href="<?php echo e(asset('assets/front/img/'.$setting->announcement)); ?>"></a>
    <!--    announcement banner section end   --> 

    <!--====== footer PART START ======-->

    <?php echo $__env->make('front.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!--====== footer PART ENDS ======-->

    
	<a href="https://api.whatsapp.com/send?l=pt&amp;phone=554430267597"><img src="assets/front/images/whats.png" style="height:60px; position:fixed; bottom: 22px; right: 22px; z-index:1000;" data-selector="img"></a>
   
    
    <!--====== BACK TO TOP ======-->
    <div class="back-to-top">
        <a href="#"> <i class="fas fa-arrow-up"></i> </a>
    </div>
    <!--====== BACK TO TOP ======-->



	
	<?php if($visibility->is_cooki_alert == 1): ?>
		<?php echo $__env->make('cookieConsent::index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php endif; ?>
	

    <input type="hidden" id="main_url" value="<?php echo e(route('front.index')); ?>">

    <?php
        $mainbs = [];
        $mainbs['is_announcement'] = $setting->is_announcement;
        $mainbs['announcement_delay'] = $setting->announcement_delay;
        $mainbs['slider_overlay'] = $commonsetting->slider_overlay;
        $mainbs = json_encode($mainbs);
    ?>

    <script>
        var mainbs = <?php echo $mainbs; ?>;
    </script>

    <!--====== jquery js ======-->
    <script src="<?php echo e(asset('assets/front/')); ?>/js/plugin.js"></script>

    <?php if(request()->path() == 'products'): ?>  
    <script src="<?php echo e(asset('assets/front/')); ?>/js/jquery-ui.js"></script>
    <?php endif; ?>

    <!--====== Main js ======-->
    <script src="<?php echo e(asset('assets/front/')); ?>/js/main.js"></script>
    <script src="<?php echo e(asset('assets/front/')); ?>/js/main2.js"></script>
    <script src="<?php echo e(asset('assets/front/')); ?>/js/product.js"></script>

    <?php echo $__env->yieldContent('script'); ?>



<?php if($visibility->is_tawk_to	== 1): ?>
<?php echo $commonsetting->tawk_to; ?>

<?php endif; ?>


<?php if($visibility->is_messenger	== 1): ?>
<?php echo $commonsetting->messenger; ?>

<?php endif; ?>


<?php if(session()->has('success')): ?>
    <script>
        $(function() {
            // Form Submit Success Message alert
            $message = '<?php echo e(session('success')); ?>';

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
<?php endif; ?>

<?php if(session()->has('warning')): ?>
    <script>
        $(function() {
            // Form Submit Success Message alert
            $message = '<?php echo e(session('warning')); ?>';

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
<?php endif; ?>

<?php if(session()->has('error')): ?>
    <script>
        $(function() {
            // Form Submit Success Message alert
            $message = '<?php echo e(session('error')); ?>';

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
<?php endif; ?>
	
	 <!--Start of Google Analytics script-->
    <?php if($visibility->is_google_analytics == 1): ?>
    <?php echo $commonsetting->google_analytics; ?>

    <?php endif; ?>
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
<?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/front/layout.blade.php ENDPATH**/ ?>