<?php

/**
 * This is the model class for table "wsbm".
 *
 * The followings are the available columns in table 'wsbm':
 * @property integer $bm_id
 * @property string $bm_xxname
 * @property string $bm_zyclass
 * @property string $bm_zycaption
 * @property string $bm_name
 * @property string $bm_tel
 * @property string $bm_sfz
 * @property string $bm_address
 * @property string $bm_email
 * @property string $bm_con
 * @property string $bm_date
 * @property integer $bm_bool
 */
class Wsbm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wsbm the static model class
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
		return 'wsbm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bm_xxname, bm_zyclass, bm_zycaption, bm_name, bm_tel, bm_sfz, bm_address, bm_email, bm_con, bm_date', 'required'),
			array('bm_bool', 'numerical', 'integerOnly'=>true),
			array('bm_xxname, bm_email', 'length', 'max'=>200),
			array('bm_zyclass, bm_zycaption', 'length', 'max'=>100),
			array('bm_name', 'length', 'max'=>10),
			array('bm_tel', 'length', 'max'=>18),
			array('bm_sfz', 'length', 'max'=>20),
			array('bm_address', 'length', 'max'=>220),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('bm_id, bm_xxname, bm_zyclass, bm_zycaption, bm_name, bm_tel, bm_sfz, bm_address, bm_email, bm_con, bm_date, bm_bool', 'safe', 'on'=>'search'),
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
			'bm_id' => 'ID',
			'bm_xxname' => '学校名称',
			'bm_zyclass' => '专业类别',
			'bm_zycaption' => '专业名称',
			'bm_name' => '姓名',
			'bm_tel' => '手机',
			'bm_sfz' => '身 份 证',
			'bm_address' => '通讯地址',
			'bm_email' => '电子邮箱',
			'bm_con' => '备注说明',
			'bm_date' => '网上报名时间',
			'bm_bool' => '处理状态',
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

		$criteria->compare('bm_id',$this->bm_id);

		$criteria->compare('bm_xxname',$this->bm_xxname,true);

		$criteria->compare('bm_zyclass',$this->bm_zyclass,true);

		$criteria->compare('bm_zycaption',$this->bm_zycaption,true);

		$criteria->compare('bm_name',$this->bm_name,true);

		$criteria->compare('bm_tel',$this->bm_tel,true);

		$criteria->compare('bm_sfz',$this->bm_sfz,true);

		$criteria->compare('bm_address',$this->bm_address,true);

		$criteria->compare('bm_email',$this->bm_email,true);

		$criteria->compare('bm_con',$this->bm_con,true);

		$criteria->compare('bm_date',$this->bm_date,true);

		$criteria->compare('bm_bool',$this->bm_bool);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}