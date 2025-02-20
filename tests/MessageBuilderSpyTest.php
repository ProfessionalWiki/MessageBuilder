<?php

declare( strict_types = 1 );

namespace ProfessionalWiki\MessageBuilder\Tests;

use PHPUnit\Framework\TestCase;
use ProfessionalWiki\MessageBuilder\MessageBuilderSpy;

/**
 * @covers \ProfessionalWiki\MessageBuilder\MessageBuilderSpy
 */
class MessageBuilderSpyTest extends TestCase {

	public function testReturnsEmptyArrayWhenThereAreNoCalls(): void {
		$spy = new MessageBuilderSpy();
		$this->assertSame( [], $spy->getBuildMessageCalls() );
	}

	public function testReturnsAllCalls(): void {
		$spy = new MessageBuilderSpy();
		$spy->buildMessage( 'key1', 'arg1', 'arg2' );
		$spy->buildMessage( 'key2', 'arg3', 'arg4' );

		$this->assertSame(
			[
				[ 'key1', 'arg1', 'arg2' ],
				[ 'key2', 'arg3', 'arg4' ],
			],
			$spy->getBuildMessageCalls()
		);
	}

}
