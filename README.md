<h1 align="center">webguosai/flysystem-qiniu</h1>

<p align="center">
<a href="https://packagist.org/packages/webguosai/flysystem-qiniu"><img src="https://poser.pugx.org/webguosai/flysystem-qiniu/v/stable" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/webguosai/flysystem-qiniu"><img src="https://poser.pugx.org/webguosai/flysystem-qiniu/downloads" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/webguosai/flysystem-qiniu"><img src="https://poser.pugx.org/webguosai/flysystem-qiniu/v/unstable" alt="Latest Unstable Version"></a>
<a href="https://packagist.org/packages/webguosai/flysystem-qiniu"><img src="https://poser.pugx.org/webguosai/flysystem-qiniu/license" alt="License"></a>
</p>


解决七牛云在hyperf框架的docker环境中，不能上传1M及以上大小的文件的问题

## 运行环境

- php >= 8.1
- composer
- hyperf

## 安装

```Shell
composer require webguosai/flysystem-qiniu -vvv
```

## 修改配置

- \config\autoload\file.php

```php
'qiniu' => [
    'driver' => \Webguosai\Flysystem\Qiniu\QiniuAdapterFactory::class,
    'accessKey' => env('QINIU_ACCESS_KEY'),
    'secretKey' => env('QINIU_SECRET_KEY'),
    'bucket' => env('QINIU_BUCKET'),
    'domain' => env('QINIU_DOMAIN'),
    'public_url' => env('QINIU_DOMAIN')
],
```

## License

MIT