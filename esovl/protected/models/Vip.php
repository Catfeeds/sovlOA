<?php

/**
 * This is the model class for table "vip".
 *
 * The followings are the available columns in table 'vip':
 * @property integer $v_id
 * @property integer $v_ucid
 * @property string $v_name
 * @property string $v_pass
 * @property string $v_tel
 * @property string $v_email
 * @property integer $v_class
 * @property string $province
 * @property string $city
 * @property integer $v_strus
 * @property string $v_con
 * @property string $v_date
 * @property string $v_mz
 * @property string $v_diz
 * @property string $v_yb
 * @property string $v_xb
 * @property string $v_sr
 * @property string $v_img
 * @property string $v_cs
 * @property integer $v_loginnum
 * @property integer $v_logintime
 * @property integer $v_role
 */
class Vip extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Vip the static model class
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
		return 'vip';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('v_ucid, v_name, v_pass, v_email, v_date', 'required'),
			array('v_ucid, v_class, v_strus, v_loginnum, v_logintime, v_role', 'numerical', 'integerOnly'=>true),
			array('v_name, v_pass, v_diz', 'length', 'max'=>200),
			array('v_tel, v_email, v_mz, v_yb, v_xb, v_sr, v_img, v_cs', 'length', 'max'=>100),
			array('province, city', 'length', 'max'=>50),
			array('v_con', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('v_id, v_ucid, v_name, v_pass, v_tel, v_email, v_class, province, city, v_strus, v_con, v_date, v_mz, v_diz, v_yb, v_xb, v_sr, v_img, v_cs, v_loginnum, v_logintime, v_role', 'safe', 'on'=>'search'),
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
			'v_id' => 'V',
			'v_ucid' => 'V Ucid',
			'v_name' => 'V Name',
			'v_pass' => 'V Pass',
			'v_tel' => 'V Tel',
			'v_email' => 'V Email',
			'v_class' => 'V Class',
			'province' => 'Province',
			'city' => 'City',
			'v_strus' => 'V Strus',
			'v_con' => 'V Con',
			'v_date' => 'V Date',
			'v_mz' => 'V Mz',
			'v_diz' => 'V Diz',
			'v_yb' => 'V Yb',
			'v_xb' => 'V Xb',
			'v_sr' => 'V Sr',
			'v_img' => 'V Img',
			'v_cs' => 'V Cs',
			'v_loginnum' => 'V Loginnum',
			'v_logintime' => 'V Logintime',
			'v_role' => 'V Role',
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

		$criteria->compare('v_id',$this->v_id);

		$criteria->compare('v_ucid',$this->v_ucid);

		$criteria->compare('v_name',$this->v_name,true);

		$criteria->compare('v_pass',$this->v_pass,true);

		$criteria->compare('v_tel',$this->v_tel,true);

		$criteria->compare('v_email',$this->v_email,true);

		$criteria->compare('v_class',$this->v_class);

		$criteria->compare('province',$this->province,true);

		$criteria->compare('city',$this->city,true);

		$criteria->compare('v_strus',$this->v_strus);

		$criteria->compare('v_con',$this->v_con,true);

		$criteria->compare('v_date',$this->v_date,true);

		$criteria->compare('v_mz',$this->v_mz,true);

		$criteria->compare('v_diz',$this->v_diz,true);

		$criteria->compare('v_yb',$this->v_yb,true);

		$criteria->compare('v_xb',$this->v_xb,true);

		$criteria->compare('v_sr',$this->v_sr,true);

		$criteria->compare('v_img',$this->v_img,true);

		$criteria->compare('v_cs',$this->v_cs,true);

		$criteria->compare('v_loginnum',$this->v_loginnum);

		$criteria->compare('v_logintime',$this->v_logintime);

		$criteria->compare('v_role',$this->v_role);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getUmodelByUcid($id){
		$umodel=$this->find("v_ucid ='{$id}'");
		return $umodel;
	}
	public function getNicknameByUcid($id){
		$umodel=$this->getUmodelByUcid($id);
		return $umodel->v_nickname;
	}
}