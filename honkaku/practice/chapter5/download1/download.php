<?php

declare(strict_types=1);

$pdfFiles = [
    1 => 'sample1.pdf',
    2 => 'sample2.pdf',
    3 => 'sample3.pdf'
];

if (!isset($_GET['type']) || !isset($pdfFiles[$_GET['type']])) {
    exit;
}

$file = $pdfFiles[$_GET['type']];

header('Content-Length:' . filesize($file));
header('Content-Type: application/octet-stream');
header('Content-Dispostion: attachment; filename=' . $file);
readfile($file);
