<?php
/*
 * This file is part of the momosc/laravel-pushUrls
 *
 * (c) momosc
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Momosc\LaravelPushUrls\Traits;

use Momosc\LaravelPushUrls\PushUrls;

trait BaiduTrait
{
    /**
     * @param $urls
     * @return bool
     */
    public function pushUrls($urls)
    {
        $baiduConfig = config('pushurls.baidu_config');

        $api = 'http://data.zz.baidu.com/urls?site=' . $baiduConfig['site']
            . '&token=' . $baiduConfig['token']
            . '&type=' . $baiduConfig['type'];

        $options = array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );

        $result = PushUrls::push($options);

        $data = PushUrls::urlsHandle($result, $urls, 'baidu');

        return PushUrls::insertUrls($data);
    }


}