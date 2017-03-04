<?php

/**
 * This is the model class for table "guanggao".
 *
 * The followings are the available columns in table 'guanggao':
 * @property integer $g_id
 * @property string $g_name
 * @property string $g_keyword
 * @property string $g_website
 * @property string $g_pic
 * @property string $g_con
 * @property integer $g_click
 * @property string $g_date
 */
class Guanggao extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Guanggao the static model class
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
		return 'guanggao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('g_name, g_keyword, g_website, g_pic, g_con, g_date', 'required'),
			array('g_click', 'numerical', 'integerOnly'=>true),
			array('g_name', 'length', 'max'=>50),
			array('g_keyword, g_pic', 'length', 'max'=>140),
			array('g_website', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('g_id, g_name, g_keyword, g_website, g_pic, g_con, g_click, g_date', 'safe', 'on'=>'search'),
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
			'g_id' => 'G',
			'g_name' => 'G Name',
			'g_keyword' => 'G Keyword',
			'g_website' => 'G Website',
			'g_pic' => 'G Pic',
			'g_con' => 'G Con',
			'g_click' => 'G Click',
			'g_date' => 'G Date',
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

		$criteria->compare('g_id',$this->g_id);

		$criteria->compare('g_name',$this->g_name,true);

		$criteria->compare('g_keyword',$this->g_keyword,true);

		$criteria->compare('g_website',$this->g_website,true);

		$criteria->compare('g_pic',$this->g_pic,true);

		$criteria->compare('g_con',$this->g_con,true);

		$criteria->compare('g_click',$this->g_click);

		$criteria->compare('g_date',$this->g_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//Ê×Ò³ÍÆ¼ö
	public function getGuanggao($limit='12')
	{
		$criteria=new CDbCriteria;
		$criteria->limit=$limit;
		$Guanggao=$this->findAll($criteria);
		return $Guanggao;
	}
}