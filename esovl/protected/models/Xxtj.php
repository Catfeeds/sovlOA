<?php

/**
 * This is the model class for table "xxtj".
 *
 * The followings are the available columns in table 'xxtj':
 * @property integer $xx_id
 * @property string $xx_name
 * @property string $xx_logo
 * @property string $xx_http
 * @property integer $xx_bool
 */
class Xxtj extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Xxtj the static model class
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
		return 'xxtj';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('xx_name, xx_logo, xx_http, xx_bool', 'required'),
			array('xx_bool', 'numerical', 'integerOnly'=>true),
			array('xx_name', 'length', 'max'=>150),
			array('xx_logo, xx_http', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('xx_id, xx_name, xx_logo, xx_http, xx_bool', 'safe', 'on'=>'search'),
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
			'xx_id' => 'Xx',
			'xx_name' => 'Xx Name',
			'xx_logo' => 'Xx Logo',
			'xx_http' => 'Xx Http',
			'xx_bool' => 'Xx Bool',
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

		$criteria->compare('xx_id',$this->xx_id);

		$criteria->compare('xx_name',$this->xx_name,true);

		$criteria->compare('xx_logo',$this->xx_logo,true);

		$criteria->compare('xx_http',$this->xx_http,true);

		$criteria->compare('xx_bool',$this->xx_bool);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}