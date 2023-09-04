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
            'examples' => "' in didn{'}t\n' in can{'}t\ndifference when diff{'}rence\nseveral when sev{'}ral\ntemperature when temp{'}rature",
            'description' => ' ',
            'ipa' => '(none or ə̆)',
            'quick_transcription' => '\'',
        ];

        $alphabet[] = [
            'type' => 'central vowel',
            'name' =>'Around-around',
            'examples' => "a in {a}bout\na in Tin{a}\n1st a in {a}head",
            'description' => 'Mid central vowel',
            'ipa' => 'ə',
            'quick_transcription' => 'uh',
        ];

        // Primary Vowels

        $alphabet[] = [
            'type' => 'primary vowel',
            'name' =>'Attack-attack',
            'examples' => "a in f{a}t\na in h{a}t\na in r{a}t",
            'description' => "Open front unrounded vowel \n/ Low front unrounded vowel",
            'ipa' => "a\n(English drifts æ)",
            'quick_transcription' => 'a',
        ];

        $alphabet[] = [
            'type' => 'primary vowel',
            'name' =>'Easy-easy',
            'examples' => "ee in m{ee}t\nea in {ea}st\nea and y in {ea}s{y}\nea in b{ea}n\nie in n{ie}ce\n1st e in sc{e}ne\nei in conc{ei}ve",
            'description' => "close front unrounded vowel\n/ high front unrounded vowel",
            'ipa' => 'i',
            'quick_transcription' => 'ee',
        ];

        $alphabet[] = [
            'type' => 'primary vowel',
            'name' =>'Oops-oops',
            'examples' => "oo in b{oo}t\noo in {oo}ps\nu in t{u}be",
            'description' => "close back rounded vowel\n/ high back rounded vowel",
            'ipa' => 'u',
            'quick_transcription' => 'oooo',
        ];

        $alphabet[] = [
            'type' => 'fixed vowel',
            'name' =>'August-August',
            'examples' => "a in {a}ll\no in d{o}ll\no in h{o}t\nou in b{ou}ght\nau in {au}tumn (US & Canada)\no in c{o}t\nau in c{au}ght",
            'description' => "open back unrounded vowel\n/ low back unrounded vowel",
            'ipa' => '(Both ɑ & ɔ)',
            'quick_transcription' => 'au',
        ];

        $alphabet[] = [
            'type' => 'fixed vowel',
            'name' =>'Episode-episode',
            'examples' => "e in b{e}t\nE in {E}d\nea in h{ea}d",
            'description' => "Open-mid front unrounded vowel",
            'ipa' => 'ɛ',
            'quick_transcription' => 'e',
        ];

        $alphabet[] = [
            'type' => 'fixed vowel',
            'name' =>'If-if',
            'examples' => "i in b{i}t\ni in h{i}d",
            'description' => "near-close front unrounded vowel\n/ near-high front unrounded vowel",
            'ipa' => 'ɪ',
            'quick_transcription' => 'i',
        ];

        $alphabet[] = [
            'type' => 'fixed vowel',
            'name' =>'Ocean-ocean',
            'examples' => "oa in b{oa}t\noe in d{oe}\no in {O}mega",
            'description' => "Mid back rounded vowel",
            'ipa' => 'o̞',
            'quick_transcription' => 'oh',
        ];

        $alphabet[] = [
            'type' => 'fixed vowel',
            'name' =>'Up-up',
            'examples' => "u in {u}ndo\nu in {u}nmade\nu in h{u}t\nu in b{u}t",
            'description' => "open-mid back unrounded vowel\n/ low-mid back unrounded vowel",
            'ipa' => 'ʌ',
            'quick_transcription' => 'u',
        ];

        $alphabet[] = [
            'type' => 'fixed vowel',
            'name' =>'Oo-hook-oo-book',
            'examples' => "oo in h{oo}d\noo in b{oo}k",
            'description' => "Near-close near-back rounded vowel",
            'ipa' => '(ʊ and ʊ̞)',
            'quick_transcription' => 'oo',
        ];

        $alphabet[] = [
            'type' => 'glide vowel',
            'name' =>'Ace-ace',
            'examples' => "a in pl{a}ce\na in l{a}te\na in d{a}ngerous\ney in h{ey}\nay in d{ay}\nai in b{ait}",
            'description' => "",
            'ipa' => 'eɪ',
            'quick_transcription' => 'ay',
        ];

        $alphabet[] = [
            'type' => 'glide vowel',
            'name' =>'Ice-ice',
            'examples' => "i in h{i}de\ni in b{i}te\ni in l{i}ke",
            'description' => "",
            'ipa' => 'aɪ',
            'quick_transcription' => 'igh',
        ];

        $alphabet[] = [
            'type' => 'glide vowel',
            'name' =>'Oil-oil',
            'examples' => "oy in b{oy}\noi in {oi}l\noy in l{oy}al",
            'description' => "",
            'ipa' => 'ɔɪ',
            'quick_transcription' => 'oi',
        ];

        $alphabet[] = [
            'type' => 'glide vowel',
            'name' =>'Out-out',
            'examples' => "ou in {ou}t\nou in l{ou}t\now in h{ow}\now in n{ow}\now in br{ow}n\now in c{ow}\nou in m{ou}se",
            'description' => "",
            'ipa' => 'aʊ',
            'quick_transcription' => 'ou',
        ];




        // Save to object
        $this->alphabet = $alphabet;
    }

    public function displayAlphabetTable()
    {
        $table_data = [
            'heading_top' => ['type' => 'Type', 'name' =>'Name', 'examples' => 'Examples', 'description' => 'Description', 'ipa' => 'IPA', 'quick_transcription' => 'Quick Transcription'],
            'heading_top_text_align' => STR_PAD_BOTH,
            'data' => $this->alphabet,
            'columns_align_center' => ['name', 'ipa', 'quick_transcription'],
            'columns_color_bright_yellow' => ['name', 'quick_transcription'],
            'columns_highlight_1_bright_cyan' => ['examples'],
        ];

        $this->cli_table_utility->buildTable($table_data);
    }
}