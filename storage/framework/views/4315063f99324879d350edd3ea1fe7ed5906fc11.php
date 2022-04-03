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
            <td>NOMBRE COMPLETO</td>
            <td>SEXO</td>
            <td>FOTO</td>
            <td>PERFIL</td>
            <td colspan="2">ACTION</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $candidatos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($candidato->id); ?></td>
            <td><?php echo e($candidato->nombrecompleto); ?></td>
            <td><?php echo e($candidato->sexo); ?></td>
            <td><img src="images/<?php echo e($candidato->foto); ?>" width="128px" height="128px" ></td>
            <td><a href="pdf/<?php echo e($candidato->perfil); ?>"><?php echo e($candidato->nombrecompleto); ?></td>
            <td><a href="<?php echo e(route('candidato.edit', $candidato->id)); ?>" 
            class="btn btn-primary" >
            <i class="fa fa-edit" aria-hidden="true"></i></a> </td>
            <td>

            <form action="<?php echo e(route('candidato.destroy', $candidato->id)); ?>"
            method="post">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button class="btn btn-danger" type="submit"
            onclick="return confirm('Esta seguro de borrar <?php echo e($candidato->nombrecompleto); ?>')" >
            <i class="fa fa-trash" aria-hidden="true"></i></button>
            </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/proyecto_laravel/resources/views/candidato/list.blade.php ENDPATH**/ ?>