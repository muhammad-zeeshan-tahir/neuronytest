<?php

namespace App\Http\Controllers;

use App\Http\Requests\CandidateRequest;
use App\Services\Candidate\CandidateService;

class CandidateController extends Controller
{

    /**
     * @var candidateService
     */
    private $candidateService;

    /**
     * CandidateController constructor.
     *
     * @param candidateService $candidate_service
     */
    public function __construct(candidateService $candidate_service)
    {
        $this->candidateService = $candidate_service;
    }

    /**
     * CandidateController index function.
     */
    public function index(){

        return $this->candidateService->getAllCandidates();

    }

    /**
     * CandidateController contact candidate function.
     */
    public function contact(CandidateRequest $request){

        return $this->candidateService->contactCandidates($request);
    }

    /**
     * CandidateController hire candidate function.
     */
    public function hire(CandidateRequest $request){

        return $this->candidateService->hireCandidates($request);
    }
}
