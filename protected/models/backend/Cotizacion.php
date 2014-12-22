<?php

/**
 * This is the model class for table "cotizacion".
 *
 * The followings are the available columns in table 'cotizacion':
 * @property integer $idCotizacion
 * @property string $FechaCreacion
 * @property string $FechaRevalidacion
 * @property string $FechaVenc
 * @property integer $cruge_user_iduser
 *
 * The followings are the available model relations:
 * @property CrugeUser $crugeUserIduser
 * @property CrugeUser $crugeUserIdprov
 * @property Productos[] $productoses
 */
class Cotizacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cotizacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FechaCreacion, FechaRevalidacion, cruge_user_iduser', 'required'),
			array('cruge_user_iduser', 'numerical', 'integerOnly'=>true),
			array('FechaVenc', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCotizacion, FechaCreacion, FechaRevalidacion, FechaVenc, cruge_user_iduser', 'safe', 'on'=>'search'),
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
			'crugeUserIduser' => array(self::BELONGS_TO, 'CrugeUser', 'cruge_user_iduser'),
			'productoses' => array(self::MANY_MANY, 'Productos', 'productos_has_cotizacion(Cotizacion_id, Productos_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCotizacion' => 'Id Cotizacion',
			'FechaCreacion' => 'Fecha Creacion',
			'FechaRevalidacion' => 'Fecha Revalidacion',
			'FechaVenc' => 'Fecha Venc',
			'cruge_user_iduser' => 'Cruge User Iduser',
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

		$criteria->compare('idCotizacion',$this->idCotizacion);
		$criteria->compare('FechaCreacion',$this->FechaCreacion,true);
		$criteria->compare('FechaRevalidacion',$this->FechaRevalidacion,true);
		$criteria->compare('FechaVenc',$this->FechaVenc,true);
		$criteria->compare('cruge_user_iduser',$this->cruge_user_iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cotizacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
