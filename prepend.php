<?php

include_once 'conf.php';
include_once 'xhprof_lib/utils/xhprof_lib.php';
include_once 'xhprof_lib/utils/xhprof_runs.php';

xhprof_enable(XHPROF_FLAGS_NO_BUILTINS | XHPROF_FLAGS_MEMORY, []);

register_shutdown_function(function () {
    $xhprof_data = xhprof_disable();
    $xhprof_runs = new \XHProfRuns_Default(XhprofData);
    $xhprof_runs->save_run($xhprof_data, 'test');

});