<?php

    namespace App\Http\Controllers\Frontend;

    use App\Http\Controllers\Controller;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;

    class HomeController extends Controller
    {
        /**
         * Display's the Home view.
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
         */
        public function index(): Factory|View|Application
        {
            return view('frontend.welcome');
        }
    }
