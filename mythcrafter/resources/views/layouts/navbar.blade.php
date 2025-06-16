<nav class="navbar navbar-expand-lg navbar-custom-bg">
    <div class="container-fluid">
        <!-- Left side of the menu -->
        <div class="navbar-nav">
            @auth
            <a class="navbar-brand" href="{{ route('profile.index') }}">Profile</a>
            @else
            <a href="{{ route('auth.choice') }}" class="btn custom-auth-btn">
                Login
            </a>
            @endauth
            
            <a class="nav-link" href="{{ route('races.index') }}">Races</a>
            <a class="nav-link" href="{{ route('classes.index') }}">Classes</a>
            <a class="nav-link" href="{{ route('spells.index') }}">Spells</a>
            <a class="nav-link" href="{{ route('license') }}">License</a>

            @auth
            @php $user = Auth::user(); @endphp
            @if($user->role === 'user'||$user->role === 'admin')
            <a class="nav-link" href="{{ route('characters.index') }}">My Characters</a>
            @endif

            @if($user->role === 'admin')
            <a class="nav-link text-warning" href="{{ route('admin.users.index') }}">User Management</a>
            @endif
            @endauth
        </div>

        <div class="d-flex align-items-center">
            @auth
            <button
                class="btn custom-auth-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
            @else
            @endauth
        </div>

    </div>
</nav>
<style>
    .custom-auth-btn {
        background-color: rgb(167, 137, 82);
        color: black;
    }
</style>