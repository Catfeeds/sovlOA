<?php

/**
 * This is the model class for table "qp_wd".
 *
 * The followings are the available columns in table 'qp_wd':
 * @property integer $wd_id
 * @property string $wd_con
 * @property string $wd_huif
 * @property string $wd_ttime
 * @property string $wd_htime
 * @property string $wd_name
 * @property integer $px_bool
 */
class QpWd extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QpWd the static model class
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
		return 'qp_wd';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('wd_con', 'required'),
			array('px_bool', 'numerical', 'integerOnly'=>true),
			array('wd_name', 'length', 'max'=>100),
			array('wd_huif, wd_ttime, wd_htime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('wd_id, wd_con, wd_huif, wd_ttime, wd_htime, wd_name, px_bool', 'safe', 'on'=>'search'),
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
			'wd_id' => 'Wd',
			'wd_con' => 'Wd Con',
			'wd_huif' => 'Wd Huif',
			'wd_ttime' => 'Wd Ttime',
			'wd_htime' => 'Wd Htime',
			'wd_name' => 'Wd Name',
			'px_bool' => 'Px Bool',
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

		$criteria->compare('wd_con',$this->wd_con,true);

		$criteria->compare('wd_huif',$this->wd_huif,true);

		$criteria->compare('wd_ttime',$this->wd_ttime,true);

		$criteria->compare('wd_htime',$this->wd_htime,true);

		$criteria->compare('wd_name',$this->wd_name,true);

		$criteria->compare('px_bool',$this->px_bool);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	public function getAll($limit='10',$order='wd_ttime desc',$isHF=false){
		$criteria=new CDbCriteria;
		if($isHF)$criteria->addCondition(" px_bool = 1 ");
		$criteria->limit=$limit;
		$criteria->order=$order;
		$All=$this->findAll($criteria);
		return $All;
	
	}
}