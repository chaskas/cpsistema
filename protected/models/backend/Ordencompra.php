<?php

/**
 * This is the model class for table "ordencompra".
 *
 * The followings are the available columns in table 'ordencompra':
 * @property integer $idOrdenCompra
 * @property string $FechaCreacion
 * @property integer $Estado_Facturacion
 * @property integer $Numero_Factura
 * @property integer $Estado_Pago
 * @property integer $OpcionesPago_id
 * @property integer $cruge_user_Prov_id
 * @property integer $cruge_user_Empr_id
 * @property integer $EstadoOC_id
 * @property integer $InfoDespacho_id
 *
 * The followings are the available model relations:
 * @property Evaluacionpr[] $evaluacionprs
 * @property CrugeUser $crugeUserProv
 * @property CrugeUser $crugeUserEmpr
 * @property Estadooc $estadoOC
 * @property Infodespacho $infoDespacho
 * @property Opcionespago $opcionesPago
 * @property Productos[] $productoses
 */
class Ordencompra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordencompra';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OpcionesPago_id, cruge_user_Prov_id, cruge_user_Empr_id, InfoDespacho_id', 'required'),
			array('Estado_Facturacion, Numero_Factura, Estado_Pago, OpcionesPago_id, cruge_user_Prov_id, cruge_user_Empr_id, EstadoOC_id, InfoDespacho_id', 'numerical', 'integerOnly'=>true),
			array('FechaCreacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idOrdenCompra, FechaCreacion, Estado_Facturacion, Numero_Factura, Estado_Pago, OpcionesPago_id, cruge_user_Prov_id, cruge_user_Empr_id, EstadoOC_id, InfoDespacho_id', 'safe', 'on'=>'search'),
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
			'evaluacionprs' => array(self::HAS_MANY, 'Evaluacionpr', 'OrdenCompra_id'),
			'crugeUserProv' => array(self::BELONGS_TO, 'CrugeUser', 'cruge_user_Prov_id'),
			'crugeUserEmpr' => array(self::BELONGS_TO, 'CrugeUser', 'cruge_user_Empr_id'),
			'estadoOC' => array(self::BELONGS_TO, 'Estadooc', 'EstadoOC_id'),
			'infoDespacho' => array(self::BELONGS_TO, 'Infodespacho', 'InfoDespacho_id'),
			'opcionesPago' => array(self::BELONGS_TO, 'Opcionespago', 'OpcionesPago_id'),
			'productoses' => array(self::MANY_MANY, 'Productos', 'ordencompra_has_productos(OrdenCompra_id, Productos_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOrdenCompra' => 'Id Orden Compra',
			'FechaCreacion' => 'Fecha Creacion',
			'Estado_Facturacion' => 'Estado Facturacion',
			'Numero_Factura' => 'Numero Factura',
			'Estado_Pago' => 'Estado Pago',
			'OpcionesPago_id' => 'Opciones Pago',
			'cruge_user_Prov_id' => 'Cruge User Prov',
			'cruge_user_Empr_id' => 'Cruge User Empr',
			'EstadoOC_id' => 'Estado Oc',
			'InfoDespacho_id' => 'Info Despacho',
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

		$criteria->compare('idOrdenCompra',$this->idOrdenCompra);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('Estado_Facturacion',$this->Estado_Facturacion);
		$criteria->compare('Numero_Factura',$this->Numero_Factura);
		$criteria->compare('Estado_Pago',$this->Estado_Pago);
		$criteria->compare('OpcionesPago_id',$this->OpcionesPago_id);
		$criteria->compare('cruge_user_Prov_id',$this->cruge_user_Prov_id);
		$criteria->compare('cruge_user_Empr_id',$this->cruge_user_Empr_id);
		$criteria->compare('EstadoOC_id',$this->EstadoOC_id);
		$criteria->compare('InfoDespacho_id',$this->InfoDespacho_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ordencompra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
