<?php

/**
 * This is the model class for table "qp_teacher".
 *
 * The followings are the available columns in table 'qp_teacher':
 * @property integer $teacher_id
 * @property string $teacher_name
 * @property string $npic
 * @property string $teacher_zhuanye
 * @property string $teacher_con
 */
class QpTeacher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QpTeacher the static model class
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
		return 'qp_teacher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('teacher_name, npic, teacher_zhuanye, teacher_con', 'required'),
			array('teacher_name, npic', 'length', 'max'=>100),
			array('teacher_zhuanye', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('teacher_id, teacher_name, npic, teacher_zhuanye, teacher_con', 'safe', 'on'=>'search'),
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
			'teacher_id' => 'Teacher',
			'teacher_name' => 'Teacher Name',
			'npic' => 'Npic',
			'teacher_zhuanye' => 'Teacher Zhuanye',
			'teacher_con' => 'Teacher Con',
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

		$criteria->compare('teacher_id',$this->teacher_id);

		$criteria->compare('teacher_name',$this->teacher_name,true);

		$criteria->compare('npic',$this->npic,true);

		$criteria->compare('teacher_zhuanye',$this->teacher_zhuanye,true);

		$criteria->compare('teacher_con',$this->teacher_con,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	//获取老师
	public function getTeacher($limit='5',$order='teacher_id desc')
	{
		$criteria=new CDbCriteria;
		if($order)$criteria->order=$order;
		if($limit)$criteria->limit=$limit;
		$array=$this->findAll($criteria);
		return $array;
	}
}