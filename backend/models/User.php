<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $path
 * @property string $auth_key
 * @property string $password_hash
 * @property string $pass
 * @property string $password_reset_token
 * @property string $email
 * @property string $phone
 * @property integer $status
 * @property integer $login_status
 * @property integer $admin
 * @property integer $role
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'path', 'auth_key', 'password_hash', 'pass', 'email', 'phone', 'created_at', 'updated_at'], 'required'],
            [['status', 'login_status', 'admin', 'role', 'created_at', 'updated_at'], 'integer'],
            [['username', 'path', 'password_hash', 'pass', 'password_reset_token', 'email', 'phone'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'path' => 'Path',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'pass' => 'Pass',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'phone' => 'Phone',
            'status' => 'Status',
            'login_status' => 'Login Status',
            'admin' => 'Admin',
            'role' => 'Role',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
