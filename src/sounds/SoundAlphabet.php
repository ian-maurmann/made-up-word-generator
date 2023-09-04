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
use Pith\Framework\PithCliFormat;

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
        $alphabet = [];
        $format = new PithCliFormat();


        $alphabet[] = [
            'type' => 'compressioned vowel',
            'name' =>'compression',
            'examples' => $format->fg_bright_magenta."'".$format->reset." in didn".$format->fg_bright_magenta."'".$format->reset."t\n".$format->fg_bright_magenta."'".$format->reset." in can".$format->fg_bright_magenta."'".$format->reset."t\ndifference when diff".$format->fg_bright_magenta."'".$format->reset."rence\nseveral when sev".$format->fg_bright_magenta."'".$format->reset."ral\ntemperature when temp".$format->fg_bright_magenta."'".$format->reset."rature",
            'description' => ' ',
            'ipa' => '(none or ə̆)',
            'quick_transcription' => '\'',
        ];

        $alphabet[] = [
            'type' => 'central vowel',
            'name' =>'Around-around',
            'examples' => $format->fg_bright_magenta."a".$format->reset." in ".$format->fg_bright_magenta."a".$format->reset."bout\n".$format->fg_bright_magenta."a".$format->reset." in Tin".$format->fg_bright_magenta."a".$format->reset."\n1st ".$format->fg_bright_magenta."a".$format->reset." in ".$format->fg_bright_magenta."a".$format->reset."head",
            'description' => 'Mid central vowel',
            'ipa' => 'ə',
            'quick_transcription' => 'uh',
        ];

        $alphabet[] = [
            'type' => 'central vowel',
            'name' =>'Around-around',
            'examples' => $format->fg_bright_magenta."a".$format->reset." in ".$format->fg_bright_magenta."a".$format->reset."bout\n".$format->fg_bright_magenta."a".$format->reset." in Tin".$format->fg_bright_magenta."a".$format->reset."\n1st ".$format->fg_bright_magenta."a".$format->reset." in ".$format->fg_bright_magenta."a".$format->reset."head",
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
            'heading_top' => ['type' => 'Type', 'name' =>'Name', 'examples' => 'Examples', 'description' => 'Description', 'ipa' => 'IPA', 'quick_transcription' => 'Quick Transcription'],
            'heading_top_text_align' => STR_PAD_BOTH,
            'columns_align_center' => ['name', 'ipa', 'quick_transcription'],
            'data' => $this->alphabet,
        ];

        $this->cli_table_utility->buildTable($table_data);
    }
}