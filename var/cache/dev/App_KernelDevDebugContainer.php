<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerPjwF3HI\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerPjwF3HI/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerPjwF3HI.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerPjwF3HI\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerPjwF3HI\App_KernelDevDebugContainer([
    'container.build_hash' => 'PjwF3HI',
    'container.build_id' => '4a0a4d3b',
    'container.build_time' => 1587643687,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerPjwF3HI');
