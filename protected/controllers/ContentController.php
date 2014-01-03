<?php

class ContentController extends Controller
{

    public $layout = 'column1';

    public function actionView()
    {
        $timestamp = date('Y-m-d H:i:s', Yii::app()->request->getParam('timestamp'));
        $currentLang = Yii::app()->language;
        $criteria = new CDbCriteria();
        $criteria->compare('createdAt', $timestamp);
        $criteria->compare('lang', $currentLang);
        $criteria->limit = 1;
        $result = Slug::model()->find($criteria);
        if ($result) {
            $criteria = new CDbCriteria();
            $criteria->compare('id', $result->blogID);
            $blogpost = Content::model()->find($criteria);
            $this->layout = 'column1';
            $data = array(
                'title' => $blogpost->{'title_' . $currentLang},
                'content' => $blogpost->{'content_' . $currentLang},
                "timestamp" => date('d.m.Y', Yii::app()->request->getParam('timestamp'))
            );

            if (!is_null($blogpost->catID))
                $data["category"] = $blogpost->cat->{'title_' . $currentLang};
            if (!is_null($blogpost->videoID))
                $data["videoHtml"] = $this->generateVideoHtml($blogpost->videoID);
            if (!is_null($blogpost->albumID))
                $data["galleryHtml"] = $this->generateGallery($blogpost->albumID);

            if (!is_null($blogpost->imgUrl))
                $data["imgUrl"] = $blogpost->imgUrl;
            $this->render('view', $data);
        } else {
            throw new CHttpException(404, Yii::t('common', '404'));
        }

    }


    public function generateGallery($id)
    {
        $html = "";
        $criteria = new CDbCriteria();
        $criteria->compare("albumID", $id);
        $results = Photo::model()->findAll($criteria);
        $html .= "<div id='fbox'>";
        if (count($results) > 0)
            foreach ($results as $result)
                $html .= "<a class='fancybox-thumb' rel='fancybox-thumb' href='$result->url'><img src='$result->url' alt='' /></a>";
        $html .= "</div>";
        return $html;
    }


    public function generateVideoHtml($id)
    {
        $video = Video::model()->findByPk($id);
        return "<iframe width='853' height='480' src='//www.youtube.com/embed/$video->videoID?rel=0' frameborder='0' allowfullscreen></iframe>";
    }

    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }


}
