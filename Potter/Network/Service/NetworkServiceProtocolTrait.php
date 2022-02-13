<?php

namespace Potter\Network\Service;

use Potter\Throwable\Exception\{
    Logic\Length\LengthException,
    Runtime\UnexpectedValue\UnexpectedValueException
};

trait NetworkServiceProtocolTrait
{
    private string $networkServiceProtocol;
    
    final public function getNetworkServiceProtocol(): string
    {
        return $this->networkServiceProtocol;
    }
    
    final public function networkServiceIsIcmp(): bool
    {
        return $this->networkServiceProtocol === NetworkServiceInterface::NETWORK_SERVICE_PROTOCOL_ICMP;
    }
    
    final public function networkServiceIsTcp(): bool
    {
        return $this->networkServiceProtocol === NetworkServiceInterface::NETWORK_SERVICE_PROTOCOL_TCP;
    }
    
    final public function networkServiceIsUdp(): bool
    {
        return $this->networkServiceProtocol === NetworkServiceInterface::NETWORK_SERVICE_PROTOCOL_UDP;
    }
    
    final protected function setNetworkServiceProtocol(string $networkServiceProtocol): void
    {
        if (strlen($networkServiceProtocol) > NetworkServiceInterface::NETWORK_SERVICE_MAX_PROTOCOL)
            throw new LengthException;
        if (!$this->validateNetworkServiceProtocol($networkServiceProtocol))
            throw new UnexpectedValueException;
        $this->networkServiceProtocol = strtolower($networkServiceProtocol);
    }
    
    private function validateNetworkServiceProtocol(string $networkServiceProtocol): bool
    {
        if (!ctype_alnum($networkServiceProtocol))
            return false;
        if (!NetworkServiceInterface::NETWORK_SERVICE_PROTOCOL_STRICT)
            return true;
        return ((strcasecmp($networkServiceProtocol, NetworkServiceInterface::NETWORK_SERVICE_PROTOCOL_ICMP) === 0)
            || (strcasecmp($networkServiceProtocol, NetworkServiceInterface::NETWORK_SERVICE_PROTOCOL_TCP) === 0)
            || strcasecmp($networkServiceProtocol, NetworkServiceInterface::NETWORK_SERVICE_PROTOCOL_UDP) === 0);
    }
}