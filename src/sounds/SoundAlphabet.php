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

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Pop-pop',
            'examples' => "p in {p}ancake\np in {p}icnic\np in {p}rincess\np in {p}ear\np in {p}o{p}\np in s{p}y\np in soa{p}",
            'description' => "Voiceless bilabial plosive",
            'info_ipa' => 'p',
            'quick_transcription' => 'p',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Bar-Bar',
            'examples' => "b in {b}ack\nb in {b}a{b}y\nb in {b}oy\nb in ro{b}ot\nb in la{b}",
            'description' => "Voiced bilabial plosive",
            'info_ipa' => 'b',
            'quick_transcription' => 'b',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Mars-Mars',
            'examples' => "m in {m}an\nm in {m}op\nm in la{m}p\nm in ru{m}",
            'description' => "voiced bilabial nasal",
            'info_ipa' => 'm',
            'quick_transcription' => 'm',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'West-west',
            'examples' => "w in {w}affle\nw in {w}ood\nw in {w}est\nw in {w}oman",
            'description' => "voiced labial-velar approximant",
            'info_ipa' => 'w',
            'quick_transcription' => 'w',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Fox-fox',
            'examples' => "f in {f}all\nf in {f}ill\nf in {f}un\nf in el{f}",
            'description' => "Voiceless labiodental fricative",
            'info_ipa' => 'f',
            'quick_transcription' => 'f',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Valley-valley',
            'examples' => "v in {v}alve\nv in {v}ery\nv in ne{v}er\nv in oursel{v}es\nv in ha{v}e",
            'description' => "Voiced labiodental fricative",
            'info_ipa' => 'v',
            'quick_transcription' => 'v',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Thunder-thunder',
            'examples' => "(For both th's)\n\nð\nth in {th}at\nth in wri{th}e\n\nθ\nth in {th}ud\nth in wi{th}",
            'description' => "Both:\nVoiceless dental fricative\n&\nVoiced dental fricative\n\n(In English the 2 th's are often \n\"interdental\" \ninstead of dental)",
            'info_ipa' => "(For both θ and ð)",
            'quick_transcription' => 'th',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Tap-tap',
            'examples' => "t in {t}ick\nt in {t}ool\nt in {t}op\nt in {t}ap\nt in {t}oo{t}",
            'description' => "Voiceless alveolar plosive",
            'info_ipa' => 't',
            'quick_transcription' => 't',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Day-day',
            'examples' => "d in {d}ay\nd in {d}ash\nD in {D}a{d}\ndd in a{dd}",
            'description' => "Voiced alveolar plosive",
            'info_ipa' => 'd',
            'quick_transcription' => 'd',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Sun-sun',
            'examples' => "s in {s}and\ns in {s}it\ns in {s}un\nss in cla{ss}",
            'description' => "Voiceless alveolar fricative",
            'info_ipa' => 's',
            'quick_transcription' => 's',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Zoom-zoom',
            'examples' => "z in {z}oo\nz in {z}ebra",
            'description' => "Voiced alveolar fricative",
            'info_ipa' => 'z',
            'quick_transcription' => 'z',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Noble-noble',
            'examples' => "n in {n}ope\nn in te{n}th\nn in mo{n}th",
            'description' => "voiced alveolar nasal",
            'info_ipa' => 'n',
            'quick_transcription' => 'n',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Level-level',
            'examples' => "l in {l}et\nl in {l}ight\nl in c{l}ick\nl in go{l}d\nl in {l}eve{l}\nboth l's in ye{ll}ow\nll in be{ll}",
            'description' => "Voiced alveolar lateral approximant",
            'info_ipa' => 'l',
            'quick_transcription' => 'l',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Roar-roar',
            'examples' => "r in {r}abbit\nr in e{r}a\nr in ca{r}\nr in {r}oa{r}",
            'description' => "Voiced postalveolar approximant",
            'info_ipa' => 'ɹ̠',
            'quick_transcription' => 'r',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Shy-shy',
            'examples' => "sh in {sh}ould\nsh in {sh}op\nsh in ba{sh}",
            'description' => "Voiceless postalveolar fricative",
            'info_ipa' => 'ʃ',
            'quick_transcription' => 'sh',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Genre-genre',
            'examples' => "s in A{s}ia\ns in mea{s}ure\nJ in Joyeu{s}e\nJ in {J}ean-Luc Picard\ng in lanterne rou{g}e\ns in vi{s}ion\ng in {g}enre",
            'description' => "Voiced postalveolar fricative",
            'info_ipa' => 'ʒ',
            'quick_transcription' => 'zh',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Yes-yes',
            'examples' => "y in {y}es\ny in {y}ellow\nstart of u in universe\ny in {y}ou",
            'description' => "Voiced palatal approximant",
            'info_ipa' => 'j',
            'quick_transcription' => 'y',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'King-king',
            'examples' => "k in {k}ing\nc in {c}at\nk in {k}iss\nc in {c}olor\nck in che{ck}\nch in {ch}emistry\nc and ch in {c}lo{ck}",
            'description' => "Voiceless velar plosive",
            'info_ipa' => 'k',
            'quick_transcription' => 'k',
        ];

        $alphabet[] = [
            'type' => 'fixed_consonant',
            'name' =>'Go-go',
            'examples' => "g in {g}o\ng in {g}ive\ng in {g}a{gg}le",
            'description' => "Voiced velar plosive",
            'info_ipa' => 'g',
            'quick_transcription' => 'g',
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
            'type' => 'sub_fixed_consonant',
            'name' =>'Yuè-yuè',
            'examples' => "(No examples in English)\n\n(A sound between yah and wah)\n\ny in {y}uè (Moon in Mandarin)\nu in f{u}l (ugly in Swedish)\nü in d{ü}a (back in Kurdish)",
            'description' => "Voiced labial–palatal approximant",
            'info_ipa' => 'ɥ',
            'quick_transcription' => 'ꞌyw', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'sub_fixed_consonant',
            'name' =>'Lhasa-Lhasa',
            'examples' => "(No examples in English)\n\nLh in {Lh}asa\n\t(city & river in Tibet)",
            'description' => "voiceless lateral approximant\n/ \nvoiceless alveolar lateral approximant",
            'info_ipa' => 'l̥',
            'quick_transcription' => 'lh',
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
            'info_ipa' => 'ɬ',
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
            'type' => 'sub_fixed_consonant',
            'name' =>'Gouda-gouda',
            'examples' => "(No examples in English)\n\ng in {g}aan ('to go' in Dutch)\ng in {g}ouda (Dutch city & cheese)",
            'description' => "Voiced velar fricative",
            'info_ipa' => 'ɣ',
            'quick_transcription' => 'gh',
        ];

        $alphabet[] = [
            'type' => 'alternate-trill',
            'name' =>'Rhagfyr-Rhagfyr',
            'examples' => "(No examples in English)\n\nIn ancient greek, the Rh in Rho\n\nRh in {Rh}agfyr\n\t(December in Welsh)",
            'description' => 'Voiceless alveolar trill',
            'info_ipa' => 'r̥',
            'quick_transcription' => 'rh', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'alternate-trill',
            'name' =>'Bbrungɡaɡ-bbrungɡaɡ',
            'examples' => "(No examples in English)\n\nБ in {Б}унгаг \"bbrungɡaɡ\"\n\t(dung beetle in Komi-Permyak)",
            'description' => 'Voiced bilabial trill',
            'info_ipa' => 'ʙ',
            'quick_transcription' => 'bbr',
        ];

        $alphabet[] = [
            'type' => 'alternate-trill',
            'name' =>'Tpotpowe-tpotpowe',
            'examples' => "(No examples in English)\n\ntp in {tp}o{tp}owe\n\t(chicken in Wariʼ)",
            'description' => 'Voiceless bilabial trill',
            'info_ipa' => 'ʙ̥',
            'quick_transcription' => 'ppr',
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
            'info_ipa' => "ɲ\n(drift to gn)",
            'quick_transcription' => 'gn',
        ];

        $alphabet[] = [
            'type' => 'w_glide_consonant',
            'name' =>'Poirot-Poirot',
            'examples' => "p in Hercule {P}oirot",
            'description' => "",
            'info_ipa' => "pw",
            'quick_transcription' => 'pw',
        ];

        $alphabet[] = [
            'type' => 'w_glide_consonant',
            'name' =>'Noir-noir',
            'examples' => "n in film {n}oir",
            'description' => "",
            'info_ipa' => "nw",
            'quick_transcription' => 'nw',
        ];

        $alphabet[] = [
            'type' => 'w_glide_consonant',
            'name' =>'Quick-quick',
            'examples' => "qu in {qu}een\nqu in {qu}ick",
            'description' => "",
            'info_ipa' => "kw",
            'quick_transcription' => 'qu',
        ];

        $alphabet[] = [
            'type' => 'w_glide_consonant',
            'name' =>'Gwen-Gwen',
            'examples' => "gu in Uru{gu}ay\nGu in {Gu}inevere\nGw in {Gw}en\nGw in {Gw}ynne\nGu in {Gu}adalupe",
            'description' => "",
            'info_ipa' => "gw",
            'quick_transcription' => 'gw',
        ];

        $alphabet[] = [
            'type' => 'w_glide_consonant',
            'name' =>'White-white',
            'examples' => "sometimes the wh in {wh}ite",
            'description' => "",
            'info_ipa' => "hw\n\nFrom ʍ to hw",
            'quick_transcription' => 'hw',
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
            'type' => 'zh_glide_consonant',
            'name' =>'Rezh',
            'examples' => "(R + Genre-genre)\n\n(reg in regime when said fast)\n\nRz in {Rz}ym (Rome in Polish)",
            'description' => "Voiced retroflex fricative",
            'info_ipa' => "r͡ʒ\n\nAlt ʐ",
            'quick_transcription' => 'rezh',
        ];

        $alphabet[] = [
            'type' => 'zh_glide_consonant',
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
            'type' => 'y_glide_consonant',
            'name' =>'Pewter-py-pewter',
            'examples' => "p in {p}ew\np in {p}ewter\np in com{p}uter",
            'description' => '',
            'info_ipa' => 'pj',
            'quick_transcription' => 'pꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Tuesday-ty-Tuesday',
            'examples' => "T in {T}uesday",
            'description' => '',
            'info_ipa' => 'tj',
            'quick_transcription' => 'tꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Dew-dy-dew',
            'examples' => "d in {d}ew\nd in en{d}uring",
            'description' => '',
            'info_ipa' => 'dj',
            'quick_transcription' => 'dꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Syoo-sy-syoo',
            'examples' => "s in tis{s}ue\ns in mon{s}ieur",
            'description' => '',
            'info_ipa' => 'sj',
            'quick_transcription' => 'sꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Zeus-zy-Zeus',
            'examples' => "Z in {Z}eus\ns in re{s}ume",
            'description' => '',
            'info_ipa' => 'zj',
            'quick_transcription' => 'zꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Enye-ny-enye',
            'examples' => "n in {n}ew\nñ in espa{ñ}ol\n\nsometimes the gn in Lasa{gn}a",
            'description' => 'Voiced palatal nasal',
            'info_ipa' => "ɲ\n(drift to ny)",
            'quick_transcription' => 'nꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Ljepuri-ly-ljepuri',
            'examples' => "ll in mi{ll}ion\nlj in {lj}epuri\n\t(rabbit in Aromanian)",
            'description' => 'Voiced palatal lateral approximant',
            'info_ipa' => "ʎ\n\nAlt ȴ",
            'quick_transcription' => 'lꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
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
            'name' =>'Shy-Y',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => "ʃy\n\nAlt ç",
            'quick_transcription' => 'shꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
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
        ];

        $alphabet[] = [
            'type' => 'y_glide_consonant',
            'name' =>'Gue-gy-gue',
            'examples' => "g in {g}ue\ng in fi{g}ure\ng in an{g}ular",
            'description' => '',
            'info_ipa' => "gj\n\nAlt ɟ",
            'quick_transcription' => 'gꞌy', // <--- Using Latin Capital Letter Saltillo, not quote
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
            'type' => 'preaspirated_consonant',
            'name' =>'ha-Pa',
            'examples' => '(No examples in English)',
            'description' => '',
            'info_ipa' => 'ʰp',
            'quick_transcription' => 'hꞌp', // <--- Using Latin Capital Letter Saltillo, not quote
        ];

        $alphabet[] = [
            'type' => 'preaspirated_consonant',
            'name' =>'ha-Ta',
            'examples' => "(No examples in English)\n\nkk in ta{kk}a\n\t(thank in Faroese)",
            'description' => '',
            'info_ipa' => 'ʰt',
            'quick_transcription' => 'hꞌt', // <--- Using Latin Capital Letter Saltillo, not quote
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
            'type' => 'preaspirated_consonant',
            'name' =>'ha-La',
            'examples' => "(No examples in English)\n\nl in k{l}appa\n\t(clap in Faroese)",
            'description' => '',
            'info_ipa' => 'ʰl',
            'quick_transcription' => 'hꞌl', // <--- Using Latin Capital Letter Saltillo, not quote
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