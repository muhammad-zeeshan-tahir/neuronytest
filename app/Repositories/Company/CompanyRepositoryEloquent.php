<?php

namespace App\Repositories\Company;

use App\Models\Company;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CompanyRepositoryEloquent.
 *
 * @package namespace App\Repositories\Company;
 */
class CompanyRepositoryEloquent extends BaseRepository implements CompanyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Company::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /*
     * This function minus mentioned coins from wallet.
     * It is called when hiring manager has to contact the candidate
     */
    public function chargeWallet(int $company_id, $charge_coins): bool
    {
        $company_coins = Company::find($company_id)->wallet()->first()->coins;

        if ($company_coins > $charge_coins) {
            $wallet_coins = $company_coins - $charge_coins ;

            return Company::find($company_id)->wallet()->update(['coins' => $wallet_coins]);
        }

        return false;
    }

    /*
     * This function add more coins to company wallet.
     * This function is called when
     */
    public function creditWallet(int $company_id, $credit_coins): bool
    {
        $company_coins = Company::find($company_id)->wallet()->first()->coins;

        if ($company_coins >= 0) {
            $wallet_coins = $company_coins + $credit_coins ;

            return Company::find($company_id)->wallet()->update(['coins' => $wallet_coins]);
        }

        return false;
    }

}
