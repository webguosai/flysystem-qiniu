<?php

namespace Webguosai\Flysystem\Qiniu;

use League\Flysystem\Config;
use League\Flysystem\UnableToWriteFile;
use Qiniu\Http\Error;
use Qiniu\Storage\UploadManager;

class QiniuAdapter extends \Overtrue\Flysystem\Qiniu\QiniuAdapter
{
    public function getUploadManager(): UploadManager
    {
        $config = new \Qiniu\Config();
        $config->useHTTPS = true;
        return $this->uploadManager ?: $this->uploadManager = new UploadManager($config);
    }

    public function write(string $path, string $contents, Config $config): void
    {
        $mime = $config->get('mime', 'application/octet-stream');

        /**
         * @var Error|null $error
         */
        [, $error] = $this->getUploadManager()->put(
            $this->getAuthManager()->uploadToken($this->bucket, key: $path, policy: ['insertOnly' => 0]),
            $path,
            $contents,
            null,
            $mime,
            $path,
            new RequestOptions()
        );

        if ($error) {
            throw UnableToWriteFile::atLocation($path, $error->message());
        }
    }
}