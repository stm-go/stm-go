

<?php $__env->startSection('meta-keywords', "$front_daynamic_page->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$front_daynamic_page->meta_description"); ?>
<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e($front_daynamic_page->title); ?></h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e($front_daynamic_page->title); ?></li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

    <!-- Faq Area Start -->
	<section class="pt-120 pb-120 dynamicpage">
		<div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="content">
                        <?php echo $front_daynamic_page->body; ?>

                    </div>
                </div>
            </div>
		</div>
	</section>
	<!-- Faq Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/front/daynamicpage.blade.php ENDPATH**/ ?>