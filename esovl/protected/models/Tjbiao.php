<?php

/**
 * This is the model class for table "tjbiao".
 *
 * The followings are the available columns in table 'tjbiao':
 * @property integer $tj_id
 * @property string $tj_class
 * @property string $tj_title
 * @property string $tj_info
 * @property integer $tj_bool
 * @property string $tj_pic
 * @property integer $tj_click
 * @property string $tj_date
 */
class Tjbiao extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Tjbiao the static model class
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
		return 'tjbiao';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tj_class, tj_title, tj_info, tj_bool, tj_pic, tj_date', 'required'),
			array('tj_bool, tj_click', 'numerical', 'integerOnly'=>true),
			array('tj_class, tj_pic', 'length', 'max'=>200),
			array('tj_title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('tj_id, tj_class, tj_title, tj_info, tj_bool, tj_pic, tj_click, tj_date', 'safe', 'on'=>'search'),
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
			'tj_id' => 'Tj',
			'tj_class' => 'Tj Class',
			'tj_title' => 'Tj Title',
			'tj_info' => 'Tj Info',
			'tj_bool' => 'Tj Bool',
			'tj_pic' => 'Tj Pic',
			'tj_click' => 'Tj Click',
			'tj_date' => 'Tj Date',
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

		$criteria->compare('tj_id',$this->tj_id);

		$criteria->compare('tj_class',$this->tj_class,true);

		$criteria->compare('tj_title',$this->tj_title,true);

		$criteria->compare('tj_info',$this->tj_info,true);

		$criteria->compare('tj_bool',$this->tj_bool);

		$criteria->compare('tj_pic',$this->tj_pic,true);

		$criteria->compare('tj_click',$this->tj_click);

		$criteria->compare('tj_date',$this->tj_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//Ê×Ò³ÍÆ¼ö
	public function getTjbiao($limit='5')
	{
		$criteria=new CDbCriteria;
		$criteria->addCondition('tj_bool=1');
		$criteria->limit=$limit;
		$TjSchool=$this->findAll($criteria);
		return $TjSchool;
	}
}