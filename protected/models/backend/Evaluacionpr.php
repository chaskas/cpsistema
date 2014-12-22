<?php

/**
 * This is the model class for table "evaluacionpr".
 *
 * The followings are the available columns in table 'evaluacionpr':
 * @property integer $idEvaluacionPr
 * @property integer $TiempoRespuesta
 * @property integer $TiempoEnvio
 * @property integer $CalidadProd
 * @property integer $TiempoFact
 * @property string $Comentario
 * @property string $Respuesta
 * @property string $Promedio
 * @property integer $OrdenCompra_id
 *
 * The followings are the available model relations:
 * @property Ordencompra $ordenCompra
 */
class Evaluacionpr extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'evaluacionpr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OrdenCompra_id', 'required'),
			array('TiempoRespuesta, TiempoEnvio, CalidadProd, TiempoFact, OrdenCompra_id', 'numerical', 'integerOnly'=>true),
			array('Promedio', 'length', 'max'=>10),
			array('Comentario, Respuesta', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEvaluacionPr, TiempoRespuesta, TiempoEnvio, CalidadProd, TiempoFact, Comentario, Respuesta, Promedio, OrdenCompra_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ordenCompra' => array(self::BELONGS_TO, 'Ordencompra', 'OrdenCompra_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idEvaluacionPr' => 'Id Evaluacion Pr',
			'TiempoRespuesta' => 'Tiempo Respuesta',
			'TiempoEnvio' => 'Tiempo Envio',
			'CalidadProd' => 'Calidad Prod',
			'TiempoFact' => 'Tiempo Fact',
			'Comentario' => 'Comentario',
			'Respuesta' => 'Respuesta',
			'Promedio' => 'Evaluación',
			'OrdenCompra_id' => 'Orden Compra',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idEvaluacionPr',$this->idEvaluacionPr);
		$criteria->compare('TiempoRespuesta',$this->TiempoRespuesta);
		$criteria->compare('TiempoEnvio',$this->TiempoEnvio);
		$criteria->compare('CalidadProd',$this->CalidadProd);
		$criteria->compare('TiempoFact',$this->TiempoFact);
		$criteria->compare('Comentario',$this->Comentario,true);
		$criteria->compare('Respuesta',$this->Respuesta,true);
		$criteria->compare('Promedio',$this->Promedio,true);
		$criteria->compare('OrdenCompra_id',$this->OrdenCompra_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Evaluacionpr the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
