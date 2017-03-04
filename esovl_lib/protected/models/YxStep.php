<?php

/**
 * This is the model class for table "yx_step".
 *
 * The followings are the available columns in table 'yx_step':
 * @property integer $yx_id
 * @property string $yx_name
 * @property string $yx_title
 * @property string $yx_Keyword
 * @property string $yx_Description
 * @property string $yx_qq
 * @property string $yx_logo
 * @property string $yx_gg
 */
class YxStep extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return YxStep the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'yx_step';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('yx_title, yx_Keyword, yx_Description, yx_qq, yx_logo, yx_gg', 'required'),
			array('yx_name, yx_logo, yx_gg', 'length', 'max'=>200),
			array('yx_title', 'length', 'max'=>300),
			array('yx_Keyword, yx_Description', 'length', 'max'=>1000),
			array('yx_qq', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('yx_id, yx_name, yx_title, yx_Keyword, yx_Description, yx_qq, yx_logo, yx_gg', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'yx_id' => 'Yx',
			'yx_name' => 'Yx Name',
			'yx_title' => 'Yx Title',
			'yx_Keyword' => 'Yx Keyword',
			'yx_Description' => 'Yx Description',
			'yx_qq' => 'Yx Qq',
			'yx_logo' => 'Yx Logo',
			'yx_gg' => 'Yx Gg',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('yx_id',$this->yx_id);

		$criteria->compare('yx_name',$this->yx_name,true);

		$criteria->compare('yx_title',$this->yx_title,true);

		$criteria->compare('yx_Keyword',$this->yx_Keyword,true);

		$criteria->compare('yx_Description',$this->yx_Description,true);

		$criteria->compare('yx_qq',$this->yx_qq,true);

		$criteria->compare('yx_logo',$this->yx_logo,true);

		$criteria->compare('yx_gg',$this->yx_gg,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}