<?php

namespace Potter\Network\Service;

use Potter\Network\NetworkInterface;

interface NetworkServiceInterface
{
    public const NETWORK_SERVICE_MIN_NAME = 4;
    public const NETWORK_SERVICE_MAX_NAME = 16;
    public const NETWORK_SERVICE_MAX_PORT = 65535;
    public const NETWORK_SERVICE_MAX_PROTOCOL = 8;
    public const NETWORK_SERVICE_NAME_ALLOWED_CHARACTERS = [' ', '-'];
    public const NETWORK_SERVICE_PROTOCOL_STRICT = true;
    public const NETWORK_SERVICE_PROTOCOL_ICMP = 'icmp';
    public const NETWORK_SERVICE_PROTOCOL_TCP = 'tcp';
    public const NETWORK_SERVICE_PROTOCOL_UDP = 'udp';
    
    public function connect(): void;
    
    public function getNetwork(): NetworkInterface;
    
    public function getNetworkServiceName(): string;
    
    public function getNetworkServicePort(): int;
    
    public function getNetworkServiceProtocol(): string;
    
    public function networkServiceIsIcmp(): bool;
    
    public function networkServiceIsTcp(): bool;
    
    public function networkServiceIsUdp(): bool;
    
    public function shareNetworkServiceCapability(): void;
}
