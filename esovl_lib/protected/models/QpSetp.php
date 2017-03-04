<?php

/**
 * This is the model class for table "qp_setp".
 *
 * The followings are the available columns in table 'qp_setp':
 * @property integer $qp_id
 * @property string $qp_title
 * @property string $qp_Keyword
 * @property string $qp_Description
 * @property string $qp_tel
 * @property string $z_logo
 * @property string $qp_pic
 * @property string $qp_name
 * @property string $qp_qq
 */
class QpSetp extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QpSetp the static model class
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
		return 'qp_setp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qp_title, qp_tel, z_logo, qp_pic, qp_name', 'length', 'max'=>200),
			array('qp_qq', 'length', 'max'=>100),
			array('qp_Keyword, qp_Description', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('qp_id, qp_title, qp_Keyword, qp_Description, qp_tel, z_logo, qp_pic, qp_name, qp_qq', 'safe', 'on'=>'search'),
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
			'qp_title' => 'Qp Title',
			'qp_Keyword' => 'Qp Keyword',
			'qp_Description' => 'Qp Description',
			'qp_tel' => 'Qp Tel',
			'z_logo' => 'Z Logo',
			'qp_pic' => 'Qp Pic',
			'qp_name' => 'Qp Name',
			'qp_qq' => 'Qp Qq',
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

		$criteria->compare('qp_title',$this->qp_title,true);

		$criteria->compare('qp_Keyword',$this->qp_Keyword,true);

		$criteria->compare('qp_Description',$this->qp_Description,true);

		$criteria->compare('qp_tel',$this->qp_tel,true);

		$criteria->compare('z_logo',$this->z_logo,true);

		$criteria->compare('qp_pic',$this->qp_pic,true);

		$criteria->compare('qp_name',$this->qp_name,true);

		$criteria->compare('qp_qq',$this->qp_qq,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}