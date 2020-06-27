<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    /**
     * WelcomeController constructor.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('web');
    }

    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function __invoke(Request $request): View
    {
        $data = [
            'nama' => 'Adam',
            'panggil' => 'Arthur'
        ];
        return view('welcome', $data);
    }
}
