<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileService {

    /**
     * Instance vars
     */
    var $filePath;

    /**
     * Constructor
     */
    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    /**
     * checks to see is a file exists locally
     * 
     * @return boolean
     */
    public function fileExists(): bool {
        return Storage::disk('local')->exists($this->filePath);
    }

    /**
     * reads a text file containing JSON objects and return an array of PHP objects
     * 
     * @return array
     */
    public function readTxtFileWithObjects(): array {
        $data = [];
        $file = fopen(storage_path('app') . '/' . $this->filePath, 'r');
        while (!feof($file)) {
            $line = fgets($file);
            $data[] = json_decode($line);
        }
        return $data;
    }
}