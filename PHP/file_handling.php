<?php
$file = fopen("sample.txt", "w"); 

fwrite($file, "Hello, this is a test file.\n");
fwrite($file, "File handling in PHP is easy!\n");

fclose($file);

echo "File written successfully.";
?>
<?php
$file = fopen("sample.txt", "r"); // 'r' = read mode

if ($file) {
    $content = fread($file, filesize("sample.txt"));
    fclose($file);
    echo $content;
} else {
    echo "Unable to open file.";
}
?>
<?php
$file = fopen("sample.txt", "a"); // 'a' = append mode

fwrite($file, "This line is appended.\n");

fclose($file);

echo "Data appended successfully.";


$filename = "sample.txt";
$handle = fopen($filename, "r");

while (!feof($handle))
 {
    $line = fgets($handle);
    echo $line . "<br>";
}

fclose($handle);

