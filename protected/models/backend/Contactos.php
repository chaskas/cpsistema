<?php

/**
 * This is the model class for table "contactos".
 *
 * The followings are the available columns in table 'contactos':
 * @property integer $idContactos
 * @property string $Asunto
 * @property string $Mensaje
 * @property integer $Leido
 * @property integer $Atendido
 * @property string $Creado
 * @property integer $cruge_user_Prov_id
 * @property integer $cruge_user_Empr_id
 *
 * The followings are the available model relations:
 * @property CrugeUser $crugeUserProv
 * @property CrugeUser $crugeUserEmpr
 */
class Contactos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contactos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cruge_user_Prov_id, cruge_user_Empr_id', 'required'),
			array('Leido, Atendido, cruge_user_Prov_id, cruge_user_Empr_id', 'numerical', 'integerOnly'=>true),
			array('Asunto', 'length', 'max'=>255),
			array('Mensaje, Creado', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idContactos, Asunto, Mensaje, Leido, Atendido, Creado, cruge_user_Prov_id, cruge_user_Empr_id', 'safe', 'on'=>'search'),
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
			'crugeUserProv' => array(self::BELONGS_TO, 'CrugeUser', 'cruge_user_Prov_id'),
			'crugeUserEmpr' => array(self::BELONGS_TO, 'CrugeUser', 'cruge_user_Empr_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idContactos' => 'Id Contactos',
			'Asunto' => 'Asunto',
			'Mensaje' => 'Mensaje',
			'Leido' => 'Leido',
			'Atendido' => 'Atendido',
			'Creado' => 'Creado',
			'cruge_user_Prov_id' => 'Cruge User Prov',
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

		$criteria->compare('idContactos',$this->idContactos);
		$criteria->compare('Asunto',$this->Asunto,true);
		$criteria->compare('Mensaje',$this->Mensaje,true);
		$criteria->compare('Leido',$this->Leido);
		$criteria->compare('Atendido',$this->Atendido);
		$criteria->compare('Creado',$this->Creado,true);
		$criteria->compare('cruge_user_Prov_id',$this->cruge_user_Prov_id);
		$criteria->compare('cruge_user_Empr_id',$this->cruge_user_Empr_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contactos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
