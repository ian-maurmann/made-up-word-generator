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
            'type' => 'compressioned_vowel',
            'name' =>'compression',
            'examples' => "' in didn{'}t\n' in can{'}t\ndifference when diff{'}rence\nseveral when sev{'}ral\ntemperature when temp{'}rature",
            'description' => ' ',
            'info_ipa' => '(none or ə̆)',
            'quick_transcription' => '\'',
        ];

        $alphabet[] = [
            'type' => 'central_vowel',
            'name' =>'Around-around',
            'examples' => "a in {a}bout\na in Tin{a}\n1st a in {a}head",
            'description' => 'Mid central vowel',
            'info_ipa' => 'ə',
            'quick_transcription' => 'uh',
        ];

        // Primary Vowels

        $alphabet[] = [
            'type' => 'primary_vowel',
            'name' =>'Attack-attack',
            'examples' => "a in f{a}t\na in h{a}t\na in r{a}t",
            'description' => "Open front unrounded vowel \n/ Low front unrounded vowel",
            'info_ipa' => "a\n(English drifts æ)",
            'quick_transcription' => 'a',
        ];

        $alphabet[] = [
            'type' => 'primary_vowel',
            'name' =>'Easy-easy',
            'examples' => "ee in m{ee}t\nea in {ea}st\nea and y in {ea}s{y}\nea in b{ea}n\nie in n{ie}ce\n1st e in sc{e}ne\nei in conc{ei}ve",
            'description' => "close front unrounded vowel\n/ high front unrounded vowel",
            'info_ipa' => 'i',
            'quick_transcription' => 'ee',
        ];

        $alphabet[] = [
            'type' => 'primary_vowel',
            'name' =>'Oops-oops',
            'examples' => "oo in b{oo}t\noo in {oo}ps\nu in t{u}be",
            'description' => "close back rounded vowel\n/ high back rounded vowel",
            'info_ipa' => 'u',
            'quick_transcription' => 'oooo',
        ];

        $alphabet[] = [
            'type' => 'fixed_vowel',
            'name' =>'August-August',
            'examples' => "a in {a}ll\no in d{o}ll\no in h{o}t\nou in b{ou}ght\nau in {au}tumn (US & Canada)\no in c{o}t\nau in c{au}ght",
            'description' => "open back unrounded vowel\n/ low back unrounded vowel",
            'info_ipa' => '(For both ɑ & ɔ)',
            'quick_transcription' => 'au',
        ];

        $alphabet[] = [
            'type' => 'fixed_vowel',
            'name' =>'Episode-episode',
            'examples' => "e in b{e}t\nE in {E}d\nea in h{ea}d",
            'description' => "Open-mid front unrounded vowel",
            'info_ipa' => 'ɛ',
            'quick_transcription' => 'e',
        ];

        $alphabet[] = [
            'type' => 'fixed_vowel',
            'name' =>'If-if',
            'examples' => "i in b{i}t\ni in h{i}d",
            'description' => "near-close front unrounded vowel\n/ near-high front unrounded vowel",
            'info_ipa' => 'ɪ',
            'quick_transcription' => 'i',
        ];

        $alphabet[] = [
            'type' => 'fixed_vowel',
            'name' =>'Ocean-ocean',
            'examples' => "oa in b{oa}t\noe in d{oe}\no in {O}mega",
            'description' => "Mid back rounded vowel",
            'info_ipa' => 'o̞',
            'quick_transcription' => 'oh',
        ];

        $alphabet[] = [
            'type' => 'fixed_vowel',
            'name' =>'Up-up',
            'examples' => "u in {u}ndo\nu in {u}nmade\nu in h{u}t\nu in b{u}t",
            'description' => "open-mid back unrounded vowel\n/ low-mid back unrounded vowel",
            'info_ipa' => 'ʌ',
            'quick_transcription' => 'u',
        ];

        $alphabet[] = [
            'type' => 'fixed_vowel',
            'name' =>'Oo-hook-oo-book',
            'examples' => "oo in h{oo}d\noo in b{oo}k",
            'description' => "Near-close near-back rounded vowel",
            'info_ipa' => '(For both ʊ and ʊ̞)',
            'quick_transcription' => 'oo',
        ];

        $alphabet[] = [
            'type' => 'glide_vowel',
            'name' =>'Ace-ace',
            'examples' => "a in pl{a}ce\na in l{a}te\na in d{a}ngerous\ney in h{ey}\nay in d{ay}\nai in b{ait}",
            'description' => "",
            'info_ipa' => 'eɪ',
            'quick_transcription' => 'ay',
        ];

        $alphabet[] = [
            'type' => 'glide_vowel',
            'name' =>'Ice-ice',
            'examples' => "i in h{i}de\ni in b{i}te\ni in l{i}ke",
            'description' => "",
            'info_ipa' => 'aɪ',
            'quick_transcription' => 'igh',
        ];

        $alphabet[] = [
            'type' => 'glide_vowel',
            'name' =>'Oil-oil',
            'examples' => "oy in b{oy}\noi in {oi}l\noy in l{oy}al",
            'description' => "",
            'info_ipa' => 'ɔɪ',
            'quick_transcription' => 'oi',
        ];

        $alphabet[] = [
            'type' => 'glide_vowel',
            'name' =>'Out-out',
            'examples' => "ou in {ou}t\nou in l{ou}t\now in h{ow}\now in n{ow}\now in br{ow}n\now in c{ow}\nou in m{ou}se",
            'description' => "",
            'info_ipa' => 'aʊ',
            'quick_transcription' => 'ou',
        ];

        $alphabet[] = [
            'type' => 'r_colored_vowel',
            'name' =>'Ar-ar',
            'examples' => "ar in st{ar}t\nar in c{ar}",
            'description' => "",
            'info_ipa' => 'ɑ˞',
            'quick_transcription' => 'ar',
        ];

        $alphabet[] = [
            'type' => 'r_colored_vowel',
            'name' =>'Air-air',
            'examples' => "are in squ{are}\nair in h{air}\nair in ch{air}\nare in d{are}\nare in sh{are}\near in b{ear}\near in sw{ear}\nar in hil{ar}ious\nar in M{ar}y\nar in S{ar}ah\nar in p{ar}ent\nar in r{ar}ely\nere in wh{ere}",
            'description' => '"The square vowel"',
            'info_ipa' => 'ɛəɹ',
            'quick_transcription' => 'air',
        ];

        $alphabet[] = [
            'type' => 'r_colored_vowel',
            'name' =>'Ear-ear',
            'examples' => "ear in {ear}\near in n{ear}",
            'description' => "",
            'info_ipa' => 'ɪəʳ',
            'quick_transcription' => 'ear',
        ];

        $alphabet[] = [
            'type' => 'r_colored_vowel',
            'name' =>'Er-er',
            'examples' => "er in dinn{er}\ner in ass{er}t\nar in stand{ar}d\nir in m{ir}th\nire in Lincolnsh{ire}\ner in diff{er}ence (uncompressed)\ner in sev{er}al (uncompressed)\ner in temp{er}ature (uncompressed)",
            'description' => "",
            'info_ipa' => 'ɚ',
            'quick_transcription' => 'er',
        ];

        $alphabet[] = [
            'type' => 'r_colored_vowel',
            'name' =>'Ire-Ire',
            'examples' => "ire in h{ire}",
            'description' => "",
            'info_ipa' => 'aɪɚ',
            'quick_transcription' => 'igher',
        ];

        $alphabet[] = [
            'type' => 'r_colored_vowel',
            'name' =>'Or-or',
            'examples' => "or in n{or}th\nor in w{ar}",
            'description' => "",
            'info_ipa' => 'ɔ˞',
            'quick_transcription' => 'or',
        ];




        // Save to object
        $this->alphabet = $alphabet;
    }

    public function displayAlphabetTable()
    {
        $table_data = [
            'heading_top' => ['type' => 'Type', 'name' =>'Name', 'examples' => 'Examples', 'description' => 'Description', 'info_ipa' => 'IPA', 'quick_transcription' => 'Quick Transcription'],
            'heading_top_text_align' => STR_PAD_BOTH,
            'data' => $this->alphabet,
            'columns_align_center' => ['name', 'info_ipa', 'quick_transcription'],
            'columns_color_bright_yellow' => ['name', 'quick_transcription'],
            'columns_highlight_1_bright_cyan' => ['examples'],
        ];

        $this->cli_table_utility->buildTable($table_data);
    }
}