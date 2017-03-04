<?php

/**
 * This is the model class for table "qp_zhongxin".
 *
 * The followings are the available columns in table 'qp_zhongxin':
 * @property integer $qp_id
 * @property string $qp_con
 * @property string $npic
 */
class QpZhongxin extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QpZhongxin the static model class
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
		return 'qp_zhongxin';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qp_id, qp_con, npic', 'required'),
			array('qp_id', 'numerical', 'integerOnly'=>true),
			array('npic', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('qp_id, qp_con, npic', 'safe', 'on'=>'search'),
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
			'qp_id' => 'Qp',
			'qp_con' => 'Qp Con',
			'npic' => 'Npic',
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

		$criteria->compare('qp_id',$this->qp_id);

		$criteria->compare('qp_con',$this->qp_con,true);

		$criteria->compare('npic',$this->npic,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}