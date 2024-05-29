<?php

namespace App\Repositories\Company;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CompanyRepository.
 *
 * @package namespace App\Repositories\Company;
 */
interface CompanyRepository extends RepositoryInterface
{
    public function chargeWallet(int $company_id, $charge_coins) : bool;
}
