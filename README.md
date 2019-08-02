# doan/composer-copy-file
Copy file to destination after composer install/update

Usage:

```
{
    "name": "your-package",
    "require":{
        "doan/composer-copy-file": "1.*"
    },
    "scripts": {
        "post-install-cmd": [
            "Doan\\CopyFile::copy"
        ],
        "post-update-cmd": [
            "Doan\\CopyFile::copy"
        ]
    },
    "extra": {
        "copy-file": {
            "sourcefile.txt": "path/to/destination/sourcefile.txt"
        }
    }
}
```
