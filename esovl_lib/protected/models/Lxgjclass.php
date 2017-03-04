<?php

/**
 * This is the model class for table "lxgjclass".
 *
 * The followings are the available columns in table 'lxgjclass':
 * @property integer $lx_gjid
 * @property string $lx_gjcl
 * @property string $lx_gqico
 * @property integer $lx_gjtj
 */
class Lxgjclass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lxgjclass the static model class
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
		return 'lxgjclass';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lx_gjcl, lx_gqico', 'required'),
			array('lx_gjtj', 'numerical', 'integerOnly'=>true),
			array('lx_gjcl, lx_gqico', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lx_gjid, lx_gjcl, lx_gqico, lx_gjtj', 'safe', 'on'=>'search'),
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
			'lx_gjid' => 'Lx Gjid',
			'lx_gjcl' => 'Lx Gjcl',
			'lx_gqico' => 'Lx Gqico',
			'lx_gjtj' => 'Lx Gjtj',
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

		$criteria->compare('lx_gjid',$this->lx_gjid);

		$criteria->compare('lx_gjcl',$this->lx_gjcl,true);

		$criteria->compare('lx_gqico',$this->lx_gqico,true);

		$criteria->compare('lx_gjtj',$this->lx_gjtj);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}