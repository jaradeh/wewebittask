<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $department_id
 * @property string $size
 * @property string $path
 * @property string $client
 * @property string $suppliers
 * @property integer $date
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'department_id', 'size', 'path', 'client', 'suppliers', 'date'], 'required'],
            [['description'], 'string'],
            [['department_id', 'date'], 'integer'],
            [['name', 'size', 'path', 'client', 'suppliers'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'department_id' => 'Department ID',
            'size' => 'Size',
            'path' => 'Path',
            'client' => 'Client',
            'suppliers' => 'Suppliers',
            'date' => 'Date',
        ];
    }
}
