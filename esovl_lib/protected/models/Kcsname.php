<?php

/**
 * This is the model class for table "kcsname".
 *
 * The followings are the available columns in table 'kcsname':
 * @property integer $s_id
 * @property integer $kcbid
 * @property string $kc_sname
 * @property string $kc_http
 */
class Kcsname extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Kcsname the static model class
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
		return 'kcsname';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('kc_sname', 'required'),
			array('kcbid', 'numerical', 'integerOnly'=>true),
			array('kc_sname, kc_http', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('s_id, kcbid, kc_sname, kc_http', 'safe', 'on'=>'search'),
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
			's_id' => 'S',
			'kcbid' => 'Kcbid',
			'kc_sname' => 'Kc Sname',
			'kc_http' => 'Kc Http',
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

		$criteria->compare('s_id',$this->s_id);

		$criteria->compare('kcbid',$this->kcbid);

		$criteria->compare('kc_sname',$this->kc_sname,true);

		$criteria->compare('kc_http',$this->kc_http,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}