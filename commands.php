<?php
// this is your commands file

// test command
$conso->command("test", function($input, $output){
    $output->writeLn("\n hello from test \n", 'red');
});