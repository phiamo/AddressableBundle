<?php

namespace Addressable\Bundle\Validator\Constraints;

use Attribute;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
#[Attribute()]
class Latitude extends Constraint
{
    public $message = 'The value %value% is not a valid latitude.';
}
