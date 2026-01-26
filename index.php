<?php

class EventDispatcher
{
    /**
     * @var array<string, array<int, callable>>
     */
    private array $listeners = [];

    public function addListener(string $eventName, callable $listener): void
    {
        $this->listeners[$eventName][] = $listener;
    }

    public function dispatch(object $event, ?string $eventName = null): object
    {
        $eventName ??= $event::class;
        //$eventName = $eventName === null ? $event::class : $eventName;

        foreach ($this->listeners[$eventName] as $listener) {
            $listener($event);
        }

        return $event;
    }
}

$dispatcher = new EventDispatcher();
$dispatcher->addListener('foo', static function (object $event) {
    echo sprintf("Foo event called : %s\n", $event->foo);
});

$event = new stdClass();
$event->foo = 'bar';

$dispatcher->dispatch($event, 'foo');
