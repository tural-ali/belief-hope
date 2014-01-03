<?php

/**
 * Created by PhpStorm.
 * User: Tural
 * Date: 12/30/13
 * Time: 6:46 PM
 */
class Navigation
{

    public static function findUrlByID($params)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('blogID', $params["id"]);
        $criteria->compare('lang', $params["lang"]);
        $criteria->limit = 1;
        $result = Slug::model()->find($criteria);
        $timestamp = strtotime($result->createdAt);
        return Yii::app()->params["wsurl"] . "/$result->slug/$timestamp";
    }

} 