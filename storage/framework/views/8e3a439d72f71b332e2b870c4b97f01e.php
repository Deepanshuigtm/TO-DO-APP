<?php $__env->startSection('title',$task->title); ?>

<?php $__env->startSection('style'); ?>
    <style>
        .second-nav{
        display: flex;
        flex-direction:column;
        gap:1rem;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- <h1><?php echo e($task->title); ?></h1> -->
<a class="text-blue-700" href="<?php echo e(route('tasks.index')); ?>" ><- Go Back to the task list</a >


<p class="mb-4 mt-4 text-slate-700"><?php echo e($task->description); ?></p>
 
<?php if($task->long_description): ?>
    <p><?php echo e($task->long_description); ?></p>
<?php else: ?>
    <p> there is no long description </p>
<?php endif; ?>

<p class="mb-4 mt-4 text-sm text-slate-500"> Created <?php echo e($task->created_at->diffForHumans()); ?> . Updated <?php echo e($task->updated_at->diffForHumans()); ?></p>

<p class="mb-4">
    <?php if($task->completed): ?>
        <span class="font-medium text-green-500">completed</span>
    <?php else: ?>
        <span class="font-medium text-red-500">not completed</span>
    <?php endif; ?> 
</p>
<div class="second-nav">
    <div class="btn">
        <a href="<?php echo e(route('tasks.edit',['task' => $task->id])); ?>" >Edit</a >
    </div>

    <div class="btn">
        <form action="<?php echo e(route('tasks.toggle-complete',['task' => $task->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <button type="submit">
                Mark as <?php echo e($task->completed ? 'not complted' : 'completed'); ?>

            </button>
        </form>
    </div>
    <div class="btn">
        <form action="<?php echo e(route('tasks.destroy',['task' => $task->id])); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button  type="submit">Delete</button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/deepanshusingh/Desktop/laravel/l10-task-list/resources/views/show.blade.php ENDPATH**/ ?>