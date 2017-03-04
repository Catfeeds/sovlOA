<?php

/**
 * This is the model class for table "lxschool".
 *
 * The followings are the available columns in table 'lxschool':
 * @property integer $lxs_id
 * @property integer $lxs_gjid
 * @property string $lxs_name
 * @property string $lxs_banner
 * @property string $lxs_logo
 * @property string $lxs_xxjs
 * @property string $lxs_kcys
 * @property string $lxs_zsjz
 * @property string $lxs_shhj
 * @property string $lxs_xgxx
 * @property integer $lxs_tjbool
 * @property integer $lxs_bj
 */
class Lxschool extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lxschool the static model class
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
		return 'lxschool';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lxs_gjid, lxs_name, lxs_banner, lxs_tjbool', 'required'),
			array('lxs_gjid, lxs_tjbool, lxs_bj', 'numerical', 'integerOnly'=>true),
			array('lxs_name, lxs_banner, lxs_logo', 'length', 'max'=>100),
			array('lxs_xxjs, lxs_kcys, lxs_zsjz, lxs_shhj, lxs_xgxx', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lxs_id, lxs_gjid, lxs_name, lxs_banner, lxs_logo, lxs_xxjs, lxs_kcys, lxs_zsjz, lxs_shhj, lxs_xgxx, lxs_tjbool, lxs_bj', 'safe', 'on'=>'search'),
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
			'lxs_id' => 'Lxs',
			'lxs_gjid' => 'Lxs Gjid',
			'lxs_name' => 'Lxs Name',
			'lxs_banner' => 'Lxs Banner',
			'lxs_logo' => 'Lxs Logo',
			'lxs_xxjs' => 'Lxs Xxjs',
			'lxs_kcys' => 'Lxs Kcys',
			'lxs_zsjz' => 'Lxs Zsjz',
			'lxs_shhj' => 'Lxs Shhj',
			'lxs_xgxx' => 'Lxs Xgxx',
			'lxs_tjbool' => 'Lxs Tjbool',
			'lxs_bj' => 'Lxs Bj',
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

		$criteria->compare('lxs_id',$this->lxs_id);

		$criteria->compare('lxs_gjid',$this->lxs_gjid);

		$criteria->compare('lxs_name',$this->lxs_name,true);

		$criteria->compare('lxs_banner',$this->lxs_banner,true);

		$criteria->compare('lxs_logo',$this->lxs_logo,true);

		$criteria->compare('lxs_xxjs',$this->lxs_xxjs,true);

		$criteria->compare('lxs_kcys',$this->lxs_kcys,true);

		$criteria->compare('lxs_zsjz',$this->lxs_zsjz,true);

		$criteria->compare('lxs_shhj',$this->lxs_shhj,true);

		$criteria->compare('lxs_xgxx',$this->lxs_xgxx,true);

		$criteria->compare('lxs_tjbool',$this->lxs_tjbool);

		$criteria->compare('lxs_bj',$this->lxs_bj);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}