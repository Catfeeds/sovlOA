<?php

/**
 * This is the model class for table "pxbclass".
 *
 * The followings are the available columns in table 'pxbclass':
 * @property integer $pb_id
 * @property string $pb_title
 * @property string $pb_link
 * @property string $pb_pindao
 */
class Pxbclass extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Pxbclass the static model class
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
		return 'pxbclass';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pb_title, pb_pindao', 'required'),
			array('pb_title, pb_link, pb_pindao', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pb_id, pb_title, pb_link, pb_pindao', 'safe', 'on'=>'search'),
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
			'pb_id' => 'Pb',
			'pb_title' => 'Pb Title',
			'pb_link' => 'Pb Link',
			'pb_pindao' => 'Pb Pindao',
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

		$criteria->compare('pb_id',$this->pb_id);

		$criteria->compare('pb_title',$this->pb_title,true);

		$criteria->compare('pb_link',$this->pb_link,true);

		$criteria->compare('pb_pindao',$this->pb_pindao,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}