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
            $has_line_to_add  = true;
            $current_sub_line = 0;
            while($has_line_to_add) {
                $has_line_to_add = false;

                // ────────────────────────────────────────────────────────────────────
                // TOP LINE

                if ($row_index === 0 && $current_sub_line === 0) {

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
                // MIDDLE LINE

                if ($row_index !== 0 && $current_sub_line === 0) {

                    // Top Line
                    $is_first_col = true;
                    foreach ($row as $col_index => $cell_data) {
                        if ($is_first_col) {
                            $is_first_col = false;

                            // Left intersection
                            $this->cli_writer->write('├');
                        } else {
                            // Middle intersection
                            $this->cli_writer->write('┼');
                        }
                        // Middle border between rows
                        $line = str_repeat('─', $col_lengths[$col_index]);
                        $this->cli_writer->write($line);
                    }

                    // Right intersection
                    $this->cli_writer->write('┤' . "\n");
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
                    $cell_sub_lines      = explode("\n", (string) $cell_data);
                    $cell_sub_line_text  = $cell_sub_lines[$current_sub_line] ?? '';
                    $line                = $this->mb_str_pad($cell_sub_line_text, $col_lengths[$col_index], ' ', STR_PAD_RIGHT);
                    $last_sub_line_index = count($cell_sub_lines) - 1;

                    if($current_sub_line < $last_sub_line_index){
                        $has_line_to_add  = true;
                    }

                    //$line = str_repeat('X', $col_lengths[$col_index]);

                $this->cli_writer->write($line);
            }

                // Top right corner
                $this->cli_writer->write('│' . "\n");

                // ────────────────────────────────────────────────────────────────────
                // BOTTOM LINE

                if ($row_index === $num_rows - 1 && !$has_line_to_add) {
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

                $current_sub_line++;
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
                $cell_height          = mb_substr_count($cell_text, "\n");
                $escapes              = $this->getCliFormattingEscapes();
                $cell_lines_clean     = str_replace($escapes, "", $cell_lines);
                $cell_max_line_length = max(array_map('grapheme_strlen', $cell_lines_clean));

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


    /**
     * From: https://gist.github.com/rquadling/c9ff12755fc412a6f0d38f6ac0d24fb1
     * See: https://gist.github.com/nebiros/226350
     *
     * Multibyte String Pad
     *
     * Functionally, the equivalent of the standard str_pad function, but is capable of successfully padding multibyte strings.
     *
     * @param string $input The string to be padded.
     * @param int $length The length of the resultant padded string.
     * @param string $padding The string to use as padding. Defaults to space.
     * @param int $padType The type of padding. Defaults to STR_PAD_RIGHT.
     * @param string $encoding The encoding to use, defaults to UTF-8.
     *
     * @return string A padded multibyte string.
     */
    private function mb_str_pad(string $input, int $length, string $padding = ' ', int $padType = STR_PAD_RIGHT, string $encoding = 'UTF-8')
    {
        $result          = $input;
        $escapes         = $this->getCliFormattingEscapes();
        $input_clean     = str_replace($escapes, "", $input);
        $paddingRequired = $length - grapheme_strlen($input_clean);

        if ($paddingRequired > 0) {
            switch ($padType) {
                case STR_PAD_LEFT:
                    $result =
                        mb_substr(str_repeat($padding, $paddingRequired), 0, $paddingRequired, $encoding).
                        $input;
                    break;
                case STR_PAD_RIGHT:
                    $result =
                        $input.
                        mb_substr(str_repeat($padding, $paddingRequired), 0, $paddingRequired, $encoding);
                    break;
                case STR_PAD_BOTH:
                    $leftPaddingLength = floor($paddingRequired / 2);
                    $rightPaddingLength = $paddingRequired - $leftPaddingLength;
                    $result =
                        mb_substr(str_repeat($padding, (int) $leftPaddingLength), 0, $leftPaddingLength, $encoding).
                        $input.
                        mb_substr(str_repeat($padding, $rightPaddingLength), 0, $rightPaddingLength, $encoding);
                    break;
            }
        }

        return $result;
    }


    public function getCliFormattingEscapes(){
        return [
            "\033[0m",

            "\033[30m",
            "\033[31m",
            "\033[32m",
            "\033[33m",
            "\033[34m",
            "\033[35m",
            "\033[36m",
            "\033[37m",

            "\033[40m",
            "\033[41m",
            "\033[42m",
            "\033[43m",
            "\033[44m",
            "\033[45m",
            "\033[46m",
            "\033[47m",

            "\033[90m",
            "\033[91m",
            "\033[92m",
            "\033[93m",
            "\033[94m",
            "\033[95m",
            "\033[96m",
            "\033[97m",

            "\033[100m",
            "\033[101m",
            "\033[102m",
            "\033[103m",
            "\033[104m",
            "\033[105m",
            "\033[106m",
            "\033[107m",
        ];
    }



}