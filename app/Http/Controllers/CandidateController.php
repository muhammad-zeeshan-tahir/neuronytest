<?php

namespace App\Http\Controllers;

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

    public function contact(){

        return $this->candidateService->contactCandidates();
    }

    public function hire(){
        // @todo
        // Your code goes here...
    }
}
