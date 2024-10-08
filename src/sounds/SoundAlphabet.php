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
            'quick_transcription' => 'ꞌ', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'central_vowel',
            'name' =>'Around-around',
            'examples' => "a in {a}bout\na in Tin{a}\n1st a in {a}head",
            'description' => 'Mid central vowel',
            'info_ipa' => 'ə',
            'quick_transcription' => 'ah',
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
            'name' =>'Ew-Ew',
            'examples' => "oo in g{oo}se when gyeeoos",
            'description' => "Close back unrounded vowel",
            'info_ipa' => 'ɯ',
            'quick_transcription' => 'ew',
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
            'type' => 'breathy_vowel',
            'name' =>'breathy-Around-hhh',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'ə̤',
            'quick_transcription' => 'aaa',
        ];

        $alphabet[] = [
            'type' => 'breathy_vowel',
            'name' =>'breathy-Episode-hhh',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'e̤',
            'quick_transcription' => 'eꞌhhhꞌ', // <--- Using Latin Capital Letter Saltillo, not quote
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
            'quick_transcription' => 'eer',
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

        $alphabet[] = [
            'type' => 'r_colored_vowel',
            'name' =>'Our-our',
            'examples' => "our in {our}\nour in fl{our}",
            'description' => "",
            'info_ipa' => 'aʊər',
            'quick_transcription' => 'our',
        ];

        $alphabet[] = [
            'type' => 'r_colored_vowel',
            'name' =>'Tour-oo-ur-detour',
            'examples' => "our in t{our}\nour in det{our}\nure in man{ure}\neur in entrepren{eur}",
            'description' => "(none)",
            'info_ipa' => 'ʊəɹ',
            'quick_transcription' => 'uer',
        ];

        $alphabet[] = [
            'type' => 'r_colored_vowel',
            'name' =>'Ur-ur',
            'examples' => '',
            'description' => "(Most English ur becomes er)",
            'info_ipa' => 'ʌr',
            'quick_transcription' => 'ur',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Pop-pop',
            'examples' => "p in {p}ancake\np in {p}icnic\np in {p}rincess\np in {p}ear\np in {p}o{p}\np in s{p}y\np in soa{p}",
            'description' => "Voiceless bilabial plosive",
            'info_ipa' => 'p',
            'quick_transcription' => 'p',
            'phone_family' => 'P',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Bar-Bar',
            'examples' => "b in {b}ack\nb in {b}a{b}y\nb in {b}oy\nb in ro{b}ot\nb in la{b}",
            'description' => "Voiced bilabial plosive",
            'info_ipa' => "b\n\nAlso for β",
            'quick_transcription' => 'b',
            'phone_family' => 'B',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Mars-Mars',
            'examples' => "m in {m}an\nm in {m}op\nm in la{m}p\nm in ru{m}",
            'description' => "voiced bilabial nasal",
            'info_ipa' => 'm',
            'quick_transcription' => 'm',
            'phone_family' => 'M',
        ];

        $alphabet[] = [
            'type' => "fixed_consonant\n\nsemi",
            'name' =>'West-west',
            'examples' => "w in {w}affle\nw in {w}ood\nw in {w}est\nw in {w}oman",
            'description' => "voiced labial-velar approximant",
            'info_ipa' => "w\n\nAlso for β̞",
            'quick_transcription' => 'w',
            'phone_family' => 'W',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Fox-fox',
            'examples' => "f in {f}all\nf in {f}ill\nf in {f}un\nf in el{f}",
            'description' => "Voiceless labiodental fricative",
            'info_ipa' => 'f',
            'quick_transcription' => 'f',
            'phone_family' => 'F',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Valley-valley',
            'examples' => "v in {v}alve\nv in {v}ery\nv in ne{v}er\nv in oursel{v}es\nv in ha{v}e",
            'description' => "Voiced labiodental fricative",
            'info_ipa' => 'v',
            'quick_transcription' => 'v',
            'phone_family' => 'V',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Thunder-thunder',
            'examples' => "(For both th's)\n\nð\nth in {th}at\nth in wri{th}e\n\nθ\nth in {th}ud\nth in wi{th}",
            'description' => "Both:\nVoiceless dental fricative\n&\nVoiced dental fricative\n\n(In English the 2 th's are often \n\"interdental\" \ninstead of dental)",
            'info_ipa' => "(For both θ and ð)",
            'quick_transcription' => 'th',
            'phone_family' => 'TH',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Tap-tap',
            'examples' => "t in {t}ick\nt in {t}ool\nt in {t}op\nt in {t}ap\nt in {t}oo{t}",
            'description' => "Voiceless alveolar plosive",
            'info_ipa' => 't',
            'quick_transcription' => 't',
            'phone_family' => 'T',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Day-day',
            'examples' => "d in {d}ay\nd in {d}ash\nD in {D}a{d}\ndd in a{dd}",
            'description' => "Voiced alveolar plosive",
            'info_ipa' => 'd',
            'quick_transcription' => 'd',
            'phone_family' => 'D',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Sun-sun',
            'examples' => "s in {s}and\ns in {s}it\ns in {s}un\nss in cla{ss}",
            'description' => "Voiceless alveolar fricative",
            'info_ipa' => 's',
            'quick_transcription' => 's',
            'phone_family' => 'S',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Zoom-zoom',
            'examples' => "z in {z}oo\nz in {z}ebra",
            'description' => "Voiced alveolar fricative",
            'info_ipa' => 'z',
            'quick_transcription' => 'z',
            'phone_family' => 'Z',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Noble-noble',
            'examples' => "n in {n}ope\nn in te{n}th\nn in mo{n}th",
            'description' => "voiced alveolar nasal",
            'info_ipa' => 'n',
            'quick_transcription' => 'n',
            'phone_family' => 'N',
        ];

        $alphabet[] = [
            'type' => "fixed_consonant\n\nliquid",
            'name' =>'Level-level',
            'examples' => "l in {l}et\nl in {l}ight\nl in c{l}ick\nl in go{l}d\nl in {l}eve{l}\nboth l's in ye{ll}ow\nll in be{ll}",
            'description' => "Voiced alveolar lateral approximant",
            'info_ipa' => "(For both l & ʟ)",
            'quick_transcription' => 'l',
            'phone_family' => 'L',
        ];

        $alphabet[] = [
            'type' => "fixed_consonant\n\nliquid",
            'name' =>'Roar-roar',
            'examples' => "r in {r}abbit\nr in e{r}a\nr in ca{r}\nr in {r}oa{r}",
            'description' => "Voiced postalveolar approximant",
            'info_ipa' => "(For ɾ , ɹ , ɹ̠)",
            'quick_transcription' => 'r',
            'phone_family' => 'R',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Shy-shy',
            'examples' => "sh in {sh}ould\nsh in {sh}op\nsh in ba{sh}",
            'description' => "Voiceless postalveolar fricative",
            'info_ipa' => 'ʃ',
            'quick_transcription' => 'sh',
            'phone_family' => 'SH',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Genre-genre',
            'examples' => "s in A{s}ia\ns in mea{s}ure\nJ in Joyeu{s}e\nJ in {J}ean-Luc Picard\ng in lanterne rou{g}e\ns in vi{s}ion\ng in {g}enre",
            'description' => "Voiced postalveolar fricative",
            'info_ipa' => 'ʒ',
            'quick_transcription' => 'zh',
            'phone_family' => 'ZH',
        ];

        $alphabet[] = [
            'type' => "fixed_consonant\n\nsemi",
            'name' =>'Yes-yes',
            'examples' => "y in {y}es\ny in {y}ellow\nstart of u in universe\ny in {y}ou",
            'description' => "Voiced palatal approximant",
            'info_ipa' => 'j',
            'quick_transcription' => 'y',
            'phone_family' => 'Y',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'King-king',
            'examples' => "k in {k}ing\nc in {c}at\nk in {k}iss\nc in {c}olor\nck in che{ck}\nch in {ch}emistry\nc and ch in {c}lo{ck}",
            'description' => "Voiceless velar plosive",
            'info_ipa' => 'k',
            'quick_transcription' => 'k',
            'phone_family' => 'K',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Go-go',
            'examples' => "g in {g}o\ng in {g}ive\ng in {g}a{gg}le",
            'description' => "Voiced velar plosive",
            'info_ipa' => 'g',
            'quick_transcription' => 'g',
            'phone_family' => 'G',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Hello-hello',
            'examples' => "h in {h}appy\nh in {h}op\nh in {h}igh\nwh in {wh}o",
            'description' => "voiceless glottal fricative\n/ voiceless glottal transition \n/ the aspirate",
            'info_ipa' => 'h',
            'quick_transcription' => 'h',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Loch-loch',
            'examples' => "ch in lo{ch}\nch in Johann Sebastian Ba{ch}",
            'description' => "Voiceless velar fricative",
            'info_ipa' => 'x',
            'quick_transcription' => 'kh',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Qatar-Qatar',
            'examples' => "q in {Q}atar",
            'description' => "Voiceless uvular plosive",
            'info_ipa' => 'q',
            'quick_transcription' => 'q',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Enjuto-enjuto',
            'examples' => "(No examples in English)\n\nnj in e{nj}uto\n\t(withered in Spanish)",
            'description' => "Voiced uvular nasal",
            'info_ipa' => 'ɴ',
            'quick_transcription' => 'nh',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Uh-oh-uh-oh',
            'examples' => "- in uh{-}oh",
            'description' => "glottal stop\n/ glottal plosive",
            'info_ipa' => 'ʔ',
            'quick_transcription' => '-ꞌ-', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => "sub_fixed_consonant\n\nsemi",
            'name' =>'Yuè-yuè',
            'examples' => "(No examples in English)\n\n(A sound between yah and wah)\n\ny in {y}uè (Moon in Mandarin)\nu in f{u}l (ugly in Swedish)\nü in d{ü}a (back in Kurdish)",
            'description' => "Voiced labial–palatal approximant",
            'info_ipa' => 'ɥ',
            'quick_transcription' => 'ieu', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => "sub_fixed_consonant\n\nsemi",
            'name' =>'Uisa-uisa',
            'examples' => "(No examples in English)\n\nu in {u}isa (doctor in Korean)",
            'description' => "Voiced velar approximant",
            'info_ipa' => 'ɰ',
            'quick_transcription' => '(gwra)',
        ];


        $alphabet[] = [
            'type' => 'sub_fixed_consonant',
            'name' =>'Tla-tla',
            'examples' => "(No examples in English)\n\ntl in {tl}a\n\t('no' in Cherokee)\ntl in Nahua{tl}\n\t(Nahuatl in Nahuatl)\ntl in {tl}eilóo\n\t(butterfly in Tlingit)",
            'description' => "Voiceless alveolar lateral affricate",
            'info_ipa' => 't͡ɬ',
            'quick_transcription' => 'tlꞌ', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'sub_fixed_consonant',
            'name' =>'Sla-sla',
            'examples' => "(No examples in English)\n\nsl in {sl}a\n\t(cow in Moloko)\nł in {ł}aʼ\n\t(some in Navajo)\ntl in ta{tl}ete\n\t(small/weak in Norwegian)\nll in tege{ll}\n\t(kettle in Welsh)",
            'description' => "Voiceless alveolar lateral fricative\n\n\"Belted L\"",
            'info_ipa' => "ɬ\n\nl̥ when ɬ\nł when ɬ",
            'quick_transcription' => 'ssh',
        ];

        $alphabet[] = [
            'type' => 'sub_fixed_consonant',
            'name' =>'Church-church',
            'examples' => "ch in {ch}arm\nch in ri{ch}\nt in na{t}ure",
            'description' => "Voiceless postalveolar affricate",
            'info_ipa' => 'tʃ',
            'quick_transcription' => 'ch',
        ];

        $alphabet[] = [
            'type' => 'sub_fixed_consonant',
            'name' =>'Jello-jello',
            'examples' => "j in {j}ump\nJ in {J}uly\nj & dge in {j}u{dge}\ng in {g}enie",
            'description' => "Voiced postalveolar affricate",
            'info_ipa' => "d͡ʒ\n\n(formerly ʤ)",
            'quick_transcription' => 'j',
        ];

        $alphabet[] = [
            'type' => "trill\n\nliquid",
            'name' =>'Arriba-arriba',
            'examples' => "(No examples in English)\n\nrr in a{rr}iba in Spanish",
            'description' => 'Voiced alveolar trill',
            'info_ipa' => 'r',
            'quick_transcription' => 'r′r′r',
            'phone_family' => 'R',
        ];

        $alphabet[] = [
            'type' => "trill\n\nliquid",
            'name' =>'Rhagfyr-Rhagfyr',
            'examples' => "(No examples in English)\n\nIn ancient greek, the Rh in Rho\n\nRh in {Rh}agfyr\n\t(December in Welsh)",
            'description' => 'Voiceless alveolar trill',
            'info_ipa' => 'r̥',
            'quick_transcription' => 'hr',
            'phone_family' => 'R',
        ];

        $alphabet[] = [
            'type' => 'trill',
            'name' =>'Bbrungɡaɡ-bbrungɡaɡ',
            'examples' => "(No examples in English)\n\nБ in {Б}унгаг \"bbrungɡaɡ\"\n\t(dung beetle in Komi-Permyak)",
            'description' => 'Voiced bilabial trill',
            'info_ipa' => 'ʙ',
            'quick_transcription' => 'b′b′br',
            'phone_family' => 'B',
        ];

        $alphabet[] = [
            'type' => 'trill',
            'name' =>'Tpotpowe-tpotpowe',
            'examples' => "(No examples in English)\n\ntp in {tp}o{tp}owe\n\t(chicken in Wariʼ)",
            'description' => 'Voiceless bilabial trill',
            'info_ipa' => 'ʙ̥',
            'quick_transcription' => 'p′p′pr',
            'phone_family' => 'P',
        ];

        $alphabet[] = [
            'type' => 'nasal_glide_consonant',
            'name' =>'Ngwee-ngwee',
            'examples' => "ng in ki{ng}\nng in si{ng}\nng in ri{ng}\nng in {ng}wee\n\t(penny coin in Zambia)\nn in si{n}k",
            'description' => "voiced velar nasal\n\nalso known as agma",
            'info_ipa' => 'ŋ',
            'quick_transcription' => 'ng',
        ];

        $alphabet[] = [
            'type' => 'nasal_glide_consonant',
            'name' =>'Gnaeus-Gnaeus',
            'examples' => "Gn in {Gn}aeus\n\t(An old Roman name)\n\nsometimes the gn in Lasa{gn}a",
            'description' => "Voiced palatal nasal",
            'info_ipa' => "gn\n\nɲ\n(when drift to gn)",
            'quick_transcription' => 'gn',
        ];

        $alphabet[] = [
            'type' => 'w_glide_consonant',
            'name' =>'Poirot-Poirot',
            'examples' => "p in Hercule {P}oirot",
            'description' => "",
            'info_ipa' => "pw",
            'quick_transcription' => 'pw',
            'phone_family' => 'P',
        ];

        $alphabet[] = [
            'type' => 'w_glide_consonant',
            'name' =>'Voila-voila',
            'examples' => "v in {v}oila",
            'description' => "",
            'info_ipa' => "vw",
            'quick_transcription' => 'vw',
            'phone_family' => 'V',
        ];

        $alphabet[] = [
            'type' => 'w_glide_consonant',
            'name' =>'Noir-noir',
            'examples' => "n in film {n}oir",
            'description' => "",
            'info_ipa' => "nw",
            'quick_transcription' => 'nw',
            'phone_family' => 'N',
        ];

        $alphabet[] = [
            'type' => 'w_glide_consonant',
            'name' =>'Quick-quick',
            'examples' => "qu in {qu}een\nqu in {qu}ick",
            'description' => "",
            'info_ipa' => "kw",
            'quick_transcription' => 'qu',
            'phone_family' => 'K',
        ];

        $alphabet[] = [
            'type' => 'w_glide_consonant',
            'name' =>'Gwen-Gwen',
            'examples' => "gu in Uru{gu}ay\nGu in {Gu}inevere\nGw in {Gw}en\nGw in {Gw}ynne\nGu in {Gu}adalupe",
            'description' => "",
            'info_ipa' => "gw",
            'quick_transcription' => 'gw',
            'phone_family' => 'G',
        ];

        $alphabet[] = [
            'type' => 's_glide_consonant',
            'name' =>'Psi-Psi',
            'examples' => "Ps in {Ps}i",
            'description' => "",
            'info_ipa' => "ps",
            'quick_transcription' => 'ps',
        ];

        $alphabet[] = [
            'type' => 's_glide_consonant',
            'name' =>'Tsar-tsar',
            'examples' => "ts in {ts}ar\n\n(ts in cats when said fast)\n(ts in outset when said fast)",
            'description' => "",
            'info_ipa' => "ts",
            'quick_transcription' => 'ts',
        ];

        $alphabet[] = [
            'type' => 's_glide_consonant',
            'name' =>'Exit-exit',
            'examples' => "x in e{x}cellent\nx in a{x}e\nx in code{x}",
            'description' => "",
            'info_ipa' => "ks",
            'quick_transcription' => 'x',
            'phone_family' => 'KS',
        ];

        $alphabet[] = [
            'type' => 'z_glide_consonant',
            'name' =>'Dzwon-dzwon',
            'examples' => "(No examples in English)\n\n(similar to ds in dads)\n\ndz in {dz}won (bell in Polish)",
            'description' => "Voiced alveolar affricate",
            'info_ipa' => "d͡z",
            'quick_transcription' => 'dz',
        ];

        $alphabet[] = [
            'type' => "z_glide_consonant",
            'name' =>'Rzim-Rzim',
            'examples' => "{Ř}ím (Rome in Czech)",
            'description' => 'voiced alveolar fricative',
            'info_ipa' => "r̝\n\nř",
            'quick_transcription' => 'rz',
            'phone_family' => 'R',
        ];

        $alphabet[] = [
            'type' => "zh_glide_consonant",
            'name' =>'Rezh',
            'examples' => "(R + Genre-genre)\n\n(reg in regime when said fast)\n\nRz in {Rz}ym (Rome in Polish)",
            'description' => "Voiced retroflex fricative",
            'info_ipa' => "r͡ʒ\n\nAlt ʐ",
            'quick_transcription' => 'rezh',
            'phone_family' => 'R',
        ];

        $alphabet[] = [
            'type' => "zh_glide_consonant",
            'name' =>'Lezh',
            'examples' => "(L + Genre-genre)\n\n(Sometimes the leas in pleasure\nwhen said fast)",
            'description' => "Voiced alveolar lateral fricatives\n\n(sometimes referred to as Lezh)",
            'info_ipa' => "l͡ʒ\n\nAlt ɮ",
            'quick_transcription' => 'lezh',
        ];

        $alphabet[] = [
            'type' => 'zh_glide_consonant',
            'name' =>'Delezh',
            'examples' => "(No examples in English)\n\n(D + L + Genre-genre)",
            'description' => "",
            'info_ipa' => "dl͡ʒ\n\nAlt dɮ",
            'quick_transcription' => 'delezh',
        ];

        $alphabet[] = [
            'type' => 'zh_glide_consonant',
            'name' =>'Jord-jord',
            'examples' => "(No examples in English)\n\n(Y + Genre-genre)\n\nj in {j}ord\n(soil in Swedish)",
            'description' => "Voiced palatal fricative",
            'info_ipa' => "ʝ",
            'quick_transcription' => 'yzh',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Pewter-py-pewter',
            'examples' => "p in {p}ew\np in {p}ewter\np in com{p}uter",
            'description' => '',
            'info_ipa' => 'pj',
            'quick_transcription' => 'pꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'P',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Future-fy-future',
            'examples' => "f in {f}uture\nf in {f}ury",
            'description' => '',
            'info_ipa' => 'fj',
            'quick_transcription' => 'fꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'F',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Beautiful-by-beautiful',
            'examples' => "b in {b}eautiful\n\nbe in {be}o\n(alive in Gaelic)",
            'description' => '',
            'info_ipa' => 'bj',
            'quick_transcription' => 'bꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'B',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Tuesday-ty-Tuesday',
            'examples' => "T in {T}uesday",
            'description' => '',
            'info_ipa' => 'tj',
            'quick_transcription' => 'tꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'T',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Dew-dy-dew',
            'examples' => "d in {d}ew\nd in en{d}uring",
            'description' => '',
            'info_ipa' => 'dj',
            'quick_transcription' => 'dꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'D',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Syoo-sy-syoo',
            'examples' => "s in tis{s}ue\ns in mon{s}ieur",
            'description' => '',
            'info_ipa' => 'sj',
            'quick_transcription' => 'sꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'S',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Zeus-zy-Zeus',
            'examples' => "Z in {Z}eus\ns in re{s}ume",
            'description' => '',
            'info_ipa' => 'zj',
            'quick_transcription' => 'zꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'Z',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Enye-ny-enye',
            'examples' => "n in {n}ew\nñ in espa{ñ}ol\n\nsometimes the gn in Lasa{gn}a",
            'description' => 'Voiced palatal nasal',
            'info_ipa' => "nj\n\nɲ\n(when drift to nj)",
            'quick_transcription' => 'nꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'N',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Magnolia-gny-Magnolia',
            'examples' => "gn in magnolia\n\nsometimes the gn in Lasa{gn}a",
            'description' => 'Voiced palatal nasal',
            'info_ipa' => "gnj\n\nɲ\n(when drift \nto gnj)",
            'quick_transcription' => 'gnꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => "y_glide_consonant\n\nliquid",
            'name' =>'Ljepuri-ly-ljepuri',
            'examples' => "ll in mi{ll}ion\nlj in {lj}epuri\n\t(rabbit in Aromanian)",
            'description' => 'Voiced palatal lateral approximant',
            'info_ipa' => "lj\n\nʎ\n\nAlt ȴ",
            'quick_transcription' => 'lꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'L',
        ];

        $alphabet[] = [
            'type' => "y_glide_consonant\n\nliquid",
            'name' =>'Ryeka-ry-ryeka',
            'examples' => "{р}ека (\"I say\" / \"I tell\"\nin Russian)",
            'description' => '',
            'info_ipa' => "rʲ\n\nrj\n\nOld ᶉ",
            'quick_transcription' => 'rꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'R',
        ];




        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Slew-sly-slew',
            'examples' => "Uncommon in modern English\n\n{sl} in (older) {sl}ew",
            'description' => '',
            'info_ipa' => 'slj',
            'quick_transcription' => 'slꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Sla-Y',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => "ɬj\n\nAlt ɕ",
            'quick_transcription' => 'sshꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Shoe-shy-shoe',
            'examples' => "(Not common in English,\nSometimes the {sh} in {sh}oe)",
            'description' => '',
            'info_ipa' => "ʃy\n\nAlt ç",
            'quick_transcription' => 'shꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'SH',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Azure-zhy-azure',
            'examples' => "s in fu{s}ion\nz in A{z}ure",
            'description' => 'Voiceless alveolo-palatal fricative',
            'info_ipa' => "ʒj\n\nAlt ʑ",
            'quick_transcription' => 'zhꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Cue-ky-cue',
            'examples' => 'c in {c}ube',
            'description' => '',
            'info_ipa' => 'kj',
            'quick_transcription' => 'kꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'K',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Gue-gy-gue',
            'examples' => "g in {g}ue\ng in fi{g}ure\ng in an{g}ular",
            'description' => '',
            'info_ipa' => "gj\n\nAlt ɟ",
            'quick_transcription' => 'gꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'G',
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Loch-Y',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => "xy\n\nAlt j̊",
            'quick_transcription' => 'khꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Human-hy-Human',
            'examples' => "h in {h}ue\nh in {h}uman",
            'description' => '',
            'info_ipa' => 'hj',
            'quick_transcription' => 'hꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Jump-jy-jump',
            'examples' => "j in {j}ump\n",
            'description' => '',
            'info_ipa' => 'd͡ʒj',
            'quick_transcription' => 'jꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'extra_long_fixed_consonant',
            'name' =>'Mmmmm-mmmmm',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ɱːː',
            'quick_transcription' => 'mmmmm',
            'phone_family' => 'M',
        ];

        $alphabet[] = [
            'type' => 'extra_long_fixed_consonant',
            'name' =>'Vvvvv-vvvvv',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'vːː',
            'quick_transcription' => 'vvvvv',
            'phone_family' => 'V',
        ];

        $alphabet[] = [
            'type' => "extra_long_fixed_consonant\n\nliquid",
            'name' =>'Rrrrr-rrrrr',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'rːː',
            'quick_transcription' => 'rrrrr',
            'phone_family' => 'R',
        ];

        $alphabet[] = [
            'type' => 'extra_long_fixed_consonant',
            'name' =>'Sssss-sssss',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'sːː',
            'quick_transcription' => 'sssss',
            'phone_family' => 'S',
        ];

        $alphabet[] = [
            'type' => 'extra_long_fixed_consonant',
            'name' =>'Zzzzz-zzzzz',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'zːː',
            'quick_transcription' => 'zzzzz',
            'phone_family' => 'Z',
        ];

        $alphabet[] = [
            'type' => 'extra_long_fixed_consonant',
            'name' =>'Shhhh-shhhh',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ʃːː',
            'quick_transcription' => 'shhhh',
            'phone_family' => 'SH',
        ];

        $alphabet[] = [
            'type' => 'extra_long_fixed_consonant',
            'name' =>'Zhhhh-zhhhh',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ʒːː',
            'quick_transcription' => 'zhhhh',
            'phone_family' => 'ZH',
        ];

        $alphabet[] = [
            'type' => 'extra_long_fixed_consonant',
            'name' =>'Khhhh-khhhh',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'xːː',
            'quick_transcription' => 'khhhh',
        ];

        $alphabet[] = [
            'type' => 'extra_long_fixed_consonant',
            'name' =>'Hhhhh-hhhhh',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'hːː',
            'quick_transcription' => 'hhhhh',
        ];

        $alphabet[] = [
            'type' => 'extra_long_f_glide_consonant',
            'name' =>'Pffff-pffff',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'pʰfːː',
            'quick_transcription' => 'pffff',
        ];

        $alphabet[] = [
            'type' => 'extra_long_s_glide_consonant',
            'name' =>'Pssss-pssss',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'p͡sːː',
            'quick_transcription' => 'pssss',
        ];

        $alphabet[] = [
            'type' => 'extra_long_s_glide_consonant',
            'name' =>'Tssss-tssss',
            'examples' => '',
            'description' => '',
            'info_ipa' => 't͡sːː',
            'quick_transcription' => 'tssss',
        ];

        $alphabet[] = [
            'type' => 'extra_long_s_glide_consonant',
            'name' =>'Kssss-kssss',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'k͡sːː',
            'quick_transcription' => 'kssss',
        ];

        // -------------------------

        // ------

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-em-Per',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ᵐp',
            'quick_transcription' => 'mp',
            'phone_family' => 'P',
        ];

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-em-Ber',
            'examples' => '',
            'description' => '',
            'info_ipa' => "ᵐb\n\nAlt m͜b\n\nOld m̆b",
            'quick_transcription' => 'mb',
            'phone_family' => 'B',
        ];

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-em-Fer',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ᵐf',
            'quick_transcription' => 'mf',
            'phone_family' => 'F',
        ];

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-em-Ver',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ᵐv',
            'quick_transcription' => 'mv',
            'phone_family' => 'V',
        ];

        // ------

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-en-Ter',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ⁿt',
            'quick_transcription' => 'nt',
            'phone_family' => 'T',
        ];

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-en-Der',
            'examples' => '',
            'description' => '',
            'info_ipa' => "ⁿd\n\nAlt n͜d\n\nOld n̆d",
            'quick_transcription' => 'nd',
        ];

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-en-Ser',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ⁿs',
            'quick_transcription' => 'ns',
        ];

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-en-Zer',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ⁿd͡zz̩˧',
            'quick_transcription' => 'nz',
        ];

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-en-Rer',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ⁿɖ͡ʐʐ̩˧',
            'quick_transcription' => 'nr',
            'phone_family' => 'R',
        ];

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-en-Jer',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ⁿd͡ʑʑ̩˧',
            'quick_transcription' => 'nj',
        ];

        // ------

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-nh-Qer',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ᶰq',
            'quick_transcription' => 'nhꞌq', // <--- Using Latin Capital Letter Saltillo, not quote
        ];


        // ------

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-eng-Ker',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ᵑk',
            'quick_transcription' => 'ngꞌk', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-eng-Ger',
            'examples' => '',
            'description' => '',
            'info_ipa' => "ᵑɡ\n\nAlt ŋ͡ɡ\n\nOld ŋ̆ɡ",
            'quick_transcription' => 'ngꞌg', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'G',
        ];

        // ------

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-ennn-T-her',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ᶯʈ',
            'quick_transcription' => 'nnꞌtꞌh', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'T',
        ];

        // ------


        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-eny-Sher',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ᶮc',
            'quick_transcription' => 'nyꞌsh', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'SH',
        ];

        $alphabet[] = [
            'type' => 'prenasalized_consonant',
            'name' =>'pre-nasal-eny-Gyer',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ᶮɟ',
            'quick_transcription' => 'nyꞌgꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'G',
        ];

        // ------

        // -------------------------

        $alphabet[] = [
            'type' => "h_color\n\nnasal",
            'name' =>'Nhad-nhad',
            'examples' => "nh in fy {nh}ad\n(My father in Welsh)",
            'description' => 'Voiceless alveolar nasal',
            'info_ipa' => 'n̥',
            'quick_transcription' => 'hn',
            'phone_family' => 'N',
        ];

        $alphabet[] = [
            'type' => "h_color\n\nnasal",
            'name' =>'Hma-hma',
            'examples' => "hm in {hm}a\n(black in Jalapa Mazatec)",
            'description' => 'Voiceless bilabial nasal',
            'info_ipa' => 'm̥',
            'quick_transcription' => 'hm',
            'phone_family' => 'M',
        ];

        $alphabet[] = [
            'type' => "h_color\n\nw_glide_consonant\n\nsemi",
            'name' =>'White-white',
            'examples' => "sometimes the wh in {wh}ite",
            'description' => "",
            'info_ipa' => "hw\n\nFrom ʍ to hw",
            'quick_transcription' => 'hw',
            'phone_family' => 'W',
        ];

        // -------------------------

        $alphabet[] = [
            'type' => 'preaspirated_consonant',
            'name' =>'ha-Pa',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'ʰp',
            'quick_transcription' => 'hꞌp', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'P',
        ];

        $alphabet[] = [
            'type' => 'preaspirated_consonant',
            'name' =>'ha-Ta',
            'examples' => "(No examples in English)\n\nkk in ta{kk}a\n\t(thank in Faroese)",
            'description' => '',
            'info_ipa' => 'ʰt',
            'quick_transcription' => 'hꞌt', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'T',
        ];

        $alphabet[] = [
            'type' => 'preaspirated_consonant',
            'name' =>'ha-Tsa',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'ʰt͡s',
            'quick_transcription' => 'hꞌts', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => "preaspirated_consonant\n\nliquid",
            'name' =>'ha-La',
            'examples' => "(No examples in English)\n\nl in k{l}appa\n\t(clap in Faroese)",
            'description' => '',
            'info_ipa' => 'ʰl',
            'quick_transcription' => 'hꞌl', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'L',
        ];

        $alphabet[] = [
            'type' => 'preaspirated_consonant',
            'name' =>'ha-Ssha',
            'examples' => "(No examples in English)\n\n(used in Sami languages)",
            'description' => '',
            'info_ipa' => 'ʰt͡ɕ',
            'quick_transcription' => 'hꞌssh', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'preaspirated_consonant',
            'name' =>'ha-Cha',
            'examples' => "(No examples in English)\n\nkk in sø{kk}ja\n\t(to sink in Faroese)",
            'description' => '',
            'info_ipa' => 'ʰt͡ʃ',
            'quick_transcription' => 'hꞌch', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'preaspirated_consonant',
            'name' =>'ha-Ka',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'ʰk',
            'quick_transcription' => 'hꞌk', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'breathy_consonant',
            'name' =>'breathy-Pa-hhh',
            'examples' => "(No examples in English)\n\n(Old Greek Phi)",
            'description' => '',
            'info_ipa' => 'pʰ',
            'quick_transcription' => 'pꞌh', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'P',
        ];

        $alphabet[] = [
            'type' => 'breathy_consonant',
            'name' =>'breathy-Ba-hhh',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'bʰ',
            'quick_transcription' => 'bh',
            'phone_family' => 'B',
        ];

        $alphabet[] = [
            'type' => 'breathy_consonant',
            'name' =>'breathy-Ma-hhh',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'mʰ',
            'quick_transcription' => 'mh',
            'phone_family' => 'M',
        ];

        $alphabet[] = [
            'type' => 'breathy_consonant',
            'name' =>'breathy-Ta-hhh',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'tʰ',
            'quick_transcription' => 'tꞌh', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'T',
        ];

        $alphabet[] = [
            'type' => 'breathy_consonant',
            'name' =>'breathy-Da-hhh',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'dʰ',
            'quick_transcription' => 'dꞌh', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'D',
        ];

        $alphabet[] = [
            'type' => "breathy_consonant\n\nliquid",
            'name' =>'Lhasa-Lhasa',
            'examples' => "(No examples in English)\n\nLh in {Lh}asa\n\t(city & river in Tibet)",
            'description' => '',
            'info_ipa' => "lʰ\n\nl̥ when lʰ",
            'quick_transcription' => 'lh',
            'phone_family' => 'L',
        ];

        $alphabet[] = [
            'type' => 'breathy_consonant',
            'name' =>'breathy-Ja-hhh',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'd͡ʒʱ',
            'quick_transcription' => 'jh',
        ];

        $alphabet[] = [
            'type' => 'breathy_consonant',
            'name' =>'breathy-Ga-hhh',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'gʰ',
            'quick_transcription' => 'gꞌh', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'G',
        ];

        //-------

        $alphabet[] = [
            'type' => 'sub_fixed_consonant',
            'name' =>'Gouda-gouda',
            'examples' => "(No examples in English)\n\ng in {g}aan ('to go' in Dutch)\ng in {g}ouda (Dutch city & cheese)",
            'description' => "Voiced velar fricative",
            'info_ipa' => 'ɣ',
            'quick_transcription' => 'gh(hh)',
            'phone_family' => 'GH',
        ];

        $alphabet[] = [
            'type' => "sub_fixed_consonant\n\nliquid",
            'name' =>'Roed-roed',
            'examples' => "(No examples in English)\n\nr in {r}ød (red in Danish)",
            'description' => "Voiced uvular approximant",
            'info_ipa' => 'ʁ̞',
            'quick_transcription' => 'r(r)',
            'phone_family' => 'R',
        ];

        $alphabet[] = [
            'type' => "sub_fixed_consonant\n\nliquid",
            'name' =>'Rek-rek',
            'examples' => "(No examples in English)\n\nr in {ղ}եկ (rudder in Armenian)",
            'description' => "Voiced uvular fricative",
            'info_ipa' => 'ʁ',
            'quick_transcription' => 'r(rrr)',
            'phone_family' => 'R',
        ];

        //-------

        $alphabet[] = [
            'type' => 'pharyngeal',
            'name' =>'Ya(ah)',
            'examples' => "(No examples in English)\n\n(used in Aghul,\nRicha dialect)\n\nйа{гьІ} (center in Richa)",
            'description' => 'voiceless* pharyngeal (epiglottal) plosive',
            'info_ipa' => 'ʡ',
            'quick_transcription' => '(ah)',
        ];

        $alphabet[] = [
            'type' => 'pharyngeal',
            'name' =>'H(rrr)atsh',
            'examples' => "(No examples in English)\n\n(used in Agul, Haida)\n\n{хІ}ач (apple in Richa)",
            'description' => 'Voiceless epiglottal trill',
            'info_ipa' => 'ʜ',
            'quick_transcription' => 'h(rrr)',
        ];

        $alphabet[] = [
            'type' => 'pharyngeal',
            'name' =>'G(rrr)akwa',
            'examples' => "(No examples in English)\n\n(used in Richa dialect Agul,\nIraqi Arabic, Siwa)\n\n{І}екв (light in Richa)",
            'description' => 'Voiced epiglottal trill',
            'info_ipa' => 'ʢ',
            'quick_transcription' => 'g(rrr)',
            'phone_family' => 'G',
        ];

        $alphabet[] = [
            'type' => 'pharyngeal',
            'name' =>'H(hhh)ar',
            'examples' => "(No examples in English)\n\n(used in Avar, Arabic,\nMaltese)\n\n{ħ}ar (heat in Arabic)",
            'description' => 'Voiceless pharyngeal fricative',
            'info_ipa' => 'ħ',
            'quick_transcription' => 'h(hhh)',
        ];

        $alphabet[] = [
            'type' => "pharyngeal\n\nsemi",
            'name' =>'W(rrr)ahyn',
            'examples' => "(No examples in English)\n\n{ʕ}ajn (eye in Arabic)",
            'description' => 'Voiced pharyngeal fricative',
            'info_ipa' => 'ʕ',
            'quick_transcription' => 'w(rrr)',
            'phone_family' => 'W',
        ];


        //-------


        $alphabet[] = [
            'type' => 'pharyngealized_stop',
            'name' =>'pharyn-Paaa~',
            'examples' => "(No examples in English)\n\n(used in Kurmanji, Chechen,\nand Ubykh)",
            'description' => 'pharyngealized voiceless bilabial stop',
            'info_ipa' => 'pˤ',
            'quick_transcription' => '`p~',
            'phone_family' => 'P',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_stop',
            'name' =>'pharyn-Baaa~',
            'examples' => "(No examples in English)\n\n(used in Chechen, Ubykh, Siwa, \nShihhi Arabic and Iraqi Arabic, \nallophonic in Adyghe\nand Kabardian)",
            'description' => 'pharyngealized voiced bilabial stop',
            'info_ipa' => 'bˤ',
            'quick_transcription' => '`b~',
            'phone_family' => 'B',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_stop',
            'name' =>'Teth~',
            'examples' => "(No examples in English)\n\n(used in Chechen, Berber,\nArabic, Kurmanji, Mizrahi,\nand Classical Hebrew)\n\nTeth is letter of\nthe Semitic abjads,\nbecoming Tet in Hebrew",
            'description' => 'pharyngealized voiceless alveolar stop',
            'info_ipa' => 'tˤ',
            'quick_transcription' => '`t~',
            'phone_family' => 'T',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_stop',
            'name' =>'Dhad~',
            'examples' => "(No examples in English)\n\n(used in Chechen,\nTamazight and Arabic)",
            'description' => 'pharyngealized voiced alveolar stop',
            'info_ipa' => 'dˤ',
            'quick_transcription' => '`dh~',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_stop',
            'name' =>'Koph~',
            'examples' => "(No examples in English)\n\n(used in Kurmanji)",
            'description' => 'pharyngealized voiceless velar plosive',
            'info_ipa' => 'kˤ',
            'quick_transcription' => '`k~',
            'phone_family' => 'K',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_stop',
            'name' =>'Goph~',
            'examples' => "(No examples in English)\n\nBoth:\n\n[gˤ] Uncommon\n\n[ɢˤ] (in Tsakhur)",
            'description' => "gˤ\npharyngealized voiced velar plosive\n\nɢˤ\npharyngealized voiced uvular stop",
            'info_ipa' => 'gˤ & ɢˤ',
            'quick_transcription' => '`g~',
            'phone_family' => 'G',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_stop',
            'name' =>'Qoph~',
            'examples' => "(No examples in English)\n\n(used in Ubykh,\nTsakhur, and Archi)\n\nQoph is a letter of \nthe Semitic abjads, \nincluding Phoenician qop,\nHebrew qup, Aramaic qop,\nSyriac qop, & Arabic qaf ",
            'description' => 'pharyngealized voiceless uvular stop',
            'info_ipa' => 'qˤ',
            'quick_transcription' => '`qh~',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_stop',
            'name' =>'pharyn-Uh-Oh~',
            'examples' => "(No examples in English)\n\n(used in Shihhi Arabic;\nallophonic in Chechen)",
            'description' => 'pharyngealized glottal stop',
            'info_ipa' => 'ʔˤ',
            'quick_transcription' => '`-ꞌ-~', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'pharyn-Faaa~',
            'examples' => '(No examples in English)',
            'description' => 'pharyngealized voiceless labiodental fricative',
            'info_ipa' => 'fˤ',
            'quick_transcription' => '`f~',
            'phone_family' => 'F',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'pharyn-Vaaa~',
            'examples' => "(No examples in English)\n\n(used in Ubykh)",
            'description' => 'pharyngealized voiced labiodental fricative',
            'info_ipa' => 'vˤ',
            'quick_transcription' => '`v~',
            'phone_family' => 'V',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'pharyn-Thaaa~',
            'examples' => "(No examples in English)\n\n ðˤ\n(used in Arabic)",
            'description' => "θˤ\npharyngealized voiceless dental fricative\n\nðˤ\npharyngealized voiced dental fricative",
            'info_ipa' => 'θˤ & ðˤ',
            'quick_transcription' => '`th~',
            'phone_family' => 'TH',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'Saad~',
            'examples' => "(No examples in English)\n\n(used in Chechen,\nKurmanji, Arabic,\nClassical Hebrew,\nand Northern Berber)",
            'description' => 'pharyngealized voiceless alveolar sibilant',
            'info_ipa' => 'sˤ',
            'quick_transcription' => '`s~',
            'phone_family' => 'S',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'Zaad~',
            'examples' => "(No examples in English)\n\n(used in Chechen,\n Berber, Arabic\nand Kurmanji)",
            'description' => 'pharyngealized voiced alveolar sibilant',
            'info_ipa' => "zˤ\n\n(formerly ᵶ)",
            'quick_transcription' => '`z~',
            'phone_family' => 'Z',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'Shaad~',
            'examples' => "(No examples in English)\n\n(used in Chechen,\nalso a hypercorrection\nof the\nModern Hebrew\n [t͡ʃ])",
            'description' => 'pharyngealized voiceless postalveolar fricative',
            'info_ipa' => 'ʃˤ',
            'quick_transcription' => '`sh~',
            'phone_family' => 'SH',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'Zhaad~',
            'examples' => "(No examples in English)\n\n(used in Chechen)",
            'description' => 'pharyngealized voiced postalveolar fricative',
            'info_ipa' => 'ʒˤ',
            'quick_transcription' => '`zh~',
            'phone_family' => 'ZH',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'Lezhaad~',
            'examples' => "(No examples in English)\n\n(used in Classical Arabic)",
            'description' => 'pharyngealized voiced alveolar lateral fricative',
            'info_ipa' => 'ɮˤ',
            'quick_transcription' => '`lezh~',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'Delezhaad~',
            'examples' => "(No examples in English)\n\n(used in Classical Arabic)",
            'description' => '',
            'info_ipa' => 'd͡ɮˤ',
            'quick_transcription' => '`delezh~',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'pharyn-Khaaa~',
            'examples' => "(No examples in English)\n\n(used in Ubykh, Tsakhur,\nArchi, and Bzyb Abkhaz)",
            'description' => 'pharyngealized voiceless uvular fricative',
            'info_ipa' => 'xˤ',
            'quick_transcription' => '`kh~',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_fricative',
            'name' =>'pharyn-Haaa~',
            'examples' => "(No examples in English)\n\n(used in Tsakhur)",
            'description' => 'pharyngealized voiceless glottal fricative',
            'info_ipa' => 'hˤ',
            'quick_transcription' => '`h~',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_affricate',
            'name' =>'pharyn-Chaaa~',
            'examples' => "(No examples in English)\n\n(used in Chechen and Kurmanji)",
            'description' => 'pharyngealized voiceless postalveolar affricate',
            'info_ipa' => 't͡ʃˤ',
            'quick_transcription' => '`ch~',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_affricate',
            'name' =>'pharyn-Jaaa~',
            'examples' => "(No examples in English)\n\n(used in Chechen)",
            'description' => 'pharyngealized voiced postalveolar affricate',
            'info_ipa' => 'd͡ʒˤ',
            'quick_transcription' => '`j~',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_affricate',
            'name' =>'Tsade~',
            'examples' => "(No examples in English)\n\n(used in Chechen)\n\n(Tsade is a Hebrew letter\nusually fpr sˤ & t͡s,\n t͡sˤ is rare)",
            'description' => 'pharyngealized voiceless alveolar affricate',
            'info_ipa' => 't͡sˤ',
            'quick_transcription' => '`ts~',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_affricate',
            'name' =>'pharyn-Dzaaa~',
            'examples' => "(No examples in English)\n\n(used in Chechen)",
            'description' => 'pharyngealized voiced alveolar affricate',
            'info_ipa' => 'd͡zˤ',
            'quick_transcription' => '`dz~',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_nasal',
            'name' =>'pharyn-Maaa~',
            'examples' => "(No examples in English)\n\n(used in Chechen, Ubykh,\nMoroccan Darija,\nand Iraqi Arabic)",
            'description' => '',
            'info_ipa' => 'mˤ',
            'quick_transcription' => '`m~',
            'phone_family' => 'M',
        ];

        $alphabet[] = [
            'type' => 'pharyngealized_nasal',
            'name' =>'pharyn-Naaa~',
            'examples' => "(No examples in English)\n\n(used in Chechen)",
            'description' => '',
            'info_ipa' => 'nˤ',
            'quick_transcription' => '`n~',
            'phone_family' => 'N',
        ];

        $alphabet[] = [
            'type' => "pharyngealized_approximant\n\nsemi",
            'name' =>'pharyn-Waaa~',
            'examples' => "(No examples in English)\n\n(used in Shihhi Arabic,\nChechen and Ubykh)",
            'description' => 'pharyngealized labialized velar approximant',
            'info_ipa' => 'wˤ',
            'quick_transcription' => '`w~',
            'phone_family' => 'W',
        ];

        $alphabet[] = [
            'type' => "pharyngealized_approximant\n\nliquid",
            'name' =>'pharyn-Laaa~',
            'examples' => "(No examples in English)\n\n(used in Chechen,\n& Northern Standard Dutch)",
            'description' => 'pharyngealized alveolar lateral approximant',
            'info_ipa' => 'lˤ',
            'quick_transcription' => '`l~',
        ];

        $alphabet[] = [
            'type' => "pharyngealized_approximant\n\nliquid",
            'name' =>'pharyn-Raaa~',
            'examples' => "(used in Dutch,\n& some dialects of\nAmerican English)",
            'description' => 'pharyngealized velar approximant',
            'info_ipa' => 'ɹˤ',
            'quick_transcription' => '`r~',
            'phone_family' => 'R',
        ];

        $alphabet[] = [
            'type' => "pharyngealized_approximant\n\nliquid-to-semi",
            'name' =>'pharyn-Rwaaa~',
            'examples' => "(an r variant in some\nAmerican English)",
            'description' => 'pharyngealized labialized postalveolar approximant',
            'info_ipa' => 'ɹˤw',
            'quick_transcription' => '`rw~',
            'phone_family' => 'R',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Pe---jective',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'pʼ',
            'quick_transcription' => 'p---',
            'phone_family' => 'P',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Te---jective',
            'examples' => '',
            'description' => 'Alveolar ejective',
            'info_ipa' => 'tʼ',
            'quick_transcription' => 't---',
            'phone_family' => 'T',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Che---jective',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'cʼ',
            'quick_transcription' => 'ch---',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Ke---jective',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'kʼ',
            'quick_transcription' => 'k---',
            'phone_family' => 'K',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Qhe---jective',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'qʼ',
            'quick_transcription' => 'qh---',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Fe---jective',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'fʼ',
            'quick_transcription' => 'f---',
            'phone_family' => 'F',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'The---jective',
            'examples' => '',
            'description' => 'Dental ejective fricative',
            'info_ipa' => 'θʼ',
            'quick_transcription' => 'th---',
            'phone_family' => 'TH',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Se---jective',
            'examples' => '',
            'description' => 'Alveolar ejective fricative or affricate',
            'info_ipa' => 'sʼ',
            'quick_transcription' => 's---',
            'phone_family' => 'S',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'She---jective',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ʃʼ',
            'quick_transcription' => 'sh---',
            'phone_family' => 'SH',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Sshe---jective',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'ɬʼ',
            'quick_transcription' => 'ssh---',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Tle---jective',
            'examples' => '',
            'description' => 'Alveolar lateral ejective fricative or affricate',
            'info_ipa' => 'tɬʼ',
            'quick_transcription' => 'tl---',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Khe---jective',
            'examples' => '',
            'description' => '',
            'info_ipa' => 'xʼ',
            'quick_transcription' => 'kh---',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Tse---jective',
            'examples' => '',
            'description' => '',
            'info_ipa' => 't͡sʼ',
            'quick_transcription' => 'ts---',
        ];

        $alphabet[] = [
            'type' => 'ejective',
            'name' =>'Tthe---jective',
            'examples' => '',
            'description' => '',
            'info_ipa' => 't̪θʼ',
            'quick_transcription' => 'tꞌth---', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'bilabial_click',
            'name' =>'Pppp-Smack',
            'examples' => '',
            'description' => 'Bilabial click',
            'info_ipa' => 'ʘ',
            'quick_transcription' => 'pq*',
        ];

        $alphabet[] = [
            'type' => 'alveolar_click',
            'name' =>'Ka-Click',
            'examples' => '',
            'description' => '(k Alveolar click)',
            'info_ipa' => 'k͜ǃ',
            'quick_transcription' => 'kq!',
        ];

        $alphabet[] = [
            'type' => 'alveolar_click',
            'name' =>'Ga-Click',
            'examples' => '',
            'description' => '(g Alveolar click)',
            'info_ipa' => 'ɡ͜ǃ',
            'quick_transcription' => 'gq!',
        ];

        $alphabet[] = [
            'type' => 'alveolar_click',
            'name' =>'Ng-Click',
            'examples' => '',
            'description' => '(ng Alveolar click)',
            'info_ipa' => 'ŋ͜ǃ',
            'quick_transcription' => 'ngq!',
        ];

        $alphabet[] = [
            'type' => 'alveolar_click',
            'name' =>'Qa-Click',
            'examples' => '',
            'description' => '(q Alveolar click)',
            'info_ipa' => 'q͜ǃ',
            'quick_transcription' => 'qhq!',
        ];

        $alphabet[] = [
            'type' => 'alveolar_click',
            'name' =>'Nh-Click',
            'examples' => '',
            'description' => '(N Alveolar click)',
            'info_ipa' => 'ɴ͜ǃ',
            'quick_transcription' => 'nhq!',
        ];

        $alphabet[] = [
            'type' => 'dental_click',
            'name' =>'Tut-tut-Click',
            'examples' => '',
            'description' => 'Dental click',
            'info_ipa' => 'ʇ',
            'quick_transcription' => '-tsk!-',
        ];

        $alphabet[] = [
            'type' => 'lateral_click',
            'name' =>'Tchick-tchick-Click',
            'examples' => '',
            'description' => 'Lateral click',
            'info_ipa' => 'ʖ',
            'quick_transcription' => '-tchick!-',
        ];

        // -------------------------

        $alphabet[] = [
            'type' => 'rowel',
            'name' =>'Krk-r-Krk',
            'examples' => "(No examples in English)\n\nr in k{r}k\n\t(throat/neck in \n\tCzech & Slovak)",
            'description' => "\"Syllabic R\"",
            'info_ipa' => 'r̩',
            'quick_transcription' => 'ꞌr', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'rowel',
            'name' =>'Vrba-rrrr-Vrba',
            'examples' => "(No examples in English)\n\nr in v{r}ba\n\t(willow in Slovak)",
            'description' => "",
            'info_ipa' => 'r̩ː',
            'quick_transcription' => 'ꞌrrr', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'rowel',
            'name' =>'Zhlt-L-Zhlt',
            'examples' => "(No examples in English)\n\nl in zh{l}t\n\t(eat in Czech)",
            'description' => "",
            'info_ipa' => 'ɫ̩',
            'quick_transcription' => 'ꞌl', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'rowel',
            'name' =>'Klb-LLL-Klb',
            'examples' => "(No examples in English)\n\nl in k{l}b\n\t(joint in Slovak)",
            'description' => "",
            'info_ipa' => 'ɫ̩ː',
            'quick_transcription' => 'ꞌlll', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'end-syllabic_consonant',
            'name' =>'Sedm-Sedm-mmm',
            'examples' => "(No examples in English)\n\nm in sed{m}\n\t(seven in Czech)",
            'description' => "",
            'info_ipa' => 'm̩',
            'quick_transcription' => 'ꞌm', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'M',
        ];

        $alphabet[] = [
            'type' => 'end-syllabic_consonant',
            'name' =>'Njutn-Njutn-nnn',
            'examples' => "(No examples in English)\n\nn in Njut{n}\n\t(Newton in Serbo-Croatian)",
            'description' => "",
            'info_ipa' => 'n̩',
            'quick_transcription' => 'ꞌn', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'N',
        ];

        $alphabet[] = [
            'type' => 'end-syllabic_consonant',
            'name' =>'Mostc-Mostc-cck',
            'examples' => "(No examples in English)\n\nc in most{ć}\n\t(bridge in non-\n\tstandard Croatian)",
            'description' => "",
            'info_ipa' => 'k̩',
            'quick_transcription' => 'ꞌck', // <--- Using Latin Capital Letter Saltillo, not quote
            'phone_family' => 'K',
        ];

        $alphabet[] = [
            'type' => 'syllabic_consonant',
            'name' =>'M-m-M',
            'examples' => "(No examples in English)\n\n(Used in Cantonese & Baoulé)",
            'description' => "",
            'info_ipa' => 'm̩',
            'quick_transcription' => '-m-',
            'phone_family' => 'M',
        ];

        $alphabet[] = [
            'type' => 'syllabic_consonant',
            'name' =>'N-n-N',
            'examples' => "(One-off in English for \"and\")\n\n(used in Cantonese, Yoruba,\n& Baoulé)",
            'description' => "",
            'info_ipa' => 'n̩',
            'quick_transcription' => '-n-',
        ];

        $alphabet[] = [
            'type' => 'syllabic_consonant',
            'name' =>'Ng-ng-Ng',
            'examples' => "(No examples in English)\n\nng in {ng}\n\t(five in Cantonese)",
            'description' => "",
            'info_ipa' => 'ŋ̍',
            'quick_transcription' => '-ng-',
        ];

        $alphabet[] = [
            'type' => 'syllabic_consonant',
            'name' =>'Sh-sh-Sh',
            'examples' => "(No examples in English,\nalthough Shhhh! comes close.)\n\n(One-off in Hungarian for \"and\")",
            'description' => "",
            'info_ipa' => 'ʃ̩',
            'quick_transcription' => '-sh-',
        ];


        $alphabet[] = [
            'type' => 'zowel',
            'name' =>'apical-I-as-zzz',
            'examples' => "(No examples in English)\n\n(used in Mandarin & Miyakoan)",
            'description' => "",
            'info_ipa' => "Sinology:\n\nɿ\n\nIPA:\n\nz̩",
            'quick_transcription' => 'zzz',
        ];

        $alphabet[] = [
            'type' => 'zowel',
            'name' =>'apical-I-as-zhhh',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\nʅ\n\nIPA:\n\nʐ̩",
            'quick_transcription' => 'zhhh',
        ];

        $alphabet[] = [
            'type' => 'zowel',
            'name' =>'apical-U-as-zzzw',
            'examples' => "(No examples in English)\n\n(used in Chinese dialects)",
            'description' => "",
            'info_ipa' => "Sinology:\n\nʮ\n\nIPA:\n\nz̩ʷ",
            'quick_transcription' => 'zzzw',
        ];

        $alphabet[] = [
            'type' => 'zowel',
            'name' =>'apical-U-as-zhhhw',
            'examples' => "(No examples in English)\n\n(used in Chinese dialects)",
            'description' => "",
            'info_ipa' => "Sinology:\n\nʯ\n\nIPA:\n\nʐ̩ʷ",
            'quick_transcription' => 'zhhhw',
        ];

        $alphabet[] = [
            'type' => 'zowel',
            'name' =>'shejian-Si',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\nsɿ\n\nIPA:\n\nsź̩",
            'quick_transcription' => 'szzz',
        ];

        $alphabet[] = [
            'type' => 'zowel',
            'name' =>'shejian-Zi',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\ntsɿ\n\nIPA:\n\ntsź̩",
            'quick_transcription' => 'tszzz',
        ];

        $alphabet[] = [
            'type' => 'zowel',
            'name' =>'shejian-Shi',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\nʂʅ\n\nIPA:\n\nʂʐ̩́",
            'quick_transcription' => 'shzhhh',
        ];

        $alphabet[] = [
            'type' => 'zowel',
            'name' =>'shejian-Ri',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\nʐʅ\n\nIPA:\n\nʐʐ̩́",
            'quick_transcription' => 'rzhhh',
        ];


        $alphabet[] = [
            'type' => 'lax-zowel',
            'name' =>'lax-shejian-Si',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "sɯ́",
            'quick_transcription' => 'seziu',
        ];

        $alphabet[] = [
            'type' => 'lax-zowel',
            'name' =>'lax-shejian-Zi',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "tsɯ́",
            'quick_transcription' => 'tseziu',
        ];

        $alphabet[] = [
            'type' => 'lax-zowel',
            'name' =>'lax-shejian-Shi',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "ʂɯ́",
            'quick_transcription' => 'sheziu',
        ];

        $alphabet[] = [
            'type' => 'lax-zowel',
            'name' =>'lax-shejian-Ri',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "ʐɯ́",
            'quick_transcription' => 'reziu',
        ];

        $alphabet[] = [
            'type' => 'i-combine-vowel',
            'name' =>'i-combine-Zi',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\n[tsɿ]",
            'quick_transcription' => 'tsu',
        ];

        $alphabet[] = [
            'type' => 'i-combine-vowel',
            'name' =>'i-combine-Ci',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\n[tsʰɿ]",
            'quick_transcription' => 'ꞌtsꞌhu', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'i-combine-vowel',
            'name' =>'i-combine-Si',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\n[sɿ]",
            'quick_transcription' => 'su',
        ];

        $alphabet[] = [
            'type' => 'i-combine-vowel',
            'name' =>'i-combine-Zhi',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\n[ʈʂʅ]",
            'quick_transcription' => 'ju',
        ];

        $alphabet[] = [
            'type' => 'i-combine-vowel',
            'name' =>'i-combine-Chi',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\n[ʈʂʰʅ]",
            'quick_transcription' => 'chu',
        ];

        $alphabet[] = [
            'type' => 'i-combine-vowel',
            'name' =>'i-combine-Shi',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\n[ʂʅ]",
            'quick_transcription' => 'shu',
        ];

        $alphabet[] = [
            'type' => 'i-combine-vowel',
            'name' =>'i-combine-Ri',
            'examples' => "(No examples in English)\n\n(used in Mandarin)",
            'description' => "",
            'info_ipa' => "Sinology:\n\n[ʐʅ]",
            'quick_transcription' => 'yu',
        ];





































        // Save to object
        $this->alphabet = $alphabet;
    }

    public function displayAlphabetTable()
    {
        $table_data = [
            'heading_top' => ['type' => 'Type', 'name' =>'Name', 'examples' => 'Examples', 'description' => 'Description', 'info_ipa' => 'IPA', 'quick_transcription' => 'Quick Transcription', 'phone_family' => '*'],
            'heading_top_text_align' => STR_PAD_BOTH,
            'data' => $this->alphabet,
            'columns_align_center' => ['name', 'info_ipa', 'quick_transcription'],
            'columns_color_bright_yellow' => ['name', 'quick_transcription'],
            'columns_highlight_1_bright_cyan' => ['examples'],
        ];

        $this->cli_table_utility->buildTable($table_data);
    }
}