<?php

/**
 * This is the model class for table "teacher".
 *
 * The followings are the available columns in table 'teacher':
 * @property integer $t_id
 * @property string $t_name
 * @property string $t_jg
 * @property string $t_pic
 * @property string $t_fzkc
 * @property string $t_con
 * @property string $t_info
 * @property integer $t_bool
 * @property string $t_date
 */
class Teacher extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Teacher the static model class
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
		return 'teacher';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('t_name, t_jg, t_pic, t_fzkc, t_con, t_info, t_date', 'required'),
			array('t_bool', 'numerical', 'integerOnly'=>true),
			array('t_name', 'length', 'max'=>100),
			array('t_jg, t_pic, t_fzkc', 'length', 'max'=>200),
			array('t_con', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('t_id, t_name, t_jg, t_pic, t_fzkc, t_con, t_info, t_bool, t_date', 'safe', 'on'=>'search'),
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
			't_id' => 'T',
			't_name' => 'T Name',
			't_jg' => 'T Jg',
			't_pic' => 'T Pic',
			't_fzkc' => 'T Fzkc',
			't_con' => 'T Con',
			't_info' => 'T Info',
			't_bool' => 'T Bool',
			't_date' => 'T Date',
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

		$criteria->compare('t_id',$this->t_id);

		$criteria->compare('t_name',$this->t_name,true);

		$criteria->compare('t_jg',$this->t_jg,true);

		$criteria->compare('t_pic',$this->t_pic,true);

		$criteria->compare('t_fzkc',$this->t_fzkc,true);

		$criteria->compare('t_con',$this->t_con,true);

		$criteria->compare('t_info',$this->t_info,true);

		$criteria->compare('t_bool',$this->t_bool);

		$criteria->compare('t_date',$this->t_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//首页推荐老师
	public function getTjTeacher($limit='5')
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition('t_bool=1');
		$criteria->limit=$limit;
		$TjSchool=$this->findAll($criteria);
		return $TjSchool;
	}
}