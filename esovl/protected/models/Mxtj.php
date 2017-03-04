<?php

/**
 * This is the model class for table "mxtj".
 *
 * The followings are the available columns in table 'mxtj':
 * @property integer $mx_id
 * @property string $mx_class
 * @property string $mx_title
 * @property string $mx_link
 * @property integer $mx_bool
 */
class Mxtj extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Mxtj the static model class
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
		return 'mxtj';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mx_class, mx_title, mx_link, mx_bool', 'required'),
			array('mx_bool', 'numerical', 'integerOnly'=>true),
			array('mx_class, mx_title', 'length', 'max'=>200),
			array('mx_link', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mx_id, mx_class, mx_title, mx_link, mx_bool', 'safe', 'on'=>'search'),
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
			'mx_id' => 'Mx',
			'mx_class' => 'Mx Class',
			'mx_title' => 'Mx Title',
			'mx_link' => 'Mx Link',
			'mx_bool' => 'Mx Bool',
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

		$criteria->compare('mx_id',$this->mx_id);

		$criteria->compare('mx_class',$this->mx_class,true);

		$criteria->compare('mx_title',$this->mx_title,true);

		$criteria->compare('mx_link',$this->mx_link,true);

		$criteria->compare('mx_bool',$this->mx_bool);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//获取推荐逛
	public function getTjguang($limit='10')
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition("mx_class = '一休带你逛'");
		$criteria->addCondition("mx_bool=1");
		$criteria->limit=$limit;
		$Tjguang=$this->findAll($criteria);
		return $Tjguang;
	}
	//获取推荐逛
	public function getTjrHot($limit='10')
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition("mx_class = '热门推荐'");
		$criteria->addCondition("mx_bool=1");
		$criteria->limit=$limit;
		$Tjguang=$this->findAll($criteria);
		return $Tjguang;
	}
}