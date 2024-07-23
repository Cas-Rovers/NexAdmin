<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;

    class DashboardController extends Controller
    {
        /**
         * Display's the Dashboard view.
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
         */
        public function index(): Factory|View|Application
        {
            return view('admin.index');
        }
    }
