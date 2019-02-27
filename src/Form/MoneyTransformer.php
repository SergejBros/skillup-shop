<?php
/**
 * Created by PhpStorm.
 * User: skillup_student
 * Date: 27.02.19
 * Time: 20:39
 */

namespace App\Form;

use Symfony\Component\Form\CallbackTransformer;

class MoneyTransformer extends CallbackTransformer
{

    public function __construct()
    {
        parent::__construct(
            function ($valueInCents){
                return $valueInCents / 100;
            },
            function ($value){
                return round($value * 100);
            }
        );
    }


}