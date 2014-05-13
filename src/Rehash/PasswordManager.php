<?php

namespace Rehash;

class PasswordManager
{
    public function savePassword(User $user, $password)
    {
        $hash = $this->hashPassword($password);
        $user->setPasswordHash($hash);
    }

    public function checkUserPasswordLegacy(User $user, $password)
    {
        return $this->checkPassword(
            $password, 
            $user->getPasswordHash()
        );
    }

    public function checkUserPassword(User $user, $password)
    {
        if ($user->getPasswordVersion() =='legacy') {
            // using our old hashPassword function and our old salt
            $oldStyleHash = $this->hashPassword($password);

            return password_verify($oldStyleHash, $user->getNewPasswordHash());
            // if you want, now might be a good time to hash the actual password,
            // and upgrade the user's password version.
        }
        // else, use password_verify() as normal
    }

    public function checkPassword($password, $hash)
    {
        return $hash == $this->hashPassword($password);
    }

    public function convertUserPassword(User $user)
    {
        $user->setPasswordVersion('legacy');
        $user->setNewPasswordHash(
            password_hash($user->getPasswordHash(), PASSWORD_DEFAULT)
        );
    }

    public function hashPassword($hash)
    {
        return md5($hash);
    }
}
