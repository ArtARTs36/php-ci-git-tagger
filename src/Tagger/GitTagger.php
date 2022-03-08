<?php

namespace ArtARTs36\CiGitTagger\Tagger;

use ArtARTs36\CiGitTagger\Contracts\Tagger;
use ArtARTs36\CiGitTagger\Remote\Credentials;
use ArtARTs36\CiGitTagger\Tag\Tag;
use ArtARTs36\GitHandler\Contracts\Handler\GitHandler;
use ArtARTs36\GitHandler\Making\MakingPush;
use Psr\Http\Message\UriInterface;

class GitTagger implements Tagger
{
    public function __construct(private GitHandler $git, private Credentials $credentials)
    {
        //
    }

    public function tag(Tag $tag): void
    {
        $this->git->tags()->add($tag->name, $tag->message?->render());

        $this->git->pushes()->send(function (MakingPush $push) {
            $push
                ->onRemote(function (UriInterface $uri) {
                    return $uri->withUserInfo($this->credentials->login, $this->credentials->token);
                })
                ->onSetUpStream();
        });
    }
}
