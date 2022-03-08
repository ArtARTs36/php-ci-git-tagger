<?php

namespace ArtARTs36\CiGitTagger\Tag;

use ArtARTs36\Str\Facade\Str;

class Message
{
    /**
     * @param array<string, string> $vars
     */
    public function __construct(public string $message, protected array $vars = [])
    {
        //
    }


    /**
     * @param array<string, string> $vars
     */
    public function addVars(array $vars): void
    {
        foreach ($vars as $key => $var) {
            $this->addVar($key, $var);
        }
    }

    public function addVar(string $key, string $var): self
    {
        $this->vars['{$'. $key . '}'] = $var;

        return $this;
    }

    public function render(): string
    {
        return Str::replace($this->message, $this->vars);
    }
}
