<?php

/**
 * This is the model class for table "wdonline".
 *
 * The followings are the available columns in table 'wdonline':
 * @property integer $wd_id
 * @property string $s_name
 * @property string $wd_nc
 * @property string $wd_ask
 * @property string $wd_answer
 * @property string $wd_stime
 * @property string $wd_ltime
 * @property integer $wd_bool
 * @property integer $kid
 * @property string $wd_email
 */
class Wdonline extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Wdonline the static model class
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
		return 'wdonline';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('s_name, wd_nc, wd_ask, wd_stime, wd_ltime', 'required'),
			array('wd_bool, kid', 'numerical', 'integerOnly'=>true),
			array('s_name', 'length', 'max'=>200),
			array('wd_nc, wd_email', 'length', 'max'=>100),
			array('wd_ask', 'length', 'max'=>250),
			array('wd_answer', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('wd_id, s_name, wd_nc, wd_ask, wd_answer, wd_stime, wd_ltime, wd_bool, kid, wd_email', 'safe', 'on'=>'search'),
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
			'schoolinfo' => array(self::BELONGS_TO, 'School', '', 'on' => 't.s_name=schoolinfo.s_name'),
			'kkinfoinfo' => array(self::BELONGS_TO, 'Kkinfo', '', 'on' => 'kkinfoinfo.s_id=schoolinfo.s_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'wd_id' => 'Wd',
			's_name' => 'S Name',
			'wd_nc' => 'Wd Nc',
			'wd_ask' => 'Wd Ask',
			'wd_answer' => 'Wd Answer',
			'wd_stime' => 'Wd Stime',
			'wd_ltime' => 'Wd Ltime',
			'wd_bool' => 'Wd Bool',
			'kid' => 'Kid',
			'wd_email' => 'Wd Email',
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

		$criteria->compare('wd_id',$this->wd_id);

		$criteria->compare('s_name',$this->s_name,true);

		$criteria->compare('wd_nc',$this->wd_nc,true);

		$criteria->compare('wd_ask',$this->wd_ask,true);

		$criteria->compare('wd_answer',$this->wd_answer,true);

		$criteria->compare('wd_stime',$this->wd_stime,true);

		$criteria->compare('wd_ltime',$this->wd_ltime,true);

		$criteria->compare('wd_bool',$this->wd_bool);

		$criteria->compare('kid',$this->kid);

		$criteria->compare('wd_email',$this->wd_email,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}