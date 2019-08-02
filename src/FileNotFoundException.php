<?php

namespace Doan;

class FileNotFoundException extends \RuntimeException
{
    public function __construct($path = null)
    {
        $message = sprintf('Source file "%s" could not be found.', $path);
        parent::__construct($message, 0, null);
    }
}
