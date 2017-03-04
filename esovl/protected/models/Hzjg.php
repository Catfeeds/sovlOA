<?php

/**
 * This is the model class for table "hzjg".
 *
 * The followings are the available columns in table 'hzjg':
 * @property integer $hz_id
 * @property string $hz_title
 * @property string $hz_logo
 * @property string $hz_link
 */
class Hzjg extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Hzjg the static model class
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
		return 'hzjg';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hz_title, hz_logo, hz_link', 'required'),
			array('hz_title', 'length', 'max'=>100),
			array('hz_logo', 'length', 'max'=>250),
			array('hz_link', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('hz_id, hz_title, hz_logo, hz_link', 'safe', 'on'=>'search'),
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
			'hz_id' => 'Hz',
			'hz_title' => 'Hz Title',
			'hz_logo' => 'Hz Logo',
			'hz_link' => 'Hz Link',
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

		$criteria->compare('hz_id',$this->hz_id);

		$criteria->compare('hz_title',$this->hz_title,true);

		$criteria->compare('hz_logo',$this->hz_logo,true);

		$criteria->compare('hz_link',$this->hz_link,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}