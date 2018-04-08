<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property int $job_id
 * @property int $user_id
 * @property string $resume
 * @property string $name
 * @property string $email
 * @property string $date
 */
class Resume extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['job_id', 'user_id'], 'required'],
            [['job_id', 'user_id'], 'string', 'max' => 20],
            [['resume', 'name', 'email'], 'string', 'max' => 250],
            [['date'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'job_id' => 'Job ID',
            'user_id' => 'User ID',
            'resume' => 'Resume',
            'name' => 'Name',
            'email' => 'Email',
            'date' => 'Date',
        ];
    }
}
