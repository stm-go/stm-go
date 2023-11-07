<div class="col-sm-auto col-12">
    <div class="top-left-content">
        <a href="tel:4430267597">(44) 3026-7597</a> &nbsp;
           
        <?php if( $visibility->is_shop == 1): ?>
        <div class="language-change curr-change">
            <p class="name
            <?php if(request()->path() == '/'): ?>
                <?php if($commonsetting->theme_version == 'theme1'): ?>
                    <?php if($commonsetting->is_video_hero == '1'): ?>
                        text-white
                    <?php endif; ?>
                <?php elseif($commonsetting->theme_version == 'theme3'): ?>
                    text-white
                <?php elseif($commonsetting->theme_version == 'theme4'): ?>
                    text-white 
                <?php elseif($commonsetting->theme_version == 'theme5'): ?>
                    <?php if($commonsetting->is_video_hero == '1'): ?>
                        text-white
                    <?php endif; ?>
                <?php elseif($commonsetting->theme_version == 'theme6'): ?>
                    <?php if($commonsetting->is_video_hero == '1'): ?>
                        text-white
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?> 
                text-white
            <?php endif; ?>
			"
		</div>
            
		<?php if( $visibility->is_quote_page == 1): ?>
        <div class="navbar-btn">
            <a href="<?php echo e(route('front.quot')); ?>"><?php echo e(__('LGPD')); ?> <i class="fal fa-long-arrow-right"></i></a>
        </div>
        <?php endif; ?></p>
           <!-- Currency here source -->
        </div>
        <?php endif; ?>
    </div>
</div>
<div class="col-sm-auto col-12">
    <div class="top-right-wrapper">
        <div class="social-icon text-center">
            <ul>
                <?php $__currentLoopData = $socials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e($item->url); ?>"><i class="<?php echo e($item->icon); ?>"></i></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </ul>
        </div>
        <?php if( $visibility->is_user_system == 1): ?>
            <?php if(auth()->check()): ?>
            <div class="language-change">
                <a href="<?php echo e(route('user.login')); ?>" class="name login-btn
                <?php if(request()->path() == '/'): ?>
                    <?php if($commonsetting->theme_version == 'theme1'): ?>
                        <?php if($commonsetting->is_video_hero == '1'): ?>
                            text-white
                        <?php endif; ?>
                    <?php elseif($commonsetting->theme_version == 'theme3'): ?>
                        text-white
                    <?php elseif($commonsetting->theme_version == 'theme4'): ?>
                        text-white 
                    <?php elseif($commonsetting->theme_version == 'theme5'): ?>
                        <?php if($commonsetting->is_video_hero == '1'): ?>
                            text-white
                        <?php endif; ?>
                    <?php elseif($commonsetting->theme_version == 'theme6'): ?>
                        <?php if($commonsetting->is_video_hero == '1'): ?>
                            text-white
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?> 
                    text-white
                <?php endif; ?>
                ">
                    <i class="far fa-user l-icon"></i><?php echo e(__("User")); ?><i class="fas fa-chevron-down r-icon"></i>
                </a>
                <div class="language-menu">
                    <a href="<?php echo e(route('user.dashboard')); ?>" class=""><?php echo e(__("Painel do usuário")); ?></a>
                    <a href="<?php echo e(route('user.editprofile')); ?>" class=""><?php echo e(__("Editar Perfil")); ?></a>
                    <a href="<?php echo e(route('user.logout')); ?>" class=""><?php echo e(__("Sair")); ?></a>
                </div>
            </div>
            <?php else: ?>
            <div class="language-change">
                <a href="<?php echo e(route('user.login')); ?>" class="name login-btn
                <?php if(request()->path() == '/'): ?>
                    <?php if($commonsetting->theme_version == 'theme1'): ?>
                        <?php if($commonsetting->is_video_hero == '1'): ?>
                            text-white
                        <?php endif; ?>
                        <?php elseif($commonsetting->theme_version == 'theme3'): ?>
                            text-white
                        <?php elseif($commonsetting->theme_version == 'theme4'): ?>
                            text-white 
                        <?php elseif($commonsetting->theme_version == 'theme5'): ?>
                            <?php if($commonsetting->is_video_hero == '1'): ?>
                                text-white
                            <?php endif; ?>
                        <?php elseif($commonsetting->theme_version == 'theme6'): ?>
                            <?php if($commonsetting->is_video_hero == '1'): ?>
                                text-white
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php else: ?> 
                            text-white
                    <?php endif; ?>
                    ">
                    <i class="far fa-sign-in"></i><?php echo e(__('Entrar')); ?>

                </a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/front/partials/menu/topContent.blade.php ENDPATH**/ ?>