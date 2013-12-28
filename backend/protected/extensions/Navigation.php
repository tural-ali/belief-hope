<?php
/**
 * User: Tural
 * Date: 9/15/13
 * Time: 1:33 AM
 */

class Navigation
{
    protected $lang, $counter = array("root" => 1, "lastRoot" => 0, "all" => 1);

    public function __construct()
    {
        $this->lang = Yii::app()->language;
    }

    public function generateMenu($type, $class = "", $curl, $parent = 0)
    {
        switch ($type) {
            case 1:
                //LEFT MENU
                $html = "<ul class='$class'>";
                if ($parent == 0 && $type == 0)
                    $html .= '<li>
                                <div class="sidebar-toggler hidden-phone"></div>
                             </li>';
                $criteria = new CDbCriteria();
                $criteria->order = "sort ASC";
                $criteria->compare("menuType", $type);
                $criteria->compare("parent", $parent);
                $bu = Yii::app()->baseUrl;
                $results = AdminMenu::model()->findAll($criteria);
                if ($results) {
                    foreach ($results as $result) {
                        $liClass = "";
                        if ($this->counter["root"] == 1 && $parent == 0)
                            $liClass = "start ";
                        else if ($this->counter["root"] == count($results) && $parent == 0)
                            $liClass = "last ";
                        if ($parent == 0) $this->counter["root"]++;
                        $criteria = new CDbCriteria();
                        $criteria->order = "sort ASC";
                        $criteria->compare("parent", $result->id);
                        $children = AdminMenu::model()->count($criteria);

                        $active = $this->checkIfActive($result->url, $curl);

                        $liClass .= ($active) ? "active" : "";

                        $html .= "<li class='$liClass'>
                         <a href='";
                        $html .= ($children > 0) ? "javascript:;" : Yii::app()->baseUrl ."/". $result->url;
                        $html .= "'>";
                        $html .= (is_null($result->icon)) ? "" : "<i class='$result->icon' ></i>";
                        $html .= "<span class='title'>" . $result->title . " </span>";
                        $html .= ($active) ? "<span class='selected'></span>" : "";
                        $html .= ($children > 0) ? '<span class="arrow "></span>' : '';
                        $html .= "</a>";
                        $this->counter["all"]++;
                        if ($children > 0) {
                            $html .= $this->generateMenu($type, "sub-menu", $curl, $result->id, $this->counter);
                        }
                        $html .= "</li>";
                    }

                }
                $html .= "</ul>";
                return $html;
                break;
        }


    }

    protected function checkIfActive($url, $curl)
    {
        return (!empty($url) && strstr($curl, $url));
    }


}
