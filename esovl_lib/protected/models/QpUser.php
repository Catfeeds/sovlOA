<?php

/**
 * This is the model class for table "qp_user".
 *
 * The followings are the available columns in table 'qp_user':
 * @property integer $user_id
 * @property string $user_name
 * @property string $user_tel
 * @property string $user_num
 * @property string $user_dizhi
 * @property string $user_mail
 * @property string $user_con
 * @property string $user_zhuanye
 * @property integer $bm_bool
 * @property string $user_date
 */
class QpUser extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QpUser the static model class
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
		return 'qp_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, user_tel, user_num, user_dizhi, user_mail, user_zhuanye, user_date', 'required'),
			array('bm_bool', 'numerical', 'integerOnly'=>true),
			array('user_name, user_tel, user_num, user_mail, user_zhuanye', 'length', 'max'=>100),
			array('user_dizhi', 'length', 'max'=>200),
			array('user_con', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, user_name, user_tel, user_num, user_dizhi, user_mail, user_con, user_zhuanye, bm_bool, user_date', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'user_name' => '姓名',
			'user_tel' => '手机',
			'user_num' => '身份证',
			'user_dizhi' => '地址',
			'user_mail' => '邮箱',
			'user_con' => '详细介绍',
			'user_zhuanye' => '专业',
			'bm_bool' => '审核状态',
			'user_date' => '时间',
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

		$criteria->compare('user_id',$this->user_id);

		$criteria->compare('user_name',$this->user_name,true);

		$criteria->compare('user_tel',$this->user_tel,true);

		$criteria->compare('user_num',$this->user_num,true);

		$criteria->compare('user_dizhi',$this->user_dizhi,true);

		$criteria->compare('user_mail',$this->user_mail,true);

		$criteria->compare('user_con',$this->user_con,true);

		$criteria->compare('user_zhuanye',$this->user_zhuanye,true);

		$criteria->compare('bm_bool',$this->bm_bool);

		$criteria->compare('user_date',$this->user_date,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}