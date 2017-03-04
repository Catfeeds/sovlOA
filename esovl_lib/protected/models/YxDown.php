<?php

/**
 * This is the model class for table "yx_down".
 *
 * The followings are the available columns in table 'yx_down':
 * @property integer $down_id
 * @property string $down_title
 * @property string $w_con
 */
class YxDown extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return YxDown the static model class
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
		return 'yx_down';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('down_title, w_con', 'required'),
			array('down_title, w_con', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('down_id, down_title, w_con', 'safe', 'on'=>'search'),
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
			'down_id' => 'Down',
			'down_title' => 'Down Title',
			'w_con' => 'W Con',
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

		$criteria->compare('down_id',$this->down_id);

		$criteria->compare('down_title',$this->down_title,true);

		$criteria->compare('w_con',$this->w_con,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}