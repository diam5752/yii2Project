<?php

namespace app\modules\recipe\models;

use Yii;
use yii\web\UploadedFile;


/**
 * This is the model class for table "recipes".
 *
 * @property int $idrecipes
 * @property string $name
 * @property string $picture
 *
 * @property RecipeNeedsIngredients[] $recipeNeedsIngredients
 * @property Ingredients[] $ingredients
 */
class Recipes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;
    
    public static function tableName()
    {
        return 'recipes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'picture'], 'required'],
            [['name'], 'string', 'max' => 45],
            [['picture'], 'string', 'max' => 200],
            [['name'], 'unique'],
            [['file'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idrecipes' => 'Idrecipes',
            'name' => 'Name',
            'picture' => 'Picture',
            'file' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRecipeNeedsIngredients()
    {
        return $this->hasMany(RecipeNeedsIngredients::className(), ['idRecipe' => 'idrecipes']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIngredients()
    {
        return $this->hasMany(Ingredients::className(), ['idingredients' => 'idIngredient'])->viaTable('recipe_needs_ingredients', ['idRecipe' => 'idrecipes']);
    }
}
