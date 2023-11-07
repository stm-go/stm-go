
<?php $__env->startSection('meta-keywords', "$seo->quot_meta_key"); ?>
<?php $__env->startSection('meta-description', "$seo->quot_meta_desc"); ?>
<?php $__env->startSection('content'); ?>

 <!--====== PAGE TITLE PART START ======-->
         
 <div class="page-title-area" style="background-image: url('<?php echo e(asset('assets/front/img/'.$setting->breadcrumb_image)); ?>')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="page-title-item text-center">
					<h2 class="title"><?php echo e(__('DIREITOS PRIVACIDADE')); ?></h2>
						<ul class="breadcrumb-nav">
							<li class=""><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('Home')); ?> </a></li>
							<li class="active" aria-current="page"><?php echo e(__('LGPD')); ?></li>
						</ul>
				</div> <!-- page title -->
			</div>
		</div> <!-- row -->
	</div> <!-- container -->
</div> 

<!--====== PAGE TITLE PART ENDS ======-->
    
<!-- Quot Area Start -->
<section class="quote-page pt-120 pb-120"> 
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo e(route('front.quote_submit')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
					<h3 align="center">Exercendo seu direito de privacidade:</h3>
Nos termos do art. 18 da LGPD, aqui você pode requerer informações e correções de seus dados, conforme nossa <a href="https://sistemar.com.br/wp-content/uploads/2021/08/Politica-de-Privacidade-e-Protecao-de-Dados-v.2.pdf" target="_blank" rel="noopener">Política de Privacidade</a>.
<h4 align="center" >Preencha o formulário:</h4>
					<br>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="<?php echo e(__('Nome completo')); ?> *" name="name" value="<?php echo e(old('name')); ?>">
                                <?php if($errors->has('Nome')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('Nome')); ?> </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="email"  placeholder="<?php echo e(__('Email')); ?> *" name="email" value="<?php echo e(old('email')); ?>">
                                <?php if($errors->has('email')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('E-mail')); ?> </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20"> 
                                <input type="text"  placeholder="<?php echo e(__('Telefone')); ?> *" name="phone" value="<?php echo e(old('phone')); ?>">
                            </div> <!-- input box -->
                            <?php if($errors->has('phone')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('Telefone')); ?> </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="<?php echo e(__('Empresa')); ?>" name="country" value="<?php echo e(old('country')); ?>">
                                <?php if($errors->has('country')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('Pais')); ?> </p>
                            <?php endif; ?>
                            </div> <!-- input box -->
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="<?php echo e(__('Nosso Cliente?')); ?>" name="budget" value="<?php echo e(old('budget')); ?>">
                            </div> <!-- input box -->
                            <?php if($errors->has('budget')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('Orçamento')); ?> </p>
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="<?php echo e(__('Skype Id')); ?>" name="skypenumber" value="<?php echo e(old('skypenumber')); ?>">
                                <?php if($errors->has('skypenumber')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('Número Skype')); ?> </p>
                            <?php endif; ?>
                            </div> <!-- input box -->
                        </div>
                      
                        <div class="col-lg-6">
                            <div class="input-box mb-20">
                                <input type="text"  placeholder="<?php echo e(__('Assunto')); ?> *" name="subject" value="<?php echo e(old('subject')); ?>">
                                <?php if($errors->has('subject')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('subject')); ?> </p>
                            <?php endif; ?>
                            </div> <!-- input box -->
                        </div>
                        <div class="col-lg-6">
                            <div class="input-box file mb-20">
                                <label for="budget"><?php echo e(__('Caso desejar poderá enviar algum arquivo...')); ?></label>
                                <input type="file"  id="budget" name="file">
                            </div> <!-- input box -->
                            <?php if($errors->has('file')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('Arquivos')); ?> </p>
                            <?php endif; ?>
                        </div>
                       
                        <div class="col-lg-12">
                            <div class="input-box text-center mb-20">
                                <textarea name="description"  id="#" cols="30" rows="10" placeholder="<?php echo e(__('Escreva aqui suas dúvidas,reclamações,elogios.')); ?> *"><?php echo e(old('description')); ?></textarea>
                                <?php if($errors->has('description')): ?>
                                <p class="text-danger"> <?php echo e($errors->first('Descrição')); ?> </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <?php if($visibility->is_recaptcha == 1): ?>
                            <div class="row mb-4">
                              <div class="col-lg-12">
                                <?php echo NoCaptcha::renderJs(); ?>

                                <?php echo NoCaptcha::display(); ?>

                                <?php if($errors->has('g-recaptcha-response')): ?>
                                  <?php
                                      $errmsg = $errors->first('g-recaptcha-response');
                                  ?>
                                  <p class="text-danger mb-0"><?php echo e(__("$errmsg")); ?></p>
                                <?php endif; ?>
                              </div>
                            </div>
                          <?php endif; ?>
                        </div>
                        <div class="col-lg-12">
                            <div class="input-box mb-20">
                            <button class="main-btn wow fadeInUp mt-20" data-wow-duration="1s" data-wow-delay=".3s" type="submit"><?php echo e(__('Enviar')); ?></button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Quot Area End -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('front.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/front/quote.blade.php ENDPATH**/ ?>