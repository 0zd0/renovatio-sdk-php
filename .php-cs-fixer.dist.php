<?php
declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = new Finder()
    ->ignoreVCSIgnored(true)
    ->in(__DIR__);

return new Config()
    ->setRiskyAllowed(false)
    ->setRules([
        '@PER-CS' => true,
        'array_syntax' => ['syntax' => 'short'],
        'no_unused_imports' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'blank_line_before_statement' => [
            'statements' => ['return', 'throw', 'try'],
        ],
    ])
    ->setFinder(
        $finder,
    );
