<?php

class Navigation extends CWidget
{

    public function run()
    {
        $currentLang = Yii::app()->language;
        $token = (isset($_GET["token"])) ? $_GET["token"] : "home";
        $nav = $this->generateNav($token);
        $this->render('Navigation', array('currentLang' => $currentLang, 'html' => $nav));
    }


    public function generateNav($token, $parent = 0)
    {
        $html = "";
        $criteria = new CDbCriteria();
        $criteria->order = "sort ASC";
        $criteria->compare("menuType", 1);
        $criteria->compare("parent", $parent);
        $currentLang = Yii::app()->language;

        $results = Hierarchy::model()->findAll($criteria);
        if (count($results) > 0) {
            foreach ($results as $result) {
                $criteria = new CDbCriteria();
                $criteria->order = "sort ASC";
                $criteria->compare("parent", $result->id);
                $criteria->compare("menuType", 1);
                $children = Hierarchy::model()->findAll($criteria);
                if (count($children) > 0) {
                    $html .= "<li>";
                    if (!is_null($result->icon))
                        $html .= "<i class='fa $result->icon'></i> ";
                    $html .= $result->{"title_" . $currentLang} . "<ul class='submenu'>";
                    $html .= $this->generateNav($token, $result->id);
                    $html .= "</ul></li>";
                } else {
                    $html .= "<li data-url='/$currentLang/$result->token' class='menu-elem";
                    if ($token == $result->token)
                        $html .= " active ";
                    $html .= "'>";
                    if (!is_null($result->icon))
                        $html .= "<i class='fa $result->icon'></i> ";

                    $html .= $result->{"title_" . $currentLang} . "</li>";
                }
            }

        }
        return $html;
    }

}

?>
