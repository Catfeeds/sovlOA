<?php

/**
 * This is the model class for table "school".
 *
 * The followings are the available columns in table 'school':
 * @property integer $s_id
 * @property string $s_name
 * @property string $s_banner
 * @property string $s_logo
 * @property string $s_bxys
 * @property string $s_xyjs
 * @property string $s_zsdx
 * @property string $s_xxhj
 * @property string $s_kkxx
 * @property string $s_bmxz
 * @property string $s_xlxw
 * @property integer $s_click
 * @property integer $s_bj
 */
class School extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return School the static model class
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
		return 'school';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('s_name', 'required'),
			array('s_click, s_bj', 'numerical', 'integerOnly'=>true),
			array('s_name', 'length', 'max'=>200),
			array('s_banner', 'length', 'max'=>250),
			array('s_logo', 'length', 'max'=>100),
			array('s_bxys, s_xyjs, s_zsdx, s_xxhj, s_kkxx, s_bmxz, s_xlxw', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('s_id, s_name, s_banner, s_logo, s_bxys, s_xyjs, s_zsdx, s_xxhj, s_kkxx, s_bmxz, s_xlxw, s_click, s_bj', 'safe', 'on'=>'search'),
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
			'sss' => array(self::BELONGS_TO, 'Kkinfo', '', 'on' => 't.s_id=sss.s_id'),
			 // 'sss'=>array(self::STAT, 'kkinfo', 's_id'),  
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			's_id' => 'S',
			's_name' => 'S Name',
			's_banner' => 'S Banner',
			's_logo' => 'S Logo',
			's_bxys' => 'S Bxys',
			's_xyjs' => 'S Xyjs',
			's_zsdx' => 'S Zsdx',
			's_xxhj' => 'S Xxhj',
			's_kkxx' => 'S Kkxx',
			's_bmxz' => 'S Bmxz',
			's_xlxw' => 'S Xlxw',
			's_click' => 'S Click',
			's_bj' => 'S Bj',
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

		$criteria->compare('s_id',$this->s_id);

		$criteria->compare('s_name',$this->s_name,true);

		$criteria->compare('s_banner',$this->s_banner,true);

		$criteria->compare('s_logo',$this->s_logo,true);

		$criteria->compare('s_bxys',$this->s_bxys,true);

		$criteria->compare('s_xyjs',$this->s_xyjs,true);

		$criteria->compare('s_zsdx',$this->s_zsdx,true);

		$criteria->compare('s_xxhj',$this->s_xxhj,true);

		$criteria->compare('s_kkxx',$this->s_kkxx,true);

		$criteria->compare('s_bmxz',$this->s_bmxz,true);

		$criteria->compare('s_xlxw',$this->s_xlxw,true);

		$criteria->compare('s_click',$this->s_click);

		$criteria->compare('s_bj',$this->s_bj);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//获取所有学校
	public function getAllSchool($limit='5',$order=" s_click desc")
	{
		$criteria=new CDbCriteria;
		$criteria->with='sss';
		$criteria->order=$order;
		$criteria->limit=$limit;
		$School=$this->findAll($criteria);
		return $School;
	}
}