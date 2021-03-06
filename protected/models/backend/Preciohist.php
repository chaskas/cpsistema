<?php

/**
 * This is the model class for table "preciohist".
 *
 * The followings are the available columns in table 'preciohist':
 * @property integer $idPrecioHist
 * @property string $FechaIni
 * @property string $FechaFin
 * @property integer $Precio
 * @property integer $CantMin
 * @property integer $CantMax
 * @property integer $Productos_id
 * @property integer $TipoDesc_id
 *
 * The followings are the available model relations:
 * @property Productos $productos
 * @property Tipodesc $tipoDesc
 */
class Preciohist extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'preciohist';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Precio, Productos_id, TipoDesc_id', 'required'),
			array('Precio, CantMin, CantMax, Productos_id, TipoDesc_id', 'numerical', 'integerOnly'=>true),
			array('FechaIni, FechaFin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPrecioHist, FechaIni, FechaFin, Precio, CantMin, CantMax, Productos_id, TipoDesc_id', 'safe', 'on'=>'search'),
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
			'productos' => array(self::BELONGS_TO, 'Productos', 'Productos_id'),
			'tipoDesc' => array(self::BELONGS_TO, 'Tipodesc', 'TipoDesc_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPrecioHist' => 'Id Precio Hist',
			'FechaIni' => 'Fecha Ini',
			'FechaFin' => 'Fecha Fin',
			'Precio' => 'Precio',
			'CantMin' => 'Cant Min',
			'CantMax' => 'Cant Max',
			'Productos_id' => 'Productos',
			'TipoDesc_id' => 'Tipo Desc',
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

		$criteria->compare('idPrecioHist',$this->idPrecioHist);
		$criteria->compare('FechaIni',$this->FechaIni,true);
		$criteria->compare('FechaFin',$this->FechaFin,true);
		$criteria->compare('Precio',$this->Precio);
		$criteria->compare('CantMin',$this->CantMin);
		$criteria->compare('CantMax',$this->CantMax);
		$criteria->compare('Productos_id',$this->Productos_id);
		$criteria->compare('TipoDesc_id',$this->TipoDesc_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Preciohist the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
