

<?php $__env->startSection('content'); ?>

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo e(__('History Section')); ?> </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin.dashboard')); ?>"><i class="fas fa-home"></i><?php echo e(__('Home')); ?></a></li>
            <li class="breadcrumb-item"><?php echo e(__('History Section')); ?></li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header  with-border">
                        <h3 class="card-title mt-1"><?php echo e(__('Add New History')); ?></h3>
                        <div class="card-tools">
                        <a href="<?php echo e(route('admin.history.index'). '?language=' . $currentLang->code); ?>" class="btn btn-primary btn-sm">
                            <i class="fas fa-angle-double-left"></i> <?php echo e(__('Back')); ?>

                        </a>
                        </div>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form class="form-horizontal" action="<?php echo e(route('admin.history.store')); ?>" method="POST" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Language')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <select class="form-control lang" name="language_id">
                                        <?php $__currentLoopData = $langs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($lang->id); ?>" <?php echo e($lang->is_default == '1' ? 'selected' : ''); ?> ><?php echo e($lang->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php if($errors->has('language_id')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('language_id')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Image')); ?> <span class="text-danger">*</span></label>
                                <div class="col-sm-10">
                                  <img class="w-400 mb-3 show-img img-demo" src="<?php echo e(asset('assets/admin/img/img-demo.jpg')); ?>" alt="">
                                  <div class="custom-file">
                                    <label class="custom-file-label" for="image"><?php echo e(__('Choose New Image')); ?></label>
                                    <input type="file" class="custom-file-input up-img" name="image" id="image">
                                  </div>
                                  <p class="help-block text-info"><?php echo e(__('Upload 505X300 (Pixel) Size image or Squre size image for best quality.
                                                        Only jpg, jpeg, png image is allowed.')); ?>

                                  </p>
                                  <?php if($errors->has('image')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('image')); ?> </p>
                                <?php endif; ?>
                                </div>
                              </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label"><?php echo e(__('Title')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" placeholder="<?php echo e(__('Title')); ?>" value="<?php echo e(old('title')); ?>">
                                    <?php if($errors->has('title')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('title')); ?> </p>
                                <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="value" class="col-sm-2 control-label"><?php echo e(__('Year')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="date" id="date_to" placeholder="<?php echo e(__('Year')); ?>" value="<?php echo e(old('date')); ?>">
                                    <?php if($errors->has('date')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('date')); ?> </p>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="value" class="col-sm-2 control-label"><?php echo e(__('Position')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="position" placeholder="<?php echo e(__('Position')); ?>" value="<?php echo e(old('position')); ?>">
                                    <?php if($errors->has('position')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('position')); ?> </p>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="value" class="col-sm-2 control-label"><?php echo e(__('Order')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="serial_number" placeholder="<?php echo e(__('Order')); ?>" value="<?php echo e(old('serial_number')); ?>">
                                    <?php if($errors->has('serial_number')): ?>
                                    <p class="text-danger"> <?php echo e($errors->first('serial_number')); ?> </p>
                                <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-2 control-label"><?php echo e(__('Status')); ?><span class="text-danger">*</span></label>

                                <div class="col-sm-10">
                                    <select class="form-control" name="status">
                                       <option value="0"><?php echo e(__('Unpublish')); ?></option>
                                       <option value="1"><?php echo e(__('Publish')); ?></option>
                                      </select>
                                    <?php if($errors->has('status')): ?>
                                        <p class="text-danger"> <?php echo e($errors->first('status')); ?> </p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->

</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/meuprogramador.com.br/stmgo.com.br/core/resources/views/admin/home/history/add.blade.php ENDPATH**/ ?>