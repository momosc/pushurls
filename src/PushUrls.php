<?php
/*
 * This file is part of the momosc/laravel-pushUrls
 *
 * (c) momosc
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Momosc\LaravelPushUrls;

use Illuminate\Support\Facades\DB;

/**
 * Class PushUrls
 * @package Momosc\LaravelPushUrls
 */
class PushUrls
{
    /**
     * @param array $options
     * @return array
     */
    public static function push($options)
    {
        $ch = curl_init();
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        curl_close($ch);
        if (is_string($result)) {
            $result = json_decode($result, true);
        }
        return $result;
    }

    /**
     * @param array $result
     * @param array $urls
     * @param string $searchEngine
     * @return  array
     */
    public static function urlsHandle($result, $urls, $searchEngine)
    {
        $data = [];
        foreach ($urls as $key => $value) {
            $data[$key]['url'] = $value;
            $data[$key]['status'] = $result['error'];
            $data[$key]['search_engine'] = $searchEngine;
        }
        return $data;
    }

    /**
     * @param array $data
     * @return boolean
     */
    public static function insertUrls($data)
    {
        return DB::table(config('pushurls.urls_table'))->insert($data);
    }
}