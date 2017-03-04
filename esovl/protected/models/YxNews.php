<?php

/**
 * This is the model class for table "yx_news".
 *
 * The followings are the available columns in table 'yx_news':
 * @property integer $news_id
 * @property string $news_class
 * @property string $news_title
 * @property string $news_con
 * @property integer $nclick
 * @property integer $nbool
 * @property string $npic
 * @property string $ndate
 * @property integer $class_name
 * @property string $kaoshi_title
 */
class YxNews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return YxNews the static model class
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
		return 'yx_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('news_title, news_con, nbool, ndate, class_name', 'required'),
			array('nclick, nbool, class_name', 'numerical', 'integerOnly'=>true),
			array('news_class, news_title, npic, kaoshi_title', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('news_id, news_class, news_title, news_con, nclick, nbool, npic, ndate, class_name, kaoshi_title', 'safe', 'on'=>'search'),
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
			'news_id' => 'News',
			'news_class' => 'News Class',
			'news_title' => 'News Title',
			'news_con' => 'News Con',
			'nclick' => 'Nclick',
			'nbool' => 'Nbool',
			'npic' => 'Npic',
			'ndate' => 'Ndate',
			'class_name' => 'Class Name',
			'kaoshi_title' => 'Kaoshi Title',
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

		$criteria->compare('news_id',$this->news_id);

		$criteria->compare('news_class',$this->news_class,true);

		$criteria->compare('news_title',$this->news_title,true);

		$criteria->compare('news_con',$this->news_con,true);

		$criteria->compare('nclick',$this->nclick);

		$criteria->compare('nbool',$this->nbool);

		$criteria->compare('npic',$this->npic,true);

		$criteria->compare('ndate',$this->ndate,true);

		$criteria->compare('class_name',$this->class_name);

		$criteria->compare('kaoshi_title',$this->kaoshi_title,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}