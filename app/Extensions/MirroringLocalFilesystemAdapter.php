<?php

namespace App\Extensions;

use League\Flysystem\Adapter\Local as BaseLocalAdapter;

class MirroringLocalFilesystemAdapter extends BaseLocalAdapter
{
    public function write($path, $contents, $config)
    {
        $result = parent::write($path, $contents, $config);
        $this->mirrorToContabo($path);
        return $result;
    }

    public function writeStream($path, $resource, $config)
    {
        $result = parent::writeStream($path, $resource, $config);
        $this->mirrorToContabo($path);
        return $result;
    }

    protected function mirrorToContabo($path)
    {
        $local = storage_path('app/' . $path);
        $remote = 'contabo:indonesiaminer/web/' . $path;
        exec("rclone copyto $local $remote");
    }
}
