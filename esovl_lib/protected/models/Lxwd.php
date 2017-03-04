<?php

/**
 * This is the model class for table "lxwd".
 *
 * The followings are the available columns in table 'lxwd':
 * @property integer $lxwd_id
 * @property string $lxwd_name
 * @property string $lxwd_xxmc
 * @property string $lxwd_tel
 * @property string $lxwd_question
 * @property string $lxwd_date
 * @property integer $lxwd_bool
 * @property string $lxwd_answer
 * @property string $lxwd_ltime
 */
class Lxwd extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lxwd the static model class
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
		return 'lxwd';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lxwd_name, lxwd_xxmc, lxwd_tel, lxwd_question, lxwd_date', 'required'),
			array('lxwd_bool', 'numerical', 'integerOnly'=>true),
			array('lxwd_name, lxwd_xxmc, lxwd_tel', 'length', 'max'=>100),
			array('lxwd_answer, lxwd_ltime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lxwd_id, lxwd_name, lxwd_xxmc, lxwd_tel, lxwd_question, lxwd_date, lxwd_bool, lxwd_answer, lxwd_ltime', 'safe', 'on'=>'search'),
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
			'lxwd_id' => 'Lxwd',
			'lxwd_name' => 'Lxwd Name',
			'lxwd_xxmc' => 'Lxwd Xxmc',
			'lxwd_tel' => 'Lxwd Tel',
			'lxwd_question' => 'Lxwd Question',
			'lxwd_date' => 'Lxwd Date',
			'lxwd_bool' => 'Lxwd Bool',
			'lxwd_answer' => 'Lxwd Answer',
			'lxwd_ltime' => 'Lxwd Ltime',
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

		$criteria->compare('lxwd_id',$this->lxwd_id);

		$criteria->compare('lxwd_name',$this->lxwd_name,true);

		$criteria->compare('lxwd_xxmc',$this->lxwd_xxmc,true);

		$criteria->compare('lxwd_tel',$this->lxwd_tel,true);

		$criteria->compare('lxwd_question',$this->lxwd_question,true);

		$criteria->compare('lxwd_date',$this->lxwd_date,true);

		$criteria->compare('lxwd_bool',$this->lxwd_bool);

		$criteria->compare('lxwd_answer',$this->lxwd_answer,true);

		$criteria->compare('lxwd_ltime',$this->lxwd_ltime,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}