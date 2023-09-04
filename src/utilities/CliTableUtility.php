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
        $data = $table_info['data'];

        $this->cli_writer->writeLine('Building table.......');

        $size_info   = $this->getColAndRowSizes($data);
        $col_lengths = $size_info['col_lengths'];
        $row_heights = $size_info['row_heights'];
        $num_cols    = count($col_lengths);
        $num_rows    = count($row_heights);


        foreach ($data as $row_index => $row){
            $has_line_to_add = true;

            while($has_line_to_add) {
                $has_line_to_add = false;

                // ────────────────────────────────────────────────────────────────────
                // TOP LINE

                if ($row_index === 0) {

                    // Top Line
                    $is_first_col = true;
                    foreach ($row as $col_index => $cell_data) {
                        if ($is_first_col) {
                            $is_first_col = false;

                            // Top left corner
                            $this->cli_writer->write('┌');
                        } else {
                            // Top intersection
                            $this->cli_writer->write('┬');
                        }
                        // Top line over col
                        $line = str_repeat('─', $col_lengths[$col_index]);
                        $this->cli_writer->write($line);
                    }

                    // Top right corner
                    $this->cli_writer->write('┐' . "\n");
                }

                // ────────────────────────────────────────────────────────────────────
                // TEXT LINE

                // Text Line
                $is_first_col = true;
                foreach ($row as $col_index => $cell_data) {
                    if ($is_first_col) {
                        $is_first_col = false;

                        // Left side
                        $this->cli_writer->write('│');
                    } else {
                        // Inside Col Border
                        $this->cli_writer->write('│');
                    }
                    // Top line over col
                    //$line = str_repeat('─', $col_lengths[$col_index]);
                    //$cell_text = string($cell_data);
                    //$line = str_pad($input, 10, "-=", STR_PAD_LEFT)

                    $line = str_repeat('X', $col_lengths[$col_index]);

                $this->cli_writer->write($line);
            }

                // Top right corner
                $this->cli_writer->write('│' . "\n");

                // ────────────────────────────────────────────────────────────────────
                // BOTTOM LINE

                if ($row_index === $num_rows - 1) {
                    // Bottom Line
                    $is_first_col = true;
                    foreach ($row as $col_index => $cell_data) {
                        if ($is_first_col) {
                            $is_first_col = false;

                            // Bottom left corner
                            $this->cli_writer->write('└');
                        } else {
                            // Bottom intersection
                            $this->cli_writer->write('┴');
                        }
                        // Bottom line under col
                        $line = str_repeat('─', $col_lengths[$col_index]);
                        $this->cli_writer->write($line);
                    }

                    // Bottom right corner
                    $this->cli_writer->write('┘' . "\n");
                }
            }
        }
    }

    private function getColAndRowSizes(array $data): array
    {
        $col_lengths = [];
        $row_heights = [];

        foreach ($data as $row_index => $row){
            foreach ($row as $col_index => $cell){
                $col_length_so_far    = $col_lengths[$col_index] ?? 0;
                $row_height_so_far    = $row_heights[$row_index] ?? 0;
                $cell_text            = (string) $cell;
                $cell_lines           = explode("\n", $cell_text);
                $cell_max_line_length = max(array_map('mb_strlen', $cell_lines));
                $cell_height          = mb_substr_count($cell_text, "\n");

                // Update col size if needed
                if($cell_max_line_length > $col_length_so_far){
                    $col_lengths[$col_index] = $cell_max_line_length;
                }

                // Update row size if needed
                if($cell_height > $row_height_so_far){
                    $row_heights[$row_index] = $cell_height;
                }
            }
        }

        return [
            'col_lengths' => $col_lengths,
            'row_heights' => $row_heights,
        ];
    }
}