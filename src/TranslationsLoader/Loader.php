<?php

declare( strict_types = 1 );

namespace ProfessionalWiki\MessageBuilder\TranslationsLoader;

interface Loader {

	/**
	 * @param string $languageCode
	 *
	 * @return array<string, string>
	 */
	public function load( string $languageCode ): array;

}