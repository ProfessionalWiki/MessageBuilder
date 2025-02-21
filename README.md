# Message Builder

[![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/ProfessionalWiki/MessageBuilder/ci.yml?branch=master)](https://github.com/ProfessionalWiki/MessageBuilder/actions?query=workflow%3ACI)
[![Type Coverage](https://shepherd.dev/github/ProfessionalWiki/MessageBuilder/coverage.svg)](https://shepherd.dev/github/ProfessionalWiki/MessageBuilder)
[![codecov](https://codecov.io/gh/ProfessionalWiki/MessageBuilder/branch/master/graph/badge.svg?token=GnOG3FF16Z)](https://codecov.io/gh/ProfessionalWiki/MessageBuilder)
[![Latest Stable Version](https://poser.pugx.org/professional-wiki/message-builder/v/stable)](https://packagist.org/packages/professional-wiki/message-builder)
[![Download count](https://poser.pugx.org/professional-wiki/message-builder/downloads)](https://packagist.org/packages/professional-wiki/message-builder)
[![License](https://poser.pugx.org/professional-wiki/message-builder/license)](LICENSE)

Message Builder is a small message localization library for PHP.

This library was extracted from the [EDTF library](https://github.com/ProfessionalWiki/EDTF).
It can be used together with [TranslateWiki](https://translatewiki.net/), though does not depend on it.

## MessageBuilder interface

```php
interface MessageBuilder {
	/**
	 * @throws UnknownMessageKey
	 */
	public function buildMessage( string $messageKey, string ...$arguments ): string;
}
```

## Usage

```php
$messageBuilder = new ArrayMessageBuilder( [ 
	'hello-something' => 'Hello, $1!',
	'multi-argument-example' => 'foo $2 $1 bar $3', 
	'plural-example' => 'You have $1 {{plural:$1|item|items}} in your cart.',
] );

function someCode( MessageBuilder $messageBuilder ) {
	// Returns 'Hello, world!'
	$messageBuilder->getMessage( 'hello-something', [ 'world' ] );
}
```

For a real world usage example, see the [EDTF library](https://github.com/ProfessionalWiki/EDTF).

## Implementations

* `ArrayMessageBuilder` - In-memory message builder with PLURAL keyword support
* `FallbackMessageBuilder` - Fallback message builder that delegates to multiple message builders
* `MessageBuilderSpy` - Message builder that records all messages built for testing

## Development

Start by installing the project dependencies by executing

    composer install

You can run test and static analysis via Make. See Makefile for available commands.
If you do not have Make, you can run the commands listed in the Makefile manually.

To run all checks run by the GitHub Actions CI, simply run `make`.

## Release notes

### Version 1.0.1 (2025-02-21)

* Removed superfluous `ext-json` dependency.

### Version 1.0.0 (2025-02-20)

* Initial release with `ArrayMessageBuilder`, `FallbackMessageBuilder`, and `MessageBuilderSpy` implementations.
