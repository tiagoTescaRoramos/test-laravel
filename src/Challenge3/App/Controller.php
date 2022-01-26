<?php

namespace Interview\Challenge3\App;

use Interview\Challenge3\Vendor\StateRequestFactoryInterface;
use Interview\Challenge3\Vendor\AddressRepositoryInterface;
use Interview\Challenge3\Vendor\CustomerAddress;

class Controller
{
    private $factory;
    private $service;

    public function __construct(
        StateRequestFactoryInterface $factory,
        AddressRepositoryInterface $repository
    )
    {
        $this->factory = $factory;
        $this->service = new CustomerAddress($repository);
    }

    public function changeStateAction()
    {
        $this->service->changeState(
            $this->factory->createFromGET()
        );

        if (substr($_GET['state'],0,7) == 'invalid') {
            throw new \DomainException('');
        }
    }

}