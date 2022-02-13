<?php

namespace Potter\Network\Service;

use Potter\Network\NetworkInterface;

trait NetworkServiceParentTrait 
{
    private NetworkInterface $network;
    
    final public function getNetwork(): NetworkInterface
    {
        return $this->network;
    }
    
    abstract public function getNetworkServiceName(): string;
    
    abstract public function getNetworkServicePort(): int;
    
    abstract public function getNetworkServiceProtocol(): string;
    
    final protected function setNetwork(NetworkInterface $network): void
    {
        $this->network = $network;
    }
    
    final public function shareNetworkServiceCapability(): void
    {
        $this->network->addNetworkServiceCapability(
            networkServiceName: $this->getNetworkServiceName(),
            networkServiceProtocol: $this->getNetworkServiceProtocol(),
            networkServicePort: $this->getNetworkServicePort()
        );
    }
    
    
}
