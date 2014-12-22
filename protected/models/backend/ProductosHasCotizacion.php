<?php

/**
 * This is the model class for table "productos_has_cotizacion".
 *
 * The followings are the available columns in table 'productos_has_cotizacion':
 * @property integer $idProductosCotizacion
 * @property integer $Productos_id
 * @property integer $Cotizacion_id
 * @property integer $Cantidad
 * @property integer $PrecioUnitario
 * @property integer $TiempoDesp
 *
 * The followings are the available model relations:
 * @property Cotizacion $cotizacion
 * @property Productos $productos
 */
class ProductosHasCotizacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productos_has_cotizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Productos_id, Cotizacion_id, PrecioUnitario, TiempoDesp', 'required'),
			array('Productos_id, Cotizacion_id, Cantidad, PrecioUnitario, TiempoDesp', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProductosCotizacion, Productos_id, Cotizacion_id, Cantidad, PrecioUnitario, TiempoDesp', 'safe', 'on'=>'search'),
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
			'cotizacion' => array(self::BELONGS_TO, 'Cotizacion', 'Cotizacion_id'),
			'productos' => array(self::BELONGS_TO, 'Productos', 'Productos_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProductosCotizacion' => 'Id Productos Cotizacion',
			'Productos_id' => 'Productos',
			'Cotizacion_id' => 'Cotizacion',
			'Cantidad' => 'Cantidad',
			'PrecioUnitario' => 'Precio Unitario',
			'TiempoDesp' => 'Tiempo Desp',
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

		$criteria->compare('idProductosCotizacion',$this->idProductosCotizacion);
		$criteria->compare('Productos_id',$this->Productos_id);
		$criteria->compare('Cotizacion_id',$this->Cotizacion_id);
		$criteria->compare('Cantidad',$this->Cantidad);
		$criteria->compare('PrecioUnitario',$this->PrecioUnitario);
		$criteria->compare('TiempoDesp',$this->TiempoDesp);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductosHasCotizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
