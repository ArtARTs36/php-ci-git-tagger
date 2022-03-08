# CI Git Tagger

CI Git Tagger - tools for sending tags to remote git.

## Install

Run command: `composer require artarts36/ci-git-tagger`

## Usage

```php
<?php

use ArtARTs36\CiGitTagger\Remote\Credentials;
use ArtARTs36\CiGitTagger\Tag\Tag;
use ArtARTs36\CiGitTagger\Tagger\Factory;

$tagger = Factory::local()->create(__DIR__, new Credentials('login', 'token'));

$tagger->tag(Tag::make('0.1.6', 'v{$TAG}_{$BRANCH}_${COMMIT}'));
```
