<?php

namespace Dewep\Tests;

use Dewep\Patterns\Singleton;
use PHPUnit\Framework\TestCase;

class SingletonTest extends TestCase
{
    public function testGetInstance()
    {
        ExampleOneSingleton::getInstance();
        ExampleTwoSingleton::getInstance();

        self::assertEquals(
            ExampleOneSingleton::getInstance(),
            ExampleOneSingleton::getInstance()
        );
        
        self::assertNotEquals(
            ExampleOneSingleton::getInstance(),
            ExampleTwoSingleton::getInstance()
        );
    }
}

class ExampleOneSingleton extends Singleton
{

}

class ExampleTwoSingleton extends Singleton
{

}
