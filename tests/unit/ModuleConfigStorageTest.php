<?php

use \Codeception\Module\Drupal\UserRegistry\Storage\ModuleConfigStorage;
use \Codeception\Util\Fixtures;

/**
 * Unit tests for DrushTestUserManager class.
 */
class ModuleConfigStorageTest extends \Codeception\TestCase\Test
{
    /**
     * @var \UnitTester
     *   Store the Actor object being used to test.
     */
    protected $tester;

    /**
     * Objects of this class should be instantiable.
     *
     * @test
     */
    public function instantiateClass()
    {
        $this->assertInstanceOf(
            '\Codeception\Module\Drupal\UserRegistry\Storage\ModuleConfigStorage',
            new ModuleConfigStorage(Fixtures::get("validModuleConfig"))
        );
    }

    /**
     * Test that instantiating the class with an invalid custom username prefix throws the expected exception.
     */
    public function testInvalidCustomUsernamePrefixThrowsException()
    {
        $this->setExpectedException(
            '\Codeception\Exception\Configuration',
            "Drupal username prefix should contain at least 4 characters"
        );
        new ModuleConfigStorage(Fixtures::get("invalidCustomPrefixModuleConfig"));
    }
}
