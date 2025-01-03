<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Services\DatabasePlayerService;
use Illuminate\Http\Request;

class PlayerController extends BaseApiController
{
    protected DatabasePlayerService $db_player_service;

    public function __construct(DatabasePlayerService $db_player_service)
    {
        $this->db_player_service = $db_player_service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Player::all();
        $this->sendResponse($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        try {
            $this->db_player_service->createPlayer($data);
            $this->sendResponse([], 'Player saved successfully');
        } catch (\Throwable $th) {
            $this->sendError($th->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Player::findOrFail($id);
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
