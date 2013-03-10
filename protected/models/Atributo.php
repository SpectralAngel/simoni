<?php

/**
 * This is the model class for table "atributo".
 *
 * The followings are the available columns in table 'atributo':
 * @property integer $id
 * @property string $nombre
 * @property string $estado
 * @property string $presion
 * @property boolean $linea_base
 * @property integer $objeto_conservacion_id
 *
 * The followings are the available model relations:
 * @property ObjetoConservacion $objetoConservacion
 */
class Atributo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Atributo the static model class
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
		return 'atributo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('objeto_conservacion_id', 'required'),
			array('objeto_conservacion_id', 'numerical', 'integerOnly'=>true),
			array('nombre, estado, presion', 'length', 'max'=>255),
			array('linea_base', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, estado, presion, linea_base, objeto_conservacion_id', 'safe', 'on'=>'search'),
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
			'objetoConservacion' => array(self::BELONGS_TO, 'ObjetoConservacion', 'objeto_conservacion_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'estado' => 'Estado',
			'presion' => 'Presion',
			'linea_base' => 'Linea Base',
			'objeto_conservacion_id' => 'Objeto Conservacion',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('presion',$this->presion,true);
		$criteria->compare('linea_base',$this->linea_base);
		$criteria->compare('objeto_conservacion_id',$this->objeto_conservacion_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}