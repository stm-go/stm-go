
<?php $__env->startSection('meta-keywords', "$blog->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$blog->meta_description"); ?>
<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e(__('Área do Artigo')); ?></h2>
					<ul class="breadcrumb-nav">
						<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
						<li class=""><a href="<?php echo e(route('front.blogs')); ?>"><?php echo e(__('Artigo')); ?> </a></li>
						<li class="active" aria-current="page"><?php echo e(__('Área do Artigo')); ?></li>
					</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->

 <!--====== BLOG STANDARD PART START ======-->
         
 <div class="blog-area section-gap">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-8">
				<div class="blog-dteails-content">
						<img class="main-image" src="<?php echo e(asset('assets/front/img/blog/'.$blog->image)); ?>" alt="blog">
						<div class="content">
							<h3 class="title"><?php echo e($blog->title); ?></h3>
							<!-- <ul class="post-meta">
								<li><i class="fal fa-user"></i> By, Admin</li>
								<li><i class="fal fa-calendar-alt"></i> <?php echo e(date ( 'd M, Y', strtotime($blog->created_at) )); ?></li>
							</ul> -->
							<br>
							<div>
								<?php echo $blog->content; ?>

							</div>
							<?php if($visibility->is_blog_share_links == 1): ?>
							<div class="blog-details-bar mt-30">
								<div class="blog-social">
									<h4 class="title"><?php echo e(__('Compartilhamento Social :')); ?></h4>
									
									<div class="share-blog">
										<div class="tag-social-link text-center justify-content-center">
											<!-- AddToAny BEGIN -->
											<div class="a2a_kit a2a_kit_size_32 a2a_default_style d-inline-block">
											<a class="a2a_button_facebook"></a>
											<a class="a2a_button_twitter"></a>
											<a class="a2a_button_email"></a>
											<a class="a2a_dd" href="https://www.addtoany.com/share"></a>
											</div>
											<script async src="https://static.addtoany.com/menu/page.js"></script>
											<!-- AddToAny END -->
										</div>
									</div>
								</div>
							</div>
							<?php endif; ?>
						</div>
					<br>
					<div class="discus-comment-box">
						<?php if($visibility->is_disqus	== 1): ?>
						<div id="disqus_thread" class="mt-5"></div>
						<script>
							(function() { // DON'T EDIT BELOW THIS LINE
							var d = document, s = d.createElement('script');
							s.src = '//<?php echo e($commonsetting->disqus); ?>.disqus.com/embed.js';
							s.setAttribute('data-timestamp', +new Date());
							(d.head || d.body).appendChild(s);
							})();
						</script>
					<?php endif; ?> 
						</div> 
				</div>
			</div>
			<div class="col-lg-4  order-first order-lg-last">
				<div class="blog-sidebar">
					<div class="widget search-widget">
						<h4 class="widget-title"><?php echo e(__('Pesquisar Artigos')); ?></h4>
							<form action="<?php echo e(route('front.blogs', ['category' => request()->input('category'), 'month' => request()->input('month'), 'year' => request()->input('year')])); ?>" method="GET">
								<div class="input-box">
									<input name="category" type="hidden" value="<?php echo e(request()->input('category')); ?>">
									<input name="month" type="hidden" value="<?php echo e(request()->input('month')); ?>">
									<input name="year" type="hidden" value="<?php echo e(request()->input('year')); ?>">
									<input name="term" type="text" placeholder="<?php echo e(__('Search Blog')); ?>..." value="<?php echo e(request()->input('term')); ?>">
									<button type="submit"><i class="fal fa-search"></i></button>
								</div>
							</form>
					</div>
					<div class="widget categories-widget">
						<h4 class="widget-title"><?php echo e(__('Categorias')); ?></h4>
					
							<ul>
								<?php $__currentLoopData = $bcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<li><a href="<?php echo e(route('front.blogs',  ['term'=>request()->input('term'), 'category'=>$bcategory->slug,  'month' => request()->input('month'), 'year' => request()->input('year')])); ?>"  class="<?php if(request()->input('category') == $bcategory->slug): ?> active <?php endif; ?>"><?php echo e($bcategory->name); ?><span><?php echo e($bcategory->blogs->count()); ?></span></a></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
					</div>
					<div class="widget news-feed-widget">
						<h4 class="widget-title"><?php echo e(__('Últimas Notícias')); ?></h4>
						<div class="sidebar-feeds mt-45">
							
							<div class="news-feed-items">
								<?php $__currentLoopData = $latestblogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestblog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="news-feed-item">
                                    <a href="<?php echo e(route('front.blogdetails', $latestblog->slug)); ?>">
										<h4 class="title">
										<?php echo e((strlen(strip_tags(Helper::convertUtf8($latestblog->title))) > 50) ? substr(strip_tags(Helper::convertUtf8($latestblog->title)), 0, 50) . '...' : strip_tags(Helper::convertUtf8($latestblog->title))); ?>

										</h4>
									</a>
									<!--<span><i class="fal fa-calendar-alt"></i><?php echo e(date ( 'd M, Y', strtotime($latestblog->created_at) )); ?></span> -->
                                    <img src="<?php echo e(asset('assets/front/img/blog/'.$latestblog->image)); ?>" alt="Image">
                                </div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</div>
							
						</div>
					</div>

					<div class="widget tags-widget">
						<h4 class="widget-title"><?php echo e(__('Arquivo')); ?></h4>
						<ul>
							<?php $__currentLoopData = $archives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $archive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php
									$myArr = explode('/', $archive->date);

									$monthNum  = $myArr[0];
									$dateObj   = DateTime::createFromFormat('!m', $monthNum);
									$monthName = $dateObj->format('F');
								?>
								<li><a 
									class="single-category <?php if(request()->input('month') == $myArr[0] && request()->input('year') == $myArr[1]): ?> active <?php endif; ?>"
									
									href="<?php echo e(route('front.blogs', ['term'=>request()->input('term'), 'category'=>request()->input('category'),'month'=>$myArr[0], 'year'=>$myArr[1]])); ?>" 
									>
									<?php echo e($monthName); ?> <?php echo e($myArr[1]); ?>

									</a>
							</li>
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
	</div>
</div> 

 <!--====== BLOG STANDARD PART End ======-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/front/blogdetails.blade.php ENDPATH**/ ?>