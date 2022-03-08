<?php

namespace ArtARTs36\CiGitTagger\Contracts;

use ArtARTs36\CiGitTagger\Tag\Tag;

interface Tagger
{
    public function tag(Tag $tag): void;
}
