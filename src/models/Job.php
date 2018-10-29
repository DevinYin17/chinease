<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "job".
 *
 * @property int $id
 * @property string $pic
 * @property string $title
 * @property string $date
 * @property string $author
 * @property string $category
 * @property string $base_title
 * @property string $base_type
 * @property string $base_group
 * @property string $base_location
 * @property string $benefits
 * @property string $salary
 * @property string $information
 * @property string $requirement
 * @property string $responsibility
 */
class Job extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'job';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pic', 'title', 'category', 'base_title', 'base_type', 'base_group', 'base_location', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5', 'image_6'], 'string', 'max' => 200],
            [['date', 'author', 'salary'], 'string', 'max' => 50],
            [['benefits', 'information', 'requirement', 'responsibility'], 'string', 'max' => 2000],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pic' => 'Pic',
            'title' => 'Title',
            'date' => 'Date',
            'author' => 'Author',
            'category' => 'Category',
            'base_title' => 'Base Title',
            'base_type' => 'Base Type',
            'base_group' => 'Base Group',
            'base_location' => 'Base Location',
            'benefits' => 'Benefits',
            'salary' => 'Salary',
            'information' => 'Information',
            'requirement' => 'Requirement',
            'responsibility' => 'Responsibility',
            'image_1' => 'Image 1',
            'image_2' => 'Image 2',
            'image_3' => 'Image 3',
            'image_4' => 'Image 4',
            'image_5' => 'Image 5',
            'image_6' => 'Image 6',
        ];
    }
}
