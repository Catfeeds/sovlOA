<?php

/**
 * This is the model class for table "cpinfo".
 *
 * The followings are the available columns in table 'cpinfo':
 * @property integer $cp_id
 * @property string $cp_title
 * @property string $cp_banner
 * @property string $cp_info
 * @property integer $cp_click
 * @property string $cp_date
 */
class Cpinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Cpinfo the static model class
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
		return 'cpinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cp_title, cp_banner, cp_info, cp_date', 'required'),
			array('cp_click', 'numerical', 'integerOnly'=>true),
			array('cp_title', 'length', 'max'=>20),
			array('cp_banner', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cp_id, cp_title, cp_banner, cp_info, cp_click, cp_date', 'safe', 'on'=>'search'),
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
			'cp_id' => 'Cp',
			'cp_title' => 'Cp Title',
			'cp_banner' => 'Cp Banner',
			'cp_info' => 'Cp Info',
			'cp_click' => 'Cp Click',
			'cp_date' => 'Cp Date',
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

		$criteria->compare('cp_id',$this->cp_id);

		$criteria->compare('cp_title',$this->cp_title,true);

		$criteria->compare('cp_banner',$this->cp_banner,true);

		$criteria->compare('cp_info',$this->cp_info,true);

		$criteria->compare('cp_click',$this->cp_click);

		$criteria->compare('cp_date',$this->cp_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}