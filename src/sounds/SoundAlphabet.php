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


namespace IKM\MadeUpWordGenerator;


use Exception;

/**
 * Class SoundAlphabet
 * @package IKM\MadeUpWordGenerator
 */
class SoundAlphabet
{
    private CliTableUtility $cli_table_utility;

    private array $alphabet;

    public function __construct()
    {
        // Set object dependencies:
        $this->cli_table_utility = new CliTableUtility();

        // Build alphabet
        $this->buildAlphabet();
    }


    private function buildAlphabet()
    {
        // Default to empty array
        $alphabet = [];

        $alphabet[] = [
            'type' => 'compressioned vowel',
            'name' =>'compression',
            'examples' => "' in didn't\n' in can't\ndifference when diff'rence\nseveral when sev'ral\ntemperature when temp'rature",
            'description' => ' ',
            'ipa' => '(none or ə̆)',
            'quick_transcription' => '\'',
        ];

        $alphabet[] = [
            'type' => 'central vowel',
            'name' =>'Around-around',
            'examples' => "a in about\na in Tina\n1st a in ahead\n",
            'description' => 'Mid central vowel',
            'ipa' => 'ə',
            'quick_transcription' => 'uh',
        ];

        // Save to object
        $this->alphabet = $alphabet;
    }

    public function displayAlphabetTable()
    {
        $table_data = [
            'data' => $this->alphabet,
        ];

        $this->cli_table_utility->buildTable($table_data);
    }
}