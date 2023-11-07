

<?php $__env->startSection('meta-keywords', "$seo->career_meta_key"); ?>
<?php $__env->startSection('meta-description', "$seo->career_meta_desc"); ?>
<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e(__('Vagas')); ?></h2>
					
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e(__('Vagas')); ?></li>
						</ul>
					
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div>         

<!--====== PAGE TITLE PART ENDS ======-->


 <!--====== ABOT FAQ PART START ======-->
         
 <div class="blog-standard-area pt-120 pb-100">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<?php if(count($jobs) == 0): ?>
						<div class="col-md-12">
							<div class="bg-light py-5">
							<h3 class="text-center"><?php echo e(__('NENHUM VAGA ENCONTRADO')); ?></h3>
							</div>
						</div>
				<?php else: ?>
				<?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="single-job">
						<a href="<?php echo e(route('front.careerdetails', $job->slug)); ?>"><h3 class="title"><?php echo e($job->title); ?></h3></a>
						<p><span><i class="far fa-calendar-alt"></i>Prazo final :</span> <?php echo e($job->deadline); ?></p>
						<p><span><i class="fas fa-money-bill-wave"></i>Salário :</span> <?php echo e($job->salary); ?></p>
						<p><span><i class="fas fa-briefcase"></i>Experiência de trabalho :</span>
							
							 <?php echo e((strlen(strip_tags(Helper::convertUtf8($job->experience_requirement))) > 100) ? substr(strip_tags(Helper::convertUtf8($job->experience_requirement)), 0, 100) . '...' : strip_tags(Helper::convertUtf8($job->experience_requirement))); ?>

							</p>
						<p><span><i class="fas fa-gift"></i>Vagas :</span> <?php echo e($job->vacancy); ?></p>
						<a href="<?php echo e(route('front.careerdetails', $job->slug)); ?>"><?php echo e(__('Saiba Mais')); ?><i class="fal fa-long-arrow-right"></i></a>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<div class="d-block text-center">
						<div class="d-inline-block">
							<?php echo e($jobs->appends(['language' => request()->input('language')])->links()); ?>

						</div>
					</div>
				<?php endif; ?>
                
            </div>
			<div class="col-lg-4  order-first order-lg-last">
				<div class="blog-sidebar">
				<div class="widget search-widget">
					<h4 class="widget-title"><?php echo e(__('Pesquisar Vagas')); ?></h4>
					<div class="sidebar-search-item text-center mt-35">
						<form action="<?php echo e(route('front.career', ['category' => request()->input('category') ])); ?>" method="GET">
							<div class="input-box">
								<input name="category" type="hidden" value="<?php echo e(request()->input('category')); ?>">
								<input name="term" type="text" placeholder="<?php echo e(__('Search Job')); ?>..." value="<?php echo e(request()->input('term')); ?>">
								<button type="submit"><i class="fal fa-search"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="widget categories-widget">
                    <h4 class="widget-title"><?php echo e(__('Todas as categorias')); ?></h4>
                        <ul>
                            <li >
                                <a href="<?php echo e(route('front.career')); ?>" class="<?php if(empty(request()->input('category'))): ?> active <?php endif; ?>"><?php echo e(__('All')); ?>

									<span><?php echo e($alljobs->count()); ?></span></a>
								</a>
                            </li>
                          <?php $__currentLoopData = $jcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('front.career',['category'=>$item->slug])); ?>" class=" <?php if(request()->input('category') == $item->slug): ?> active <?php endif; ?>
                                "><?php echo e($item->name); ?>

								<span><?php echo e($item->jobs->count()); ?></span></a></li>
							</a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                  </div>
				  <div class="widget social-links">
					<h4 class="widget-title"><?php echo e(__('Redes Sociais')); ?></h4>
						<ul>
						  <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						  <li><a href="<?php echo e($item->url); ?>"><i class="<?php echo e($item->icon); ?>"></i></a></li>
						  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</ul>
				</div>
				</div>
			</div>
		</div> 
	</div> <!-- container -->
</div> 

<!--====== ABOT FAQ PART ENDS ======-->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/front/job.blade.php ENDPATH**/ ?>