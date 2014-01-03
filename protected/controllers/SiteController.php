<?php

class SiteController extends Controller
{


    public function actionEvents()
    {
        $this->layout = "contentlist";
        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        $criteria->compare('isBlog', 1);
        $criteria->compare('catID', 6);

        $item_count = Content::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize(Yii::app()->params['blogPerPage']);
        $pages->applyLimit($criteria);


        $model = Content::model()->findAll($criteria);


        $this->render('index', array(
            'html' => $this->generateBlogposts($model),
            'item_count' => $item_count,
            'page_size' => Yii::app()->params['blogPerPage'],
            'items_count' => $item_count,
            'pages' => $pages,
        ));
    }


    public function actionSparkle()
    {
        $this->layout = "contentlist";
        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        $criteria->compare('isBlog', 1);
        $criteria->compare('catID', 4);
        $item_count = Content::model()->count($criteria);
        $pages = new CPagination($item_count);
        $pages->setPageSize(Yii::app()->params['blogPerPage']);
        $pages->applyLimit($criteria);
        $model = Content::model()->findAll($criteria);


        $this->render('index', array(
            'html' => $this->generateBlogposts($model),
            'item_count' => $item_count,
            'page_size' => Yii::app()->params['blogPerPage'],
            'items_count' => $item_count,
            'pages' => $pages,
        ));
    }


    public function actionCharity()
    {
        $this->layout = "contentlist";
        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        $criteria->compare('isBlog', 1);
        $criteria->compare('catID', 7);
        $item_count = Content::model()->count($criteria);
        $pages = new CPagination($item_count);
        $pages->setPageSize(Yii::app()->params['blogPerPage']);
        $pages->applyLimit($criteria);
        $model = Content::model()->findAll($criteria);


        $this->render('index', array(
            'html' => $this->generateBlogposts($model),
            'item_count' => $item_count,
            'page_size' => Yii::app()->params['blogPerPage'],
            'items_count' => $item_count,
            'pages' => $pages,
        ));
    }


    public function actionInterviews()
    {
        $this->layout = "contentlist";
        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        $criteria->compare('isBlog', 1);
        $criteria->compare('catID', 3);
        $item_count = Content::model()->count($criteria);
        $pages = new CPagination($item_count);
        $pages->setPageSize(Yii::app()->params['blogPerPage']);
        $pages->applyLimit($criteria);
        $model = Content::model()->findAll($criteria);


        $this->render('index', array(
            'html' => $this->generateBlogposts($model),
            'item_count' => $item_count,
            'page_size' => Yii::app()->params['blogPerPage'],
            'items_count' => $item_count,
            'pages' => $pages,
        ));
    }

    public function actionIndex()
    {
        $this->layout = "contentlist";
        $criteria = new CDbCriteria();
        $criteria->order = 'id DESC';
        $criteria->compare('isBlog', 1);

        $item_count = Content::model()->count($criteria);

        $pages = new CPagination($item_count);
        $pages->setPageSize(Yii::app()->params['blogPerPage']);
        $pages->applyLimit($criteria);


        $model = Content::model()->findAll($criteria);


        $this->render('index', array(
            'html' => $this->generateBlogposts($model),
            'item_count' => $item_count,
            'page_size' => Yii::app()->params['blogPerPage'],
            'items_count' => $item_count,
            'pages' => $pages,
        ));
    }


    protected function generateBlogposts($model)
    {
        $html = "";
        $lang = Yii::app()->language;
        if (count($model) > 0)
            foreach ($model as $blogpost) {
                $criteria = new CDbCriteria();
                $criteria->compare("blogID", $blogpost->id);
                $criteria->compare("lang", $lang);
                $slug = Slug::model()->find($criteria);
                $timestamp = strtotime($slug->createdAt);

                $html .= "<div class='context'>";
                $html .= "<div class='con-left'>
        <h1>" . $blogpost->{'title_' . $lang} . "</h1>
    </div>
        <div class='clear'></div>
    <div class='con-data-cat'>
            <span class='pull-left'>
                <i class='fa fa-calendar'></i> " . date('d.m.Y', $timestamp) . "
            </span>
             <span class='pull-right'>
                <i class='fa fa-bookmark'></i> " . Yii::t('common', 'category') . ":" . $blogpost->cat->{'title_' . $lang} . "
             </span>
    </div>
    <div class='clear'></div>
    <div>
    <div class='con-img'><img class='img-thumbnail' src='$blogpost->imgUrl' alt=''/></div>
    <div class='con-body ReadableText'>" .
                    Typography::truncate(strip_tags($blogpost->{"content_" . $lang}), 500) . "
            </div>
            <div class='clear'></div>
        </div>
        <div class='con-fright'><a href='/$slug->slug/" . strtotime($slug->createdAt) . "'><i class='fa fa-book'></i> " . Yii::t("common", "readmore") . "</a></div>
        <div class='clear'></div>
   </div>";

            }
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


    public function actionContact()
    {
        $model = new Request();
        if (isset($_POST['Request'])) {
            $model->attributes = $_POST['Request'];
            if ($model->save()) {
                Yii::app()->user->setFlash('contact', Yii::t("common", "sent"));
                $this->refresh();
            }
        }
        $this->layout = "column1";
        $this->render('contact', array('model' => $model));
    }

    public function actionThanks()
    {
        $this->redirect(Navigation::findUrlByID(array(
            "id" => 2,
            "lang" => Yii::app()->language
        )));
    }

    public function actionAbout()
    {
        $this->redirect(Navigation::findUrlByID(array(
            "id" => 1,
            "lang" => Yii::app()->language
        )));
    }

    public function actionPhotogallery()
    {
        $this->redirect("/" . Yii::app()->language . "/photogallery/index");
    }

    public function actionVideogallery()
    {
        $this->redirect("/" . Yii::app()->language . "/videogallery/index");
    }

}