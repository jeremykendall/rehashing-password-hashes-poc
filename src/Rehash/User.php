<?php

namespace Rehash;

class User
{
    private $passwordHash;
    private $newPasswordHash;
    private $passwordSalt;
    private $passwordVersion;

    public function getPasswordHash()
    {
        return $this->passwordHash;
    }

    public function setPasswordHash($passwordHash)
    {
        $this->passwordHash = $passwordHash;
    }

    public function getNewPasswordHash()
    {
        return $this->newPasswordHash;
    }

    public function setNewPasswordHash($newPasswordHash)
    {
        $this->newPasswordHash = $newPasswordHash;
    }

    public function getPasswordSalt()
    {
        return $this->passwordSalt;
    }

    public function setPasswordSalt($passwordSalt)
    {
        $this->passwordSalt = $passwordSalt;
    }

    public function getPasswordVersion()
    {
        return $this->passwordVersion;
    }

    public function setPasswordVersion($passwordVersion)
    {
        $this->passwordVersion = $passwordVersion;
    }
}
