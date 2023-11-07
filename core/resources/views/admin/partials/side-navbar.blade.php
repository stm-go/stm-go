@php
$lang_code = $currentLang->code;

$admin = Auth::guard('admin')->user();
  if (!empty($admin->role)) {
    $permissions = $admin->role->permissions;
    $permissions = json_decode($permissions, true);
}
@endphp

<aside class="main-sidebar elevation-4 main-sidebar elevation-4 sidebar-light-primary">
    <!-- Sidebar -->
    <div class="sidebar pt-0 mt-0">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <a href="{{ route('front.index') }}" class="name text-dark" target="_blank">
                <img src="{{ asset('assets/front/img/'.$setting->header_logo) }}" alt="">
            </a>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link @if(request()->path() == 'admin/dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Painel de Controle') }}
                        </p>
                    </a>
                </li>
                @if (empty($admin->role) || (!empty($permissions) && in_array('Website Customization', $permissions)))
                    <li class="nav-item has-treeview
                        @if(request()->path() == 'admin/basicinfo') menu-open
                        @elseif(request()->path() == 'admin/seoinfo') menu-open
                        @elseif(request()->path() == 'admin/custom-css') menu-open
                        @elseif(request()->path() == 'admin/slinks') menu-open
                        @elseif(request()->path() == 'admin/footer') menu-open
                        @elseif(request()->path() == 'admin/announcement') menu-open
                        @elseif(request()->path() == 'admin/maintanance') menu-open
                        @elseif(request()->path() == 'admin/preloader') menu-open
                        @elseif(request()->path() == 'admin/flink') menu-open
                        @elseif(request()->path() == 'admin/permalinks') menu-open
                        @elseif(request()->path() == 'admin/flink/add') menu-open
                        @elseif(request()->path() == 'admin/page-visibility') menu-open
                        @elseif(request()->path() == 'admin/sitemap') menu-open   
                        @elseif(request()->path() == 'admin/menu') menu-open
                        @elseif(request()->path() == 'admin/page-visibility/theme1') menu-open 
                        @elseif(request()->path() == 'admin/page-visibility/theme2') menu-open 
                        @elseif(request()->path() == 'admin/page-visibility/theme3') menu-open 
                        @elseif(request()->path() == 'admin/page-visibility/theme4') menu-open 
                        @elseif(request()->path() == 'admin/page-visibility/theme5') menu-open 
                        @elseif(request()->path() == 'admin/page-visibility/theme6') menu-open 
                        @elseif(request()->path() == 'admin/page-visibility/innerpage') menu-open 
                        @elseif(request()->path() == 'admin/page-visibility/others') menu-open 
                        @elseif(request()->is('admin/slinks/edit/*')) menu-open
                        @elseif(request()->is('admin/flink/edit/*')) menu-open
                        @endif">
                        <a href="#" class="nav-link
                            @if(request()->path() == 'admin/basicinfo') active
                            @elseif(request()->path() == 'admin/seoinfo') active 
                            @elseif(request()->path() == 'admin/sitemap') active   
                            @elseif(request()->path() == 'admin/custom-css') active
                            @elseif(request()->path() == 'admin/slinks') active
                            @elseif(request()->path() == 'admin/footer') active
                            @elseif(request()->path() == 'admin/announcement') active
                            @elseif(request()->path() == 'admin/maintanance') active
                            @elseif(request()->path() == 'admin/preloader') active
                            @elseif(request()->path() == 'admin/flink') active
                            @elseif(request()->path() == 'admin/permalinks') active
                            @elseif(request()->path() == 'admin/flink/add') active
                            @elseif(request()->path() == 'admin/page-visibility') active
                            @elseif(request()->path() == 'admin/menu') active
                            @elseif(request()->path() == 'admin/page-visibility/theme1') active 
                            @elseif(request()->path() == 'admin/page-visibility/theme2') active 
                            @elseif(request()->path() == 'admin/page-visibility/theme3') active 
                            @elseif(request()->path() == 'admin/page-visibility/theme4') active 
                            @elseif(request()->path() == 'admin/page-visibility/theme5') active 
                            @elseif(request()->path() == 'admin/page-visibility/theme6') active 
                            @elseif(request()->path() == 'admin/page-visibility/innerpage') active 
                            @elseif(request()->path() == 'admin/page-visibility/others') active 
                            @elseif(request()->is('admin/flink/edit/*')) active
                            @elseif(request()->is('admin/slinks/edit/*')) active
                            @endif">
                            <i class="nav-icon fas fa-sliders-h"></i>
                            <p>
                                {{ __('Personalizar Site') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        
                            <li class="nav-item">
                                <a href="{{ route('admin.basicinfo'). '?language=' . $lang_code }}"
                                    class="nav-link @if(request()->path() == 'admin/basicinfo') active @endif">
                                    <p>{{ __('Informações Básicas') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.menu.index'). '?language=' . $lang_code }}"
                                    class="nav-link  @if(request()->path() == 'admin/menu') active @endif">
                                    <p>{{ __('Construtor do menu') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.slinks') }}" class="nav-link
                                    @if(request()->path() == 'admin/slinks') active
                                    @elseif(request()->is('admin/slinks/edit/*')) active
                                    @endif">
                                    <p>{{ __('Social Links') }}</p>
                                </a>
                            </li>
                            <li class="nav-item 
                            @if(request()->path() == 'admin/seoinfo')  menu-open 
                            @elseif(request()->path() == 'admin/sitemap')  menu-open 
                            @endif">
                                <a href="#" class="nav-link 
                                @if(request()->path() == 'admin/seoinfo')  active 
                                @elseif(request()->path() == 'admin/sitemap')  active 
                                @endif">
                                    <p>{{ __('SEO') }}</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview ">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.seoinfo'). '?language=' . $lang_code }}" class="nav-link 
                                        @if(request()->path() == 'admin/seoinfo')  active @endif
                                        ">
                                            <p>{{ __('Meta Info') }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.sitemap.index'). '?language=' . $lang_code }}" class="nav-link 
                                        @if(request()->path() == 'admin/sitemap')  active @endif
                                        ">
                                            <p>{{ __('Sitemap') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        
                            <li class="nav-item">
                                <a href="{{ route('admin.pagevisibility') }}"
                                    class="nav-link  
                                    @if(request()->path() == 'admin/page-visibility') active 
                                    @elseif(request()->path() == 'admin/page-visibility/theme1') active 
                                    @elseif(request()->path() == 'admin/page-visibility/theme2') active 
                                    @elseif(request()->path() == 'admin/page-visibility/theme3') active 
                                    @elseif(request()->path() == 'admin/page-visibility/theme4') active 
                                    @elseif(request()->path() == 'admin/page-visibility/theme5') active 
                                    @elseif(request()->path() == 'admin/page-visibility/theme6') active 
                                    @elseif(request()->path() == 'admin/page-visibility/innerpage') active 
                                    @elseif(request()->path() == 'admin/page-visibility/others') active 
                                    @endif">
                                    <p>{{ __('Visibilidade das Páginas') }}</p>
                                </a>
                            </li>
							
                            <li class="nav-item">
                                <a href="{{ route('admin.permalinks.index') }}" class="nav-link
                                    @if(request()->path() == 'admin/permalinks') active
                                    @endif">
                                    <p>{{ __('Links URL') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.maintanance.index') }}"
                                    class="nav-link  @if(request()->path() == 'admin/maintanance') active @endif">
                                    <p>{{ __('Modo Manutenção') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.announcement.index'). '?language=' . $lang_code }}"
                                    class="nav-link  @if(request()->path() == 'admin/announcement') active @endif">
                                    <p>{{ __('Anúncio POP-UP') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.preloader.index'). '?language=' . $lang_code }}"
                                    class="nav-link  @if(request()->path() == 'admin/preloader') active @endif">
                                    <p>{{ __('Preloader Site') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.footer.index'). '?language=' . $lang_code }}" class="nav-link  
                                @if(request()->path() == 'admin/footer') active @endif
                                ">
                                <p>{{ __('Infos do Footer') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.flink.index'). '?language=' . $lang_code  }}" class="nav-link
                                @if(request()->path() == 'admin/flink') active 
                                @elseif(request()->path() == 'admin/flink/add') active
                                @elseif(request()->is('admin/flink/edit/*')) active
                                @endif
                                ">
                                <p>{{ __('Links do Footer') }}</p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                @endif

                @if (empty($admin->role) || (!empty($permissions) && in_array('General Settings', $permissions)))
                    <li class="nav-item has-treeview
                        @if(request()->path() == 'admin/custom-css') menu-open
                        @elseif(request()->path() == 'admin/email-config') menu-open
                        @elseif(request()->path() == 'admin/scripts') menu-open
                        @elseif(request()->path() == 'admin/theme-version') menu-open
                        @elseif(request()->path() == 'admin/cookie-alert') menu-open
                        @elseif(request()->path() == 'admin/mail-admin') menu-open
                        @elseif(request()->is('admin/slinks/edit/*')) menu-open
                        @endif">
                        <a href="#" class="nav-link
                            @if(request()->path() == 'admin/custom-css') active
                            @elseif(request()->path() == 'admin/theme-version') active
                            @elseif(request()->path() == 'admin/scripts') active
                            @elseif(request()->path() == 'admin/cookie-alert') active
                            @elseif(request()->path() == 'admin/mail-admin') active
                            @elseif(request()->path() == 'admin/email-config') active
                            @elseif(request()->is('admin/slinks/edit/*')) active
                            @endif">
                            <i class="nav-icon fas fas fa-cog"></i>
                            <p>
                                {{ __('Configurações Gerais') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                           
                           	<li class="nav-item">
                                <a href="{{ route('admin.theme_version') }}" class="nav-link
                            @if(request()->path() == 'admin/theme-version') active
                            @endif">
                                    <p>{{ __('Versões de Construção') }}</p>
                                </a>
                            </li>
                            <li class="nav-item 
                            @if(request()->path() == 'admin/email-config')  menu-open 
                            @elseif(request()->path() == 'admin/mail-admin')  menu-open 
                            @endif">
                                <a href="#" class="nav-link 
                                @if(request()->path() == 'admin/email-config')  active 
                                @elseif(request()->path() == 'admin/mail-admin')  active 
                                @endif">
                                    <p>{{ __('Configurações de E-mail') }}</p>
                                    <i class="right fas fa-angle-left"></i>
                                </a>
                                <ul class="nav nav-treeview 
                                    @if(request()->path() == 'admin/email-config')  menu-open @endif
                                    " >
                                    <li class="nav-item">
                                        <a href="{{ route('admin.mail.config') }}" class="nav-link 
                                        @if(request()->path() == 'admin/email-config')  active @endif
                                        ">
                                            <p>{{ __('E-mail do Admin') }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.mailadmin') }}" class="nav-link 
                                        @if(request()->path() == 'admin/mail-admin')  active @endif
                                        ">
                                            <p>{{ __('E-mail para Admin') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                         
                            
                            <li class="nav-item">
                                <a href="{{ route('admin.scripts') }}"
                                    class="nav-link @if(request()->path() == 'admin/scripts') active @endif">
                                    <p>{{ __('Scripts') }}</p>
                                </a>
                            </li>
                           
                           
                            <li class="nav-item">
                                <a href="{{ route('admin.cookie.alert'). '?language=' . $lang_code }}"
                                    class="nav-link  @if(request()->path() == 'admin/cookie-alert') active @endif">
                                    <p>{{ __('Alertas de Cookie') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.custom.css') }}"
                                    class="nav-link  @if(request()->path() == 'admin/custom-css') active @endif">
                                    <p>{{ __('Customizações do CSS') }}</p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                @endif

                @if (empty($admin->role) || (!empty($permissions) && in_array('Home', $permissions)))
                    <li class="nav-item
                        @if(request()->path() == 'admin/hero/static') menu-open
                        @elseif(request()->path() == 'admin/who-we-section') menu-open
                        @elseif(request()->path() == 'admin/intro-video') menu-open
                        @elseif(request()->path() == 'admin/about-section') menu-open
                        @elseif(request()->path() == 'admin/feature') menu-open
                        @elseif(request()->path() == 'admin/project-section') menu-open
                        @elseif(request()->path() == 'admin/service-section') menu-open
                        @elseif(request()->path() == 'admin/why-choose-us') menu-open
                        @elseif(request()->path() == 'admin/contact-section') menu-open
                        @elseif(request()->path() == 'admin/blog-section') menu-open
                        @elseif(request()->path() == 'admin/counter') menu-open
                        @elseif(request()->path() == 'admin/slider') menu-open
                        @elseif(request()->path() == 'admin/hero/herovideo') menu-open
                        @elseif(request()->path() == 'admin/slider/add') menu-open
                        @elseif(request()->path() == 'admin/meet-us') menu-open
                        @elseif(request()->path() == 'admin/team') menu-open
                        @elseif(request()->path() == 'admin/team/add') menu-open
                        @elseif(request()->is('admin/team/edit/*')) menu-open
                        @elseif(request()->path() == 'admin/faq') menu-open
                        @elseif(request()->path() == 'admin/faq/add') menu-open
                        @elseif(request()->path() == 'admin/counter/add') menu-open
                        @elseif(request()->is('admin/counter/edit/*')) menu-open
                        @elseif(request()->path() == 'admin/client') menu-open
                        @elseif(request()->path() == 'admin/client/add') menu-open
                        @elseif(request()->is('admin/client/edit/*')) menu-open
                        @elseif(request()->is('admin/faq/edit/*')) menu-open
                        @elseif(request()->is('admin/slider/edit/*')) menu-open
                        @elseif(request()->path() == 'admin/testimonial') menu-open
                        @elseif(request()->path() == 'admin/testimonial/add') menu-open
                        @elseif(request()->path() == 'admin/ecommerce/slider') menu-open
                        @elseif(request()->path() == 'admin/ecommerce/slider/add') menu-open
                        @elseif(request()->is('admin/ecommerce/slider/edit/*')) menu-open
                        @elseif(request()->path() == 'admin/ecommerce/banner') menu-open
                        @elseif(request()->path() == 'admin/ecommerce/banner/add') menu-open
                        @elseif(request()->is('admin/ecommerce/banner/edit/*')) menu-open
                        @elseif(request()->is('admin/testimonial/edit/*')) menu-open
                        @endif
                        ">
                        <a href="#" class="nav-link
                        @if(request()->path() == 'admin/hero/static') active
                        @elseif(request()->path() == 'admin/who-we-section') active
                        @elseif(request()->path() == 'admin/intro-video') active
                        @elseif(request()->path() == 'admin/about-section') active
                        @elseif(request()->path() == 'admin/feature') active
                        @elseif(request()->path() == 'admin/hero/herovideo') active
                        @elseif(request()->path() == 'admin/project-section') active
                        @elseif(request()->path() == 'admin/service-section') active
                        @elseif(request()->path() == 'admin/why-choose-us') active
                        @elseif(request()->path() == 'admin/contact-section') active
                        @elseif(request()->path() == 'admin/blog-section') active
                        @elseif(request()->path() == 'admin/counter') active
                        @elseif(request()->path() == 'admin/slider') active
                        @elseif(request()->path() == 'admin/slider/add') active
                        @elseif(request()->path() == 'admin/meet-us') active
                        @elseif(request()->path() == 'admin/team') active
                        @elseif(request()->path() == 'admin/team/add') active
                        @elseif(request()->path() == 'admin/counter/add') active
                        @elseif(request()->is('admin/counter/edit/*')) active
                        @elseif(request()->is('admin/team/edit/*')) active
                        @elseif(request()->path() == 'admin/faq') active
                        @elseif(request()->path() == 'admin/faq/add') active
                        @elseif(request()->is('admin/team/faq/*')) active
                        @elseif(request()->path() == 'admin/client') active
                        @elseif(request()->path() == 'admin/client/add') active
                        @elseif(request()->is('admin/team/client/*')) active
                        @elseif(request()->is('admin/slider/edit/*')) active
                        @elseif(request()->path() == 'admin/testimonial') active
                        @elseif(request()->path() == 'admin/testimonial/add') active
                        @elseif(request()->path() == 'admin/ecommerce/slider') active
                        @elseif(request()->path() == 'admin/ecommerce/slider/add') active
                        @elseif(request()->is('admin/ecommerce/slider/edit/*')) active
                        @elseif(request()->path() == 'admin/ecommerce/banner') active
                        @elseif(request()->path() == 'admin/ecommerce/banner/add') active
                        @elseif(request()->is('admin/ecommerce/banner/edit/*')) active
                        @elseif(request()->is('admin/testimonial/edit/*')) active
                        @endif
                        ">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                {{ __('Home - Página') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item
                                @if(request()->path() == 'admin/hero/static') menu-open
                                @elseif(request()->path() == 'admin/slider') menu-open
                                @elseif(request()->path() == 'admin/hero/herovideo') menu-open
                                @elseif(request()->path() == 'admin/slider/add') menu-open
                                @elseif(request()->is('admin/slider/edit/*')) menu-open
                                @endif
                                ">
                                <a href="#" class="nav-link
                                @if(request()->path() == 'admin/hero/static') active
                                @elseif(request()->path() == 'admin/slider') active
                                @elseif(request()->path() == 'admin/hero/herovideo') active
                                @elseif(request()->path() == 'admin/slider/add') active
                                @elseif(request()->is('admin/slider/edit/*')) active
                                @endif
                                ">
                                    <p>{{ __('Seção - Hero') }} <i class="right fas fa-angle-left"></i></p>
                                </a>
                                    <ul class="nav nav-treeview
                                    @if(request()->path() == 'admin/slider') menu-open
                                    @elseif(request()->path() == 'admin/slider/add') menu-open
                                    @elseif(request()->path() == 'admin/hero/herovideo') menu-open
                                    @elseif(request()->is('admin/slider/edit/*')) menu-open
                                    @endif
                                    ">
                                        <!-- <li class="nav-item">
                                            <a href="{{ route('admin.hero.index'). '?language=' . $lang_code }}" class="nav-link
                                    @if(request()->path() == 'admin/hero/static') active @endif
                                    ">
                                                <p>{{ __('Versão Estática') }}</p>
                                            </a>
                                        </li> -->
                                        <li class="nav-item">
                                            <a href="{{ route('admin.slider'). '?language=' . $lang_code }}" class="nav-link
                                                @if(request()->path() == 'admin/slider') active
                                                @elseif(request()->path() == 'admin/slider/add') active
                                                @elseif(request()->is('admin/slider/edit/*')) active
                                                @endif
                                                ">
                                                <p>{{ __('Banner Slider') }}</p>
                                            </a>
                                        </li>
                                        <!-- <li class="nav-item">
                                            <a href="{{ route('admin.herovideo') }}" class="nav-link
                                                @if(request()->path() == 'admin/hero/herovideo') active @endif
                                                ">
                                                <p>{{ __('Versão em vídeo') }}</p>
                                            </a>
                                        </li> -->
                                    </ul>
                            </li>
                            <li class="nav-item 
                                    @if(request()->path() == 'admin/ecommerce/slider') menu-open
                                        @elseif(request()->path() == 'admin/ecommerce/slider/add') menu-open
                                        @elseif(request()->is('admin/ecommerce/slider/edit/*')) menu-open
                                        @elseif(request()->path() == 'admin/ecommerce/banner') menu-open
                                        @elseif(request()->path() == 'admin/ecommerce/banner/add') menu-open
                                        @elseif(request()->is('admin/ecommerce/banner/edit/*')) menu-open
                                    @endif
                                ">
                                <!-- <a href="#" class="nav-link
                                        @if(request()->path() == 'admin/ecommerce/slider') active
                                        @elseif(request()->path() == 'admin/ecommerce/slider/add') active
                                        @elseif(request()->is('admin/ecommerce/slider/edit/*')) active
                                        @elseif(request()->path() == 'admin/ecommerce/banner') active
                                        @elseif(request()->path() == 'admin/ecommerce/banner/add') active
                                        @elseif(request()->is('admin/ecommerce/banner/edit/*')) active
                                        @endif
                                    ">
                                    <p>{{ __('Módulo de comércio') }} <i class="right fas fa-angle-left"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.ecommerce.slider'). '?language=' . $lang_code }}" class="nav-link
                                            @if(request()->path() == 'admin/ecommerce/slider') active
                                            @elseif(request()->path() == 'admin/ecommerce/slider/add') active
                                            @elseif(request()->is('admin/ecommerce/slider/edit/*')) active
                                            @endif
                                        ">
                                            <p>{{ __('Slider') }}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('admin.ecommerce.banner'). '?language=' . $lang_code }}" class="nav-link
                                            @if(request()->path() == 'admin/ecommerce/banner') active
                                            @elseif(request()->path() == 'admin/ecommerce/banner/add') active
                                            @elseif(request()->is('admin/ecommerce/banner/edit/*')) active
                                            @endif
                                        ">
                                            <p>{{ __('Banner') }}</p>
                                        </a>
                                    </li>
                                </ul>
                            </li> -->
                            <li class="nav-item">
                                <a href="{{ route('admin.about_section'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/about-section') active @endif
                            ">
                                    <p>{{ __('Seção - Sobre') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.w_w_a'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/who-we-section') active @endif
                            ">
                                    <p>{{ __('Seção - Quem somos') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.feature.index'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/feature') active @endif
                            ">
                                    <p>{{ __('Seção - Recursos') }}</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ route('admin.intro_video'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/intro-video') active @endif
                            ">
                                    <p>{{ __('Seção - Intro Vídeo') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.why_chooseus'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/why-choose-us') active @endif
                            ">
                                    <p>{{ __('Seção - Por que Escolher') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.service_section'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/service-section') active @endif
                            ">
                                    <p>{{ __('Seção - Serviços') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.project_section'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/project-section') active @endif
                            ">
                                    <p>{{ __('Seção - Projeto') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.testimonial'). '?language=' . $lang_code }}" class="nav-link
                                @if(request()->path() == 'admin/testimonial') active
                                @elseif(request()->path() == 'admin/testimonial/add') active
                                @elseif(request()->is('admin/testimonial/edit/*')) active
                                @endif
                                ">
                                    <p>{{ __('Seção - Testemunhos') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.team'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/team') active
                            @elseif(request()->path() == 'admin/team/add') active
                            @elseif(request()->is('admin/team/edit/*')) active
                            @endif
                            ">
                                    <p>{{ __('Seção - Times') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.faq'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/faq') active
                            @elseif(request()->path() == 'admin/faq/add') active
                            @elseif(request()->is('admin/team/faq/*')) active
                            @endif
                            ">
                                    <p>{{ __('Seção - FAQ') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.counter.index'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/counter') active 
                            @elseif(request()->path() == 'admin/counter/add') active
                            @elseif(request()->is('admin/counter/edit/*')) active
                            @endif
                            ">
                                    <p>{{ __('Seção - Contador') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.meet_section'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/meet-us') active @endif
                            ">
                                    <p>{{ __('Seção - Conheça-nos') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.contact_section'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/contact-section') active @endif
                            ">
                                    <p>{{ __('Seção - Contato') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.blog_section'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/blog-section') active @endif
                            ">
                                    <p>{{ __('Seção - Artigos') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.client.index'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/client') active 
                            @elseif(request()->path() == 'admin/client/add') active
                            @elseif(request()->is('admin/client/edit/*')) active
                            @endif
                            ">
                                    <p>{{ __('Seção - Clientes') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (empty($admin->role) || (!empty($permissions) && in_array('Inner Page', $permissions)))
                    <li class="nav-item has-treeview
                        @if(request()->path() == 'admin/history') menu-open
                        @elseif(request()->path() == 'admin/history/add') menu-open
                        @elseif(request()->path() == 'admin/contact-page') menu-open
                        @elseif(request()->path() == 'admin/package') menu-open
                        @elseif(request()->path() == 'admin/package/add') menu-open
                        @elseif(request()->path() == 'admin/service') menu-open
                        @elseif(request()->path() == 'admin/service/add') menu-open
                        @elseif(request()->path() == 'admin/portfolio') menu-open
                        @elseif(request()->path() == 'admin/portfolio/add') menu-open
                        @elseif(request()->is('admin/package/edit/*')) menu-open
                        @elseif(request()->is('admin/history/edit/*')) menu-open
                        @elseif(request()->is('admin/service/edit/*')) menu-open
                        @elseif(request()->is('admin/portfolio/edit/*')) menu-open
                        @endif">
                        <a href="#" class="nav-link
                            @if(request()->path() == 'admin/history') active
                            @elseif(request()->path() == 'admin/history/add') active
                            @elseif(request()->path() == 'admin/package') active
                            @elseif(request()->path() == 'admin/contact-page') active
                            @elseif(request()->path() == 'admin/package/add') active
                            @elseif(request()->path() == 'admin/service') active
                            @elseif(request()->path() == 'admin/service/add') active
                            @elseif(request()->path() == 'admin/portfolio') active
                            @elseif(request()->path() == 'admin/portfolio/add') active
                            @elseif(request()->is('admin/package/edit/*')) active
                            @elseif(request()->is('admin/history/edit/*')) active
                            @elseif(request()->is('admin/service/edit/*')) active
                            @elseif(request()->is('admin/portfolio/edit/*')) active
                            @endif">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                {{ __('Páginas internas') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                        
							<li class="nav-item">
                                <a href="{{ route('admin.history.index'). '?language=' . $lang_code }}" class="nav-link
                                    @if(request()->path() == 'admin/history') active 
                                    @elseif(request()->path() == 'admin/history/add') active
                                    @elseif(request()->is('admin/history/edit/*')) active
                                    @endif">
                                    <p>{{ __('Sobre - Linha do Tempo') }}</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="{{ route('admin.package'). '?language=' . $lang_code }}" class="nav-link
                                    @if(request()->path() == 'admin/package') active
                                    @elseif(request()->path() == 'admin/package/add') active
                                    @elseif(request()->is('admin/package/edit/*')) active
                                    @endif">
                                    <p>
                                        {{ __('Pacotes & Planos') }}
                                    </p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="{{ route('admin.service'). '?language=' . $lang_code  }}" class="nav-link
                                    @if(request()->path() == 'admin/service') active
                                    @elseif(request()->path() == 'admin/service/add') active
                                    @elseif(request()->is('admin/service/edit/*')) active
                                    @endif">
                                    <p>
                                        {{ __('Serviços') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.contact_page'). '?language=' . $lang_code  }}" class="nav-link
                                    @if(request()->path() == 'admin/contact-page') active
                                    @endif">
                                    <p>
                                        {{ __('Contato') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.portfolio.index'). '?language=' . $lang_code }}" class="nav-link
                                    @if(request()->path() == 'admin/portfolio') active
                                    @elseif(request()->path() == 'admin/portfolio/add') active
                                    @elseif(request()->is('admin/portfolio/edit/*')) active
                                    @endif">
                                    <p>
                                        {{ __('Portfolio') }}
                                    </p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
                @endif


                @if (empty($admin->role) || (!empty($permissions) && in_array('Quote', $permissions)))
                    <li class="nav-item 
                        @if(request()->path() == 'admin/all/quote') menu-open 
                        @elseif(request()->path() == 'admin/all/quote') menu-open 
                        @elseif(request()->path() == 'admin/pending/quote') menu-open 
                        @elseif(request()->path() == 'admin/processing/quote') menu-open 
                        @elseif(request()->path() == 'admin/completed/quote') menu-open 
                        @elseif(request()->path() == 'admin/rejected/quote') menu-open 
                        @elseif(request()->is('admin/quote/details/*')) menu-open
                        @endif
                        ">
                        <a href="#" class="nav-link @if(request()->path() == 'admin/all/quote') active 
                            @elseif(request()->path() == 'admin/pending/quote') active 
                            @elseif(request()->path() == 'admin/processing/quote') active 
                            @elseif(request()->path() == 'admin/completed/quote') active
                            @elseif(request()->path() == 'admin/rejected/quote') active
                            @elseif(request()->is('admin/quote/details/*')) active
                            @endif">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                            {{ __('LGPD') }}
                            <i class="far fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.all.quote') }}" class="nav-link  @if(request()->path() == 'admin/all/quote') active @endif">
                            <p>{{ __('Chamados') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.pending.quote') }}" class="nav-link  @if(request()->path() == 'admin/pending/quote') active @endif">
                            <p>{{ __('Pendentes') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.processing.quote') }}" class="nav-link  @if(request()->path() == 'admin/processing/quote') active @endif">
                            <p>{{ __('Processados') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.completed.quote') }}" class="nav-link  @if(request()->path() == 'admin/completed/quote') active @endif">
                            <p>{{ __('Concluídos') }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.rejected.quote') }}" class="nav-link  @if(request()->path() == 'admin/rejected/quote') active @endif">
                            <p>{{ __('Rejeitados') }}</p>
                            </a>
                        </li>
                        </ul>
                    </li>
                @endif
    

                <!--@if (empty($admin->role) || (!empty($permissions) && in_array('Gallery', $permissions)))
                    <li class="nav-item 
                        @if(request()->path() == 'admin/gallery') menu-open
                        @elseif(request()->path() == 'admin/gallery/gallery-category') menu-open
                        @elseif(request()->path() == 'admin/gallery/gallery-category/add') menu-open
                        @elseif(request()->path() == 'admin/gallery/add') menu-open
                        @elseif(request()->is('admin/gallery/gallery-category/edit/*')) menu-open
                        @elseif(request()->is('admin/gallery/edit/*')) menu-open
                        @endif">
                        <a href="#" class="nav-link
                            @if(request()->path() == 'admin/gallery') active
                            @elseif(request()->path() == 'admin/gallery/gallery-category') active
                            @elseif(request()->path() == 'admin/gallery/gallery-category/add') active
                            @elseif(request()->path() == 'admin/gallery/add') active
                            @elseif(request()->is('admin/gallery/gallery-category/edit/*')) active
                            @elseif(request()->is('admin/gallery/edit/*')) active
                            @endif">
                            <i class="nav-icon fas fa-briefcase"></i>
                            <p>
                                {{ __('Carreiras') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.gcategory'). '?language=' . $lang_code }}" class="nav-link
                                    @if(request()->path() == 'admin/gallery/gallery-category') active 
                                    @elseif(request()->path() == 'admin/gallery/gallery-category/add') active
                                    @elseif(request()->is('admin/gallery/gallery-category/edit/*')) active 
                                    @endif">
                                    <p>{{ __('Categorias') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.gallery.index'). '?language=' . $lang_code }}" class="nav-link
                                    @if(request()->path() == 'admin/gallery') active 
                                    @elseif(request()->path() == 'gallery/gallery/add') active
                                    @elseif(request()->is('admin/gallery/edit/*')) active
                                    @endif">
                                    <p>{{ __('Carreiras') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif-->

                @if (empty($admin->role) || (!empty($permissions) && in_array('Job', $permissions)))
                    <li class="nav-item has-treeview
                        @if(request()->path() == 'admin/job') menu-open
                        @elseif(request()->path() == 'admin/job/job-category') menu-open
                        @elseif(request()->path() == 'admin/job/job-category/add') menu-open
                        @elseif(request()->path() == 'admin/job/add') menu-open
                        @elseif(request()->path() == 'admin/applicant') menu-open
                        @elseif(request()->path() == 'admin/applicant/interviewing') menu-open
                        @elseif(request()->path() == 'admin/applicant/pending') menu-open
                        @elseif(request()->path() == 'admin/applicant/selected') menu-open
                        @elseif(request()->path() == 'admin/applicant/rejected') menu-open
                        @elseif(request()->is('admin/job/job-category/edit/*')) menu-open
                        @elseif(request()->is('admin/job/edit/*')) menu-open
                        @endif">
                        <a href="#" class="nav-link
                        @if(request()->path() == 'admin/job') active
                        @elseif(request()->path() == 'admin/job/job-category') active
                        @elseif(request()->path() == 'admin/job/job-category/add') active
                        @elseif(request()->path() == 'admin/job/add') active
                        @elseif(request()->path() == 'admin/applicant') active
                        @elseif(request()->path() == 'admin/applicant/interviewing') active
                        @elseif(request()->path() == 'admin/applicant/pending') active
                        @elseif(request()->path() == 'admin/applicant/selected') active
                        @elseif(request()->path() == 'admin/applicant/rejected') active
                        @elseif(request()->is('admin/job/job-category/edit/*')) active
                        @elseif(request()->is('admin/job/edit/*')) active
                        @endif">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            {{ __('Vagas') }}
                            <i class="right fas fa-angle-left"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
						<li class="nav-item">
                            <a href="{{ route('admin.job'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/job') active
                            @elseif(request()->path() == 'admin/job/add') active
                            @elseif(request()->is('admin/job/edit/*')) active
                            @endif">
                            <p>{{ __('Vagas') }}</p>
                            </a>
                        </li>
							
                        <li class="nav-item">
                            <a href="{{ route('admin.jcategory'). '?language=' . $lang_code }}" class="nav-link
                            @if(request()->path() == 'admin/job/job-category') active
                            @elseif(request()->path() == 'admin/job/job-category/add') active
                            @elseif(request()->is('admin/job/job-category/edit/*')) active
                            @endif">
                            <p>{{ __('Categorias') }}</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.applicant') }}" class="nav-link
                            @if(request()->path() == 'admin/applicant') active @endif">
                            <p>{{ __('Candidatos') }}</p>
                            </a>
                        </li>
							
                        <li class="nav-item">
                            <a href="{{ route('admin.applicant.pending') }}" class="nav-link
                            @if(request()->path() == 'admin/applicant/pending') active @endif">
                            <p>{{ __('Pendentes') }}</p>
                            </a>
                        </li>
							
                        <li class="nav-item">
                            <a href="{{ route('admin.applicant.interviewing') }}" class="nav-link
                            @if(request()->path() == 'admin/applicant/interviewing') active @endif">
                            <p>{{ __('Entrevistando') }}</p>
                            </a>
                        </li>
                     
                        <li class="nav-item">
                            <a href="{{ route('admin.applicant.selected') }}" class="nav-link
                            @if(request()->path() == 'admin/applicant/selected') active @endif">
                            <p>{{ __('Selecionado') }}</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.applicant.rejected') }}" class="nav-link
                            @if(request()->path() == 'admin/applicant/rejected') active @endif">
                            <p>{{ __('Rejeitados') }}</p>
                            </a>
                        </li>
                        
                        </ul>
                    </li>
                @endif

                @if (empty($admin->role) || (!empty($permissions) && in_array('Blog', $permissions)))
                    <li class="nav-item 
                        @if(request()->path() == 'admin/blog') menu-open
                        @elseif(request()->path() == 'admin/blog/blog-category') menu-open
                        @elseif(request()->path() == 'admin/blog/blog-category/add') menu-open
                        @elseif(request()->path() == 'admin/blog/add') menu-open
                        @elseif(request()->path() == 'admin/archives') menu-open
                        @elseif(request()->path() == 'admin/archive/add') menu-open
                        @elseif(request()->is('admin/blog/blog-category/edit/*')) menu-open
                        @elseif(request()->is('admin/blog/edit/*')) menu-open
                        @elseif(request()->is('admin/archive/edit/*')) menu-open
                        @endif">
                        <a href="#" class="nav-link
                            @if(request()->path() == 'admin/blog') active
                            @elseif(request()->path() == 'admin/blog/blog-category') active
                            @elseif(request()->path() == 'admin/blog/blog-category/add') active
                            @elseif(request()->path() == 'admin/blog/add') active
                            @elseif(request()->path() == 'admin/archives') active
                            @elseif(request()->path() == 'admin/archive/add') active
                            @elseif(request()->is('admin/blog/blog-category/edit/*')) active
                            @elseif(request()->is('admin/blog/edit/*')) active
                            @elseif(request()->is('admin/archive/edit/*')) active
                            @endif">
                            <i class="nav-icon fab fa-blogger-b"></i>
                            <p>
                                Artigo
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.bcategory'). '?language=' . $lang_code }}" class="nav-link
                                    @if(request()->path() == 'admin/blog/blog-category') active 
                                    @elseif(request()->path() == 'admin/blog/blog-category/add') active
                                    @elseif(request()->is('admin/blog/blog-category/edit/*')) active 
                                    @endif">
                                    <p>Categorias</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.archive'). '?language=' . $lang_code }}" class="nav-link
                                    @if(request()->path() == 'admin/archives') active 
                                    @elseif(request()->path() == 'admin/archive/add') active
                                    @elseif(request()->is('admin/archive/edit/*')) active
                                    @endif">
                                    <p>Arquivos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.blog'). '?language=' . $lang_code }}" class="nav-link
                                    @if(request()->path() == 'admin/blog') active 
                                    @elseif(request()->path() == 'admin/blog/add') active
                                    @elseif(request()->is('admin/blog/edit/*')) active
                                    @endif">
                                    <p>Artigos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (empty($admin->role) || (!empty($permissions) && in_array('Role Management', $permissions)))
                    <li class="nav-item
                        @if(request()->path() == 'admin/roles') menu-open 
                        @elseif(request()->path() == 'admin/role/add') menu-open
                        @elseif(request()->path() == 'admin/users') menu-open
                        @elseif(request()->path() == 'admin/user/add') menu-open
                        @elseif(request()->is('admin/user/*/edit')) menu-open
                        @elseif(request()->is('admin/role/edit/*')) menu-open
                        @elseif(request()->is('admin/role/*/permissions/manage')) menu-open
                        @endif
                        ">
                        <a href="#" class="nav-link
                            @if(request()->path() == 'admin/roles') active
                            @elseif(request()->path() == 'admin/role/add') active
                            @elseif(request()->path() == 'admin/users') active
                            @elseif(request()->path() == 'admin/user/add') active
                            @elseif(request()->is('admin/user/*/edit')) active
                            @elseif(request()->is('admin/role/edit/*')) active
                            @elseif(request()->is('admin/role/*/permissions/manage')) active
                            @endif
                            ">
                        <i class="nav-icon fas fa-unlock-alt"></i>
                        <p>
                            {{ __('Gerência de Funções') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.role.index') }}" class="nav-link
                                @if(request()->path() == 'admin/roles') active
                                @elseif(request()->path() == 'admin/role/add') active
                                @elseif(request()->is('admin/role/edit/*')) active
                                @elseif(request()->is('admin/role/*/permissions/manage')) active
                                @endif
                                ">
                            <p>{{ __("Permissão de Função") }}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.user.index') }}" class="nav-link
                                @if(request()->path() == 'admin/users') active
                                @elseif(request()->path() == 'admin/user/add') active
                                @elseif(request()->is('admin/user/*/edit')) active
                                @endif
                                ">
                            <p>{{ __('Permissão de Usuário') }}</p>
                            </a>
                        </li>
                        </ul>
                    </li>
                @endif

                @if (empty($admin->role) || (!empty($permissions) && in_array('Subscribers', $permissions)))
                    <li class="nav-item 
                        @if(request()->path() == 'admin/subscriber') menu-open 
                        @elseif(request()->path() == 'admin/subscriber/add') menu-open
                        @elseif(request()->path() == 'admin/mailsubscriber') menu-open
                        @endif
                            ">
                        <a href="#" class="nav-link
                        @if(request()->path() == 'admin/subscriber') active 
                        @elseif(request()->path() == 'admin/subscriber/add') active
                        @elseif(request()->path() == 'admin/mailsubscriber') active
                        @endif
                        ">
                            <i class="nav-icon fas fa-envelope-open-text"></i>
                            <p>
                                {{ __('Inscritos') }}
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.newsletter')}}" class="nav-link
                            @if(request()->path() == 'admin/subscriber') active 
                            @elseif(request()->path() == 'admin/subscriber/add') active
                            @endif
                            ">
                                    <p>{{ __('Assinantes') }}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('admin.mailsubscriber')}}" class="nav-link
                            @if(request()->path() == 'admin/mailsubscriber') active @endif
                            ">
                                    <p>{{ __('E-mail para Assinantes') }}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

            
                @if (empty($admin->role) || (!empty($permissions) && in_array('Users Management', $permissions)))
                <li class="nav-item">
                    <a href="{{ route('admin.front_user.index') }}"
                        class="nav-link @if(request()->path() == 'admin/user') active @endif">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            {{ __('Gerência de Usuários') }}
                        </p>
                    </a>
                </li>
                @endif

                @if (empty($admin->role) || (!empty($permissions) && in_array('Dynamic Page', $permissions)))
                    <li class="nav-item">
                        <a href="{{ route('admin.dynamic_page'). '?language=' . $lang_code }}"
                            class="nav-link @if(request()->path() == 'admin/dynamic-page') active @endif">

                            <i class="nav-icon  fab fa-sith"></i>
                            <p>
                                {{ __('Páginas Dinâmicas') }}
                            </p>
                        </a>
                    </li>
                @endif

 
                
                <!-- @if (empty($admin->role) || (!empty($permissions) && in_array('Language', $permissions)))
                    <li class="nav-item">
                        <a href="{{route('admin.language-manage')}}" class="nav-link
                            @if(request()->path() == 'admin/language') active
                            @elseif(request()->path() == 'admin/language/add') active
                            @elseif(request()->is('admin/language/21/edit')) active
                            @elseif(request()->is('admin/language/*/edit/keyword')) active
                            @endif">
                            <i class="nav-icon fas fa-language"></i>
                            <p>
                                {{ __('Linguagens') }}
                            </p>
                        </a>
                    </li>
                @endif -->

                @if (empty($admin->role) || (!empty($permissions) && in_array('Clear Cache', $permissions)))
                <li class="nav-item">
                    <a href="{{ route('admin.cache.clear') }}" class="nav-link">
                        <i class="nav-icon fas fa-broom"></i>
                        <p>
                            {{ __('Limpar cache') }}
                        </p>
                    </a>
                </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>