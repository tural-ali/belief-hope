<?php

class SiteController extends Controller
{

    public $layout = "column2";

    public function actionIndex()
    {
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
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


}