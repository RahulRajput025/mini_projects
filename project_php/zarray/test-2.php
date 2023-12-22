<?php
function countLines($file)
{
    $lines = file($file);
    return count($lines);
}

function countFilesAndLines($directory)
{
    $subfolderCount = 0;
    $fileCount = 0;
    $lineCount = 0;

    $files = glob($directory . '/*', GLOB_MARK);

    foreach ($files as $item) {
        if (is_dir($item)) {
            $subfolderCount++;
            $subfolderResult = countFilesAndLines($item);
            $fileCount += $subfolderResult['files'];
            $lineCount += $subfolderResult['lines'];
        } elseif (is_file($item)) {
            $fileCount++;
            $lineCount += countLines($item);
        }
    }

    return [
        'subfolders' => $subfolderCount,
        'files' => $fileCount,
        'lines' => $lineCount,
    ];
}

// Replace directory path here
$projectDirectory = '../admin_panel';

$result = countFilesAndLines($projectDirectory);

echo "Subfolders: " . $result['subfolders'] . PHP_EOL;
echo "Files: " . $result['files'] . PHP_EOL;
echo "Total Lines: " . $result['lines'] . PHP_EOL;
?>
