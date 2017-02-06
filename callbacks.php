<?php

return [
    App\Events\PluginWasEnabled::class => function () {
        Artisan::call('view:clear');
    }
];
