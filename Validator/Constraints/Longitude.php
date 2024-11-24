<?php

namespace Addressable\Bundle\Validator\Constraints;

use Attribute;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
#[Attribute()]
class Longitude extends Constraint
{
    public $message = 'The value %value% is not a valid longitude.';
}
