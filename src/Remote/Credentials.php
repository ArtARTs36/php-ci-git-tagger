<?php

namespace ArtARTs36\CiGitTagger\Remote;

use ArtARTs36\GitHandler\Support\ToArray;
use JetBrains\PhpStorm\ArrayShape;
use JetBrains\PhpStorm\Immutable;

#[Immutable]
class Credentials
{
    use ToArray;

    public function __construct(
        public string $login,
        public string $token,
    ) {
        //
    }

    /**
     * @param array<string, string> $array
     */
    public static function fromArray(
        #[ArrayShape([
            'login' => 'string',
            'token' => 'string',
        ])]
        array $array
    ): self {
        return new self($array['login'], $array['token']);
    }
}
