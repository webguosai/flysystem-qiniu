<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Webguosai\Flysystem\Qiniu;

use Hyperf\Filesystem\Contract\AdapterFactoryInterface;

class QiniuAdapterFactory implements AdapterFactoryInterface
{
    public function make(array $options): QiniuAdapter
    {
        return new QiniuAdapter($options['accessKey'], $options['secretKey'], $options['bucket'], $options['domain']);
    }
}
