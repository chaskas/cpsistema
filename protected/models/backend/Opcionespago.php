<?php

/**
 * This is the model class for table "opcionespago".
 *
 * The followings are the available columns in table 'opcionespago':
 * @property integer $idOpcionesPago
 * @property string $OpcionesPago_Nomb
 * @property string $OpcionesPago_Desc
 * @property integer $Publicado
 * @property integer $Borrado
 * @property string $Creado
 * @property string $Actualizado
 *
 * The followings are the available model relations:
 * @property Ordencompra[] $ordencompras
 */
class Opcionespago extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'opcionespago';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('OpcionesPago_Nomb, Creado', 'required'),
			array('Publicado, Borrado', 'numerical', 'integerOnly'=>true),
			array('OpcionesPago_Nomb', 'length', 'max'=>60),
			array('OpcionesPago_Desc, Actualizado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idOpcionesPago, OpcionesPago_Nomb, OpcionesPago_Desc, Publicado, Borrado, Creado, Actualizado', 'safe', 'on'=>'search'),
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
			'ordencompras' => array(self::HAS_MANY, 'Ordencompra', 'OpcionesPago_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOpcionesPago' => 'Id Opciones Pago',
			'OpcionesPago_Nomb' => 'Opciones Pago Nomb',
			'OpcionesPago_Desc' => 'Opciones Pago Desc',
			'Publicado' => 'Publicado',
			'Borrado' => 'Borrado',
			'Creado' => 'Creado',
			'Actualizado' => 'Actualizado',
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

		$criteria->compare('idOpcionesPago',$this->idOpcionesPago);
		$criteria->compare('OpcionesPago_Nomb',$this->OpcionesPago_Nomb,true);
		$criteria->compare('OpcionesPago_Desc',$this->OpcionesPago_Desc,true);
		$criteria->compare('Publicado',$this->Publicado);
		$criteria->compare('Borrado',$this->Borrado);
		$criteria->compare('Creado',$this->Creado,true);
		$criteria->compare('Actualizado',$this->Actualizado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Opcionespago the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
