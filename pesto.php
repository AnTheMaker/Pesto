<?php
// Mhhh, you like Pesto and so do I
// (c) and stuff, 2021 - AnTheMaker - https://github.com/AnTheMaker/Pesto

// ----- Configuration: -----
$case_sensitive = false;
$redirects_file = __DIR__.'/redirects.txt';
// --- Configuration end! ---


// STEP 1: We get the current /path as a GET parameter from the .htaccess file - nice!
$id = $_GET['id'];
if(!$case_sensitive){
  $id = strtolower($id);
}

// STEP 2: Load and parse the redirects.txt file

if(!file_exists($redirects_file)){
  http_response_code(404);
  die('Error: Couldn\'t find redirects.txt file.');
}

$content = file_get_contents($redirects_file);
$lines = explode(PHP_EOL, $content);
$lines = array_filter($lines); //remove empty lines
$redirects = [];
foreach($lines as $line){
  $line = trim($line);
  $parts = explode(' -> ', $line, 2);
  $redirect = trim($parts[0]);
  $redirect = ltrim($redirect, '/');
  if(!$case_sensitive){
    $redirect = strtolower($redirect);
  }
  $destination = trim($parts[1]);
  $redirects[$redirect] = $destination;
}

// STEP 3: Redirect!
if(array_key_exists($id, $redirects)){ // redirect exists, let's go!
  $redirect = $redirects[$id];
  http_response_code(301); // permanent redirect
  header('Location: '. $redirect);
  die();
}else{ // redirect doesn't exist, be sad and return an error :(
  http_response_code(404);
  die('Error 404 - Not found');
}

die(); //rip
