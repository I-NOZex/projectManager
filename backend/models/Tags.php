<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $icon
 *
 * @property ProjectTags[] $projectTags
 * @property SkillLevels[] $skillLevels
 * @property UserTags[] $userTags
 */
class Tags extends \common\models\BaseTags
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 150],
            [['icon'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'description' => Yii::t('app', 'Description'),
            'icon' => Yii::t('app', 'Icon'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectTags()
    {
        return $this->hasMany(ProjectTags::className(), ['tagID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSkillLevels()
    {
        return $this->hasMany(SkillLevels::className(), ['tagID' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserTags()
    {
        return $this->hasMany(UserTags::className(), ['tagID' => 'id']);
    }
}
