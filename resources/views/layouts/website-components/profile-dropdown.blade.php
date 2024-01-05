<div class="dropdown">
    <button class="header-profile" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ isset(Auth::user()->photo) ? asset('storage/'.Auth::user()->photo) : asset('assets/images/default-user.png') }}" alt="profile">
    </button>
    <ul class="dropdown-menu dropdown-menu-end dropdown-profile shadow">
        <li><a class="dropdown-item" href="{{ route('website.profile.edit') }}"><i class="fas fa-user profile-icon"></i>{{ __('general.profile') }}</a></li>
        @if(auth()->user()->hasRole('Employer'))
            <li><a class="dropdown-item" href="{{ route('website.bio-data-shortlist.list') }}"><i class="fas fa-users profile-icon"></i>{{ __('general.my_favourites') }}</a></li>
        @endif
        @can('page_Dashboard')
            <li><a class="dropdown-item" href="{{ route('filament.admin.pages.dashboard') }}" target="_blank"><i class="fas fa-tachometer-alt profile-icon"></i>{{ __('general.dashboard') }}</a></li>
        @endcan
        <li>
            <a class="dropdown-item border-0" href="javascript:void(0)" onclick="document.getElementById('logoutForm').submit()"><i class="fas fa-sign-out-alt profile-icon"></i>{{ __('general.logout') }}</a>
            <form method="post" action="{{ route('website.logout') }}" class="m-0" id="logoutForm">
                @csrf
            </form>
        </li>
    </ul>
</div>
