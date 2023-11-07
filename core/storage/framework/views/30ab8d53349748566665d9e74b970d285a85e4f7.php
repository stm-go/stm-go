<?php
$lang_code = $currentLang->code;

$admin = Auth::guard('admin')->user();
  if (!empty($admin->role)) {
    $permissions = $admin->role->permissions;
    $permissions = json_decode($permissions, true);
}
?>

<aside class="main-sidebar elevation-4 main-sidebar elevation-4 sidebar-light-primary">
    <!-- Sidebar -->
    <div class="sidebar pt-0 mt-0">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <a href="<?php echo e(route('front.index')); ?>" class="name text-dark" target="_blank">
                <img src="<?php echo e(asset('assets/front/img/'.$setting->header_logo)); ?>" alt="">
            </a>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.dashboard')); ?>"
                        class="nav-link <?php if(request()->path() == 'admin/dashboard'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            <?php echo e(__('Painel de Controle')); ?>

                        </p>
                    </a>
                </li>
                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Website Customization', $permissions))): ?>
                    <li class="nav-item has-treeview
                        <?php if(request()->path() == 'admin/basicinfo'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/seoinfo'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/custom-css'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/slinks'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/footer'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/announcement'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/maintanance'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/preloader'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/flink'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/permalinks'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/flink/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/page-visibility'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/sitemap'): ?> menu-open   
                        <?php elseif(request()->path() == 'admin/menu'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/page-visibility/theme1'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/theme2'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/theme3'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/theme4'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/theme5'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/theme6'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/innerpage'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/page-visibility/others'): ?> menu-open 
                        <?php elseif(request()->is('admin/slinks/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/flink/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/basicinfo'): ?> active
                            <?php elseif(request()->path() == 'admin/seoinfo'): ?> active 
                            <?php elseif(request()->path() == 'admin/sitemap'): ?> active   
                            <?php elseif(request()->path() == 'admin/custom-css'): ?> active
                            <?php elseif(request()->path() == 'admin/slinks'): ?> active
                            <?php elseif(request()->path() == 'admin/footer'): ?> active
                            <?php elseif(request()->path() == 'admin/announcement'): ?> active
                            <?php elseif(request()->path() == 'admin/maintanance'): ?> active
                            <?php elseif(request()->path() == 'admin/preloader'): ?> active
                            <?php elseif(request()->path() == 'admin/flink'): ?> active
                            <?php elseif(request()->path() == 'admin/permalinks'): ?> active
                            <?php elseif(request()->path() == 'admin/flink/add'): ?> active
                            <?php elseif(request()->path() == 'admin/page-visibility'): ?> active
                            <?php elseif(request()->path() == 'admin/menu'): ?> active
                            <?php elseif(request()->path() == 'admin/page-visibility/theme1'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/theme2'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/theme3'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/theme4'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/theme5'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/theme6'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/innerpage'): ?> active 
                            <?php elseif(request()->path() == 'admin/page-visibility/others'): ?> active 
                            <?php elseif(request()->is('admin/flink/edit/*')): ?> active
                            <?php elseif(request()->is('admin/slinks/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fas fa-sliders-h"></i>
                            <p>
                                <?php echo e(__('Personalizar Site')); ?>

                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.basicinfo'). '?language=' . $lang_code); ?>"
                                    class="nav-link <?php if(request()->path() == 'admin/basicinfo'): ?> active <?php endif; ?>">
                                    <p><?php echo e(__('Informações Básicas')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.menu.index'). '?language=' . $lang_code); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/menu'): ?> active <?php endif; ?>">
                                    <p><?php echo e(__('Construtor do menu')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.slinks')); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/slinks'): ?> active
                                    <?php elseif(request()->is('admin/slinks/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <p><?php echo e(__('Social Links')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item 
                            <?php if(request()->path() == 'admin/seoinfo'): ?>  menu-open 
                            <?php elseif(request()->path() == 'admin/sitemap'): ?>  menu-open 
                            <?php endif; ?>">
                                <a href="#" class="nav-link 
                                <?php if(request()->path() == 'admin/seoinfo'): ?>  active 
                                <?php elseif(request()->path() == 'admin/sitemap'): ?>  active 
                                <?php endif; ?>">
                                    <p><?php echo e(__('SEO')); ?></p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview ">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.seoinfo'). '?language=' . $lang_code); ?>" class="nav-link 
                                        <?php if(request()->path() == 'admin/seoinfo'): ?>  active <?php endif; ?>
                                        ">
                                            <p><?php echo e(__('Meta Info')); ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.sitemap.index'). '?language=' . $lang_code); ?>" class="nav-link 
                                        <?php if(request()->path() == 'admin/sitemap'): ?>  active <?php endif; ?>
                                        ">
                                            <p><?php echo e(__('Sitemap')); ?></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.pagevisibility')); ?>"
                                    class="nav-link  
                                    <?php if(request()->path() == 'admin/page-visibility'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme1'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme2'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme3'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme4'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme5'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/theme6'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/innerpage'): ?> active 
                                    <?php elseif(request()->path() == 'admin/page-visibility/others'): ?> active 
                                    <?php endif; ?>">
                                    <p><?php echo e(__('Visibilidade das Páginas')); ?></p>
                                </a>
                            </li>
							
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.permalinks.index')); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/permalinks'): ?> active
                                    <?php endif; ?>">
                                    <p><?php echo e(__('Links URL')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.maintanance.index')); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/maintanance'): ?> active <?php endif; ?>">
                                    <p><?php echo e(__('Modo Manutenção')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.announcement.index'). '?language=' . $lang_code); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/announcement'): ?> active <?php endif; ?>">
                                    <p><?php echo e(__('Anúncio POP-UP')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.preloader.index'). '?language=' . $lang_code); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/preloader'): ?> active <?php endif; ?>">
                                    <p><?php echo e(__('Preloader Site')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.footer.index'). '?language=' . $lang_code); ?>" class="nav-link  
                                <?php if(request()->path() == 'admin/footer'): ?> active <?php endif; ?>
                                ">
                                <p><?php echo e(__('Infos do Footer')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.flink.index'). '?language=' . $lang_code); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/flink'): ?> active 
                                <?php elseif(request()->path() == 'admin/flink/add'): ?> active
                                <?php elseif(request()->is('admin/flink/edit/*')): ?> active
                                <?php endif; ?>
                                ">
                                <p><?php echo e(__('Links do Footer')); ?></p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('General Settings', $permissions))): ?>
                    <li class="nav-item has-treeview
                        <?php if(request()->path() == 'admin/custom-css'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/email-config'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/scripts'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/theme-version'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/cookie-alert'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/mail-admin'): ?> menu-open
                        <?php elseif(request()->is('admin/slinks/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/custom-css'): ?> active
                            <?php elseif(request()->path() == 'admin/theme-version'): ?> active
                            <?php elseif(request()->path() == 'admin/scripts'): ?> active
                            <?php elseif(request()->path() == 'admin/cookie-alert'): ?> active
                            <?php elseif(request()->path() == 'admin/mail-admin'): ?> active
                            <?php elseif(request()->path() == 'admin/email-config'): ?> active
                            <?php elseif(request()->is('admin/slinks/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fas fas fa-cog"></i>
                            <p>
                                <?php echo e(__('Configurações Gerais')); ?>

                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                           
                           	<li class="nav-item">
                                <a href="<?php echo e(route('admin.theme_version')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/theme-version'): ?> active
                            <?php endif; ?>">
                                    <p><?php echo e(__('Versões de Construção')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item 
                            <?php if(request()->path() == 'admin/email-config'): ?>  menu-open 
                            <?php elseif(request()->path() == 'admin/mail-admin'): ?>  menu-open 
                            <?php endif; ?>">
                                <a href="#" class="nav-link 
                                <?php if(request()->path() == 'admin/email-config'): ?>  active 
                                <?php elseif(request()->path() == 'admin/mail-admin'): ?>  active 
                                <?php endif; ?>">
                                    <p><?php echo e(__('Configurações de E-mail')); ?></p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview 
                                    <?php if(request()->path() == 'admin/email-config'): ?>  menu-open <?php endif; ?>
                                    " >
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.mail.config')); ?>" class="nav-link 
                                        <?php if(request()->path() == 'admin/email-config'): ?>  active <?php endif; ?>
                                        ">
                                            <p><?php echo e(__('E-mail do Admin')); ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.mailadmin')); ?>" class="nav-link 
                                        <?php if(request()->path() == 'admin/mail-admin'): ?>  active <?php endif; ?>
                                        ">
                                            <p><?php echo e(__('E-mail para Admin')); ?></p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                         
                            
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.scripts')); ?>"
                                    class="nav-link <?php if(request()->path() == 'admin/scripts'): ?> active <?php endif; ?>">
                                    <p><?php echo e(__('Scripts')); ?></p>
                                </a>
                            </li>
                           
                           
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.cookie.alert'). '?language=' . $lang_code); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/cookie-alert'): ?> active <?php endif; ?>">
                                    <p><?php echo e(__('Alertas de Cookie')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.custom.css')); ?>"
                                    class="nav-link  <?php if(request()->path() == 'admin/custom-css'): ?> active <?php endif; ?>">
                                    <p><?php echo e(__('Customizações do CSS')); ?></p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Home', $permissions))): ?>
                    <li class="nav-item
                        <?php if(request()->path() == 'admin/hero/static'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/who-we-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/intro-video'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/about-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/feature'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/project-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/service-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/why-choose-us'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/contact-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/blog-section'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/counter'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/slider'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/hero/herovideo'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/slider/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/meet-us'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/team'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/team/add'): ?> menu-open
                        <?php elseif(request()->is('admin/team/edit/*')): ?> menu-open
                        <?php elseif(request()->path() == 'admin/faq'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/faq/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/counter/add'): ?> menu-open
                        <?php elseif(request()->is('admin/counter/edit/*')): ?> menu-open
                        <?php elseif(request()->path() == 'admin/client'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/client/add'): ?> menu-open
                        <?php elseif(request()->is('admin/client/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/faq/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/slider/edit/*')): ?> menu-open
                        <?php elseif(request()->path() == 'admin/testimonial'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/testimonial/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/ecommerce/slider'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/ecommerce/slider/add'): ?> menu-open
                        <?php elseif(request()->is('admin/ecommerce/slider/edit/*')): ?> menu-open
                        <?php elseif(request()->path() == 'admin/ecommerce/banner'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/ecommerce/banner/add'): ?> menu-open
                        <?php elseif(request()->is('admin/ecommerce/banner/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/testimonial/edit/*')): ?> menu-open
                        <?php endif; ?>
                        ">
                        <a href="#" class="nav-link
                        <?php if(request()->path() == 'admin/hero/static'): ?> active
                        <?php elseif(request()->path() == 'admin/who-we-section'): ?> active
                        <?php elseif(request()->path() == 'admin/intro-video'): ?> active
                        <?php elseif(request()->path() == 'admin/about-section'): ?> active
                        <?php elseif(request()->path() == 'admin/feature'): ?> active
                        <?php elseif(request()->path() == 'admin/hero/herovideo'): ?> active
                        <?php elseif(request()->path() == 'admin/project-section'): ?> active
                        <?php elseif(request()->path() == 'admin/service-section'): ?> active
                        <?php elseif(request()->path() == 'admin/why-choose-us'): ?> active
                        <?php elseif(request()->path() == 'admin/contact-section'): ?> active
                        <?php elseif(request()->path() == 'admin/blog-section'): ?> active
                        <?php elseif(request()->path() == 'admin/counter'): ?> active
                        <?php elseif(request()->path() == 'admin/slider'): ?> active
                        <?php elseif(request()->path() == 'admin/slider/add'): ?> active
                        <?php elseif(request()->path() == 'admin/meet-us'): ?> active
                        <?php elseif(request()->path() == 'admin/team'): ?> active
                        <?php elseif(request()->path() == 'admin/team/add'): ?> active
                        <?php elseif(request()->path() == 'admin/counter/add'): ?> active
                        <?php elseif(request()->is('admin/counter/edit/*')): ?> active
                        <?php elseif(request()->is('admin/team/edit/*')): ?> active
                        <?php elseif(request()->path() == 'admin/faq'): ?> active
                        <?php elseif(request()->path() == 'admin/faq/add'): ?> active
                        <?php elseif(request()->is('admin/team/faq/*')): ?> active
                        <?php elseif(request()->path() == 'admin/client'): ?> active
                        <?php elseif(request()->path() == 'admin/client/add'): ?> active
                        <?php elseif(request()->is('admin/team/client/*')): ?> active
                        <?php elseif(request()->is('admin/slider/edit/*')): ?> active
                        <?php elseif(request()->path() == 'admin/testimonial'): ?> active
                        <?php elseif(request()->path() == 'admin/testimonial/add'): ?> active
                        <?php elseif(request()->path() == 'admin/ecommerce/slider'): ?> active
                        <?php elseif(request()->path() == 'admin/ecommerce/slider/add'): ?> active
                        <?php elseif(request()->is('admin/ecommerce/slider/edit/*')): ?> active
                        <?php elseif(request()->path() == 'admin/ecommerce/banner'): ?> active
                        <?php elseif(request()->path() == 'admin/ecommerce/banner/add'): ?> active
                        <?php elseif(request()->is('admin/ecommerce/banner/edit/*')): ?> active
                        <?php elseif(request()->is('admin/testimonial/edit/*')): ?> active
                        <?php endif; ?>
                        ">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                <?php echo e(__('Home - Página')); ?>

                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item
                                <?php if(request()->path() == 'admin/hero/static'): ?> menu-open
                                <?php elseif(request()->path() == 'admin/slider'): ?> menu-open
                                <?php elseif(request()->path() == 'admin/hero/herovideo'): ?> menu-open
                                <?php elseif(request()->path() == 'admin/slider/add'): ?> menu-open
                                <?php elseif(request()->is('admin/slider/edit/*')): ?> menu-open
                                <?php endif; ?>
                                ">
                                <a href="#" class="nav-link
                                <?php if(request()->path() == 'admin/hero/static'): ?> active
                                <?php elseif(request()->path() == 'admin/slider'): ?> active
                                <?php elseif(request()->path() == 'admin/hero/herovideo'): ?> active
                                <?php elseif(request()->path() == 'admin/slider/add'): ?> active
                                <?php elseif(request()->is('admin/slider/edit/*')): ?> active
                                <?php endif; ?>
                                ">
                                    <p><?php echo e(__('Seção - Hero')); ?> <i class="right fas fa-angle-left"></i></p>
                                </a>
                                    <ul class="nav nav-treeview
                                    <?php if(request()->path() == 'admin/slider'): ?> menu-open
                                    <?php elseif(request()->path() == 'admin/slider/add'): ?> menu-open
                                    <?php elseif(request()->path() == 'admin/hero/herovideo'): ?> menu-open
                                    <?php elseif(request()->is('admin/slider/edit/*')): ?> menu-open
                                    <?php endif; ?>
                                    ">
                                        <!-- <li class="nav-item">
                                            <a href="<?php echo e(route('admin.hero.index'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/hero/static'): ?> active <?php endif; ?>
                                    ">
                                                <p><?php echo e(__('Versão Estática')); ?></p>
                                            </a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a href="<?php echo e(route('admin.slider'). '?language=' . $lang_code); ?>" class="nav-link
                                                <?php if(request()->path() == 'admin/slider'): ?> active
                                                <?php elseif(request()->path() == 'admin/slider/add'): ?> active
                                                <?php elseif(request()->is('admin/slider/edit/*')): ?> active
                                                <?php endif; ?>
                                                ">
                                                <p><?php echo e(__('Banner Slider')); ?></p>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a href="<?php echo e(route('admin.herovideo')); ?>" class="nav-link
                                                <?php if(request()->path() == 'admin/hero/herovideo'): ?> active <?php endif; ?>
                                                ">
                                                <p><?php echo e(__('Versão em vídeo')); ?></p>
                                            </a>
                                        </li> -->
                                    </ul>
                            </li>
                            <li class="nav-item 
                                    <?php if(request()->path() == 'admin/ecommerce/slider'): ?> menu-open
                                        <?php elseif(request()->path() == 'admin/ecommerce/slider/add'): ?> menu-open
                                        <?php elseif(request()->is('admin/ecommerce/slider/edit/*')): ?> menu-open
                                        <?php elseif(request()->path() == 'admin/ecommerce/banner'): ?> menu-open
                                        <?php elseif(request()->path() == 'admin/ecommerce/banner/add'): ?> menu-open
                                        <?php elseif(request()->is('admin/ecommerce/banner/edit/*')): ?> menu-open
                                    <?php endif; ?>
                                ">
                                <!-- <a href="#" class="nav-link
                                        <?php if(request()->path() == 'admin/ecommerce/slider'): ?> active
                                        <?php elseif(request()->path() == 'admin/ecommerce/slider/add'): ?> active
                                        <?php elseif(request()->is('admin/ecommerce/slider/edit/*')): ?> active
                                        <?php elseif(request()->path() == 'admin/ecommerce/banner'): ?> active
                                        <?php elseif(request()->path() == 'admin/ecommerce/banner/add'): ?> active
                                        <?php elseif(request()->is('admin/ecommerce/banner/edit/*')): ?> active
                                        <?php endif; ?>
                                    ">
                                    <p><?php echo e(__('Módulo de comércio')); ?> <i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.ecommerce.slider'). '?language=' . $lang_code); ?>" class="nav-link
                                            <?php if(request()->path() == 'admin/ecommerce/slider'): ?> active
                                            <?php elseif(request()->path() == 'admin/ecommerce/slider/add'): ?> active
                                            <?php elseif(request()->is('admin/ecommerce/slider/edit/*')): ?> active
                                            <?php endif; ?>
                                        ">
                                            <p><?php echo e(__('Slider')); ?></p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="<?php echo e(route('admin.ecommerce.banner'). '?language=' . $lang_code); ?>" class="nav-link
                                            <?php if(request()->path() == 'admin/ecommerce/banner'): ?> active
                                            <?php elseif(request()->path() == 'admin/ecommerce/banner/add'): ?> active
                                            <?php elseif(request()->is('admin/ecommerce/banner/edit/*')): ?> active
                                            <?php endif; ?>
                                        ">
                                            <p><?php echo e(__('Banner')); ?></p>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.about_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/about-section'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Sobre')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.w_w_a'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/who-we-section'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Quem somos')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.feature.index'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/feature'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Recursos')); ?></p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.intro_video'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/intro-video'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Intro Vídeo')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.why_chooseus'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/why-choose-us'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Por que Escolher')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.service_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/service-section'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Serviços')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.project_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/project-section'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Projeto')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.testimonial'). '?language=' . $lang_code); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/testimonial'): ?> active
                                <?php elseif(request()->path() == 'admin/testimonial/add'): ?> active
                                <?php elseif(request()->is('admin/testimonial/edit/*')): ?> active
                                <?php endif; ?>
                                ">
                                    <p><?php echo e(__('Seção - Testemunhos')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.team'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/team'): ?> active
                            <?php elseif(request()->path() == 'admin/team/add'): ?> active
                            <?php elseif(request()->is('admin/team/edit/*')): ?> active
                            <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Times')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.faq'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/faq'): ?> active
                            <?php elseif(request()->path() == 'admin/faq/add'): ?> active
                            <?php elseif(request()->is('admin/team/faq/*')): ?> active
                            <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - FAQ')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.counter.index'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/counter'): ?> active 
                            <?php elseif(request()->path() == 'admin/counter/add'): ?> active
                            <?php elseif(request()->is('admin/counter/edit/*')): ?> active
                            <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Contador')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.meet_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/meet-us'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Conheça-nos')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.contact_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/contact-section'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Contato')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.blog_section'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/blog-section'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Artigos')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.client.index'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/client'): ?> active 
                            <?php elseif(request()->path() == 'admin/client/add'): ?> active
                            <?php elseif(request()->is('admin/client/edit/*')): ?> active
                            <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Seção - Clientes')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Inner Page', $permissions))): ?>
                    <li class="nav-item has-treeview
                        <?php if(request()->path() == 'admin/history'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/history/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/contact-page'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/package'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/package/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/service'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/service/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/portfolio'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/portfolio/add'): ?> menu-open
                        <?php elseif(request()->is('admin/package/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/history/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/service/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/portfolio/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/history'): ?> active
                            <?php elseif(request()->path() == 'admin/history/add'): ?> active
                            <?php elseif(request()->path() == 'admin/package'): ?> active
                            <?php elseif(request()->path() == 'admin/contact-page'): ?> active
                            <?php elseif(request()->path() == 'admin/package/add'): ?> active
                            <?php elseif(request()->path() == 'admin/service'): ?> active
                            <?php elseif(request()->path() == 'admin/service/add'): ?> active
                            <?php elseif(request()->path() == 'admin/portfolio'): ?> active
                            <?php elseif(request()->path() == 'admin/portfolio/add'): ?> active
                            <?php elseif(request()->is('admin/package/edit/*')): ?> active
                            <?php elseif(request()->is('admin/history/edit/*')): ?> active
                            <?php elseif(request()->is('admin/service/edit/*')): ?> active
                            <?php elseif(request()->is('admin/portfolio/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                <?php echo e(__('Páginas internas')); ?>

                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        
							<li class="nav-item">
                                <a href="<?php echo e(route('admin.history.index'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/history'): ?> active 
                                    <?php elseif(request()->path() == 'admin/history/add'): ?> active
                                    <?php elseif(request()->is('admin/history/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <p><?php echo e(__('Sobre - Linha do Tempo')); ?></p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="<?php echo e(route('admin.package'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/package'): ?> active
                                    <?php elseif(request()->path() == 'admin/package/add'): ?> active
                                    <?php elseif(request()->is('admin/package/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <p>
                                        <?php echo e(__('Pacotes & Planos')); ?>

                                    </p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.service'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/service'): ?> active
                                    <?php elseif(request()->path() == 'admin/service/add'): ?> active
                                    <?php elseif(request()->is('admin/service/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <p>
                                        <?php echo e(__('Serviços')); ?>

                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.contact_page'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/contact-page'): ?> active
                                    <?php endif; ?>">
                                    <p>
                                        <?php echo e(__('Contato')); ?>

                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.portfolio.index'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/portfolio'): ?> active
                                    <?php elseif(request()->path() == 'admin/portfolio/add'): ?> active
                                    <?php elseif(request()->is('admin/portfolio/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <p>
                                        <?php echo e(__('Portfolio')); ?>

                                    </p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                <?php endif; ?>


                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Quote', $permissions))): ?>
                    <li class="nav-item 
                        <?php if(request()->path() == 'admin/all/quote'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/all/quote'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/pending/quote'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/processing/quote'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/completed/quote'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/rejected/quote'): ?> menu-open 
                        <?php elseif(request()->is('admin/quote/details/*')): ?> menu-open
                        <?php endif; ?>
                        ">
                        <a href="#" class="nav-link <?php if(request()->path() == 'admin/all/quote'): ?> active 
                            <?php elseif(request()->path() == 'admin/pending/quote'): ?> active 
                            <?php elseif(request()->path() == 'admin/processing/quote'): ?> active 
                            <?php elseif(request()->path() == 'admin/completed/quote'): ?> active
                            <?php elseif(request()->path() == 'admin/rejected/quote'): ?> active
                            <?php elseif(request()->is('admin/quote/details/*')): ?> active
                            <?php endif; ?>">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            <?php echo e(__('LGPD')); ?>

                            <i class="far fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.all.quote')); ?>" class="nav-link  <?php if(request()->path() == 'admin/all/quote'): ?> active <?php endif; ?>">
                            <p><?php echo e(__('Chamados')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.pending.quote')); ?>" class="nav-link  <?php if(request()->path() == 'admin/pending/quote'): ?> active <?php endif; ?>">
                            <p><?php echo e(__('Pendentes')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.processing.quote')); ?>" class="nav-link  <?php if(request()->path() == 'admin/processing/quote'): ?> active <?php endif; ?>">
                            <p><?php echo e(__('Processados')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.completed.quote')); ?>" class="nav-link  <?php if(request()->path() == 'admin/completed/quote'): ?> active <?php endif; ?>">
                            <p><?php echo e(__('Concluídos')); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.rejected.quote')); ?>" class="nav-link  <?php if(request()->path() == 'admin/rejected/quote'): ?> active <?php endif; ?>">
                            <p><?php echo e(__('Rejeitados')); ?></p>
                            </a>
                        </li>
                        </ul>
                    </li>
                <?php endif; ?>
    

                <!--<?php if(empty($admin->role) || (!empty($permissions) && in_array('Gallery', $permissions))): ?>
                    <li class="nav-item 
                        <?php if(request()->path() == 'admin/gallery'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/gallery/gallery-category'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/gallery/gallery-category/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/gallery/add'): ?> menu-open
                        <?php elseif(request()->is('admin/gallery/gallery-category/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/gallery/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/gallery'): ?> active
                            <?php elseif(request()->path() == 'admin/gallery/gallery-category'): ?> active
                            <?php elseif(request()->path() == 'admin/gallery/gallery-category/add'): ?> active
                            <?php elseif(request()->path() == 'admin/gallery/add'): ?> active
                            <?php elseif(request()->is('admin/gallery/gallery-category/edit/*')): ?> active
                            <?php elseif(request()->is('admin/gallery/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>
                                <?php echo e(__('Carreiras')); ?>

                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.gcategory'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/gallery/gallery-category'): ?> active 
                                    <?php elseif(request()->path() == 'admin/gallery/gallery-category/add'): ?> active
                                    <?php elseif(request()->is('admin/gallery/gallery-category/edit/*')): ?> active 
                                    <?php endif; ?>">
                                    <p><?php echo e(__('Categorias')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.gallery.index'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/gallery'): ?> active 
                                    <?php elseif(request()->path() == 'gallery/gallery/add'): ?> active
                                    <?php elseif(request()->is('admin/gallery/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <p><?php echo e(__('Carreiras')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>-->

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Job', $permissions))): ?>
                    <li class="nav-item has-treeview
                        <?php if(request()->path() == 'admin/job'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/job/job-category'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/job/job-category/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/job/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/applicant'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/applicant/interviewing'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/applicant/pending'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/applicant/selected'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/applicant/rejected'): ?> menu-open
                        <?php elseif(request()->is('admin/job/job-category/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/job/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                        <?php if(request()->path() == 'admin/job'): ?> active
                        <?php elseif(request()->path() == 'admin/job/job-category'): ?> active
                        <?php elseif(request()->path() == 'admin/job/job-category/add'): ?> active
                        <?php elseif(request()->path() == 'admin/job/add'): ?> active
                        <?php elseif(request()->path() == 'admin/applicant'): ?> active
                        <?php elseif(request()->path() == 'admin/applicant/interviewing'): ?> active
                        <?php elseif(request()->path() == 'admin/applicant/pending'): ?> active
                        <?php elseif(request()->path() == 'admin/applicant/selected'): ?> active
                        <?php elseif(request()->path() == 'admin/applicant/rejected'): ?> active
                        <?php elseif(request()->is('admin/job/job-category/edit/*')): ?> active
                        <?php elseif(request()->is('admin/job/edit/*')): ?> active
                        <?php endif; ?>">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            <?php echo e(__('Vagas')); ?>

                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
						<li class="nav-item">
                            <a href="<?php echo e(route('admin.job'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/job'): ?> active
                            <?php elseif(request()->path() == 'admin/job/add'): ?> active
                            <?php elseif(request()->is('admin/job/edit/*')): ?> active
                            <?php endif; ?>">
                            <p><?php echo e(__('Vagas')); ?></p>
                            </a>
                        </li>
							
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.jcategory'). '?language=' . $lang_code); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/job/job-category'): ?> active
                            <?php elseif(request()->path() == 'admin/job/job-category/add'): ?> active
                            <?php elseif(request()->is('admin/job/job-category/edit/*')): ?> active
                            <?php endif; ?>">
                            <p><?php echo e(__('Categorias')); ?></p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.applicant')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/applicant'): ?> active <?php endif; ?>">
                            <p><?php echo e(__('Candidatos')); ?></p>
                            </a>
                        </li>
							
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.applicant.pending')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/applicant/pending'): ?> active <?php endif; ?>">
                            <p><?php echo e(__('Pendentes')); ?></p>
                            </a>
                        </li>
							
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.applicant.interviewing')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/applicant/interviewing'): ?> active <?php endif; ?>">
                            <p><?php echo e(__('Entrevistando')); ?></p>
                            </a>
                        </li>
                     
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.applicant.selected')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/applicant/selected'): ?> active <?php endif; ?>">
                            <p><?php echo e(__('Selecionado')); ?></p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.applicant.rejected')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/applicant/rejected'): ?> active <?php endif; ?>">
                            <p><?php echo e(__('Rejeitados')); ?></p>
                            </a>
                        </li>
                        
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Blog', $permissions))): ?>
                    <li class="nav-item 
                        <?php if(request()->path() == 'admin/blog'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/blog/blog-category'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/blog/blog-category/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/blog/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/archives'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/archive/add'): ?> menu-open
                        <?php elseif(request()->is('admin/blog/blog-category/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/blog/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/archive/edit/*')): ?> menu-open
                        <?php endif; ?>">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/blog'): ?> active
                            <?php elseif(request()->path() == 'admin/blog/blog-category'): ?> active
                            <?php elseif(request()->path() == 'admin/blog/blog-category/add'): ?> active
                            <?php elseif(request()->path() == 'admin/blog/add'): ?> active
                            <?php elseif(request()->path() == 'admin/archives'): ?> active
                            <?php elseif(request()->path() == 'admin/archive/add'): ?> active
                            <?php elseif(request()->is('admin/blog/blog-category/edit/*')): ?> active
                            <?php elseif(request()->is('admin/blog/edit/*')): ?> active
                            <?php elseif(request()->is('admin/archive/edit/*')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fab fa-blogger-b"></i>
                            <p>
                                Artigo
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.bcategory'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/blog/blog-category'): ?> active 
                                    <?php elseif(request()->path() == 'admin/blog/blog-category/add'): ?> active
                                    <?php elseif(request()->is('admin/blog/blog-category/edit/*')): ?> active 
                                    <?php endif; ?>">
                                    <p>Categorias</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.archive'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/archives'): ?> active 
                                    <?php elseif(request()->path() == 'admin/archive/add'): ?> active
                                    <?php elseif(request()->is('admin/archive/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <p>Arquivos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.blog'). '?language=' . $lang_code); ?>" class="nav-link
                                    <?php if(request()->path() == 'admin/blog'): ?> active 
                                    <?php elseif(request()->path() == 'admin/blog/add'): ?> active
                                    <?php elseif(request()->is('admin/blog/edit/*')): ?> active
                                    <?php endif; ?>">
                                    <p>Artigos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Role Management', $permissions))): ?>
                    <li class="nav-item
                        <?php if(request()->path() == 'admin/roles'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/role/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/users'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/user/add'): ?> menu-open
                        <?php elseif(request()->is('admin/user/*/edit')): ?> menu-open
                        <?php elseif(request()->is('admin/role/edit/*')): ?> menu-open
                        <?php elseif(request()->is('admin/role/*/permissions/manage')): ?> menu-open
                        <?php endif; ?>
                        ">
                        <a href="#" class="nav-link
                            <?php if(request()->path() == 'admin/roles'): ?> active
                            <?php elseif(request()->path() == 'admin/role/add'): ?> active
                            <?php elseif(request()->path() == 'admin/users'): ?> active
                            <?php elseif(request()->path() == 'admin/user/add'): ?> active
                            <?php elseif(request()->is('admin/user/*/edit')): ?> active
                            <?php elseif(request()->is('admin/role/edit/*')): ?> active
                            <?php elseif(request()->is('admin/role/*/permissions/manage')): ?> active
                            <?php endif; ?>
                            ">
                        <i class="nav-icon fas fa-unlock-alt"></i>
                        <p>
                            <?php echo e(__('Gerência de Funções')); ?>

                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.role.index')); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/roles'): ?> active
                                <?php elseif(request()->path() == 'admin/role/add'): ?> active
                                <?php elseif(request()->is('admin/role/edit/*')): ?> active
                                <?php elseif(request()->is('admin/role/*/permissions/manage')): ?> active
                                <?php endif; ?>
                                ">
                            <p><?php echo e(__("Permissão de Função")); ?></p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo e(route('admin.user.index')); ?>" class="nav-link
                                <?php if(request()->path() == 'admin/users'): ?> active
                                <?php elseif(request()->path() == 'admin/user/add'): ?> active
                                <?php elseif(request()->is('admin/user/*/edit')): ?> active
                                <?php endif; ?>
                                ">
                            <p><?php echo e(__('Permissão de Usuário')); ?></p>
                            </a>
                        </li>
                        </ul>
                    </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Subscribers', $permissions))): ?>
                    <li class="nav-item 
                        <?php if(request()->path() == 'admin/subscriber'): ?> menu-open 
                        <?php elseif(request()->path() == 'admin/subscriber/add'): ?> menu-open
                        <?php elseif(request()->path() == 'admin/mailsubscriber'): ?> menu-open
                        <?php endif; ?>
                            ">
                        <a href="#" class="nav-link
                        <?php if(request()->path() == 'admin/subscriber'): ?> active 
                        <?php elseif(request()->path() == 'admin/subscriber/add'): ?> active
                        <?php elseif(request()->path() == 'admin/mailsubscriber'): ?> active
                        <?php endif; ?>
                        ">
                            <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>
                                <?php echo e(__('Inscritos')); ?>

                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.newsletter')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/subscriber'): ?> active 
                            <?php elseif(request()->path() == 'admin/subscriber/add'): ?> active
                            <?php endif; ?>
                            ">
                                    <p><?php echo e(__('Assinantes')); ?></p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo e(route('admin.mailsubscriber')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/mailsubscriber'): ?> active <?php endif; ?>
                            ">
                                    <p><?php echo e(__('E-mail para Assinantes')); ?></p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

            
                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Users Management', $permissions))): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.front_user.index')); ?>"
                        class="nav-link <?php if(request()->path() == 'admin/user'): ?> active <?php endif; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            <?php echo e(__('Gerência de Usuários')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Dynamic Page', $permissions))): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.dynamic_page'). '?language=' . $lang_code); ?>"
                            class="nav-link <?php if(request()->path() == 'admin/dynamic-page'): ?> active <?php endif; ?>">

                            <i class="nav-icon  fab fa-sith"></i>
                            <p>
                                <?php echo e(__('Páginas Dinâmicas')); ?>

                            </p>
                        </a>
                    </li>
                <?php endif; ?>

 
                
                <!-- <?php if(empty($admin->role) || (!empty($permissions) && in_array('Language', $permissions))): ?>
                    <li class="nav-item">
                        <a href="<?php echo e(route('admin.language-manage')); ?>" class="nav-link
                            <?php if(request()->path() == 'admin/language'): ?> active
                            <?php elseif(request()->path() == 'admin/language/add'): ?> active
                            <?php elseif(request()->is('admin/language/21/edit')): ?> active
                            <?php elseif(request()->is('admin/language/*/edit/keyword')): ?> active
                            <?php endif; ?>">
                            <i class="nav-icon fas fa-language"></i>
                            <p>
                                <?php echo e(__('Linguagens')); ?>

                            </p>
                        </a>
                    </li>
                <?php endif; ?> -->

                <?php if(empty($admin->role) || (!empty($permissions) && in_array('Clear Cache', $permissions))): ?>
                <li class="nav-item">
                    <a href="<?php echo e(route('admin.cache.clear')); ?>" class="nav-link">
                        <i class="nav-icon fas fa-broom"></i>
                        <p>
                            <?php echo e(__('Limpar cache')); ?>

                        </p>
                    </a>
                </li>
                <?php endif; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside><?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/admin/partials/side-navbar.blade.php ENDPATH**/ ?>