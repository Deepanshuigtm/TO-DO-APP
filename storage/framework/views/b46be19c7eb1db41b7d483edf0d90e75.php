
<?php $__env->startSection('title','This is just to practise'); ?>

<?php $__env->startSection('content'); ?>

<?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div>
            <a href="<?php echo e(route('tasks.show',['title' => $task->title])); ?>"> <?php echo e($task->title); ?> </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div>there are no tasks</div>
    <?php endif; ?>
<?php $__env->stopSection(); ?><?php /**PATH /Users/deepanshusingh/Desktop/laravel/l10-task-list/resources/views/practise.blade.php ENDPATH**/ ?>