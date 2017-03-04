<?php

/**
 * This is the model class for table "xl_ask".
 *
 * The followings are the available columns in table 'xl_ask':
 * @property integer $w_id
 * @property string $w_title
 * @property string $w_con
 * @property integer $w_click
 * @property string $w_downcl
 * @property string $w_pindao
 */
class XlAsk extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return XlAsk the static model class
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
		return 'xl_ask';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('w_title, w_con', 'required'),
			array('w_click', 'numerical', 'integerOnly'=>true),
			array('w_title', 'length', 'max'=>200),
			array('w_downcl', 'length', 'max'=>10),
			array('w_pindao', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('w_id, w_title, w_con, w_click, w_downcl, w_pindao', 'safe', 'on'=>'search'),
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
			'w_id' => 'W',
			'w_title' => 'W Title',
			'w_con' => 'W Con',
			'w_click' => 'W Click',
			'w_downcl' => 'W Downcl',
			'w_pindao' => 'W Pindao',
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

		$criteria->compare('w_id',$this->w_id);

		$criteria->compare('w_title',$this->w_title,true);

		$criteria->compare('w_con',$this->w_con,true);

		$criteria->compare('w_click',$this->w_click);

		$criteria->compare('w_downcl',$this->w_downcl,true);

		$criteria->compare('w_pindao',$this->w_pindao,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAllBypdao($pdao='',$limit='10')
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition("w_downcl ='px'");
		$criteria->addCondition("w_pindao ='{$pdao}'");
		$criteria->limit=$limit;
		$News=$this->findAll($criteria);
		return $News;
	}
	
}