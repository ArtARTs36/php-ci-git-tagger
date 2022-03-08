<?php

namespace ArtARTs36\CiGitTagger\Tag;

class Tag
{
    public function __construct(
        public string $name,
        public ?Message $message,
    ) {
        //
    }

    public static function make(string $name, ?string $message = null): self
    {
        return new self($name, $message ? new Message($message, [
            'TAG' => $name,
        ]) : null);
    }
}
