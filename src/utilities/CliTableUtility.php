<?php

/**
 * CliTableUtility
 * ---------------
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
use Pith\Framework\PithCliWriter;

/**
 * Class CliTableUtility
 * @package IKM\MadeUpWordGenerator
 */
class CliTableUtility
{
    private PithCliWriter $cli_writer;
    private PithCliFormat $format;

    public function __construct()
    {
        // Set object dependencies:
        $this->cli_writer = new PithCliWriter();
        $this->format     = new PithCliFormat();
    }


    public function buildTable($table_info)
    {
        $td_data = $table_info['td_data'];

        $this->cli_writer->writeLine('Building table.......');
    }
}