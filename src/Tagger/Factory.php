<?php

namespace ArtARTs36\CiGitTagger\Tagger;

use ArtARTs36\CiGitTagger\Contracts\Tagger;
use ArtARTs36\CiGitTagger\Remote\Credentials;
use ArtARTs36\GitHandler\Contracts\Factory\GitHandlerFactory;
use ArtARTs36\GitHandler\Factory\LocalGitFactory;
use OndraM\CiDetector\CiDetector;

class Factory
{
    public function __construct(private GitHandlerFactory $gitFactory, private string $gitBin)
    {
        //
    }

    public static function local(string $gitBin = 'git'): self
    {
        return new self(new LocalGitFactory(), $gitBin);
    }

    public function create(string $gitDir, Credentials $credentials): Tagger
    {
        return new CiTagger(
            new GitTagger($this->gitFactory->factory($gitDir, $this->gitBin), $credentials),
            new CiDetector(),
        );
    }
}
