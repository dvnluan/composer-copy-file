<?php

namespace Doan;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class CopyFile
{
    public static function copy(Event $event)
    {
        $extras = $event->getComposer()->getPackage()->getExtra();

        if (!array_key_exists('copy-file', $extras)) {
            throw new \InvalidArgumentException('Missing extra.copy-file setting.');
        }

        $files = $extras['copy-file'];

        if (empty($files)) {
            throw new \InvalidArgumentException('The specified file for copying is not set in extra.copy-file setting.');
        }

        self::postCopy($files, $event);
    }

    private static function postCopy($files, Event $event)
    {
        $vendorDir = $event->getComposer()->getConfig()->get('vendor-dir');

        foreach ($files as $fileSrc => $fileDest) {
            $src = $vendorDir  . '/../' . $fileSrc;
            $dest = $vendorDir . '/../' . $fileDest;
            
            if (!file_exists($src)) {
                throw new FileNotFoundException($src);
            }

            copy($src, $dest);

            if (file_exists($dest)) {
                echo sprintf('The %s file is copied to %s', $fileSrc, $fileDest);
            } else {
                echo sprintf('Failed to copy %s file to %s', $fileSrc, $fileDest);
            }
        }
    }

}
