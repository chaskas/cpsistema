<?php

/**
 * This is the model class for table "contactos".
 *
 * The followings are the available columns in table 'contactos':
 * @property integer $idContactos
 * @property string $Contactos_Mensaje
 * @property string $Contactos_Asunto
 * @property integer $Contactos_Leido
 * @property string $Contactos_Fecha
 * @property integer $cruge_user_idProv
 * @property integer $cruge_user_idEmpr
 *
 * The followings are the available model relations:
 * @property CrugeUser $crugeUserIdProv
 * @property CrugeUser $crugeUserIdEmpr
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
			array('cruge_user_idProv, cruge_user_idEmpr', 'required'),
			array('Contactos_Leido, cruge_user_idProv, cruge_user_idEmpr', 'numerical', 'integerOnly'=>true),
			array('Contactos_Asunto', 'length', 'max'=>255),
			array('Contactos_Mensaje, Contactos_Fecha', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idContactos, Contactos_Mensaje, Contactos_Asunto, Contactos_Leido, Contactos_Fecha, cruge_user_idProv, cruge_user_idEmpr', 'safe', 'on'=>'search'),
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
			'crugeUserIdProv' => array(self::BELONGS_TO, 'CrugeUser', 'cruge_user_idProv'),
			'crugeUserIdEmpr' => array(self::BELONGS_TO, 'CrugeUser', 'cruge_user_idEmpr'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idContactos' => 'Id Contactos',
			'Contactos_Mensaje' => 'Contactos Mensaje',
			'Contactos_Asunto' => 'Contactos Asunto',
			'Contactos_Leido' => 'Contactos Leido',
			'Contactos_Fecha' => 'Contactos Fecha',
			'cruge_user_idProv' => 'Cruge User Id Prov',
			'cruge_user_idEmpr' => 'Cruge User Id Empr',
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
		$criteria->compare('Contactos_Mensaje',$this->Contactos_Mensaje,true);
		$criteria->compare('Contactos_Asunto',$this->Contactos_Asunto,true);
		$criteria->compare('Contactos_Leido',$this->Contactos_Leido);
		$criteria->compare('Contactos_Fecha',$this->Contactos_Fecha,true);
		$criteria->compare('cruge_user_idProv',$this->cruge_user_idProv);
		$criteria->compare('cruge_user_idEmpr',$this->cruge_user_idEmpr);

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
