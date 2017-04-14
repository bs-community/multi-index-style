<?php

return [
    App\Events\PluginWasEnabled::class => function () {
        Artisan::call('view:clear');
    },
    'PluginWasInstalled' => function () {
        if (file_exists($path = base_path('plugins/multi-index-style/views/index/index-default.tpl'))) {
            unlink($path);
        }
        if (file_exists($path = base_path('plugins/multi-index-style/views/index/index-fixed.tpl'))) {
            unlink($path);
        }
        if (file_exists($path = base_path('plugins/multi-index-style/views/index/index-old.tpl'))) {
            unlink($path);
        }
        if (file_exists($path = base_path('plugins/multi-index-style/views/config.tpl'))) {
            unlink($path);
        }
        if (file_exists($path = base_path('plugins/multi-index-style/views/example.tpl'))) {
            unlink($path);
        }
        Artisan::call('view:clear');
    }
];
