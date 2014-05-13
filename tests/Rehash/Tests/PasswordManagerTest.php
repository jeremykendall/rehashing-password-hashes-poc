<?php

namespace Rehash\Tests;

use Rehash\PasswordManager;
use Rehash\User;

class PasswordManagerTest extends \PHPUnit_Framework_TestCase
{
    private $manager;
    private $plainTextPassword = 'password';
    private $legacyHash;
    private $newHash;

    protected function setUp()
    {
        parent::setUp();
        $this->manager = new PasswordManager();
        $this->legacyHash = $this->manager->hashPassword($this->plainTextPassword);
        $this->newHash = password_hash($this->legacyHash, PASSWORD_DEFAULT);
    }

    protected function tearDown()
    {
        $this->manager = null;
        parent::tearDown();
    }

    public function testRehashedPassword()
    {
        $plainTextPassword = 'password';
        $user = new User();

        $this->manager->savePassword($user, $plainTextPassword);

        $legacyPassword = $user->getPasswordHash();

        $this->assertTrue(
            $this->manager->checkUserPasswordLegacy($user, $plainTextPassword)
        );

        $this->manager->convertUserPassword($user);

        $this->assertNotEquals($legacyPassword, $user->getNewPasswordHash());
        $this->assertTrue(
            $this->manager->checkUserPassword($user, $plainTextPassword)
        );
    }

    public function testWithoutLegacyHashAvailableInUserObject()
    {
        $user = new User();
        $user->setPasswordVersion('legacy');
        $user->setNewPasswordHash($this->newHash);

        $this->assertTrue(
            $this->manager->checkUserPassword($user, $this->plainTextPassword)
        );
    }
}
