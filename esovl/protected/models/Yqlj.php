<?php

/**
 * This is the model class for table "yqlj".
 *
 * The followings are the available columns in table 'yqlj':
 * @property integer $yq_id
 * @property string $yq_title
 * @property string $yq_link
 */
class Yqlj extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Yqlj the static model class
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
		return 'yqlj';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('yq_title, yq_link', 'required'),
			array('yq_title', 'length', 'max'=>100),
			array('yq_link', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('yq_id, yq_title, yq_link', 'safe', 'on'=>'search'),
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
			'yq_id' => 'Yq',
			'yq_title' => 'Yq Title',
			'yq_link' => 'Yq Link',
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

		$criteria->compare('yq_id',$this->yq_id);

		$criteria->compare('yq_title',$this->yq_title,true);

		$criteria->compare('yq_link',$this->yq_link,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}