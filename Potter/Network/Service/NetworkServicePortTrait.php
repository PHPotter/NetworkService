<?php

namespace Potter\Network\Service;

use Potter\Throwable\Exception\Runtime\UnexpectedValue\UnexpectedValueException;

trait NetworkServicePortTrait
{
    private int $networkServicePort;
    
    final public function getNetworkServicePort(): int
    {
        return $this->networkServicePort;
    }

    final protected function setNetworkServicePort(int $networkServicePort): void
    {
        if (!$this->validateNetworkServicePort($networkServicePort))
            throw new UnexpectedValueException;
        $this->networkServicePort = $networkServicePort;
    }
    
    private function validateNetworkServicePort(int $networkServicePort): bool
    {
        return $networkServicePort > 0 && $networkServicePort <= NetworkServiceInterface::NETWORK_SERVICE_MAX_PORT;
    }
}
