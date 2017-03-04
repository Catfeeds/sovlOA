<?php

/**
 * This is the model class for table "lxdown".
 *
 * The followings are the available columns in table 'lxdown':
 * @property integer $lxd_id
 * @property string $lxd_title
 * @property string $lxd_file
 * @property integer $lxd_click
 * @property string $lxd_date
 */
class Lxdown extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lxdown the static model class
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
		return 'lxdown';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lxd_title, lxd_file, lxd_date', 'required'),
			array('lxd_click', 'numerical', 'integerOnly'=>true),
			array('lxd_title, lxd_file', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lxd_id, lxd_title, lxd_file, lxd_click, lxd_date', 'safe', 'on'=>'search'),
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
			'lxd_id' => 'Lxd',
			'lxd_title' => 'Lxd Title',
			'lxd_file' => 'Lxd File',
			'lxd_click' => 'Lxd Click',
			'lxd_date' => 'Lxd Date',
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

		$criteria->compare('lxd_id',$this->lxd_id);

		$criteria->compare('lxd_title',$this->lxd_title,true);

		$criteria->compare('lxd_file',$this->lxd_file,true);

		$criteria->compare('lxd_click',$this->lxd_click);

		$criteria->compare('lxd_date',$this->lxd_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}