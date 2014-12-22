<?php

/**
 * This is the model class for table "infodespacho".
 *
 * The followings are the available columns in table 'infodespacho':
 * @property integer $idInfoDespacho
 * @property string $Primer_Nombre
 * @property string $Apellido
 * @property string $Direccion
 * @property integer $CodPostal
 * @property string $Fono
 * @property integer $Comuna_id
 * @property integer $cruge_user_Empr_id
 *
 * The followings are the available model relations:
 * @property Ordencompra[] $ordencompras
 */
class Infodespacho extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'infodespacho';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Comuna_id, cruge_user_Empr_id', 'required'),
			array('CodPostal, Comuna_id, cruge_user_Empr_id', 'numerical', 'integerOnly'=>true),
			array('Primer_Nombre, Apellido', 'length', 'max'=>80),
			array('Direccion, Fono', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idInfoDespacho, Primer_Nombre, Apellido, Direccion, CodPostal, Fono, Comuna_id, cruge_user_Empr_id', 'safe', 'on'=>'search'),
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
			'ordencompras' => array(self::HAS_MANY, 'Ordencompra', 'InfoDespacho_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idInfoDespacho' => 'Id Info Despacho',
			'Primer_Nombre' => 'Primer Nombre',
			'Apellido' => 'Apellido',
			'Direccion' => 'Direccion',
			'CodPostal' => 'Cod Postal',
			'Fono' => 'Fono',
			'Comuna_id' => 'Comuna',
			'cruge_user_Empr_id' => 'Cruge User Empr',
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

		$criteria->compare('idInfoDespacho',$this->idInfoDespacho);
		$criteria->compare('Primer_Nombre',$this->Primer_Nombre,true);
		$criteria->compare('Apellido',$this->Apellido,true);
		$criteria->compare('Direccion',$this->Direccion,true);
		$criteria->compare('CodPostal',$this->CodPostal);
		$criteria->compare('Fono',$this->Fono,true);
		$criteria->compare('Comuna_id',$this->Comuna_id);
		$criteria->compare('cruge_user_Empr_id',$this->cruge_user_Empr_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Infodespacho the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
