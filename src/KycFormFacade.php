<?php

namespace Towoju5\KycForm;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Towoju5\KycForm\Skeleton\SkeletonClass
 */
class KycFormFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'kyc-form';
    }
}
