<?php

/**
 * This is the model class for table "productos".
 *
 * The followings are the available columns in table 'productos':
 * @property integer $idProductos
 * @property string $Codigo
 * @property string $Nombre_Producto
 * @property string $Descripcion
 * @property string $Marca
 * @property string $Modelo
 * @property string $CodModelo
 * @property string $Tamano
 * @property string $Capacidad
 * @property integer $TiempoDespacho
 * @property integer $Stock
 * @property string $URLCatalogo
 * @property integer $PrecioNormal
 * @property integer $PedMin
 * @property integer $Visitado
 * @property integer $Publicado
 * @property integer $Borrado
 * @property string $Creado
 * @property string $Actualizado
 * @property integer $EstadoStock_id
 * @property integer $cruge_user_Prov_id
 * @property integer $Categorias_id
 *
 * The followings are the available model relations:
 * @property Imgenprod[] $imgenprods
 * @property Ordencompra[] $ordencompras
 * @property Preciohist[] $preciohists
 * @property Preciosdesc[] $preciosdescs
 * @property Categorias $categorias
 * @property CrugeUser $crugeUserProv
 * @property Estadostock $estadoStock
 * @property Cotizacion[] $cotizacions
 */
class Productos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productos';
	}

    /**
     * Model behaviors
     */
    public function behaviors()
    {
        return array(
          /*  'dateRangeSearch'=>array(
                'class'=>'application.components.behaviors.EDateRangeSearchBehavior',
            ),*/
            'CTimestampBehavior' => array(
                'class' => 'zii.behaviors.CTimestampBehavior',
                'createAttribute' => 'Creado',
                'updateAttribute' => 'Actualizado',
            )
        );
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Codigo, Nombre_Producto, PrecioNormal, EstadoStock_id, cruge_user_Prov_id, Categorias_id', 'required'),
			array('Visitado, Publicado, Stock, Borrado, EstadoStock_id, cruge_user_Prov_id, Categorias_id', 'numerical', 'integerOnly'=>true),
			array('Codigo, Nombre_Producto, URLCatalogo', 'length', 'max'=>255),
			array('Marca, Modelo, CodModelo, Tamano, Capacidad', 'length', 'max'=>60),
			array('Descripcion, Creado, Actualizado', 'safe'),
            array('TiempoDespacho, PrecioNormal, PedMin','numerical',
                'integerOnly'=>true,
                'min'=>1,

            ),
            array('Actualizado','default',
                'value'=>new CDbExpression('NOW()'),
                'setOnEmpty'=>false,'on'=>'update'),

            array('Creado,Actualizado','default',
                'value'=>new CDbExpression('NOW()'),
                'setOnEmpty'=>false,'on'=>'insert'),

            array('Borrado,Visitado','default',
                'value'=>'0',
                'setOnEmpty'=>false,'on'=>'insert'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProductos, Codigo, Nombre_Producto, Descripcion, Marca, Modelo, CodModelo, Tamano, Capacidad, TiempoDespacho, Stock, URLCatalogo, PrecioNormal, PedMin, Visitado, Publicado, Borrado, Creado, Actualizado, EstadoStock_id, cruge_user_Prov_id, Categorias_id', 'safe', 'on'=>'search'),
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
			'imgenprods' => array(self::HAS_MANY, 'Imgenprod', 'Productos_id'),
			'ordencompras' => array(self::MANY_MANY, 'Ordencompra', 'ordencompra_has_productos(Productos_id, OrdenCompra_id)'),
			'preciohists' => array(self::HAS_MANY, 'Preciohist', 'Productos_id'),
			'preciosdescs' => array(self::HAS_MANY, 'Preciosdesc', 'Productos_id'),
			'categorias' => array(self::BELONGS_TO, 'Categorias', 'Categorias_id'),//relacion
			'crugeUserProv' => array(self::BELONGS_TO, 'CrugeUser', 'cruge_user_Prov_id'),
			'estadoStock' => array(self::BELONGS_TO, 'Estadostock', 'EstadoStock_id'),
			'cotizacions' => array(self::MANY_MANY, 'Cotizacion', 'productos_has_cotizacion(Productos_id, Cotizacion_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProductos' => 'ID',
			'Codigo' => 'Codigo',
			'Nombre_Producto' => 'Nombre Producto',
			'Descripcion' => 'Descripción',
			'Marca' => 'Marca',
			'Modelo' => 'Modelo',
			'CodModelo' => 'Codigo Modelo',
			'Tamano' => 'Tamano',
			'Capacidad' => 'Capacidad',
			'TiempoDespacho' => 'Tiempo de Despacho (Días)',
			'Stock' => 'Stock',
			'URLCatalogo' => 'Urlcatalogo',
			'PrecioNormal' => 'Precio Normal',
			'PedMin' => 'Cantidad Minima Pedido',
			'Visitado' => 'Visitado',
			'Publicado' => 'Publicado',
			'Borrado' => 'Borrado',
			'Creado' => 'Creado',
			'Actualizado' => 'Actualizado',
			'EstadoStock_id' => 'Estado Stock',
			'cruge_user_Prov_id' => 'Id Propietario',
			'Categorias_id' => 'Categoria',
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

		$criteria->compare('idProductos',$this->idProductos);
		$criteria->compare('Codigo',$this->Codigo,true);
		$criteria->compare('Nombre_Producto',$this->Nombre_Producto,true);
		$criteria->compare('Descripcion',$this->Descripcion,true);
		$criteria->compare('Marca',$this->Marca,true);
		$criteria->compare('Modelo',$this->Modelo,true);
		$criteria->compare('CodModelo',$this->CodModelo,true);
		$criteria->compare('Tamano',$this->Tamano,true);
		$criteria->compare('Capacidad',$this->Capacidad,true);
		$criteria->compare('TiempoDespacho',$this->TiempoDespacho);
		$criteria->compare('Stock',$this->Stock);
		$criteria->compare('URLCatalogo',$this->URLCatalogo,true);
		$criteria->compare('PrecioNormal',$this->PrecioNormal);
		$criteria->compare('PedMin',$this->PedMin);
		$criteria->compare('Visitado',$this->Visitado);
		$criteria->compare('Publicado',$this->Publicado);
		$criteria->compare('Borrado',$this->Borrado);
		$criteria->compare('Creado',$this->Creado,true);
		$criteria->compare('Actualizado',$this->Actualizado,true);
		$criteria->compare('EstadoStock_id',$this->EstadoStock_id);
		$criteria->compare('cruge_user_Prov_id',$this->cruge_user_Prov_id);
		$criteria->compare('Categorias_id',$this->Categorias_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Productos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
