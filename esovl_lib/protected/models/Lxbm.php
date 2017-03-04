<?php

/**
 * This is the model class for table "lxbm".
 *
 * The followings are the available columns in table 'lxbm':
 * @property integer $lxbm_id
 * @property integer $lxbm_gjid
 * @property string $lxbm_xxmc
 * @property string $lxbm_zymc
 * @property string $lxbm_name
 * @property string $lxbm_tel
 * @property string $lxbm_sfz
 * @property string $lxbm_address
 * @property string $lxbm_email
 * @property string $lxbm_con
 * @property integer $lxbm_bool
 * @property string $lxbm_date
 */
class Lxbm extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lxbm the static model class
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
		return 'lxbm';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lxbm_gjid, lxbm_xxmc, lxbm_zymc, lxbm_name, lxbm_tel, lxbm_sfz, lxbm_address, lxbm_email, lxbm_date', 'required'),
			array('lxbm_gjid, lxbm_bool', 'numerical', 'integerOnly'=>true),
			array('lxbm_xxmc, lxbm_zymc, lxbm_name, lxbm_tel, lxbm_sfz, lxbm_address, lxbm_email', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lxbm_id, lxbm_gjid, lxbm_xxmc, lxbm_zymc, lxbm_name, lxbm_tel, lxbm_sfz, lxbm_address, lxbm_email, lxbm_con, lxbm_bool, lxbm_date', 'safe', 'on'=>'search'),
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
			'lxbm_id' => 'Lxbm',
			'lxbm_gjid' => 'Lxbm Gjid',
			'lxbm_xxmc' => '学校名称',
			'lxbm_zymc' => '专业名称',
			'lxbm_name' => '姓名',
			'lxbm_tel' => '手机/电话',
			'lxbm_sfz' => '身 份 证',
			'lxbm_address' => '通讯地址',
			'lxbm_email' => '电子邮箱',
			'lxbm_con' => '备注',
			'lxbm_bool' => 'Lxbm Bool',
			'lxbm_date' => 'Lxbm Date',
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

		$criteria->compare('lxbm_id',$this->lxbm_id);

		$criteria->compare('lxbm_gjid',$this->lxbm_gjid);

		$criteria->compare('lxbm_xxmc',$this->lxbm_xxmc,true);

		$criteria->compare('lxbm_zymc',$this->lxbm_zymc,true);

		$criteria->compare('lxbm_name',$this->lxbm_name,true);

		$criteria->compare('lxbm_tel',$this->lxbm_tel,true);

		$criteria->compare('lxbm_sfz',$this->lxbm_sfz,true);

		$criteria->compare('lxbm_address',$this->lxbm_address,true);

		$criteria->compare('lxbm_email',$this->lxbm_email,true);

		$criteria->compare('lxbm_con',$this->lxbm_con,true);

		$criteria->compare('lxbm_bool',$this->lxbm_bool);

		$criteria->compare('lxbm_date',$this->lxbm_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}