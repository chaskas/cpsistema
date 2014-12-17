<?php

/**
 * This is the model class for table "categorias".
 *
 * The followings are the available columns in table 'categorias':
 * @property integer $idCategorias
 * @property string $Nombre_Categoria
 * @property integer $Orden
 * @property integer $Publicado
 * @property integer $Borrado
 * @property string $Creado
 * @property string $Actualizado
 * @property integer $Categorias_Parent_id
 *
 * The followings are the available model relations:
 * @property Productos[] $productoses
 */
class Categorias extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'categorias';
	}

    /**
     * Model behaviors
     */
    public function behaviors()
    {
        return array(
            'dateRangeSearch'=>array(
                'class'=>'application.components.behaviors.EDateRangeSearchBehavior',
            ),
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
			array('Nombre_Categoria', 'required'),
			array('Orden, Publicado, Borrado, Categorias_Parent_id', 'numerical', 'integerOnly'=>true),
			array('Nombre_Categoria', 'length', 'max'=>255),
			array('Creado, Actualizado', 'safe'),


			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCategorias, Nombre_Categoria, Orden, Publicado, Borrado, Creado, Actualizado, Categorias_Parent_id', 'safe', 'on'=>'search'),
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
			'productos' => array(self::HAS_MANY, 'Productos', 'Categorias_id'),
            'padre' => array(self::BELONGS_TO, 'Categorias', 'Categorias_Parent_id'),//relacion
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCategorias' => 'Id Categorias',
			'Nombre_Categoria' => 'Nombre Categoria',
			'Orden' => 'Orden',
			'Publicado' => 'Publicado',
			'Borrado' => 'Borrado',
			'Creado' => 'Creado',
			'Actualizado' => 'Actualizado',
			'Categorias_Parent_id' => 'Categoria Padre',
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

		$criteria->compare('idCategorias',$this->idCategorias);
		$criteria->compare('Nombre_Categoria',$this->Nombre_Categoria,true);
		$criteria->compare('Orden',$this->Orden);
		$criteria->compare('Publicado',$this->Publicado);
		$criteria->compare('Borrado',$this->Borrado);
//		$criteria->compare('Creado',$this->Creado,true);
//      $criteria->compare('Actualizado',$this->Actualizado,true);
        $criteria->mergeWith($this->dateRangeSearchCriteria('Actualizado', $this->Actualizado));
        $criteria->mergeWith($this->dateRangeSearchCriteria('Creado', $this->Creado));
		$criteria->compare('Categorias_Parent_id',$this->Categorias_Parent_id);

      //  $criteria->addCondition("Borrado ='1'");

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Categorias the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
