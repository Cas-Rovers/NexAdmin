<div id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-secondary min-vh-100 sidebar">
    <div class="logo-btn d-flex w-100 justify-content-center py-2">
        <a href="{{ route('admin.dashboard') }}" class="text-decoration-none">
        <span class="logo text-primary">
            <!-- Logo SVG (Going to be replaced) -->
            <svg xmlns="http://www.w3.org/2000/svg" width="53" height="48" viewBox="0 0 53 48">
                <g clip-path="url(#clip0_13_816)" fill="currentColor">
                    <path d="M25.7354 0H9.79425V5.49793H25.7354V0Z"/>
                    <path
                        d="M9.68025 -0.00035925L0.000183105 10.2455L5.33701 13.5451L15.0171 3.29924L9.68025 -0.00035925Z"
                    />
                    <path d="M6.77367 10.2476H0V23.1433H6.77367V10.2476Z"/>
                    <path d="M5.13404 19.9696L0.00421143 23.1412L9.64988 33.3507L14.7797 30.1791L5.13404 19.9696Z"
                          fill="currentColor"/>
                    <path d="M25.7354 27.7615H9.65454   V33.3725H25.7354V27.7615Z"/>
                    <path d="M52.9962 18.1616H45.6826V25.4097H52.9962V18.1616Z"/>
                    <path d="M31.8936 35.1044H25.0973V48.0001H31.8936V35.1044Z"/>
                    <path d="M40.9969 9.56952H25.0558V15.0675H40.9969V9.56952Z"/>
                    <path d="M31.8936 15.0339H25.0973V27.9296H31.8936V15.0339Z"/>
                    <path d="M31.8936 27.728H25.0973V40.6237H31.8936V27.728Z"/>
                    <path d="M40.7343 9.40148L36.0513 13.6924L48.3186 22.4537L53.0016 18.1627L40.7343 9.40148Z"
                    />
                    <path d="M48.3978 20.5251L35.3212 28.61L39.9251 33.483L53.0017 25.3981L48.3978 20.5251Z"
                    />
                    <path d="M39.8642 27.728H31.8936V33.4305H39.8642V27.728Z"/>
                    <path d="M44.1716 28.8641L38.7718 32.2027L44.146 37.8911L49.5459 34.5525L44.1716 28.8641Z"
                    />
                    <path d="M49.5452 34.5546H42.7753V47.997H49.5452V34.5546Z"/>
                </g>
                <defs>
                    <clipPath id="clip0_13_816">
                        <rect width="53" height="48" fill="white"/>
                    </clipPath>
                </defs>
            </svg>
            <!-- End Logo SVG (Going to be replaced) -->
        </span>
        </a>
    </div>
    <div class="nav-content">
        @can('view dashboard')
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                       class="nav-link @if (request()->routeIs('admin.dashboard')) active @endif d-flex align-items-center gap-2">
                        <i class="fa-solid fa-chart-pie"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        @endcan
        @can('view users')
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href=""
                       class="nav-link @if (request()->routeIs('admin.users')) active @endif d-flex align-items-center gap-2">
                        <i class="fa-solid fa-users"></i>
                        <span>{{ __('admin.sidebar.users_tab') }}</span>
                    </a>
                </li>
            </ul>
        @endcan
    </div>
</div>
