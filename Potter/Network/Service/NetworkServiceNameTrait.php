<?php

namespace Potter\Network\Service;

use Potter\Throwable\Exception\{
    Logic\Length\LengthException,
    Runtime\UnexpectedValue\UnexpectedValueException
};

trait NetworkServiceNameTrait
{
    private string $networkServiceName;
    
    final public function getNetworkServiceName(): string
    {
        return $this->networkServiceName;
    }
    
    final protected function setNetworkServiceName(string $networkServiceName): void
    {
        if (!$this->validateNetworkServiceNameLength($networkServiceName))
            throw new LengthException;
        if (!$this->validateNetworkServiceName($networkServiceName))
            throw new UnexpectedValueException;
        $this->networkServiceName = $networkServiceName;
    }
    
    private function validateNetworkServiceName(string $networkServiceName): bool
    {
        $networkServiceName = str_replace(NetworkServiceInterface::NETWORK_SERVICE_NAME_ALLOWED_CHARACTERS, '', $networkServiceName);
        return ctype_alnum($networkServiceName);
    }
    
    private function validateNetworkServiceNameLength(string $networkServiceName): bool
    {
        $length = strlen($networkServiceName);
        return $length >= NetworkServiceInterface::NETWORK_SERVICE_MIN_NAME
                && $length <= NetworkServiceInterface::NETWORK_SERVICE_MAX_NAME;
    }
}
