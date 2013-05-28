<?php

namespace Feather\Loader;

use Whoops\Run;
use Whoops\Handler\PrettyPageHandler;
use Exception as BaseException;

require_once '../vendor/autoload.php';

/*
* Get Exception handler set up and registered.
 */
class Exception extends BaseException {}

$run     = new Run;
$handler = new PrettyPageHandler;

$run->pushHandler($handler);
$run->register();

require_once '../app/config.php';
require_once 'router.php';
require_once 'view.php';
require_once 'model.php';
require_once 'basecontroller.php';
require_once 'database.php';
require_once 'orm.php';

if ($handle = opendir('../app/models/orm')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != ".." && stripos(strrev($entry), 'php.') === 0) {
            require_once '../app/models/orm/'.$entry;
        }
    }
    closedir($handle);
}

?>