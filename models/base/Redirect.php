<?php

namespace dmstr\modules\redirect\models\base;

use Yii;

/**
 * This is the base-model class for table "dmstr_redirect".
 *
 * @property integer $id
 * @property string $type
 * @property string $from_domain
 * @property string $to_domain
 * @property string $from_path
 * @property string $to_path
 * @property integer $status_code
 * @property string $created_at
 * @property string $updated_at
 */
class Redirect extends \dmstr\modules\redirect\models\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dmstr_redirect';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_code'], 'required'],
            [['status_code'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['type'], 'string', 'max' => 10],
            [['from_domain', 'to_domain', 'from_path', 'to_path'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('redirect', 'ID'),
            'type' => Yii::t('redirect', 'Type'),
            'from_domain' => Yii::t('redirect', 'From Domain'),
            'to_domain' => Yii::t('redirect', 'To Domain'),
            'from_path' => Yii::t('redirect', 'From Path'),
            'to_path' => Yii::t('redirect', 'To Path'),
            'status_code' => Yii::t('redirect', 'Status Code'),
            'created_at' => Yii::t('redirect', 'Created At'),
            'updated_at' => Yii::t('redirect', 'Updated At'),
        ];
    }

    
    /**
     * @inheritdoc
     * @return \dmstr\modules\redirect\models\query\RedirectQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \dmstr\modules\redirect\models\query\RedirectQuery(get_called_class());
    }

    
}
