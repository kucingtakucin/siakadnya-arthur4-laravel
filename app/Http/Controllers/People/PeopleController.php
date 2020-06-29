<?php

namespace App\Http\Controllers\People;

use App\Http\Controllers\Controller;
use App\Http\Resources\People as PeopleResources;
use App\People;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PeopleController extends Controller
{
    /**
     * PeopleController constructor.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|RedirectResponse|Response|View
     */
    public function index()
    {
        try {
            return view('People.index', ['peoples' => People::all()]);
        } catch (Exception $exception) {
            return redirect()->route('Welcome')->with('error', $exception->getMessage());
        }
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'cardnumber' => 'required|numeric|digits:8',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'name' => 'required|string',
            'jobtitle' => 'required|string',
            'year' => 'required|integer',
        ]);
        try {
            People::create($request->all());
            return redirect()->route('People.index')->with('status','Data Person berhasil ditambahkan!');
        } catch (Exception $exception) {
            return redirect()->route('People.create')->with('status',$exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param People $Person
     * @return PeopleResources
     */
    public function show(People $Person): PeopleResources
    {
        return new PeopleResources($Person);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param People $Person
     * @return Application|Factory|View
     */
    public function edit(People $Person): View
    {
        return view('People.edit', ['person' => $Person]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param People $Person
     * @return RedirectResponse
     */
    public function update(Request $request, People $Person): RedirectResponse
    {
        $request->validate([
            'cardnumber' => 'required|numeric|digits:8',
            'name' => 'required|string',
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'jobtitle' => 'required|string',
            'year' => 'required|integer',
        ]);
        try {
            People::where('id', $Person->id)->update([
                "cardnumber" => $request->cardnumber,
                "name" => $request->name,
                "firstname" => $request->firstname,
                "lastname" => $request->lastname,
                "jobtitle" => $request->jobtitle,
                "year" => $request->year,
            ]);
            return redirect()->route('People.index')->with('status', 'Data Person berhasil diupdate!');
        } catch (Exception $exception) {
            return redirect()->route('People.update')->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param People $Person
     * @return RedirectResponse
     */
    public function destroy(People $Person): RedirectResponse
    {
        try {
            People::destroy($Person->id);
            return redirect()->route('People.index')->with('status', 'Data Person berhasil dihapus!');
        } catch (Exception $exception) {
            return redirect()->route('People.index')->with('error', $exception->getMessage());
        }
    }
}
