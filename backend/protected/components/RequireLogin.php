<?php
/**
 * User: Tural
 * Date: 9/3/13
 * Time: 12:12 AM
 */

class RequireLogin extends CBehavior
{
    public function attach($owner)
    {
        $owner->attachEventHandler('onBeginRequest', array($this, 'handleBeginRequest'));
    }

    public function handleBeginRequest($event)
    {
        if (Yii::app()->user->isGuest && (strpos($_SERVER['REQUEST_URI'], "login") === false )) {
            Yii::app()->user->loginRequired();
        }
    }
}
