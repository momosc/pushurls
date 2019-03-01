<?php
/*
 * This file is part of the momosc/laravel-pushUrls
 *
 * (c) momosc
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
return [
    /*
     * the search engine allowed push urls
     */
    'search_engine' => ['google', 'baidu'],

    /*
     * the config of baidu
     * you can find token by your baidu account
     */
    'baidu_config' => [
        'site' => 'admin.com',
        'token' => '9A6Cb9gJFba',
        'type' => 'amp',
    ],

    /*
     * the config of google
     */
    'google_config' => [

    ],

    /*
     * Table name of push_urls relations.
     */
    'urls_table' => 'push_urls',

];