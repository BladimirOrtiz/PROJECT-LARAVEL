<?php $__env->startSection('content'); ?>
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        votos
    </div>
    <div class="card-body">
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div><br />
        <?php endif; ?>
        <form method="post" action="<?php echo e(route('voto.store')); ?> " 
        enctype="multipart/form-data">
        
            <?php echo csrf_field(); ?> 
            <div class="form-group">
                <label for="eleccion">Eleción:</label>
                <select name="eleccion_id" id="eleccion">
                <?php $__currentLoopData = $elecciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eleccion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($eleccion->id); ?>"><?php echo e($eleccion->periodo); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <label for="casilla">Casilla:</label>
                <select name="casilla_id" id="casilla">
                <?php $__currentLoopData = $casillas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $casilla): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($casilla->id); ?>"><?php echo e($casilla->ubicacion); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <div class="form-group">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Candidato</th>
                            <th>votos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $candidatos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $candidato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($candidato->nombrecompleto); ?></td>
                                <td>
                                    <input type="number" name="candidato_<?php echo e($candidato->id); ?>" >
                                </td>
                            </tr>                    
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>


            <div class="form-group">
                <label for="evidencia">Evidencia:</label>
                <input type="file" id="evidencia" accept="application/pdf"
                 class="form-control" name="evidencia" />
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/proyecto_laravel/resources/views/voto/create.blade.php ENDPATH**/ ?>