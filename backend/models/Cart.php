<?php

namespace backend\models;

use Yii;
use backend\models\Products;
/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $cart_alias
 * @property integer $product_id
 * @property integer $quantity
 * @property integer $status
 * @property integer $date_created
 */
class Cart extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'cart_alias', 'product_id', 'quantity', 'status', 'date_created'], 'required'],
            [['user_id', 'product_id', 'quantity', 'status', 'date_created'], 'integer'],
            [['cart_alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'cart_alias' => 'Cart Alias',
            'product_id' => 'Product ID',
            'quantity' => 'Quantity',
            'status' => 'Status',
            'date_created' => 'Date Created',
        ];
    }

    public function getProducts() {
        return $this->hasMany(Products::className(), ['id' => 'product_id']);
    }

}
