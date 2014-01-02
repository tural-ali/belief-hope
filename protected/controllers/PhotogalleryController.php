<?php

class PhotogalleryController extends Controller
{

    public $layout = 'column1';


    public function actionIndex()

    {
        $criteria = new CDbCriteria();
        $criteria->compare('showInGallery', 1);
        $albums = Photoalbum::model()->findAll();
        $html = "<div class='row'>";
        $lang = Yii::app()->language;

        foreach ($albums as $album) {

            $coverUrl = $this->findAlbumCover($album->id);
            $title = $album->{"name_" . $lang};
            $url = "/$lang/photogallery/album/$album->id";
            $html .= "<div class='album col-sm-6 col-md-4'>
            <a href='$url'>
            <span class='dark-background'>$title</span>
              <img src='$coverUrl' class='img-thumbnail'>
                  </a>
              </div>";
        }
        $html .= "</div>";
        $this->render('index', array("content" => $html));

    }


    public function findAlbumCover($id)
    {
        $criteria = new CDbCriteria();
        $criteria->compare('main', 1);
        $criteria->compare('albumID', $id);
        $mainPhoto = Photo::model()->find($criteria);
        if (count($mainPhoto) == 0) {
            $criteria = new CDbCriteria();
            $criteria->compare('albumID', $id);
            $criteria->order = "id ASC";
            $criteria->limit = 1;
            $photo = Photo::model()->find($criteria);
            $photo->main = 1;
            if ($photo->save())
                $this->findAlbumCover($id);
        } else {
            $url = $mainPhoto->url;
            return $url;
        }
    }


    public function actionAlbum()
    {
        $id = Yii::app()->request->getParam('id');
        $this->render('//layouts/simple', array("content" => $this->generateGallery($id)));
    }


    public function generateGallery($id)
    {

        $title = Photoalbum::model()->findByPk($id)->{"name_" . Yii::app()->language};
        $html = "<center><h2>$title</h2></center>";
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
