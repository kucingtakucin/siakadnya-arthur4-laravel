<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Resources\Student as StudentResources;
use App\Student;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * StudentController constructor.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|RedirectResponse|View
     */
    public function index()
    {
        try {
            return view('Student.index', ['students' => Student::all()]);
        } catch (Exception $exception) {
            return redirect()->route('Home')->with('error', $exception->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View
    {
        return view('Student.create');
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
            'nim' => 'required|size:8',
            'nama' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|numeric|digits:4',
        ]);
        try {
            Student::create($request->all());
            return redirect()->route('Student.index')->with('status', 'Data Student berhasil ditambahkan!');
        } catch (Exception $exception) {
            return redirect()->route('Student.index')->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Student $Student
     * @return StudentResources
     */
    public function show(Student $Student): StudentResources
    {
        return new StudentResources($Student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $Student
     * @return Application|Factory|View
     */
    public function edit(Student $Student): View
    {
        return view('Student.edit', ['student' => $Student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $Student
     * @return RedirectResponse
     */
    public function update(Request $request, Student $Student): RedirectResponse
    {
        $request->validate([
            'nim' => 'required|size:8',
            'nama' => 'required|string',
            'jurusan' => 'required|string',
            'angkatan' => 'required|numeric|digits:4',
        ]);
        try {
            Student::where('id', $Student->id)->update([
                'nim' => $request->nim,
                'nama' => $request->nama,
                'jurusan' => $request->jurusan,
                'angkatan' => $request->angkatan,
            ]);
            return redirect()->route('Student.index')->with('status', 'Data Student berhasil diupdate!');
        } catch (Exception $exception) {
            return redirect()->route('Student.index')->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $Student
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Student $Student): RedirectResponse
    {
        try {
            Student::destroy($Student->id);
            return redirect()->route('Student.index')->with('status', 'Data Student berhasil dihapus!');
        } catch (Exception $exception){
            return redirect()->route('Student.index')->with('status', $exception->getMessage());
        }
    }
}
