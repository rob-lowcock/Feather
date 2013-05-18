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
$handler->setEditor('sublime');

$run->pushHandler($handler);
$run->register();

require_once '../app/config.php';
require_once 'router.php';
require_once 'view.php';
require_once 'model.php';
require_once 'basecontroller.php';

?>