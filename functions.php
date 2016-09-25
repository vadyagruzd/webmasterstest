<?php

function view($view, $data=false, $lang) {
    if($data) extract($data);
    ob_start();
    eval('?>'.preg_replace('/;*\s*\?>/', '; ?>', str_replace('<?=', '<?php echo ', file_get_contents($view))));
    $page = ob_get_contents();
    @ob_end_clean();
    
    return $page;
}
