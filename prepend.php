<?php

include_once 'xhprof_lib/utils/xhprof_lib.php';
include_once 'xhprof_lib/utils/xhprof_runs.php';

xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_MEMORY, []);

register_shutdown_function(function () {
    $listen = [
        'localhost:8016',
    ];

    if(isset($_SERVER['HTTP_HOST']) && in_array($_SERVER['HTTP_HOST'], $listen)) {
        $xhprof_data = xhprof_disable();
        $xhprof_runs = new \XHProfRuns_Default('/Users/pb/Work/xhprof/data');
        $xhprof_runs->save_run($xhprof_data, $_SERVER['HTTP_HOST']);
    }
});