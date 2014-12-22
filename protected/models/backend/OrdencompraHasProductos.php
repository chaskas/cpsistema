<?php

/**
 * This is the model class for table "ordencompra_has_productos".
 *
 * The followings are the available columns in table 'ordencompra_has_productos':
 * @property integer $idOrdenProductos
 * @property integer $OrdenCompra_id
 * @property integer $Productos_id
 * @property integer $Cantidad
 * @property integer $PrecioUnitario
 * @property integer $TiempoDespacho
 * @property integer $TipoDescId
 *
 * The followings are the available model relations:
 * @property Ordencompra $ordenCompra
 * @property Productos $productos
 */
class OrdencompraHasProductos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ordencompra_has_productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OrdenCompra_id, Productos_id', 'required'),
			array('OrdenCompra_id, Productos_id, Cantidad, PrecioUnitario, TiempoDespacho, TipoDescId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idOrdenProductos, OrdenCompra_id, Productos_id, Cantidad, PrecioUnitario, TiempoDespacho, TipoDescId', 'safe', 'on'=>'search'),
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
			'productos' => array(self::BELONGS_TO, 'Productos', 'Productos_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOrdenProductos' => 'Id Orden Productos',
			'OrdenCompra_id' => 'Orden Compra',
			'Productos_id' => 'Productos',
			'Cantidad' => 'Cantidad',
			'PrecioUnitario' => 'Precio Unitario',
			'TiempoDespacho' => 'Tiempo Despacho',
			'TipoDescId' => 'Tipo Desc',
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

		$criteria->compare('idOrdenProductos',$this->idOrdenProductos);
		$criteria->compare('OrdenCompra_id',$this->OrdenCompra_id);
		$criteria->compare('Productos_id',$this->Productos_id);
		$criteria->compare('Cantidad',$this->Cantidad);
		$criteria->compare('PrecioUnitario',$this->PrecioUnitario);
		$criteria->compare('TiempoDespacho',$this->TiempoDespacho);
		$criteria->compare('TipoDescId',$this->TipoDescId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

    public function searchbyocid($oid)
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('idOrdenProductos', $this->idOrdenProductos);
     //   $criteria->compare('OrdenCompra_id', $this->OrdenCompra_id);
     //   $criteria->compare('Productos_id', $this->Productos_id);
        $criteria->compare('Cantidad', $this->Cantidad);
        $criteria->compare('PrecioUnitario', $this->PrecioUnitario);
        $criteria->compare('TiempoDespacho', $this->TiempoDespacho);
        $criteria->compare('TipoDescId', $this->TipoDescId);
        $criteria->addCondition('OrdenCompra_id = :ocId');
        $criteria->params += array(':ocId' => $oid);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));

    }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrdencompraHasProductos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
