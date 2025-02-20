<?php

declare( strict_types = 1 );

namespace ProfessionalWiki\MessageBuilder\Tests;

use PHPUnit\Framework\TestCase;
use ProfessionalWiki\MessageBuilder\ArrayMessageBuilder;
use ProfessionalWiki\MessageBuilder\FallbackMessageBuilder;
use ProfessionalWiki\MessageBuilder\UnknownMessageKey;

/**
 * @covers \ProfessionalWiki\MessageBuilder\FallbackMessageBuilder
 */
class FallbackMessageBuilderTest extends TestCase {

	public function testBuildMessageThrowsException(): void {
		$builder = new FallbackMessageBuilder( new ArrayMessageBuilder( [] ), new ArrayMessageBuilder( [] ) );
		$this->expectException( UnknownMessageKey::class );

		$builder->buildMessage( 'not-existing-key' );
	}

	public function testBuildMessageUseFallbackTranslation(): void {
		$primaryBuilder = new ArrayMessageBuilder( [] );
		$fallbackBuilder = new ArrayMessageBuilder( [ 'random-string' => 'Random string' ] );

		$builder = new FallbackMessageBuilder( $primaryBuilder, $fallbackBuilder );

		$this->assertSame( "Random string", $builder->buildMessage( 'random-string' ) );
	}

	public function testBuildMessageUsePrimaryTranslation(): void {
		$primaryBuilder = new ArrayMessageBuilder( [ 'random-string' => 'Random string' ] );

		$fallbackBuilderSpy = $this->createMock( ArrayMessageBuilder::class );
		$fallbackBuilderSpy
			->expects( $this->never() )
			->method( 'buildMessage' );

		$builder = new FallbackMessageBuilder( $primaryBuilder, $fallbackBuilderSpy );
		$this->assertSame( "Random string", $builder->buildMessage( 'random-string' ) );
	}

}
