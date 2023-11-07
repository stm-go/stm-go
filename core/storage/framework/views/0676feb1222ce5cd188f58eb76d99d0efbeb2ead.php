<?php $__env->startSection('content'); ?>
   <!-- Content Header (Page header) -->

   <div class="content-header">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('Bem-vindo,')); ?> <?php echo e(Auth::guard('admin')->user()->name); ?> !</h1>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <div class="row">
          <!--<div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-star"></i></span>

              <div class="info-box-content">
                <span class="info-box-text"><?php echo e(__('Produtos')); ?></span>
                <h4 class="info-box-number font-weight-normal"><?php echo e($currentLang->products()->count()); ?></h4>
              </div>
        </div>
			  
         </div>-->
			 
			 
			 
          <!--<div class="col-md-4 col-sm-6 col-12">
            <div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-star"></i></span>
              <?php
                  $porder = App\Models\Order::where('order_status', '0')->orderBy('id', 'DESC')->get();
              ?>
              <div class="info-box-content">
                <span class="info-box-text"><?php echo e(__('Pedidos Pendentes')); ?></span>
                <h4 class="info-box-number font-weight-normal"><?php echo e($porder->count()); ?></h4>
              </div>
                 </div>
                    </div>-->
			 
			 
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-blog"></i></span>
            
                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Artigos')); ?></span>
                    <span class="info-box-number font-weight-normal"><?php echo e($currentLang->blogs()->count()); ?></span>
                  </div>
                  
                </div>
                
              </div>
			 
			 
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-users"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Vagas')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($currentLang->jobs()->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-users"></i></span>
                  <?php
                       $applicants = App\Models\JobApplication::where('status', '0')->orderBy('id', 'DESC')->get();
                  ?>
                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Vagas preenchidas')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($applicants->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-database"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Serviços')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($currentLang->services()->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-address-book"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Equipe')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($currentLang->teams()->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-users"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Clientes')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e(\App\Models\Newsletter::count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-address-book"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('LGPD')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e(\App\Models\Quote::count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-laptop"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Projetos')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($currentLang->portfolios()->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
           
          
              <!--<div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-image"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Galeria')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e($currentLang->galleries()->count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
               <!-- </div>
                <!-- /.info-box -->
             <!-- </div> -->
              <div class="col-md-4 col-sm-6 col-12">
                <div class="info-box">
                  <span class="info-box-icon bg-info"><i class="far fa-user-plus"></i></span>

                  <div class="info-box-content">
                    <span class="info-box-text"><?php echo e(__('Usuários')); ?></span>
                    <h4 class="info-box-number font-weight-normal"><?php echo e(\App\Models\User::count()); ?></h4>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
              </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                <h3 class="card-title"><?php echo e(__('Últimos Chamados:')); ?>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="idtable" class="table table-bordered table-striped data_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('Assunto')); ?></th>
                            <th><?php echo e(__('Email')); ?></th>
                            <th><?php echo e(__('Ação')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php $__currentLoopData = $quotes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$quote): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$id); ?></td>
                            <td>
                                <?php echo e($quote->subject); ?>

                            </td> 
                            <td>
                                <a href="mailto:<?php echo e($quote->email); ?>" class="btn btn-primary btn-sm"><i class="fas fa-paper-plane"></i> <?php echo e(__('Enviar')); ?></a>
                            </td> 
                         
                            <td>
                                <a class="btn btn-info btn-sm" href="<?php echo e(route('admin.quote.details', $quote->id)); ?>" ><i class="fas fa-eye"></i><?php echo e(__('Detalhes')); ?></a>
                                <form  id="deleteform" class="d-inline-block" action="<?php echo e(route('admin.quote.delete', $quote->id )); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger btn-sm"  id="delete">
                                    <i class="fas fa-trash"></i><?php echo e(__(' Deletar')); ?>

                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-primary card-outline">
                <div class="card-header">
                <h3 class="card-title"><?php echo e(__('Últimos Portfólios :')); ?></h3>
                
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                <table id="idtable" class="table table-bordered table-striped data_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('Título')); ?></th>
                            <th><?php echo e(__('Categoria')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php $__currentLoopData = $portfolios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$portfolio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$id); ?></td>
                            <td>
                                <?php echo e($portfolio->title); ?>

                            </td> 
                            <td>
                                <?php echo e($portfolio->service->title); ?>

                            </td> 
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </tbody>
                </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
        </div>
      <!-- Main row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>