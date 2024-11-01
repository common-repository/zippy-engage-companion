<?php

class ZippyEngageApi
{
    public static function validateSite()
    {
        $url = get_bloginfo('url');
        $response = wp_remote_post(
            'https://api.zippyengage.com/site/validate',
            array(
                'method' => 'POST',
                'headers' => array(
                    'referer' => $url
                ),
                'body' => array('url' => $url),
            )
        );

        return isset($response['response']['code']) && $response['response']['code'] === 200;
    }
}
