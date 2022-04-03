<?php $__env->startSection('content'); ?>
<style>
    .uper {
    margin-top: 40px;
    }
</style>

<div class="uper">
    <?php if(session()->get('success')): ?>
    <div class="alert alert-success">
        <?php echo e(session()->get('success')); ?>

    </div>
    <br />
    <?php endif; ?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>UBICACION</td>
            <td colspan="2">ACTION</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $casillas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $casilla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($casilla->id); ?></td>
            <td><?php echo e($casilla->ubicacion); ?></td>
            <td><a href="<?php echo e(route('casilla.edit', $casilla->id)); ?>"
            class="btn btn-primary">Edit</a></td>
            <td>
            <form action="<?php echo e(route('casilla.destroy', $casilla->id)); ?>"
            method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="btn btn-danger" type="submit"
            onclick="return confirm('Esta seguro de borrar <?php echo e($casilla->ubicacion); ?>')" >Del</button>
            </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    
</table>
<div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/proyecto_laravel/resources/views/casilla/list.blade.php ENDPATH**/ ?>