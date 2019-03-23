<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $cart_alias
 * @property integer $total_amount
 * @property integer $user_id
 * @property string $username
 * @property string $user_email
 * @property string $user_phone
 * @property string $user_address
 * @property integer $date_created
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cart_alias', 'total_amount', 'user_id', 'username', 'user_email', 'user_phone', 'user_address', 'date_created'], 'required'],
            [['total_amount', 'user_id', 'date_created'], 'integer'],
            [['cart_alias', 'username', 'user_email', 'user_phone', 'user_address'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cart_alias' => 'Cart Alias',
            'total_amount' => 'Total Amount',
            'user_id' => 'User ID',
            'username' => 'Username',
            'user_email' => 'User Email',
            'user_phone' => 'User Phone',
            'user_address' => 'User Address',
            'date_created' => 'Date Created',
        ];
    }
}
