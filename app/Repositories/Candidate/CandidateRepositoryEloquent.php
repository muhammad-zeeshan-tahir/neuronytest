<?php

namespace App\Repositories\Candidate;

use App\Models\Candidate;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class CandidateRepositoryEloquent.
 *
 * @package namespace App\Repositories\Candidate;
 */
class CandidateRepositoryEloquent extends BaseRepository implements CandidateRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Candidate::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
