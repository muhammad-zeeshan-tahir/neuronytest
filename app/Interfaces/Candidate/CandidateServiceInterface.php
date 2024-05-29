<?php

namespace App\Interfaces\Candidate;

use App\Repositories\Candidate\CandidateRepository;
use App\Repositories\Company\CompanyRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

interface CandidateServiceInterface
{
    public function __construct(CandidateRepository $candidate_repository, CompanyRepository $company_repository);

    public function getAllCandidates() : view;
    public function contactCandidates() : JsonResponse;
}
