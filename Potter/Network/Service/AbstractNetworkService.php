<?php

namespace Potter\Network\Service;

use Potter\Network\NetworkInterface;

abstract class AbstractNetworkService implements NetworkServiceInterface
{
    abstract public function connect(): void;
    
    abstract public function getNetwork(): NetworkInterface;
    
    abstract public function getNetworkServiceName(): string;
    
    abstract public function getNetworkServicePort(): int;
    
    abstract public function getNetworkServiceProtocol(): string;
    
    abstract public function networkServiceIsIcmp(): bool;
    
    abstract public function networkServiceIsTcp(): bool;
    
    abstract public function networkServiceIsUdp(): bool;
    
    abstract protected function setNetwork(NetworkInterface $network): void;
    
    abstract protected function setNetworkServiceName(string $networkServiceName): void;
    
    abstract protected function setNetworkServicePort(int $networkServicePort): void;
    
    abstract protected function setNetworkServiceProtocol(string $networkServiceProtocol): void;
    
    abstract public function shareNetworkServiceCapability(): void;
}
