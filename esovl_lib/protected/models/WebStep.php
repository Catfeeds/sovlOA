<?php

/**
 * This is the model class for table "web_step".
 *
 * The followings are the available columns in table 'web_step':
 * @property integer $z_id
 * @property string $beizhu
 * @property string $z_name
 * @property string $z_title
 * @property string $z_keyword
 * @property string $z_contant
 * @property string $z_tel
 * @property string $z_fax
 * @property string $z_qq
 * @property string $z_msn
 * @property integer $z_code
 * @property string $z_email
 * @property string $z_website
 * @property string $z_logo
 * @property string $z_icp
 * @property string $z_banner
 * @property string $z_bmtj
 * @property string $z_bmtel
 * @property string $z_onegg
 * @property string $z_gglink
 * @property string $z_right1
 * @property string $z_right1_link
 * @property string $z_right2
 * @property string $z_right2_link
 * @property string $z_right3
 * @property string $z_right3_link
 * @property string $z_right4
 * @property string $z_address
 * @property string $z_pic1
 * @property string $z_link1
 * @property string $z_pic2
 * @property string $z_link2
 * @property string $z_pic3
 * @property string $z_link3
 * @property string $z_pic4
 * @property string $z_link4
 * @property string $z_pic5
 * @property string $z_link5
 * @property string $z_pic6
 * @property string $z_link6
 * @property string $z_bottom1
 * @property string $z_bottom1_link
 * @property string $z_bottom2
 * @property string $z_bottom2_link
 * @property string $z_bottom3
 * @property string $z_bottom3_link
 * @property string $z_bottom4
 * @property string $z_bottom4_link
 * @property string $z_bottom5
 * @property string $z_bottom5_link
 */
class WebStep extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return WebStep the static model class
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
		return 'web_step';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('z_code', 'numerical', 'integerOnly'=>true),
			array('beizhu, z_name, z_title, z_bmtj, z_bmtel, z_gglink, z_right1_link, z_right2_link, z_right3_link, z_address, z_bottom1, z_bottom1_link, z_bottom2, z_bottom2_link, z_bottom3, z_bottom3_link, z_bottom4, z_bottom4_link', 'length', 'max'=>200),
			array('z_keyword, z_contant', 'length', 'max'=>500),
			array('z_tel, z_fax, z_qq, z_msn, z_email, z_website, z_logo, z_icp, z_pic1, z_link1, z_pic2, z_link2, z_pic3, z_link3, z_pic4, z_link4, z_pic5, z_link5, z_pic6, z_link6, z_bottom5, z_bottom5_link', 'length', 'max'=>100),
			array('z_banner, z_onegg, z_right1, z_right2, z_right3, z_right4', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('z_id, beizhu, z_name, z_title, z_keyword, z_contant, z_tel, z_fax, z_qq, z_msn, z_code, z_email, z_website, z_logo, z_icp, z_banner, z_bmtj, z_bmtel, z_onegg, z_gglink, z_right1, z_right1_link, z_right2, z_right2_link, z_right3, z_right3_link, z_right4, z_address, z_pic1, z_link1, z_pic2, z_link2, z_pic3, z_link3, z_pic4, z_link4, z_pic5, z_link5, z_pic6, z_link6, z_bottom1, z_bottom1_link, z_bottom2, z_bottom2_link, z_bottom3, z_bottom3_link, z_bottom4, z_bottom4_link, z_bottom5, z_bottom5_link', 'safe', 'on'=>'search'),
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
			'z_id' => 'Z',
			'beizhu' => 'Beizhu',
			'z_name' => 'Z Name',
			'z_title' => 'Z Title',
			'z_keyword' => 'Z Keyword',
			'z_contant' => 'Z Contant',
			'z_tel' => 'Z Tel',
			'z_fax' => 'Z Fax',
			'z_qq' => 'Z Qq',
			'z_msn' => 'Z Msn',
			'z_code' => 'Z Code',
			'z_email' => 'Z Email',
			'z_website' => 'Z Website',
			'z_logo' => 'Z Logo',
			'z_icp' => 'Z Icp',
			'z_banner' => 'Z Banner',
			'z_bmtj' => 'Z Bmtj',
			'z_bmtel' => 'Z Bmtel',
			'z_onegg' => 'Z Onegg',
			'z_gglink' => 'Z Gglink',
			'z_right1' => 'Z Right1',
			'z_right1_link' => 'Z Right1 Link',
			'z_right2' => 'Z Right2',
			'z_right2_link' => 'Z Right2 Link',
			'z_right3' => 'Z Right3',
			'z_right3_link' => 'Z Right3 Link',
			'z_right4' => 'Z Right4',
			'z_address' => 'Z Address',
			'z_pic1' => 'Z Pic1',
			'z_link1' => 'Z Link1',
			'z_pic2' => 'Z Pic2',
			'z_link2' => 'Z Link2',
			'z_pic3' => 'Z Pic3',
			'z_link3' => 'Z Link3',
			'z_pic4' => 'Z Pic4',
			'z_link4' => 'Z Link4',
			'z_pic5' => 'Z Pic5',
			'z_link5' => 'Z Link5',
			'z_pic6' => 'Z Pic6',
			'z_link6' => 'Z Link6',
			'z_bottom1' => 'Z Bottom1',
			'z_bottom1_link' => 'Z Bottom1 Link',
			'z_bottom2' => 'Z Bottom2',
			'z_bottom2_link' => 'Z Bottom2 Link',
			'z_bottom3' => 'Z Bottom3',
			'z_bottom3_link' => 'Z Bottom3 Link',
			'z_bottom4' => 'Z Bottom4',
			'z_bottom4_link' => 'Z Bottom4 Link',
			'z_bottom5' => 'Z Bottom5',
			'z_bottom5_link' => 'Z Bottom5 Link',
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

		$criteria->compare('z_id',$this->z_id);

		$criteria->compare('beizhu',$this->beizhu,true);

		$criteria->compare('z_name',$this->z_name,true);

		$criteria->compare('z_title',$this->z_title,true);

		$criteria->compare('z_keyword',$this->z_keyword,true);

		$criteria->compare('z_contant',$this->z_contant,true);

		$criteria->compare('z_tel',$this->z_tel,true);

		$criteria->compare('z_fax',$this->z_fax,true);

		$criteria->compare('z_qq',$this->z_qq,true);

		$criteria->compare('z_msn',$this->z_msn,true);

		$criteria->compare('z_code',$this->z_code);

		$criteria->compare('z_email',$this->z_email,true);

		$criteria->compare('z_website',$this->z_website,true);

		$criteria->compare('z_logo',$this->z_logo,true);

		$criteria->compare('z_icp',$this->z_icp,true);

		$criteria->compare('z_banner',$this->z_banner,true);

		$criteria->compare('z_bmtj',$this->z_bmtj,true);

		$criteria->compare('z_bmtel',$this->z_bmtel,true);

		$criteria->compare('z_onegg',$this->z_onegg,true);

		$criteria->compare('z_gglink',$this->z_gglink,true);

		$criteria->compare('z_right1',$this->z_right1,true);

		$criteria->compare('z_right1_link',$this->z_right1_link,true);

		$criteria->compare('z_right2',$this->z_right2,true);

		$criteria->compare('z_right2_link',$this->z_right2_link,true);

		$criteria->compare('z_right3',$this->z_right3,true);

		$criteria->compare('z_right3_link',$this->z_right3_link,true);

		$criteria->compare('z_right4',$this->z_right4,true);

		$criteria->compare('z_address',$this->z_address,true);

		$criteria->compare('z_pic1',$this->z_pic1,true);

		$criteria->compare('z_link1',$this->z_link1,true);

		$criteria->compare('z_pic2',$this->z_pic2,true);

		$criteria->compare('z_link2',$this->z_link2,true);

		$criteria->compare('z_pic3',$this->z_pic3,true);

		$criteria->compare('z_link3',$this->z_link3,true);

		$criteria->compare('z_pic4',$this->z_pic4,true);

		$criteria->compare('z_link4',$this->z_link4,true);

		$criteria->compare('z_pic5',$this->z_pic5,true);

		$criteria->compare('z_link5',$this->z_link5,true);

		$criteria->compare('z_pic6',$this->z_pic6,true);

		$criteria->compare('z_link6',$this->z_link6,true);

		$criteria->compare('z_bottom1',$this->z_bottom1,true);

		$criteria->compare('z_bottom1_link',$this->z_bottom1_link,true);

		$criteria->compare('z_bottom2',$this->z_bottom2,true);

		$criteria->compare('z_bottom2_link',$this->z_bottom2_link,true);

		$criteria->compare('z_bottom3',$this->z_bottom3,true);

		$criteria->compare('z_bottom3_link',$this->z_bottom3_link,true);

		$criteria->compare('z_bottom4',$this->z_bottom4,true);

		$criteria->compare('z_bottom4_link',$this->z_bottom4_link,true);

		$criteria->compare('z_bottom5',$this->z_bottom5,true);

		$criteria->compare('z_bottom5_link',$this->z_bottom5_link,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}