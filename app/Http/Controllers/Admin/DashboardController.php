<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\User;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Foundation\Application;

    class DashboardController extends Controller
    {
        protected User $user;

        public function __construct(User $user)
        {
            $this->user = $user;
        }

        /**
         * Display's the Dashboard view.
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
         */
        public function index(): Factory|View|Application
        {
            $user = $this->user->findOrFail(auth()->id());
            return view('admin.index', compact('user'));
        }
    }
