<?php

class EventDispatcher
{
    /**
     * @var array<string, array<int, callable>>
     */
    private array $listeners = [];

    public function addListener(string $eventName, callable|EventListenerInterface $listener): void
    {
        $this->listeners[$eventName][] = $listener;
    }

    public function dispatch(object $event, ?string $eventName = null): object
    {
        $eventName ??= $event::class;
        //$eventName = $eventName === null ? $event::class : $eventName;

        if (!isset($this->listeners[$eventName])) {
            throw new \InvalidArgumentException(sprintf('No listener found for event "%s"', $eventName));
        }

        foreach ($this->listeners[$eventName] as $listener) {
            if ($listener instanceof EventListenerInterface) {
                $listener->handle($event);
            } else {
                $listener($event);
            }
        }

        return $event;
    }
}
