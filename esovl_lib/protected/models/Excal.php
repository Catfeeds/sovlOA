<?php

/**
 * This is the model class for table "excal".
 *
 * The followings are the available columns in table 'excal':
 * @property integer $ex_id
 * @property string $ex_title
 * @property string $ex_ksbk
 * @property string $ex_bmtime
 * @property string $ex_bmrk
 * @property string $ex_kstime
 * @property string $ex_ksrk
 * @property string $ex_cfrk
 * @property integer $ex_bool
 * @property integer $ex_m
 */
class Excal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Excal the static model class
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
		return 'excal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ex_title, ex_ksbk, ex_bmtime, ex_bmrk, ex_kstime, ex_ksrk, ex_cfrk, ex_bool, ex_m', 'required'),
			array('ex_bool, ex_m', 'numerical', 'integerOnly'=>true),
			array('ex_title, ex_bmrk', 'length', 'max'=>200),
			array('ex_bmtime', 'length', 'max'=>300),
			array('ex_kstime', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('ex_id, ex_title, ex_ksbk, ex_bmtime, ex_bmrk, ex_kstime, ex_ksrk, ex_cfrk, ex_bool, ex_m', 'safe', 'on'=>'search'),
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
			'ex_id' => 'Ex',
			'ex_title' => 'Ex Title',
			'ex_ksbk' => 'Ex Ksbk',
			'ex_bmtime' => 'Ex Bmtime',
			'ex_bmrk' => 'Ex Bmrk',
			'ex_kstime' => 'Ex Kstime',
			'ex_ksrk' => 'Ex Ksrk',
			'ex_cfrk' => 'Ex Cfrk',
			'ex_bool' => 'Ex Bool',
			'ex_m' => 'Ex M',
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

		$criteria->compare('ex_id',$this->ex_id);

		$criteria->compare('ex_title',$this->ex_title,true);

		$criteria->compare('ex_ksbk',$this->ex_ksbk,true);

		$criteria->compare('ex_bmtime',$this->ex_bmtime,true);

		$criteria->compare('ex_bmrk',$this->ex_bmrk,true);

		$criteria->compare('ex_kstime',$this->ex_kstime,true);

		$criteria->compare('ex_ksrk',$this->ex_ksrk,true);

		$criteria->compare('ex_cfrk',$this->ex_cfrk,true);

		$criteria->compare('ex_bool',$this->ex_bool);

		$criteria->compare('ex_m',$this->ex_m);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//获取近期考试日历
	public function getRecentlyRl($limit='20')
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition('ex_kstime >="'.date("Y-m-d",time()).'"');
		$criteria->limit=$limit;
		$RecentlyRl=$this->findAll($criteria);
		return $RecentlyRl;
	}
}