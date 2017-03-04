<?php

/**
 * This is the model class for table "pxkkinfo".
 *
 * The followings are the available columns in table 'pxkkinfo':
 * @property integer $pxk_id
 * @property integer $pxk_cl
 * @property integer $pxk_sid
 * @property string $pxk_title
 * @property string $pxk_pic
 * @property string $pxk_xfei
 * @property string $pxk_yhui
 * @property string $pxk_time
 * @property string $pxk_xshi
 * @property string $pxk_adder
 * @property string $pxk_tel
 * @property string $pxk_qq
 * @property string $pxk_line
 * @property string $pxk_duix
 * @property string $pxk_key
 * @property integer $pxk_click
 * @property string $pxk_con
 * @property string $pxk_date
 * @property integer $pxk_bool
 */
class Pxkkinfo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pxkkinfo the static model class
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
		return 'pxkkinfo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pxk_cl, pxk_sid, pxk_title, pxk_date', 'required'),
			array('pxk_cl, pxk_sid, pxk_click, pxk_bool', 'numerical', 'integerOnly'=>true),
			array('pxk_title, pxk_time, pxk_adder, pxk_line', 'length', 'max'=>200),
			array('pxk_pic, pxk_xfei, pxk_yhui, pxk_xshi, pxk_tel, pxk_qq, pxk_duix, pxk_key', 'length', 'max'=>100),
			array('pxk_con', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pxk_id, pxk_cl, pxk_sid, pxk_title, pxk_pic, pxk_xfei, pxk_yhui, pxk_time, pxk_xshi, pxk_adder, pxk_tel, pxk_qq, pxk_line, pxk_duix, pxk_key, pxk_click, pxk_con, pxk_date, pxk_bool', 'safe', 'on'=>'search'),
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
			'pxk_id' => 'Pxk',
			'pxk_cl' => 'Pxk Cl',
			'pxk_sid' => 'Pxk Sid',
			'pxk_title' => 'Pxk Title',
			'pxk_pic' => 'Pxk Pic',
			'pxk_xfei' => 'Pxk Xfei',
			'pxk_yhui' => 'Pxk Yhui',
			'pxk_time' => 'Pxk Time',
			'pxk_xshi' => 'Pxk Xshi',
			'pxk_adder' => 'Pxk Adder',
			'pxk_tel' => 'Pxk Tel',
			'pxk_qq' => 'Pxk Qq',
			'pxk_line' => 'Pxk Line',
			'pxk_duix' => 'Pxk Duix',
			'pxk_key' => 'Pxk Key',
			'pxk_click' => 'Pxk Click',
			'pxk_con' => 'Pxk Con',
			'pxk_date' => 'Pxk Date',
			'pxk_bool' => 'Pxk Bool',
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

		$criteria->compare('pxk_id',$this->pxk_id);

		$criteria->compare('pxk_cl',$this->pxk_cl);

		$criteria->compare('pxk_sid',$this->pxk_sid);

		$criteria->compare('pxk_title',$this->pxk_title,true);

		$criteria->compare('pxk_pic',$this->pxk_pic,true);

		$criteria->compare('pxk_xfei',$this->pxk_xfei,true);

		$criteria->compare('pxk_yhui',$this->pxk_yhui,true);

		$criteria->compare('pxk_time',$this->pxk_time,true);

		$criteria->compare('pxk_xshi',$this->pxk_xshi,true);

		$criteria->compare('pxk_adder',$this->pxk_adder,true);

		$criteria->compare('pxk_tel',$this->pxk_tel,true);

		$criteria->compare('pxk_qq',$this->pxk_qq,true);

		$criteria->compare('pxk_line',$this->pxk_line,true);

		$criteria->compare('pxk_duix',$this->pxk_duix,true);

		$criteria->compare('pxk_key',$this->pxk_key,true);

		$criteria->compare('pxk_click',$this->pxk_click);

		$criteria->compare('pxk_con',$this->pxk_con,true);

		$criteria->compare('pxk_date',$this->pxk_date,true);

		$criteria->compare('pxk_bool',$this->pxk_bool);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}