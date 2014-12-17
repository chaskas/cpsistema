<?php

/**
 * This is the model class for table "imgenprod".
 *
 * The followings are the available columns in table 'imgenprod':
 * @property integer $idImgP
 * @property string $Ruta
 * @property integer $Orden
 * @property integer $Productos_id
 *
 * The followings are the available model relations:
 * @property Productos $productos
 */
class Imgenprod extends CActiveRecord
{
/**
* This is the attribute holding the uploaded picture
* @var CUploadedFile
*/
    public $picture;





	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'imgenprod';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(

            array('picture', 'length', 'max' => 255, 'tooLong' => '{attribute} is too long (max {max} chars).', 'on' => 'upload'),
            array('picture', 'file', 'types' => 'jpg,jpeg,gif,png', 'maxSize' => 1024 * 1024 * 2, 'tooLarge' => 'Size should be less then 2MB !!!', 'on' => 'upload'),
			array('Productos_id', 'required'),
			array('Orden, Productos_id', 'numerical', 'integerOnly'=>true),
			array('Ruta', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idImgP, Ruta, Orden, Productos_id', 'safe', 'on'=>'search'),
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
			'productos' => array(self::BELONGS_TO, 'Productos', 'Productos_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idImgP' => 'Id Img P',
			'Ruta' => 'Ruta',
			'Orden' => 'Orden',
			'Productos_id' => 'Productos',
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

		$criteria->compare('idImgP',$this->idImgP);
		$criteria->compare('Ruta',$this->Ruta,true);
		$criteria->compare('Orden',$this->Orden);
		$criteria->compare('Productos_id',$this->Productos_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Imgenprod the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


    public function getImageUrl($img_type=null) {

        return 'hola';
    }
}
