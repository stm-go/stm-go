<?php $__env->startSection('meta-keywords', "$seo->meta_keywords"); ?>
<?php $__env->startSection('meta-description', "$seo->meta_description"); ?>
<?php $__env->startSection('content'); ?>

	<!--Main Breadcrumb Area Start -->
    <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-item text-center">
                        <h2 class="title"><?php echo e(__('Resetar Senha')); ?></h2>
                            <ul class="breadcrumb-nav">
                                <li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
                                <li class="active" aria-current="page"><?php echo e(__('Resetar Senha')); ?></li>
                            </ul>
                    </div> <!-- page title -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> 
    
	<!--Main Breadcrumb Area End -->

      <!-- Forgot password Area Start -->
    <section class="auth section-gap">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-10">
            <div class="sign-form">
                <div class="heading">
                <h4 class="title">
                    Resete sua Senha
                </h4>
                
                    <?php if(Session::has('mailsuccess')): ?>
                        <p class="subtitletext-success"><?php echo e(Session::get('mailsuccess')); ?></p>
                    <?php endif; ?>
                </div>
                <form class="" action="<?php echo e(route('user.forgot.submit')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="input-group">
                        <input class="form-control" type="email" name="email" placeholder="Email" required>
                        <?php if($errors->has('email')): ?>
                            <p class="text-danger"> <?php echo e($errors->first('email')); ?> </p>
                        <?php endif; ?>
                    </div>

                    <button class="main-btn" type="submit">Resetar Senha</button>
                    <p class="reg-text text-center mb-0"> Voltar para  <a href="<?php echo e(route('user.login')); ?>">Login</a></p>
                </form>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Forgot password Area End -->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/user/forgot.blade.php ENDPATH**/ ?>