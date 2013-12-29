<?php
/**
 * User: Tural
 * Date: 10/3/13
 * Time: 6:55 PM
 */


class Messages extends CDbMessageSource{


    protected function loadMessages($category,$language)
    {
        $words = Dictionary::model()->findAll();
        $ret = array();
        foreach($words as $word){
            $ret [$word->token]= $word->{$language};
        }
        return $ret;
    }
}
