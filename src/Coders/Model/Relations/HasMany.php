<?php

/**
 * Created by Cristian.
 * Date: 11/09/16 09:26 PM.
 */

namespace ILazi\Coders\Model\Relations;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Collection;

class HasMany extends HasOneOrMany
{
    /**
     * @return string
     */
    public function hint()
    {
        return '\\'.Collection::class;
    }

    /**
     * @return string
     */
    public function name()
    {
        if ($this->parent->usesSnakeAttributes()) {
            return Str::snake(Str::plural(Str::singular($this->related->getTable(true))));
        }

        return Str::camel(Str::plural(Str::singular($this->related->getTable(true))));
    }

    /**
     * @return string
     */
    public function method()
    {
        return 'hasMany';
    }

    public function getRDoc()
    {
        // TODO: Implement getRDoc() method.
    }
}
