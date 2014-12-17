<?php

class CategoriasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			//'postOnly + delete', // we only allow deletion via POST request
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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'toggle', 'EditableSaver', 'PublicarChecked',
                    'DespublicarChecked','BorrarChecked','RestaurarChecked'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
                'actions'=>array('index','view'),
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Categorias;
        $this->pageTitle = 'Nueva Categoría';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Categorias'])) {
			$model->attributes=$_POST['Categorias'];
			if ($model->save()) {
				$this->redirect(array('admin'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
{
    $model=$this->loadModel($id);

    // Uncomment the following line if AJAX validation is needed
     $this->performAjaxValidation($model);

    if (isset($_POST['Categorias'])) {
        $model->attributes=$_POST['Categorias'];
        if ($model->save()) {
            $this->redirect(array('admin'));
        }
    }

    $this->render('update',array(
        'model'=>$model,
    ));
}


    public function actions()
    {
        return array(
            'toggle' => array(
                'class'=>'booster.actions.TbToggleAction',
                'modelName' => 'categorias',
            )
        );
    }

    public function actionEditableSaver()
    {
        Yii::import('application.extensions.booster.components.TbEditableSaver');
        $es = new TbEditableSaver('categorias');
        $es->onBeforeUpdate = function($event) {
            $event->sender->setAttribute('Actualizado', date('Y-m-d H:i:s'));
        };
        $es->update();
    }

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Petición invalida. Por favor no lo intente nuevamente.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Categorias');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Categorias('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Categorias'])) {
			$model->attributes=$_GET['Categorias'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Categorias the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Categorias::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'La pagina que busca, no existe.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Categorias $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='categorias-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}


    /**
     * actionGetCategorias
     * v1.0
     * Obtiene un JSON con la información de un categorias
     * @param int $cc N. de identificación
     */
    public function actionGetCategorias(){
        $data = Categorias::model()->findAll('Publicado=:p AND Borrado = :b AND idCategorias <> :id', array(':p'=>1, ':b' => 0,
          ':id'=> isset($_GET['id']) ? $_GET['id'] : 0));


        $res = array();
        array_push($res,array("value"	=> '0','text' => 'Sin Padre'));
        foreach ($data as $cat){
            array_push($res,array(
                "value"	=> $cat->idCategorias,
                'text' => $cat->Nombre_Categoria,
                )
            );
        }
        echo CJSON::encode($res);
    }

    public function actionBorrarChecked(){
        if(Yii::app()->request->getIsAjaxRequest())
        {

           if (isset($_POST['ids'])) :
               $checkedIDs = explode(",",$_POST['ids']);
           endif;

            foreach($checkedIDs as $id){
                $cat=Categorias::model()->findByPk($id);
                $cat->Borrado=1;
                $cat->save();
            }
        }
    }

    public function actionPublicarChecked(){
        if(Yii::app()->request->getIsAjaxRequest())
        {

            if (isset($_POST['ids'])) :
                $checkedIDs = explode(",",$_POST['ids']);
            endif;

            foreach($checkedIDs as $id){
                $cat=Categorias::model()->findByPk($id);
                $cat->Publicado=1;
                $cat->save();
            }
        }
    }

    public function actionDespublicarChecked(){
        if(Yii::app()->request->getIsAjaxRequest())
        {

            if (isset($_POST['ids'])) :
                $checkedIDs = explode(",",$_POST['ids']);
            endif;

            foreach($checkedIDs as $id){
                $cat=Categorias::model()->findByPk($id);
                $cat->Publicado=0;
                $cat->save();
            }
        }
    }

    public function actionRestaurarChecked(){
        if(Yii::app()->request->getIsAjaxRequest())
        {

            if (isset($_POST['ids'])) :
                $checkedIDs = explode(",",$_POST['ids']);
            endif;

            foreach($checkedIDs as $id){
                $cat=Categorias::model()->findByPk($id);
                $cat->Borrado=0;
                $cat->save();
            }
        }
    }


}