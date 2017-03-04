<?php

/**
 * This is the model class for table "lxkkinfo".
 *
 * The followings are the available columns in table 'lxkkinfo':
 * @property integer $lxk_id
 * @property integer $lxk_gjid
 * @property integer $lxk_sid
 * @property string $lxk_title
 * @property string $lxk_zy
 * @property string $lxk_pic
 * @property string $lxk_con
 * @property string $lxk_xuefei
 * @property integer $lxk_click
 * @property integer $lxk_tjbool
 * @property string $lxk_date
 */
class Lxkkinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lxkkinfo the static model class
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
		return 'lxkkinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lxk_gjid, lxk_sid, lxk_title, lxk_zy, lxk_pic, lxk_date', 'required'),
			array('lxk_gjid, lxk_sid, lxk_click, lxk_tjbool', 'numerical', 'integerOnly'=>true),
			array('lxk_title, lxk_zy, lxk_pic, lxk_xuefei', 'length', 'max'=>100),
			array('lxk_con', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lxk_id, lxk_gjid, lxk_sid, lxk_title, lxk_zy, lxk_pic, lxk_con, lxk_xuefei, lxk_click, lxk_tjbool, lxk_date', 'safe', 'on'=>'search'),
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
		'lxgjclass' => array(self::BELONGS_TO, 'Lxgjclass', 'lxk_gjid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'lxk_id' => 'Lxk',
			'lxk_gjid' => 'Lxk Gjid',
			'lxk_sid' => 'Lxk Sid',
			'lxk_title' => 'Lxk Title',
			'lxk_zy' => 'Lxk Zy',
			'lxk_pic' => 'Lxk Pic',
			'lxk_con' => 'Lxk Con',
			'lxk_xuefei' => 'Lxk Xuefei',
			'lxk_click' => 'Lxk Click',
			'lxk_tjbool' => 'Lxk Tjbool',
			'lxk_date' => 'Lxk Date',
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

		$criteria->compare('lxk_id',$this->lxk_id);

		$criteria->compare('lxk_gjid',$this->lxk_gjid);

		$criteria->compare('lxk_sid',$this->lxk_sid);

		$criteria->compare('lxk_title',$this->lxk_title,true);

		$criteria->compare('lxk_zy',$this->lxk_zy,true);

		$criteria->compare('lxk_pic',$this->lxk_pic,true);

		$criteria->compare('lxk_con',$this->lxk_con,true);

		$criteria->compare('lxk_xuefei',$this->lxk_xuefei,true);

		$criteria->compare('lxk_click',$this->lxk_click);

		$criteria->compare('lxk_tjbool',$this->lxk_tjbool);

		$criteria->compare('lxk_date',$this->lxk_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}