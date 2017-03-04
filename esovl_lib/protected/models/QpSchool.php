<?php

/**
 * This is the model class for table "qp_school".
 *
 * The followings are the available columns in table 'qp_school':
 * @property integer $school_id
 * @property string $school_title
 * @property string $npic
 * @property string $school_con
 */
class QpSchool extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QpSchool the static model class
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
		return 'qp_school';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('school_title, npic, school_con', 'required'),
			array('school_title, npic', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('school_id, school_title, npic, school_con', 'safe', 'on'=>'search'),
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
			'school_id' => 'School',
			'school_title' => 'School Title',
			'npic' => 'Npic',
			'school_con' => 'School Con',
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

		$criteria->compare('school_id',$this->school_id);

		$criteria->compare('school_title',$this->school_title,true);

		$criteria->compare('npic',$this->npic,true);

		$criteria->compare('school_con',$this->school_con,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}