<?php

namespace ArtARTs36\CiGitTagger\Tagger;

use ArtARTs36\CiGitTagger\Contracts\Tagger;
use ArtARTs36\CiGitTagger\Tag\Tag;
use OndraM\CiDetector\CiDetectorInterface;

class CiTagger implements Tagger
{
    public function __construct(private Tagger $tagger, private CiDetectorInterface $ciDetector)
    {
        //
    }

    public function tag(Tag $tag): void
    {
        if (! $this->ciDetector->isCiDetected()) {
            return;
        }

        $ci = $this->ciDetector->detect();

        $tag->message?->addVars([
            'BRANCH' => $ci->getTargetBranch(),
            'COMMIT' => $ci->getCommit(),
        ]);

        $this->tagger->tag($tag);
    }
}
