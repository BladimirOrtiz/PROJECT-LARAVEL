<?php $__env->startSection('content'); ?>

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
            <td>voto</td>
            <td>casilla</td>
            <td>Candidatos y votos</td>
            <td colspan="2">ACTION</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $votos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $voto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($voto->id); ?></td>
            <td><?php echo e($voto->casilla->ubicacion); ?></td>
            <td>
                <table>
                <?php $__currentLoopData = $voto->candidatos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($candidato->nombrecompleto); ?> </td>
                        <td><input type="text" readonly 
                        value="<?php echo e($candidato->pivot->votos); ?>"
                        name="candidato_<?php echo e($candidato->id); ?>"  > </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </table>
            </td>
            <td><a href="<?php echo e(route('voto.edit', $voto->id)); ?>"
                class="btn btn-primary">Edit</a></td>
                <td>
                <form action="<?php echo e(route('voto.destroy', $voto->id)); ?>"
                method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('DELETE'); ?>
                <button class="btn btn-danger" type="submit"
                onclick="return confirm('Esta seguro de borrar <?php echo e($voto->id); ?>')" >Del</button>
            </form>
            </td>
            
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
    
</table>
<div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/proyecto_laravel/resources/views/voto/list.blade.php ENDPATH**/ ?>