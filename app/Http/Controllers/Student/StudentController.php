<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
     * @return Application|Factory|View
     */
    public function index(): View
    {
        return view('Student.index', ['students' => Student::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Student $Student
//     * @return void
     */
    public function show(Student $Student)
    {
        return $Student;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Student $Student
     * @return Response
     */
    public function edit(Student $Student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Student $Student
     * @return Response
     */
    public function update(Request $request, Student $Student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Student $Student
     * @return Response
     */
    public function destroy(Student $Student)
    {
        //
    }
}
