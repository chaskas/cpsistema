<?php

class OrdencompraController extends Controller
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
            array('CrugeAccessControlFilter')
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
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update','toggle','EditableSaver'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny',  // deny all users
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
        $model = $this->loadModel($id);
        if( $model->cruge_user_Prov_id == Yii::app()->user->id){
            $this->render('view', array(
                'model' => $model
            ));
        }else{
            throw new CHttpException(500,"Disculpe usted no esta autorizado a ver este elemento");
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model = Ordencompra::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'La pagina seleccionada no existe');
        return $model;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
/*    public function actionCreate()
    {
        $model = new Ordencompra;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['Ordencompra'])) {
$model->attributes = $_POST['Ordencompra'];
if ($model->save())
$this->redirect(array('view', 'id' => $model->idOrdenCompra));
}

$this->render('create', array(
    'model' => $model,
));
}*/

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        if ($model->cruge_user_Prov_id == Yii::app()->user->id) {
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

            if (isset($_POST['Ordencompra'])) {
                $model->attributes = $_POST['Ordencompra'];
                if ($model->save())
                    $this->redirect(array('view', 'id' => $model->idOrdenCompra));
            }
            $this->render('update', array(
                'model' => $model,
            ));

        } else {

            throw new CHttpException(500, "Disculpe usted no esta autorizado a realizar esta acción");

        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
/*    public function actionDelete($id)
    {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }*/

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Ordencompra('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ordencompra']))
            $model->attributes = $_GET['Ordencompra'];

        $model->cruge_user_Prov_id = Yii::app()->user->id;
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new Ordencompra('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ordencompra']))
            $model->attributes = $_GET['Ordencompra'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ordencompra-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }



    public function actionEditableSaver()
    {
        Yii::import('application.extensions.booster.components.TbEditableSaver');
        $es = new TbEditableSaver('Ordencompra');
        $es->update();
    }


    public function actions()
    {
        return array(
            'toggle' => array(
                'class'=>'booster.actions.TbToggleAction',
                'modelName' => 'Ordencompra',
            )
        );
    }




}
