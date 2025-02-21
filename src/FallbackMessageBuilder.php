<?php

declare( strict_types = 1 );

namespace ProfessionalWiki\MessageBuilder;

class FallbackMessageBuilder implements MessageBuilder {

	public function __construct(
		private readonly MessageBuilder $primaryBuilder,
		private readonly MessageBuilder $fallbackBuilder,
	) {
	}

	/**
	 * @throws UnknownMessageKey
	 */
	public function buildMessage( string $messageKey, string ...$arguments ): string {
		try {
			$message = $this->primaryBuilder->buildMessage( $messageKey, ...$arguments );
		}
		catch ( UnknownMessageKey ) {
			$message = $this->fallbackBuilder->buildMessage( $messageKey, ...$arguments );
		}

		return $message;
	}

}