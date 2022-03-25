<?php

require_once 'app/core/core.php';

require_once 'lib/database/connection.php';

require_once 'app/controller/HomeController.php';
require_once 'app/controller/ErroController.php';
require_once 'app/controller/PostController.php';
require_once 'app/controller/CreateController.php';
require_once 'app/controller/SobreController.php';
require_once 'app/controller/LoginController.php';

require_once  'app/model/Postagem.php';

require_once  'vendor/autoload.php';

$template = file_get_contents('app/template/structure.html');

ob_start();
    $core = new Core;
    $core->start($_GET);

    $exit = ob_get_contents();
ob_end_clean();

$tpl_done = str_replace('{{dynamicArea}}', $exit, $template );

echo $tpl_done;