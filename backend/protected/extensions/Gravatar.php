<?php
/**
 * User: Tural
 * Date: 9/9/13
 * Time: 2:38 AM
 */

class Gravatar
{
    static public function GetGravatarUrl($email, $size = 25, $type = 'identicon', $rating = 'pg')
    {
        $gravatar = sprintf('http://www.gravatar.com/avatar/%s?d=%s&s=%d&r=%s',
            md5($email), $type, $size, $rating);
        return $gravatar;
    }
}