<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Services\DatabaseTournamentService;
use Illuminate\Http\Request;

class TournamentController extends BaseApiController
{
    protected DatabaseTournamentService $db_tournament_service;

    public function __construct(DatabaseTournamentService $db_tournament_service)
    {
        $this->db_tournament_service = $db_tournament_service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tournament::all();
        $this->sendResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->db_tournament_service->createTournament($data);
            $this->sendResponse([], 'Tournament saved successfully');
        } catch (\Throwable $th) {
            $this->sendError($th->getMessage(), 500);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Tournament::findOrFail($id);
        $this->sendResponse($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
