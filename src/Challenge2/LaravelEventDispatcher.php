<?php

namespace Interview\Challenge2;

use Illuminate\Events\Dispatcher;

/*
 * Implement interface methods and proxy them to Laravel event dispatcher
 */
class LaravelEventDispatcher implements EventDispatcherInterface
{
    /**
    * @var Dispatcher
    */
    protected Dispatcher $event;

    /**
    * @param object $event
    * @return void|bool
    */
    public function dispatch(object $event)
    {
        if (!($this->event instanceof Dispatcher)) {
            return false;
        }
        $this->event->dispatch($event);
    }

    /**
    * @param string $event
    * @param \Closure $listener
    */
    public function addListener(string $event, \Closure $listener)
    {
        $this->event = new Dispatcher();
        $this->event->listen($listener);
    }
}