<?php

namespace App\Exceptions;

use Exception;

class ProdectNotBelongsToUser extends Exception
{
    public function render()
    {
		return ['errors' => 'Prodect Not Belong To User'];
    }
}
