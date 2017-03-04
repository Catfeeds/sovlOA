<?php

/**
 * This is the model class for table "pindao".
 *
 * The followings are the available columns in table 'pindao':
 * @property integer $pin_id
 * @property string $pin_title
 * @property string $pin_pic1
 * @property string $pin_pic2
 * @property string $pin_pic3
 * @property string $pin_pic4
 */
class Pindao extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pindao the static model class
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
		return 'pindao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pin_title, pin_pic1, pin_pic2, pin_pic3, pin_pic4', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pin_id, pin_title, pin_pic1, pin_pic2, pin_pic3, pin_pic4', 'safe', 'on'=>'search'),
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
			'pin_id' => 'Pin',
			'pin_title' => 'Pin Title',
			'pin_pic1' => 'Pin Pic1',
			'pin_pic2' => 'Pin Pic2',
			'pin_pic3' => 'Pin Pic3',
			'pin_pic4' => 'Pin Pic4',
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

		$criteria->compare('pin_id',$this->pin_id);

		$criteria->compare('pin_title',$this->pin_title,true);

		$criteria->compare('pin_pic1',$this->pin_pic1,true);

		$criteria->compare('pin_pic2',$this->pin_pic2,true);

		$criteria->compare('pin_pic3',$this->pin_pic3,true);

		$criteria->compare('pin_pic4',$this->pin_pic4,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}