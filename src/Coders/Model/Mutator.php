<?php

/**
 * Created by Cristian.
 * Date: 10/10/16 11:46 PM.
 */

namespace ILazi\Coders\Model;

use ILazi\Meta\Blueprint;

class Mutator
{
    /**
     * @var \Closure
     */
    protected $condition;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $body;

    /**
     * @param \Closure $condition
     *
     * @return $this
     */
    public function when(\Closure $condition)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @param string $column
     * @param \ILazi\Meta\Blueprint $blueprint
     *
     * @return mixed
     */
    public function applies($column, Blueprint $blueprint)
    {
        return call_user_func($this->condition, $column, $blueprint);
    }

    /**
     * @param \Closure $name
     *
     * @return $this
     */
    public function name(\Closure $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string $attribute
     * @param \ILazi\Coders\Model\Model $model
     *
     * @return string
     */
    public function getName($attribute, Model $model)
    {
        return call_user_func($this->name, $attribute, $model);
    }

    /**
     * @param \Closure $body
     *
     * @return $this
     */
    public function body(\Closure $body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @param string $attribute
     * @param \ILazi\Coders\Model\Model $model
     *
     * @return string
     */
    public function getBody($attribute, Model $model)
    {
        return call_user_func($this->body, $attribute, $model);
    }
}
