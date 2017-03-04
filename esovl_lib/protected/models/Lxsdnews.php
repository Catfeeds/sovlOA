<?php

/**
 * This is the model class for table "lxsdnews".
 *
 * The followings are the available columns in table 'lxsdnews':
 * @property integer $lx_sdid
 * @property integer $lx_sdbcl
 * @property integer $lx_sdscl
 * @property string $lx_sdtitle
 * @property string $lx_sdcon
 * @property integer $lx_sdbool
 * @property string $lx_sdsource
 * @property integer $lx_sdclick
 * @property string $lx_sdate
 */
class Lxsdnews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lxsdnews the static model class
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
		return 'lxsdnews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lx_sdbcl, lx_sdscl, lx_sdtitle, lx_sdate', 'required'),
			array('lx_sdbcl, lx_sdscl, lx_sdbool, lx_sdclick', 'numerical', 'integerOnly'=>true),
			array('lx_sdtitle, lx_sdsource', 'length', 'max'=>100),
			array('lx_sdcon', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lx_sdid, lx_sdbcl, lx_sdscl, lx_sdtitle, lx_sdcon, lx_sdbool, lx_sdsource, lx_sdclick, lx_sdate', 'safe', 'on'=>'search'),
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
			'lx_sdid' => 'Lx Sdid',
			'lx_sdbcl' => 'Lx Sdbcl',
			'lx_sdscl' => 'Lx Sdscl',
			'lx_sdtitle' => 'Lx Sdtitle',
			'lx_sdcon' => 'Lx Sdcon',
			'lx_sdbool' => 'Lx Sdbool',
			'lx_sdsource' => 'Lx Sdsource',
			'lx_sdclick' => 'Lx Sdclick',
			'lx_sdate' => 'Lx Sdate',
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

		$criteria->compare('lx_sdid',$this->lx_sdid);

		$criteria->compare('lx_sdbcl',$this->lx_sdbcl);

		$criteria->compare('lx_sdscl',$this->lx_sdscl);

		$criteria->compare('lx_sdtitle',$this->lx_sdtitle,true);

		$criteria->compare('lx_sdcon',$this->lx_sdcon,true);

		$criteria->compare('lx_sdbool',$this->lx_sdbool);

		$criteria->compare('lx_sdsource',$this->lx_sdsource,true);

		$criteria->compare('lx_sdclick',$this->lx_sdclick);

		$criteria->compare('lx_sdate',$this->lx_sdate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}