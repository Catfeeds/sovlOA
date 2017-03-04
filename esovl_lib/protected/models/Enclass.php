<?php

/**
 * This is the model class for table "enclass".
 *
 * The followings are the available columns in table 'enclass':
 * @property integer $n_id
 * @property string $n_class
 * @property integer $n_type
 */
class Enclass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Enclass the static model class
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
		return 'enclass';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('n_id, n_class', 'required'),
			array('n_id, n_type', 'numerical', 'integerOnly'=>true),
			array('n_class', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('n_id, n_class, n_type', 'safe', 'on'=>'search'),
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
			'n_id' => 'N',
			'n_class' => 'N Class',
			'n_type' => 'N Type',
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

		$criteria->compare('n_id',$this->n_id);

		$criteria->compare('n_class',$this->n_class,true);

		$criteria->compare('n_type',$this->n_type);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}