
<?php $__env->startSection('meta-keywords', "$seo->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$seo->meta_description"); ?>
<?php $__env->startSection('content'); ?>


    <?php if($extra_visibility->is_t7_slider_section == 1): ?>
        <!--====== Banner Slider Start ======-->
        <?php if($visibility->is_video_hero == 1): ?>
            <section id="herovideo" class="banner-section-three theme7" style="background-image: url(<?php echo e(asset('assets/front/img/'.$sinfo->hero_bg_image )); ?>);">
                <div id="bgndVideo" data-property="{videoURL:'<?php echo e($commonsetting->hero_section_video_link); ?>',containment:'#herovideo', quality:'large', autoPlay:true, loop:true, mute:true, opacity:1}"></div>
                <div class="overlay">
                    <div class="container position-relative">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div class="banner-content text-center">
                                    <span class="title-tag wow fadeInDown" data-wow-delay="0.3s"><?php echo e($sinfo->hero_sub_title); ?></span>
                                    <h1 class="title wow fadeInLeft" data-wow-delay="0.5s"><?php echo e($sinfo->hero_title); ?></h1>
                                    <p class="wow fadeInUp" data-wow-delay="0.7s"><?php echo e($sinfo->hero_text); ?></p>
                                    <ul class="banner-btns">
                                        <li class="wow fadeInUp" data-wow-delay="0.7s">
                                            <a class="main-btn rounded-btn" href="<?php echo e(route('front.quot')); ?>"><?php echo e(__('Gate A Quote')); ?></a>
                                        </li>
                                        <li class="wow fadeInUp" data-wow-delay="0.8s">
                                            <a class="main-btn transparent-border-btn rounded-btn" href="<?php echo e(route('front.about')); ?>"><?php echo e(__('Learn More')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="gradint-slider" style="background-image: url(<?php echo e(asset('assets/front/img/'.$sinfo->hero_bg_image )); ?>">
                <div class="banner-slider banner-slider-one banner-slider-active" >
                    <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="single-banner">
                        <div class="container-fluid container-1470">
                            <div class="row align-items-center">
                                <div class="col-lg-7">
                                    <div class="banner-text">
                                        <div class="banner-content">
                                            <span data-animation="fadeInUp" data-delay="0.3s" class="title-tag">
                                                <?php echo e($item->subtitle); ?>

                                            </span>
                                            <h1 data-animation="fadeInLeft" data-delay="0.6s" class="title">
                                                <?php echo e($item->title); ?>

                                            </h1>
                                            <p data-animation="fadeInLeft" data-delay=".9s">
                                                <?php echo e($item->text); ?>

                                            </p>
                                            <a data-animation="fadeInUp" data-delay="1.1s" class="main-btn rounded-btn icon-right small-size" href="<?php echo e($item->button_link); ?>">
                                                <?php echo e($item->button_text); ?> <i class="fal fa-long-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-5 d-none d-lg-block">
                                    <div class="banner-img" data-animation="fadeInRight" data-delay="0.5s">
                                        <img src="<?php echo e(asset('assets/front/img/slider/'.$item->image)); ?>" alt="Banner">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                   <!-- Shape Bottom -->
                
            </section>
        <?php endif; ?>
        <!--====== Banner Slider End ======-->
    <?php endif; ?>

    <?php if($extra_visibility->is_t7_video_section == 1): ?>
        <section class="video-section-new section-gap-top">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6 col-md-10 wow fadeInLeft " data-wow-delay="0.3s">
                        <div class="intro-thumb mt-md-gap-60">
                            <img src="<?php echo e(asset('assets/front/img/'.$sinfo->video_image)); ?>" alt="">
                            <a class="video-popup" href="<?php echo e($sinfo->video_link); ?>"><i class="fas fa-play"></i></a>
                        </div> <!-- intro thumb -->
                    </div>
                    <div class="col-lg-6 col-md-10 wow fadeInRight" data-wow-delay="0.3s">
                        <div class="intro-video-content">
                            <div class="section-title  mb-30">
                                <h2 class="title"><?php echo e($sinfo->video_title); ?></h2>
                            </div><!-- section title -->
                            <p class="text-2 mb-4"><?php echo e($sinfo->video_content); ?></p>
                        </div> <!-- intro video content -->
                        <div class="counter-area-new">
                            <?php $__currentLoopData = $counters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="counter-box-new">
                                    <span class="counter"><?php echo e($item->number); ?></span>
                                    <h6 class="title"><?php echo e($item->title); ?></h6>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                   
                </div> <!-- row -->
            </div> <!-- container -->
        </section>
    <?php endif; ?>


    <?php if($extra_visibility->is_t7_service_section == 1): ?>
        <div class="service-section section-gap-top">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-30">
                            <span class="title-tag"><?php echo e($sinfo->service_sub_title); ?></span>
                            <h2 class="title"><?php echo e($sinfo->service_title); ?></h2>
                        </div><!-- section title -->
                    </div>
                </div> <!-- row -->
                <div class="row service-items justify-content-center">
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 col-sm-8 wow fadeInUp" data-wow-duration=".1s" data-wow-delay=".3s">
                        <a href="<?php echo e(route('front.service.details', $item->slug)); ?>" class="service-item-six text-center mt-30">
                            <div class="service-item-inner">
                               <div class="s-i-main-c">
                                    <div class="icon">
                                        <i class="<?php echo e($item->icon); ?>"></i>
                                    </div>
                                    <h4 class="title"><?php echo e($item->title); ?></h4>
                                    <p><?php echo e((strlen(strip_tags(Helper::convertUtf8($item->content))) > 120) ? substr(strip_tags(Helper::convertUtf8($item->content)), 0, 120) . '...' : strip_tags(Helper::convertUtf8($item->content))); ?></p>
                                    
                               </div>
                            </div>
                        </a> <!-- singke services -->
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
    <?php endif; ?>


    <?php if($extra_visibility->is_t7_portfolio_section == 1): ?>
        <section class="portfolio-area section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-30 wow fadeInUp">
                            <span class="title-tag"><?php echo e($sinfo->portfolio_sub_title); ?></span>
                            <h2 class="title"><?php echo e($sinfo->portfolio_title); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="portfolio-items row">
                    <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6  wow fadeInUp" data-wow-delay="0.3s">
                        <a href="<?php echo e(route('front.portfolio.details', $item->slug)); ?>" class="portfolio-item mt-30">
                            <div class="portfolio-img" style="background-image: url(<?php echo e(asset('assets/front/img/portfolio/'.$item->featured_image)); ?>)">
                            </div>
                            <div class="portfolio-content">
                                <div class="item">
                                    <span class="category"><?php echo e($item->service->title); ?></span>
                                    <h5 class="title"><?php echo e((strlen(strip_tags(Helper::convertUtf8($item->title))) > 40) ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title))); ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>


    <?php if($extra_visibility->is_t7_team_section == 1): ?>
        <section class="team section-gap-bottom" id="team">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center mb-60">
                            <span class="title-tag"><?php echo e($sinfo->team_sub_title); ?></span>
                            <h2 class="title"><?php echo e($sinfo->team_title); ?></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="team_slider">
                            <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col">
                                <div class="team-member">
                                    <div class="member-pic">
                                        <img src="<?php echo e(asset('assets/front/img/team/'.$item->image)); ?>" alt="">
                                    </div>
        
                                    <div class="social">
                                        <ul>
                                            <?php if($item->url1 && $item->icon1): ?>
                                            <li>
                                                <a href="<?php echo e($item->url1); ?>">
                                                    <i class="<?php echo e($item->icon1); ?>"></i>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                            <?php if($item->url2 && $item->icon2): ?>
                                                <li>
                                                    <a href="<?php echo e($item->url2); ?>">
                                                        <i class="<?php echo e($item->icon2); ?>"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($item->url3 && $item->icon3): ?>
                                                <li>
                                                    <a href="<?php echo e($item->url3); ?>">
                                                        <i class="<?php echo e($item->icon3); ?>"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($item->url4 && $item->icon4): ?>
                                                <li>
                                                    <a href="<?php echo e($item->url4); ?>">
                                                        <i class="<?php echo e($item->icon4); ?>"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($item->url5 && $item->icon5): ?>
                                                <li>
                                                    <a href="<?php echo e($item->url5); ?>">
                                                        <i class="<?php echo e($item->icon5); ?>"></i>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
        
                                    <div class="member-data">
                                        <div class="name">
                                            <a href="<?php echo e(route('front.team_details', $item->id)); ?>"><h4 class="title"><?php echo e($item->name); ?></h4></a>
                                            <p class="position"><?php echo e($item->dagenation); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php endif; ?>




    <?php if($extra_visibility->is_t7_testimonial_section == 1): ?>
        <!--====== Testimonials Section Start ======-->
        <section class="testimonials-section section-gap soft-blue-bg">
            <div class="container">
                <div class="section-title text-center mb-60">
                    <span class="title-tag"><?php echo e($sinfo->testimonial_subtitle); ?></span>
                    <h2 class="title"><?php echo e($sinfo->testimonial_title); ?></h2>
                </div>

                <div class="testimonials-slider row">
                    <?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4">
                        <div class="testimonial-box color-1s">
                            <div class="testi-box-inner">
                                <div class="author d-flex align-items-center">
                                    <div class="photo">
                                        <img src="<?php echo e(asset('assets/front/img/'.$item->image)); ?>" alt="Image">
                                    </div>
                                    <div class="desc">
                                        <h6> <?php echo e($item->name); ?></h6>
                                        <span class="position"><?php echo e($item->position); ?></span>
                                    </div>
                                </div>
                                <p>
                                    
                                       <span class="d-block"> <?php for($i = 0; $i < $item->rating; $i++): ?>
                                        <i class="fas fa-star"></i>
                                    <?php endfor; ?></span>
                                    <?php echo e($item->message); ?>

                                </p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
        <!--====== Testimonials Section Ends ======-->
    <?php endif; ?>


    <?php if($extra_visibility->is_t7_callaction_section == 1): ?>
        <!--====== Call to action Start ======-->
        <section class="call-to-action" style="background-image: url(<?php echo e(asset('assets/front/img/'.$sinfo->meeet_us_bg_image )); ?>);">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-7 col-md-8">
                        <div class="section-title white-color">
                            <h2 class="title">
                                <?php echo e($sinfo->meeet_us_text); ?>

                            </h2>
                        </div>
                    </div>
                    <div class="col-auto">
                        <a href="<?php echo e($sinfo->meeet_us_button_link); ?>" class="main-btn main-btn-3 rounded-btn mt-md-gap-30"> <i class="fal fa-comments"></i> <?php echo e($sinfo->meeet_us_button_text); ?></a>
                    </div>
                </div>
            </div>
        </section>
        <!--====== Call to action End ======-->
    <?php endif; ?>


    <?php if($extra_visibility->is_t7_blog_section == 1): ?>
        <!--====== Latest News Start ======-->
        <section class="latest-news section-gap">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section-title text-center mb-30 wow fadeInUp" data-wow-delay="0.3s">
                            <span class="title-tag"><?php echo e($sinfo->blog_sub_title); ?></span>
                            <h2 class="title"><?php echo e($sinfo->blog_title); ?></h2>
                        </div> 
                    </div> 
                </div>
                <div class="row justify-content-center">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6 col-sm-8 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="latest-news-box mt-30">
                            <div class="post-thumb">
                                <img src="<?php echo e(asset('assets/front/img/blog/'.$item->image)); ?>" alt="Image">
                            </div>
                            <div class="post-content">
                                <ul class="post-meta">
                                    <li><a href="#">By Admin,</a></li>
                                    <li><a href="#"><?php echo e(date ( 'd M, Y', strtotime($item->created_at) )); ?></a></li>
                                </ul>
                                <h4 class="title">
                                    <a href="<?php echo e(route('front.blogdetails', $item->slug)); ?>">
                                        <?php echo e((strlen(strip_tags(Helper::convertUtf8($item->title))) > 40) ? substr(strip_tags(Helper::convertUtf8($item->title)), 0, 40) . '...' : strip_tags(Helper::convertUtf8($item->title))); ?>

                                    </a>
                                </h4>
                                <a href="<?php echo e(route('front.blogdetails', $item->slug)); ?>" class="read-more-btn"><?php echo e(__('Read More')); ?> <i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
        <!--====== Latest News End ======-->
    <?php endif; ?>


    <?php if($extra_visibility->is_t7_brand_section == 1): ?>
        <!--====== BRAND 2 PART START ======-->
        <div class="brand-section pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="brand-slider">
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e($item->link); ?>" class="brand-item">
                                <img src="<?php echo e(asset('assets/front/img/client/'.$item->image)); ?>" alt="<?php echo e($item->name); ?>">
                            </a> 
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> <!-- brand item -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>
        <!--====== BRAND 2 PART ENDS ======-->
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/front/themes/theme7.blade.php ENDPATH**/ ?>