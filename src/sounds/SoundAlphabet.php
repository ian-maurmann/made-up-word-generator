<?php

/**
 * Sound Alphabet
 * --------------
 *
 * @noinspection PhpPropertyNamingConventionInspection      - Long property names are ok.
 * @noinspection PhpMethodNamingConventionInspection        - Long method names are ok.
 * @noinspection PhpVariableNamingConventionInspection      - Short variable names are ok.
 * @noinspection PhpUnnecessaryLocalVariableInspection      - Ignore for readability.
 * @noinspection PhpArrayShapeAttributeCanBeAddedInspection - Ignore shape for now, add later.
 * @noinspection PhpIllegalPsrClassPathInspection           - Ignore, using PSR 4 not 0.
 * @noinspection PhpUnusedLocalVariableInspection           - Readability.
 */


declare(strict_types=1);


namespace WordDensityDemo\WordDensityApplication;


use Exception;

/**
 * Class UrlService
 * @package WordDensityDemo\WordDensityApplication
 */
class SoundAlphabet
{
    private array $alphabet;

    public function __construct()
    {
        // Set object dependencies:
        // (None yet)

        // Build alphabet
    }


    public function buildAlphabet()
    {
        // Default to empty array
        $alphabet = [];

        $alphabet[] = [
            'type' => 'compressioned vowels',
            'name' =>'compression',
            'examples' => "' in didn't\n' in can't\ndifference when diff'rence\nseveral when sev'ral\ntemperature when temp'rature",
            'description' => '',
            'ipa' => '(none or ə̆)',
        ];

        // Save to object
        $this->alphabet = $alphabet;
    }
}