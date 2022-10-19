<?php

namespace Afeefa\Component\TestingUtils;

class FileSystem
{
    public static function emptyDirectory(string $path, bool $keepDotFiles = true): void
    {
        if (file_exists($path)) {
            $iterator = new \DirectoryIterator($path);
            foreach ($iterator as $file) {
                if (!$file->isFile()) {
                    continue;
                }
                if ($keepDotFiles && strpos($file->getFilename(), '.') === 0) { // ignore .gitignore
                    continue;
                }
                unlink($file->getRealPath());
            }
        }
    }
}
