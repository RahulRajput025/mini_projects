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

    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($directory, RecursiveDirectoryIterator::SKIP_DOTS),
        RecursiveIteratorIterator::SELF_FIRST
    );

    foreach ($iterator as $item) {
        if ($item->isDir()) {
            $subfolderCount++;
        } elseif ($item->isFile()) {
            $fileCount++;
            $lineCount += countLines($item->getPathname());
        }
    }

    return [
        'subfolders' => $subfolderCount,
        'files' => $fileCount,
        'lines' => $lineCount,
    ];
}

// Replace 'your_project_directory' with the actual path to your project directory
$projectDirectory = 'your_project_directory';

$result = countFilesAndLines($projectDirectory);

echo "Subfolders: " . $result['subfolders'] . PHP_EOL;
echo "Files: " . $result['files'] . PHP_EOL;
echo "Total Lines: " . $result['lines'] . PHP_EOL;
