<?php

namespace App\Services\Candidate;

use App\Interfaces\Candidate\CandidateServiceInterface;
use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Company\CompanyRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class CandidateService implements CandidateServiceInterface
{
    /**
     * @var $candidateRepository ;
     */
    protected $candidateRepository;

    /**
     * @var $companyRepository ;
     */
    protected $companyRepository;

    /**
     * CandidateService Constructor
     * @param CandidateRepository $candidate_Repository
     * @param CompanyRepository $company_Repository
     */
    public function __construct(CandidateRepository $candidate_repository, CompanyRepository $company_repository)
    {
        $this->candidateRepository = $candidate_repository;
        $this->companyRepository = $company_repository;
    }

    /**
     * Get all Candidates
     * @return View
     */
    public function getAllCandidates() : view
    {

        $candidates = $this->candidateRepository->all();
        $coins = $this->companyRepository->find(1)->wallet()->first()->coins;

        return view('candidates.index', compact('candidates', 'coins'));
    }

    /**
     * Contact the  Candidates
     * @return JsonResponse
     */
    public function contactCandidates() : JsonResponse
    {

        $chargeWallet = $this->companyRepository->chargeWallet(1, 5);

        if($chargeWallet) {
            return response()->json([
                'status' => true,
                'message' => 'Candidate has been contacted Successfully',
                'data' => []
            ], 200);
        }
        else{
            return response()->json([
                'status' => false,
                'message' => 'Candidate has not been contacted Successfully',
            ], 400);
        }

    }

}
