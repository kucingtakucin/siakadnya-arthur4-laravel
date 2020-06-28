<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Http\Resources\People as PeopleResources;
use App\People;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PeopleController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index(): View
    {
        return view('People.index', ['peoples' => People::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View
    {
        return view('People.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'cardnumber' => 'required|integer|size:8',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'name' => 'required|string',
            'jobtitle' => 'required|string',
            'year' => 'required|integer',
        ]);
        People::create($request->all());
        return redirect()->route('People.index')->with('status','Data People berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param People $Person
     * @return PeopleResources
     */
    public function show(People $Person)
    {
        return new PeopleResources($Person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param People $people
     * @return Response
     */
    public function edit(People $people)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param People $people
     * @return Response
     */
    public function update(Request $request, People $people)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param People $people
     * @return Response
     */
    public function destroy(People $people)
    {
        //
    }
}
