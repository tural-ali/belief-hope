<?php

class PhotoalbumController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model = new Photoalbum;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Photoalbum'])) {
            $model->attributes = $_POST['Photoalbum'];
            if ($model->save())
                $this->redirect(array('update', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Photoalbum'])) {
            $model->attributes = $_POST['Photoalbum'];
            if (isset($_POST["upload"]) && $_FILES["images"]["error"][0] != 4)
                $this->UploadFile($id);
            if ($model->save())
                $this->redirect(array('update', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }


    public function UploadFile($albumId)
    {
        $this->fixFilesArray($_FILES["images"]);
        $images = $_FILES["images"];


        if (is_array($images) && count($images) > 0)
            foreach ($images as $image) {
                $filename = $albumId . "_" . substr(uniqid(), -5);
                $ext = pathinfo($image["name"], PATHINFO_EXTENSION);
                $originaName = pathinfo($image["name"], PATHINFO_FILENAME);
                $imgUrl = '/uploads/images/' . $filename . "." . $ext;
                $filePath = dirname(__FILE__) . "/../../.." . $imgUrl;
                move_uploaded_file($image["tmp_name"], $filePath);
                $photo = new Photo();
                $photo->url = $imgUrl;
                $photo->albumID = $albumId;
                if ($originaName == "main") {
                    Photo::model()->updateAll(array('main' => 0), "albumID=" . $albumId);
                    $photo->main = 1;
                }
                $photo->save(false);
            }
        return true;
    }

    function fixFilesArray(&$files)
    {
        $names = array('name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1);

        foreach ($files as $key => $part) {
            // only deal with valid keys and multiple files
            $key = (string)$key;
            if (isset($names[$key]) && is_array($part)) {
                foreach ($part as $position => $value) {
                    $files[$position][$key] = $value;
                }
                // remove old key reference
                unset($files[$key]);
            }
        }
    }


    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Photoalbum');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Photoalbum('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Photoalbum']))
            $model->attributes = $_GET['Photoalbum'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Photoalbum the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Photoalbum::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Photoalbum $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'photoalbum-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
