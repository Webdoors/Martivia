<?php
define("BASE_PATH", $_SERVER["DOCUMENT_ROOT"]);
// echo BASE_PATH;

//$host="localhost";
//$db_user="admin_martivia";
//$db_pass="#Martivia#123";
//$db_name="admin_martivia";
$langdir="lang/";
$incdir="view/inc/";
$pgdir="view/pages/";
$funcf="func/func.php";

function loadDotenv($filePath)
{
    // Check if the file exists
    if (!file_exists($filePath)) {
        throw new Exception('.env file does not exist.');
    }

    // Read the file line by line
    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        throw new Exception('Failed to read .env file.');
    }

    foreach ($lines as $line) {
        // Remove comments and trim whitespace
        $line = trim(preg_replace('/\s*#.*$/', '', $line));

        // Skip empty lines after removing comments
        if (empty($line)) {
            continue;
        }

        // Split the line into name and value
        $parts = explode('=', $line, 2);
        if (count($parts) !== 2) {
            // Skip lines that don't have a valid format
            continue;
        }
        list($name, $value) = $parts;

        // Remove quotes from the value
        $value = trim($value, "'\"");

        // Use putenv to set the environment variable
        putenv("$name=$value");
    }
}
// Usage
loadDotenv(__DIR__ . '/.env');
?>
