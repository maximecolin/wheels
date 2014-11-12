<?php

/*
 * This file is part of the Wheels package.
 *
 * (c) Maxime Colin <contact@maximecolin.fr>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Wheels\Tests;

use Wheels\CommandBus;
use Wheels\Resolver\ClassNameResolver;

/**
 * CommandBus test
 */
class CommandBusTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test command execution
     */
    public function testExecute()
    {
        $bus = new CommandBus();
        $bus->addResolver(new ClassNameResolver());

        $command = new Fixtures\FoobarCommand();

        $bus->execute($command);
    }

    /**
     * Test the bus throw an exception if no handler found
     */
    public function testNoHandlerFoundException()
    {
        $this->setExpectedException('Wheels\Exception\NoHandlerFoundException');

        $bus = new CommandBus();

        $command = new Fixtures\FoobarCommand();

        $bus->execute($command);
    }
}
