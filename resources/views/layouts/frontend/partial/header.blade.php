<header class="header_sevtion">
    <nav class="navbar navbar-expand-lg navbar-light p-0" style="background-color: #F0F0F0;">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('assets/frontend/img/LOGO/billto-logo.png') }}" alt="LOGO" width="" height="60">
        </a>
        <div class="navbar">
          <ul class="navbar-nav d-flex flex-row me-auto mb-2 mb-lg-0">
            @auth
            <li class="nav-item d-flex align-items-center pe-4">
              <div class="user_dashboard dropdown">
                  <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <svg width="20" height="20">
                          <circle cx="10" cy="10" r="7" stroke="green" stroke-width="5" fill="red" />
                      </svg>
                  </a>
                  <div class="dropdown-menu">
                      <a class="dropdown-item" href="name_email.html">Setting</a>
                      <a class="dropdown-item" href="#">invoice</a>
                      <a class="dropdown-item" href="#">Report</a>
                  </div>
              </div>
          </li>
          <li class="nav-item d-flex align-items-center">
            <svg height="50" width="3">
              <line x1="0" y1="15" x2="0" y2="40" style="stroke:rgb(0,0,0);stroke-width:2" />
              Sorry, your browser does not support inline SVG.
            </svg>
          </li>
          <li class="nav-item d-flex align-items-center">
            <a class="nav-link p-1" aria-current="page" href="{{ route('all.invoice') }}">{{ auth()->user()->name }}</a>
          </li>
          <li class="nav-item d-flex align-items-center">
            <svg height="50" width="3">
              <line x1="0" y1="15" x2="0" y2="40" style="stroke:rgb(0,0,0);stroke-width:2" />
              Sorry, your browser does not support inline SVG.
            </svg>
          </li>
          <li class="nav-item d-flex align-items-center">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="nav-link p-1" aria-current="page" onclick="event.preventDefault(); this.closest('form').submit();">Sign out</a>
          </form>
          </li>
            @endauth
            @guest
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link p-1" aria-current="page" href="{{ route('login') }}">Sign in</a>
            </li>
            <li class="nav-item d-flex align-items-center">
              <svg height="50" width="3">
                <line x1="0" y1="15" x2="0" y2="40" style="stroke:rgb(0,0,0);stroke-width:2" />
                Sorry, your browser does not support inline SVG.
              </svg>
            </li>
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link p-1" aria-current="page" href="{{ route('create') }}">Create Bill</a>
            </li>
            @endguest
            
          </ul>
        </div>
      </div>
    </nav>
  </header>