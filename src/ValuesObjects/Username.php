<?php
declare(strict_types=1);

namespace Ipssi\ValueObject;


final class Username
{
    private $username;

    public function __construct(string $username)
    {
        $this->username = ucwords(strtolower(trim($username)));
    }

    public function getPassword(): string
    {
        return $this->username;
    }
}