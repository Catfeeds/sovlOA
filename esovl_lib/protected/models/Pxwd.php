<?php

/**
 * This is the model class for table "pxwd".
 *
 * The followings are the available columns in table 'pxwd':
 * @property integer $px_id
 * @property string $px_ask
 * @property string $px_answer
 * @property string $px_time
 * @property integer $px_bool
 */
class Pxwd extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pxwd the static model class
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
		return 'pxwd';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('px_ask, px_time', 'required'),
			array('px_bool', 'numerical', 'integerOnly'=>true),
			array('px_ask, px_answer', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('px_id, px_ask, px_answer, px_time, px_bool', 'safe', 'on'=>'search'),
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
			'px_id' => 'Px',
			'px_ask' => 'Px Ask',
			'px_answer' => 'Px Answer',
			'px_time' => 'Px Time',
			'px_bool' => 'Px Bool',
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

		$criteria->compare('px_id',$this->px_id);

		$criteria->compare('px_ask',$this->px_ask,true);

		$criteria->compare('px_answer',$this->px_answer,true);

		$criteria->compare('px_time',$this->px_time,true);

		$criteria->compare('px_bool',$this->px_bool);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAllbool($ishot=false,$limit='10',$order='px_time desc')
	{
		$criteria=new CDbCriteria;
		if($ishot)$criteria->addCondition(" px_bool = 1 ");
		$criteria->limit=$limit;
		$criteria->order=$order;
		$News=$this->findAll($criteria);
		return $News;
	}
}