<?php

/**
 * This is the model class for table "mb_step".
 *
 * The followings are the available columns in table 'mb_step':
 * @property integer $mb_id
 * @property string $s_name
 * @property integer $mb_tj
 * @property string $mb_logo
 * @property string $mb_banner
 * @property string $mb_tel
 * @property string $mb_kftime
 * @property string $mb_adderss
 * @property string $mb_pic1
 * @property string $mb_pic2
 * @property string $mb_pic3
 * @property string $mb_pic4
 * @property string $mb_zszy
 * @property string $mb_lxwm
 * @property string $mb_zxns
 * @property string $mb_kfzx
 * @property string $mb_mzsm
 * @property string $mb_ggfw
 * @property integer $mb_bj
 * @property integer $mb_order
 */
class MbStep extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return MbStep the static model class
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
		return 'mb_step';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('s_name, mb_tj, mb_logo, mb_banner, mb_tel, mb_kftime, mb_adderss, mb_pic1, mb_pic2, mb_pic3, mb_pic4', 'required'),
			array('mb_tj, mb_bj, mb_order', 'numerical', 'integerOnly'=>true),
			array('s_name, mb_tel', 'length', 'max'=>100),
			array('mb_logo, mb_kftime', 'length', 'max'=>200),
			array('mb_banner, mb_adderss, mb_pic1, mb_pic2, mb_pic3, mb_pic4', 'length', 'max'=>220),
			array('mb_zszy, mb_lxwm, mb_zxns, mb_kfzx, mb_mzsm, mb_ggfw', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('mb_id, s_name, mb_tj, mb_logo, mb_banner, mb_tel, mb_kftime, mb_adderss, mb_pic1, mb_pic2, mb_pic3, mb_pic4, mb_zszy, mb_lxwm, mb_zxns, mb_kfzx, mb_mzsm, mb_ggfw, mb_bj, mb_order', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mb_id' => 'Mb',
			's_name' => 'S Name',
			'mb_tj' => 'Mb Tj',
			'mb_logo' => 'Mb Logo',
			'mb_banner' => 'Mb Banner',
			'mb_tel' => 'Mb Tel',
			'mb_kftime' => 'Mb Kftime',
			'mb_adderss' => 'Mb Adderss',
			'mb_pic1' => 'Mb Pic1',
			'mb_pic2' => 'Mb Pic2',
			'mb_pic3' => 'Mb Pic3',
			'mb_pic4' => 'Mb Pic4',
			'mb_zszy' => 'Mb Zszy',
			'mb_lxwm' => 'Mb Lxwm',
			'mb_zxns' => 'Mb Zxns',
			'mb_kfzx' => 'Mb Kfzx',
			'mb_mzsm' => 'Mb Mzsm',
			'mb_ggfw' => 'Mb Ggfw',
			'mb_bj' => 'Mb Bj',
			'mb_order' => 'Mb Order',
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

		$criteria->compare('mb_id',$this->mb_id);

		$criteria->compare('s_name',$this->s_name,true);

		$criteria->compare('mb_tj',$this->mb_tj);

		$criteria->compare('mb_logo',$this->mb_logo,true);

		$criteria->compare('mb_banner',$this->mb_banner,true);

		$criteria->compare('mb_tel',$this->mb_tel,true);

		$criteria->compare('mb_kftime',$this->mb_kftime,true);

		$criteria->compare('mb_adderss',$this->mb_adderss,true);

		$criteria->compare('mb_pic1',$this->mb_pic1,true);

		$criteria->compare('mb_pic2',$this->mb_pic2,true);

		$criteria->compare('mb_pic3',$this->mb_pic3,true);

		$criteria->compare('mb_pic4',$this->mb_pic4,true);

		$criteria->compare('mb_zszy',$this->mb_zszy,true);

		$criteria->compare('mb_lxwm',$this->mb_lxwm,true);

		$criteria->compare('mb_zxns',$this->mb_zxns,true);

		$criteria->compare('mb_kfzx',$this->mb_kfzx,true);

		$criteria->compare('mb_mzsm',$this->mb_mzsm,true);

		$criteria->compare('mb_ggfw',$this->mb_ggfw,true);

		$criteria->compare('mb_bj',$this->mb_bj);

		$criteria->compare('mb_order',$this->mb_order);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	//首页推荐
	public function getTjSchool($limit='5')
	{
		$criteria=new CDbCriteria;
		$criteria->with='schoolinfo';
		$criteria->addCondition('mb_tj=1');
		$criteria->order='mb_order';
		$criteria->limit=$limit;
		$TjSchool=$this->findAll($criteria);
		return $TjSchool;
	}
	//首页不推荐
	public function getNotTjSchool($limit='5')
	{
		$criteria=new CDbCriteria;
		$criteria->with='schoolinfo';
		$criteria->addCondition('mb_tj!=1');
		$criteria->order='mb_order';
		$criteria->limit=$limit;
		$TjSchool=$this->findAll($criteria);
		return $TjSchool;
	}
}