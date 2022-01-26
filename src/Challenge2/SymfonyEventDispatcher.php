<?php

namespace Interview\Challenge2;

use Symfony\Component\EventDispatcher\EventDispatcher;

/*
 * Implement interface methods and proxy them to Symfony event dispatcher
 */
class SymfonyEventDispatcher implements EventDispatcherInterface
{
    /**
    * @var EventDispatcher
    */
    protected EventDispatcher $event;

    /**
    * @param object $event
    * @return void|bool
    */
    public function dispatch(object $event)
    {
        if (!($this->event instanceof EventDispatcher)) {
            return false;
        }
        $this->event->dispatch($event, $event::class);
    }

    /**
    * @param string $event
    * @param \Closure $listener
    */
    public function addListener(string $event, \Closure $listener)
    {
        $this->event = new EventDispatcher();
        $this->event->addListener($event, $listener);
    }
}