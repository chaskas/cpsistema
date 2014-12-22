<?php

/**
 * This is the model class for table "necesidades".
 *
 * The followings are the available columns in table 'necesidades':
 * @property integer $idNecesidades
 * @property string $Titulo
 * @property string $Descripcion
 * @property integer $Resuelta
 * @property integer $Publicada
 * @property integer $Categorias_idCategorias
 * @property integer $cruge_userr_id
 */
class Necesidades extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'necesidades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Titulo, Descripcion, Categorias_idCategorias, cruge_userr_id', 'required'),
			array('Resuelta, Publicada, Categorias_idCategorias, cruge_userr_id', 'numerical', 'integerOnly'=>true),
			array('Titulo', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idNecesidades, Titulo, Descripcion, Resuelta, Publicada, Categorias_idCategorias, cruge_userr_id', 'safe', 'on'=>'search'),
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
            'categorias' => array(self::BELONGS_TO, 'Categorias', 'Categorias_idCategorias'),//relacion
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idNecesidades' => 'ID',
			'Titulo' => 'Nombre',
			'Descripcion' => 'Detalle',
			'Resuelta' => 'Resuelta',
			'Publicada' => 'Publicada',
			'Categorias_idCategorias' => 'Categoría',
			'cruge_userr_id' => 'usuario',
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

    $criteria->compare('idNecesidades',$this->idNecesidades);
    $criteria->compare('Titulo',$this->Titulo,true);
    $criteria->compare('Descripcion',$this->Descripcion,true);
    $criteria->compare('Resuelta',$this->Resuelta);
    $criteria->compare('Publicada',$this->Publicada);
    $criteria->compare('Categorias_idCategorias',$this->Categorias_idCategorias);
    $criteria->compare('cruge_userr_id',$this->cruge_userr_id);

    return new CActiveDataProvider($this, array(
        'criteria'=>$criteria,
    ));
}


    public function searchfiltada()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;


        $Solicitados = Contactos::model()->findAll('cruge_user_Prov_id = :upid',array(':upid'=> Yii::app()->user->id));
        $ids=0;
        foreach ($Solicitados as $id) {

            $ids= $ids.','.$id->Necesidades_id;
        }
        $criteria->compare('idNecesidades',$this->idNecesidades);
        $criteria->compare('Titulo',$this->Titulo,true);
        $criteria->compare('Descripcion',$this->Descripcion,true);
        $criteria->compare('Resuelta',$this->Resuelta);
        $criteria->compare('Publicada',$this->Publicada);
        $criteria->compare('Categorias_idCategorias',$this->Categorias_idCategorias);
        $criteria->compare('cruge_userr_id',$this->cruge_userr_id);
        $criteria->addNotInCondition('idNecesidades',explode(',',$ids ));

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Necesidades the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
