<?php
// this is your commands file

// test command
$conso->command("test", function($input, $output){
    $output->writeLn("\n hello from test \n", 'red');
});


$conso->command("loremipsum", function($input, $output){
    $output->writeLn("\n hello from test \n", 'red');
});

$conso->command("lorem_ipsum", function($input, $output){
    $output->writeLn("\n hello from test _____ \n", 'red');
});

$conso->command("lorem-ipsum", function($input, $output){
    $output->writeLn("\n hello from test ------ \n", 'red');
});

