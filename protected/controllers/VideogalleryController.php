<?php

class VideogalleryController extends Controller
{

    public $layout = 'column1';


    public function actionIndex()

    {
        $videos = Video::model()->findAll();
        $html = "<div class='row'>";
        $lang = Yii::app()->language;

        foreach ($videos as $video) {

            $coverUrl = "http://img.youtube.com/vi/$video->videoID/mqdefault.jpg";
            $title = $video->{"title_" . $lang};
            $url = "/$lang/videogallery/$video->id";
            $html .= "<div class='video col-sm-6 col-md-4'>
            <a href='$url'>
            <span class='dark-background'>$title</span>
              <img src='$coverUrl' class='img-thumbnail'>
                  </a>
              </div>";
        }
        $html .= "</div>";
        $this->render('index', array("content" => $html));

    }

    public function actionView($id)
    {

        $video = Video::model()->findByPk($id);
        $html = "<iframe width='853' height='480' src='//www.youtube.com/embed/$video->videoID?rel=0' frameborder='0' allowfullscreen></iframe>";
        $this->render('view', array("content" => $html));
    }


    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->renderPartial('//layouts/simple', $error);
        }
    }


}
