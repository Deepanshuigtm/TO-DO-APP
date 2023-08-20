<?php $__env->startSection('title',isset($task) ? 'Edit Task' : 'Add Tasks'); ?>


<?php $__env->startSection('content'); ?>
    <!-- <?php echo e($errors); ?> -->
    <form method="POST" action="<?php echo e(isset($task) ? route('tasks.update',['task' => $task->id]) : route('tasks.store')); ?>">
        <?php echo csrf_field(); ?>
        <?php if(isset($task)): ?>
            <?php echo method_field('PUT'); ?>
        <?php endif; ?>
        <div class="mb-4">
            <label for="title"> title</label>
            <input class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500'=> $errors->has('title')]); ?>" text="text" name="title" id="title" value="<?php echo e($task->title ?? old('title')); ?>" />
            <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error" ><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="mb-4">
            <label for="description"> Description </label>
            <textarea class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500'=> $errors->has('title')]); ?>" name="description" id="title" rows="5"><?php echo e($task->description ?? old('description')); ?></textarea>
            <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error" ><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="mb-4">
            <label for="long_description"> Long Description </label>
            <textarea class="<?php echo \Illuminate\Support\Arr::toCssClasses(['border-red-500'=> $errors->has('title')]); ?>" name="long_description" id="title" rows="10"><?php echo e($task->long_description ?? old('long_description')); ?></textarea>
            <?php $__errorArgs = ['long_description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <p class="error" ><?php echo e($message); ?></p>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button class="btn" type="submit">
            <?php if(isset($task)): ?>
                Update Task
            <?php else: ?>
                Add Task
            <?php endif; ?>
        </button>
        <a style="margin-left:1rem;" href="<?php echo e(route('tasks.index')); ?>"> Cancel</a>
    </form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/deepanshusingh/Desktop/laravel/l10-task-list/resources/views/form.blade.php ENDPATH**/ ?>