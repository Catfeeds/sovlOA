<?php

/**
 * This is the model class for table "qp_news".
 *
 * The followings are the available columns in table 'qp_news':
 * @property integer $news_id
 * @property string $news_title
 * @property string $npic
 * @property string $news_con
 * @property string $nbool
 * @property string $ndate
 * @property integer $news_class
 * @property string $nclick
 * @property string $news_zuozhe
 * @property string $news_laiyuan
 */
class QpNews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return QpNews the static model class
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
		return 'qp_news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('news_title, news_con, nbool, news_class, news_zuozhe, news_laiyuan', 'required'),
			array('news_class', 'numerical', 'integerOnly'=>true),
			array('news_title, npic, news_zuozhe, news_laiyuan', 'length', 'max'=>100),
			array('nbool', 'length', 'max'=>10),
			array('nclick', 'length', 'max'=>1000),
			array('ndate', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('news_id, news_title, npic, news_con, nbool, ndate, news_class, nclick, news_zuozhe, news_laiyuan', 'safe', 'on'=>'search'),
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
			'news_title' => 'News Title',
			'npic' => 'Npic',
			'news_con' => 'News Con',
			'nbool' => 'Nbool',
			'ndate' => 'Ndate',
			'news_class' => 'News Class',
			'nclick' => 'Nclick',
			'news_zuozhe' => 'News Zuozhe',
			'news_laiyuan' => 'News Laiyuan',
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

		$criteria->compare('news_title',$this->news_title,true);

		$criteria->compare('npic',$this->npic,true);

		$criteria->compare('news_con',$this->news_con,true);

		$criteria->compare('nbool',$this->nbool,true);

		$criteria->compare('ndate',$this->ndate,true);

		$criteria->compare('news_class',$this->news_class);

		$criteria->compare('nclick',$this->nclick,true);

		$criteria->compare('news_zuozhe',$this->news_zuozhe,true);

		$criteria->compare('news_laiyuan',$this->news_laiyuan,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}