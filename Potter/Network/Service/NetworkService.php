<?php

namespace Potter\Network\Service;

use Potter\Network\NetworkInterface;

abstract class NetworkService extends AbstractNetworkService
{
    use NetworkServiceNameTrait, NetworkServiceParentTrait, NetworkServicePortTrait, NetworkServiceProtocolTrait;
    
    public function __construct(NetworkInterface $network, string $networkServiceName, string $networkServiceProtocol, int $networkServicePort)
    {
        $this->setNetwork($network);
        $this->setNetworkServiceName($networkServiceName);
        $this->setNetworkServiceProtocol($networkServiceProtocol);
        $this->setNetworkServicePort($networkServicePort);
        $this->shareNetworkServiceCapability();
    }
}
