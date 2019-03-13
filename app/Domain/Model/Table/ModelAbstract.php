<?php
/**
 * Copiado de https://github.com/JeffreyWay/Laravel-AbstractModel-Validation
 *
 * @author     Jeffrey Way
 * @copyright  Authored on 22 Sep 2014, by Jeffrey Way
 */

namespace ControlaNotas\Domain\Model\Table;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\MessageBag;
use ControlaNotas\Domain\Exception\ModelInvalidException;

/**
 * AbstractModel-based validation before saving in the database
 *
 * @package Speakup\Domain
 */
abstract class ModelAbstract extends Eloquent
{
    /**
     * Error message bag
     *
     * @var MessageBag
     */
    protected $errors;

    /**
     * It allows you to save only if the model is valid
     */
    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            if (!$model->validate()) {
                throw new ModelInvalidException($model->getErrors());
            }
        });
    }

    public static function firstOrCreate($override = [])
    {
        $model = get_called_class();
        return !is_null($model::first()) ? $model::first() : factory($model)->create($override)->first();
    }

    /**
     * Validates current attributes against rules
     */
    public function validate()
    {
        $validator = app('validator');

        $v = $validator->make($this->attributesToArray(), $this->rules(), $this->messages());

        $this->extendValidator($v);

        if ($v->passes()) {
            return true;
        }
        $this->setErrors($v->messages());

        return false;
    }

    /** Returns the model's validation rules */
    public function rules()
    {
        return [];
    }

    /** Returns the custom messages for validation errors */
    public function messages()
    {
        return [];
    }

    /**
     * @param $v
     */
    public function extendValidator($v)
    {
        return;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Set error message bag
     *
     * @var MessageBag
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Inverse of wasSaved
     */
    public function hasErrors()
    {
        return !empty($this->errors);
    }
}
