<?php

namespace Rehash\Tests;

use Rehash\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    private $user;

    protected function setUp()
    {
        parent::setUp();
        $this->user = new User();
    }

    protected function tearDown()
    {
        $this->user = null;
        parent::tearDown();
    }

    public function testThrowAway()
    {
        $this->assertInstanceOf('Rehash\User', $this->user);
    }
}
