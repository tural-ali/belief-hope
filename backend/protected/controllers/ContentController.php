<?php

class ContentController extends Controller
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

    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Content'])) {

            $oldUrl = $model->imgUrl;
            $model->attributes = $_POST['Content'];
            $model->image = CUploadedFile::getInstance($model, 'image');
            if ($model->image == null)
                $model->imgUrl = $oldUrl;
            else {
                $ext = pathinfo($model->image->name, PATHINFO_EXTENSION);
                $filename = "bp_" . substr(uniqid(), -5) . "." . $ext;
                $model->image->saveAs(dirname(__FILE__) . '/../../../uploads/images/' . $filename);
                $model->imgUrl = '/uploads/images/' . $filename;
            }

            if (empty($_POST["Content"]["albumID"]))
                $model->albumID = null;
            if (empty($_POST["Content"]["videoID"]))
                $model->videoID = null;
            if (empty($_POST["Content"]["catID"]))
                $model->catID = null;

            if ($model->save()) {
                $langs = Yii::app()->params["languages"];
                foreach ($langs as $lang => $value) {
                    if (isset($_POST['Content']["title_" . $lang]) && trim($_POST['Content']["title_" . $lang]) != "")
                        $this->insertSlug(
                            array(
                                "blogID" => $id,
                                "lang" => $lang,
                                "slug" => $_POST['Content']["title_" . $lang]
                            )
                        );

                }

                $this->redirect(array('update', 'id' => $model->id));
            }
        }
        $params = array(
            'model' => $model
        );
        if (!is_null($model->catID))
            $params["cats"] = $this->generateCategories(0, $model->catID);

        $this->render('update', $params);
    }

    public function actionCreate()
    {
        $model = new Content;
        $model->image = CUploadedFile::getInstance($model, 'image');
        if ($model->image == null)
            $model->imgUrl = null;
        else {
            $ext = pathinfo($model->image->name, PATHINFO_EXTENSION);
            $filename = 'bp_' . substr(uniqid(), -5) . "." . $ext;
            $model->image->saveAs(dirname(__FILE__) . '/../../../uploads/images/' . $filename);
            $model->imgUrl = '/uploads/images/' . $filename;
        }

        if (isset($_POST['Content'])) {
            $model->attributes = $_POST['Content'];
            if ($_POST["Content"]["albumID"] == "")
                $model->albumID = Null;
            if ($_POST["Content"]["videoID"] == "")
                $model->videoID = Null;

            if ($model->save()) {
                $blogID = $model->primaryKey;
                $langs = Yii::app()->params["languages"];
                foreach ($langs as $lang => $value) {
                    if (isset($_POST['Content']["title_" . $lang]) && trim($_POST['Content']["title_" . $lang]) != "")
                        $this->insertSlug(
                            array(
                                "blogID" => $blogID,
                                "lang" => $lang,
                                "slug" => $_POST['Content']["title_" . $lang]
                            )
                        );

                }
                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array(
            'model' => $model,
            "cats" => $this->generateCategories()
        ));
    }

    public function insertSlug($params)
    {
        $criteria = new CDbCriteria();
        $criteria->compare("lang", $params["lang"]);
        $criteria->compare("blogID", $params["blogID"]);
        $result = Slug::model()->find($criteria);
        if (count($result) > 0)
            return true;
        $typo = new Typography();
        $curtime = date('Y-m-d H:i:s', time());
        $slugStr = $typo->makeSlug($params["slug"]);
        $hash = substr(md5($slugStr), -5);
        $slug = new Slug('create');
        $slug->blogID = $params["blogID"];
        $slug->createdAt = $curtime;
        $slug->lang = $params["lang"];
        $slug->slug = $slugStr;
        $slug->hash = $hash;
        $slug->save();
        return true;
    }


    public function generateCategories($parent = 0, $selected = false)
    {
        $html = "";
        $criteria = new CDbCriteria();
        $criteria->order = "sort ASC";
        $criteria->compare("blog", 1);
        $criteria->compare("parent", $parent);

        $results = Hierarchy::model()->findAll($criteria);
        if (count($results) > 0) {
            foreach ($results as $result) {
                $criteria = new CDbCriteria();
                $criteria->order = "sort ASC";
                $criteria->compare("parent", $result->id);
                $criteria->compare("blog", 1);
                $children = Hierarchy::model()->findAll($criteria);
                if (count($children) > 0) {
                    $html .= " <optgroup label='$result->title_az'>";
                    $html .= $this->generateCategories($result->id, $selected);
                    $html .= "</optgroup>";
                } else {
                    $html .= "<option";
                    if ($selected && (int)$result->id == (int)$selected)
                        $html .= " selected ";
                    $html .= " value='$result->id'>$result->title_az</option>";
                }
            }

        }
        return $html;
    }


    public function actionDelete($id)
    {
        $this->loadModel($id)->delete();
        $slugs = Slug::model()->deleteAll("blogID=" . $id);
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Content');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Content('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Content']))
            $model->attributes = $_GET['Content'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Content the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model = Content::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Content $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'content-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
