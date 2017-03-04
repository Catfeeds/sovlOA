<?php

/**
 * This is the model class for table "lxnews".
 *
 * The followings are the available columns in table 'lxnews':
 * @property integer $lx_nid
 * @property string $lx_gjcl
 * @property string $lx_ncl
 * @property string $lx_ntitle
 * @property string $lx_npic
 * @property string $lx_nsp
 * @property string $lx_ncon
 * @property integer $lx_nbool
 * @property string $lx_nauthor
 * @property integer $lx_nclick
 * @property string $lx_jzdate
 * @property string $lx_ndate
 */
class Lxnews extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Lxnews the static model class
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
		return 'lxnews';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lx_gjcl, lx_ncl, lx_ntitle, lx_ndate', 'required'),
			array('lx_nbool, lx_nclick', 'numerical', 'integerOnly'=>true),
			array('lx_gjcl, lx_ncl, lx_ntitle, lx_npic, lx_nauthor, lx_jzdate', 'length', 'max'=>100),
			array('lx_nsp', 'length', 'max'=>200),
			array('lx_ncon', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('lx_nid, lx_gjcl, lx_ncl, lx_ntitle, lx_npic, lx_nsp, lx_ncon, lx_nbool, lx_nauthor, lx_nclick, lx_jzdate, lx_ndate', 'safe', 'on'=>'search'),
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
			'lx_nid' => 'Lx Nid',
			'lx_gjcl' => 'Lx Gjcl',
			'lx_ncl' => 'Lx Ncl',
			'lx_ntitle' => 'Lx Ntitle',
			'lx_npic' => 'Lx Npic',
			'lx_nsp' => 'Lx Nsp',
			'lx_ncon' => 'Lx Ncon',
			'lx_nbool' => 'Lx Nbool',
			'lx_nauthor' => 'Lx Nauthor',
			'lx_nclick' => 'Lx Nclick',
			'lx_jzdate' => 'Lx Jzdate',
			'lx_ndate' => 'Lx Ndate',
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

		$criteria->compare('lx_nid',$this->lx_nid);

		$criteria->compare('lx_gjcl',$this->lx_gjcl,true);

		$criteria->compare('lx_ncl',$this->lx_ncl,true);

		$criteria->compare('lx_ntitle',$this->lx_ntitle,true);

		$criteria->compare('lx_npic',$this->lx_npic,true);

		$criteria->compare('lx_nsp',$this->lx_nsp,true);

		$criteria->compare('lx_ncon',$this->lx_ncon,true);

		$criteria->compare('lx_nbool',$this->lx_nbool);

		$criteria->compare('lx_nauthor',$this->lx_nauthor,true);

		$criteria->compare('lx_nclick',$this->lx_nclick);

		$criteria->compare('lx_jzdate',$this->lx_jzdate,true);

		$criteria->compare('lx_ndate',$this->lx_ndate,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}