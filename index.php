<?php

use App\EventDispatcher;

require_once __DIR__.'/vendor/autoload.php';

$dispatcher = new EventDispatcher();
$dispatcher->addListener('foo', static function (object $event) {
    echo sprintf("Foo event called : %s\n", $event->foo);
});

$event = new stdClass();
$event->foo = 'bar';

try {
    $dispatcher->dispatch($event, 'bar');
} catch (\InvalidArgumentException $e) {
    echo $e->getMessage().\PHP_EOL;
}
