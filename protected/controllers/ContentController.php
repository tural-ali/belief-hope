<?php

class ContentController extends Controller
{

    public $layout = 'column1';

    public function actionView()
    {
        $slugHash = substr(md5(Yii::app()->request->getParam('slug')), -5);
        $criteria = new CDbCriteria();
        $criteria->compare("hash", $slugHash);
        $criteria->limit = 1;
        $result = Slug::model()->find($criteria);
        if ($result) {
            Yii::app()->language = $result->lang;
            $currentLang = Yii::app()->language;
            $criteria = new CDbCriteria();
            $criteria->compare('id', $result->blogID);
            $blogpost = Content::model()->find($criteria);
            $this->layout = 'column1';
            $data = array(
                'title' => $blogpost->{'title_' . $currentLang},
                'content' => $blogpost->{'content_' . $currentLang},
                "timestamp" => date('d.m.Y', $blogpost->createdAt)
            );

            if (!is_null($blogpost->catID)) {
                $data["category"] = $blogpost->cat->{'title_' . $currentLang};
            }
            $data["catID"] = $blogpost->catID;
            $data["videoHtml"] = $this->generateVideoHtml($blogpost->id);
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
        $criteria = new CDbCriteria();
        $criteria->compare("contentID", $id);
        $results = ContentVideo::model()->findAll($criteria);
        if (count($results) > 0) {
            $html = "<div class='row'>";
            $lang = Yii::app()->language;

            foreach ($results as $result) {
                $videoid = (string)$result->video->videoID;
                $id = $result->videoID;
                $coverUrl = "http://img.youtube.com/vi/$videoid/mqdefault.jpg";
                $title = $result->video->{"title_" . $lang};
                $url = "/$lang/videogallery/$id";
                $html .= "<div class='video col-sm-6 col-md-4'>
            <a href='$url'>
            <span class='dark-background'>$title</span>
              <img src='$coverUrl' class='img-thumbnail'>
                  </a>
              </div>";
            }
            $html .= "</div>";
            return $html;
        } else return null;

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
