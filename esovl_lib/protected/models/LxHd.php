<?php

/**
 * This is the model class for table "lx_hd".
 *
 * The followings are the available columns in table 'lx_hd':
 * @property integer $lxh_id
 * @property integer $lxh_gjid
 * @property string $lxh_pic
 * @property string $lxh_url
 */
class LxHd extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return LxHd the static model class
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
		return 'lx_hd';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lxh_gjid, lxh_pic', 'required'),
			array('lxh_gjid', 'numerical', 'integerOnly'=>true),
			array('lxh_pic, lxh_url', 'length', 'max'=>120),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lxh_id, lxh_gjid, lxh_pic, lxh_url', 'safe', 'on'=>'search'),
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
			'lxh_id' => 'Lxh',
			'lxh_gjid' => 'Lxh Gjid',
			'lxh_pic' => 'Lxh Pic',
			'lxh_url' => 'Lxh Url',
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

		$criteria->compare('lxh_id',$this->lxh_id);

		$criteria->compare('lxh_gjid',$this->lxh_gjid);

		$criteria->compare('lxh_pic',$this->lxh_pic,true);

		$criteria->compare('lxh_url',$this->lxh_url,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}