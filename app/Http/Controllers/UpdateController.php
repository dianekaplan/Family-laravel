<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Update;
use App\Http\Requests\SaveUpdateRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = Update::latest('created_at')->get();
        return view('update.index', compact('updates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view ('update.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SaveUpdateRequest $request)
    {
        Update::create($request->all());
        return redirect('updates');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $update = Update::findOrFail($id);
        return view ('update.show', compact('update'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $update = Update::findOrFail($id);
        return view('update.edit', compact('update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SaveUpdateRequest $request, $id)
    {
        $update = Update::findOrFail($id);
        $update->Update($request->all());

        return redirect('updates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Update $update)
    {
        $update->delete();
        return redirect()->route('update.index');
    }
}
