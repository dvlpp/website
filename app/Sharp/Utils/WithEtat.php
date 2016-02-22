<?php

namespace App\Sharp\Utils;

use Dvlpp\Sharp\Exceptions\InvalidStateException;

trait WithEtat
{
    /**
     * Change the entity state and return the new state.
     * Throw an InvalidStateException in case of error.
     *
     * @param $id
     * @param $state
     * @return string
     * @throws InvalidStateException
     */
    public function changeState($id, $state)
    {
        $instance = $this->find($id);

        if ($instance) {
            $instance->etat = $state;
            $instance->save();

            return $state;
        }

        throw new InvalidStateException();
    }
}