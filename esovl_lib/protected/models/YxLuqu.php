<?php

/**
 * This is the model class for table "yx_luqu".
 *
 * The followings are the available columns in table 'yx_luqu':
 * @property integer $lq_id
 * @property integer $school_id
 * @property string $lq_zy
 * @property string $lq_date
 * @property string $lq_name
 */
class YxLuqu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return YxLuqu the static model class
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
		return 'yx_luqu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('school_id, lq_zy, lq_name', 'required'),
			array('school_id', 'numerical', 'integerOnly'=>true),
			array('lq_zy, lq_name', 'length', 'max'=>100),
			array('lq_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lq_id, school_id, lq_zy, lq_date, lq_name', 'safe', 'on'=>'search'),
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
			'lq_id' => 'Lq',
			'school_id' => 'School',
			'lq_zy' => 'Lq Zy',
			'lq_date' => 'Lq Date',
			'lq_name' => 'Lq Name',
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

		$criteria->compare('lq_id',$this->lq_id);

		$criteria->compare('school_id',$this->school_id);

		$criteria->compare('lq_zy',$this->lq_zy,true);

		$criteria->compare('lq_date',$this->lq_date,true);

		$criteria->compare('lq_name',$this->lq_name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}