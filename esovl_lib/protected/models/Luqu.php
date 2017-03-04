<?php

/**
 * This is the model class for table "luqu".
 *
 * The followings are the available columns in table 'luqu':
 * @property integer $lq_id
 * @property integer $classid
 * @property string $lq_zy
 * @property integer $s_id
 * @property string $lq_name
 * @property string $lq_date
 */
class Luqu extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Luqu the static model class
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
		return 'luqu';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('classid, lq_zy, s_id, lq_name, lq_date', 'required'),
			array('classid, s_id', 'numerical', 'integerOnly'=>true),
			array('lq_zy, lq_name', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lq_id, classid, lq_zy, s_id, lq_name, lq_date', 'safe', 'on'=>'search'),
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
			'schoolinfo' => array(self::BELONGS_TO, 'School', '', 'on' => 't.s_id=schoolinfo.s_id'),
			'kkinfoinfo' => array(self::BELONGS_TO, 'Kkinfo', '', 'on' => 't.s_id=kkinfoinfo.s_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'lq_id' => 'Lq',
			'classid' => 'Classid',
			'lq_zy' => 'Lq Zy',
			's_id' => 'S',
			'lq_name' => 'Lq Name',
			'lq_date' => 'Lq Date',
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

		$criteria->compare('classid',$this->classid);

		$criteria->compare('lq_zy',$this->lq_zy,true);

		$criteria->compare('s_id',$this->s_id);

		$criteria->compare('lq_name',$this->lq_name,true);

		$criteria->compare('lq_date',$this->lq_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//根据类别
	public function getAllByClass($Class,$limit='7'){
		$criteria=new CDbCriteria;
		$criteria->limit=$limit;
		$criteria->with[]='schoolinfo';
		$criteria->with[]='kkinfoinfo';
		$criteria->addCondition(" classid ='{$Class}'");
		$criteria->order='lq_date desc';
		$models=$this->findAll($criteria);
		return $models;
	}
}