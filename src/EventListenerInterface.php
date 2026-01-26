<?php

namespace App;
interface EventListenerInterface
{
    public function handle(object $event): void;
}
