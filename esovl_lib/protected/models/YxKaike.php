<?php

/**
 * This is the model class for table "yx_kaike".
 *
 * The followings are the available columns in table 'yx_kaike':
 * @property integer $yxk_id
 * @property string $yxk_cl
 * @property integer $class_title
 * @property integer $yxk_school
 * @property string $yxk_title
 * @property string $pxk_pic
 * @property string $yxk_con
 * @property string $yxk_xfei
 * @property string $yxk_yhui
 * @property string $yxk_time
 * @property string $yxk_xshi
 * @property string $yxk_tel
 * @property string $yxk_qq
 * @property string $yxk_duix
 * @property string $yxk_adder
 * @property string $yxk_line
 * @property string $pxk_bool
 */
class YxKaike extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return YxKaike the static model class
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
		return 'yx_kaike';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('yxk_cl, yxk_school, yxk_title, pxk_pic, yxk_con, yxk_xfei, yxk_yhui, yxk_time, yxk_xshi, yxk_tel, yxk_qq, yxk_duix, yxk_adder, yxk_line', 'required'),
			array('class_title, yxk_school', 'numerical', 'integerOnly'=>true),
			array('yxk_cl, yxk_title, pxk_pic, yxk_xfei, yxk_yhui, yxk_time, yxk_xshi, yxk_tel, yxk_qq, yxk_duix, yxk_adder, pxk_bool', 'length', 'max'=>100),
			array('yxk_line', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('yxk_id, yxk_cl, class_title, yxk_school, yxk_title, pxk_pic, yxk_con, yxk_xfei, yxk_yhui, yxk_time, yxk_xshi, yxk_tel, yxk_qq, yxk_duix, yxk_adder, yxk_line, pxk_bool', 'safe', 'on'=>'search'),
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
			'yxk_id' => 'Yxk',
			'yxk_cl' => 'Yxk Cl',
			'class_title' => 'Class Title',
			'yxk_school' => 'Yxk School',
			'yxk_title' => 'Yxk Title',
			'pxk_pic' => 'Pxk Pic',
			'yxk_con' => 'Yxk Con',
			'yxk_xfei' => 'Yxk Xfei',
			'yxk_yhui' => 'Yxk Yhui',
			'yxk_time' => 'Yxk Time',
			'yxk_xshi' => 'Yxk Xshi',
			'yxk_tel' => 'Yxk Tel',
			'yxk_qq' => 'Yxk Qq',
			'yxk_duix' => 'Yxk Duix',
			'yxk_adder' => 'Yxk Adder',
			'yxk_line' => 'Yxk Line',
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

		$criteria->compare('yxk_id',$this->yxk_id);

		$criteria->compare('yxk_cl',$this->yxk_cl,true);

		$criteria->compare('class_title',$this->class_title);

		$criteria->compare('yxk_school',$this->yxk_school);

		$criteria->compare('yxk_title',$this->yxk_title,true);

		$criteria->compare('pxk_pic',$this->pxk_pic,true);

		$criteria->compare('yxk_con',$this->yxk_con,true);

		$criteria->compare('yxk_xfei',$this->yxk_xfei,true);

		$criteria->compare('yxk_yhui',$this->yxk_yhui,true);

		$criteria->compare('yxk_time',$this->yxk_time,true);

		$criteria->compare('yxk_xshi',$this->yxk_xshi,true);

		$criteria->compare('yxk_tel',$this->yxk_tel,true);

		$criteria->compare('yxk_qq',$this->yxk_qq,true);

		$criteria->compare('yxk_duix',$this->yxk_duix,true);

		$criteria->compare('yxk_adder',$this->yxk_adder,true);

		$criteria->compare('yxk_line',$this->yxk_line,true);

		$criteria->compare('pxk_bool',$this->pxk_bool,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAll($isbool=true,$limit='7',$order='yxk_id desc')
	{
		$criteria=new CDbCriteria;
		if($isbool)$criteria->addCondition("pxk_bool =1");
		if($order)$criteria->order=$order;
		if($limit)$criteria->limit=$limit;
		$All=$this->findAll($criteria);
		return $All;
	}
}