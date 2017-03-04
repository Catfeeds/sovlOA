<?php

/**
 * This is the model class for table "xl_s_f".
 *
 * The followings are the available columns in table 'xl_s_f':
 * @property integer $s_h_id
 * @property integer $classid
 * @property string $s_h_title
 * @property string $s_h_pic
 * @property string $s_h_http
 */
class XlSF extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return XlSF the static model class
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
		return 'xl_s_f';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('classid, s_h_title, s_h_pic, s_h_http', 'required'),
			array('classid', 'numerical', 'integerOnly'=>true),
			array('s_h_title, s_h_pic, s_h_http', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('s_h_id, classid, s_h_title, s_h_pic, s_h_http', 'safe', 'on'=>'search'),
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
			's_h_id' => 'S H',
			'classid' => 'Classid',
			's_h_title' => 'S H Title',
			's_h_pic' => 'S H Pic',
			's_h_http' => 'S H Http',
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

		$criteria->compare('s_h_id',$this->s_h_id);

		$criteria->compare('classid',$this->classid);

		$criteria->compare('s_h_title',$this->s_h_title,true);

		$criteria->compare('s_h_pic',$this->s_h_pic,true);

		$criteria->compare('s_h_http',$this->s_h_http,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAllByType($classid,$limit="")
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition("classid='{$classid}'");
		if($limit)$criteria->limit=$limit;
		$return=$this->findAll($criteria);
		return $return;
	}
}