<nav class="p-3 sticky-top" style="background: #212529">
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <span class="text-white fw-bold fs-3">POST BLOG</span>
        </div>
        @auth
            <div class="dropdown">
                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ auth()->user()->image ? asset('storage/' . auth()->user()->image) : asset('dist/img/anonim.jpg') }}" alt="" style="border-radius: 50%; width: 50px; height: 50px; object-fit: cover;">
                    <span class="text-white ms-2">{{auth()->user()->username}}</span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                        <a href="{{url('/index')}}" class="dropdown-item">
                            <i class="fa-solid fa-share me-2"></i>
                            <span>Post</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('profile.index', auth()->user()->id)}}" class="dropdown-item">
                            <i class="fa-solid fa-user me-2"></i>
                            <span>My Profile</span>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{route('auth.logout')}}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fa-solid fa-arrow-right-from-bracket me-2"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        @endauth
        @guest
            <a href="{{route('auth.index')}}" class="btn btn-primary px-4 ms-2">
                <span class="me-1">Login</span>
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
            </a>
        @endguest
    </div>
</nav>
