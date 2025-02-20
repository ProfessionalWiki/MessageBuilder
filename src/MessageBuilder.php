<?php

declare( strict_types = 1 );

namespace ProfessionalWiki\MessageBuilder;

interface MessageBuilder {

	/**
	 * @throws UnknownMessageKey
	 */
	public function buildMessage( string $messageKey, string ...$arguments ): string;

}
