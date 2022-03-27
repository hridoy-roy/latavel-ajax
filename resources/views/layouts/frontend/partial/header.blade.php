<header class="header_sevtion">
    <nav class="navbar navbar-expand-lg navbar-light p-0" style="background-color: #F0F0F0;">
      <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
          <img src="{{ asset('public/assets/frontend/img/LOGO/billto-logo.png') }}" alt="LOGO" width="" height="60">
        </a>
        <div class="navbar">
          <ul class="navbar-nav d-flex flex-row me-auto mb-2 mb-lg-0">
            @auth
            
            <li class="nav-item d-flex align-items-center pe-3">
              <div class="user-menu-wrap">

                <a class="mini-photo-wrapper" href="#">
                  <img class="mini-photo" src="{{ asset('public/assets/frontend/img/LOGO/billto-logo.png') }}" width="" height="36"/>
                </a>
                
                <div class="menu-container">
                  <ul class="user-menu p-0">
                    <div class="profile-highlight">
                      <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                      </svg>
                      <div class="details">
                        <div id="profile-name">{{ auth()->user()->name }}</div>
                        {{-- <div id="profile-footer">Team Hallaway</div> --}}
                      </div>
                    </div>
                    <li class="user-menu__item">
                      <a class="user-menu-link" href="{{ route('all.invoice') }}">
                        <i class="bi bi-grid-fill"></i>
                        <div class="fw-bold">DashBoard</div>
                      </a>
                    </li>
                    <div class="footer">
                      <li class="user-menu__item">
                        <form method="POST" action="{{ route('logout') }}">
                          @csrf
                        <a class="user-menu-link fw-bold" href="#" style="color: #F44336;"  onclick="event.preventDefault(); this.closest('form').submit();"><i class="bi bi-box-arrow-right pe-2 fw-bold"></i> Sign out</a>
                        </form>
                      </li>
                      <li class="user-menu__item"><a class="user-menu-link fw-bold" href="#"><i class="bi bi-gear pe-2 fw-bold"></i> Settings</a></li>
                    </div>
                  </ul>
                </div>
              </div>
            </li>
            <li class="nav-item d-flex align-items-center pe-2">
              <svg height="50" width="3">
                <line x1="0" y1="15" x2="0" y2="40" style="stroke:rgb(0,0,0);stroke-width:2" />
                Sorry, your browser does not support inline SVG.
              </svg>
            </li>
            <li class="nav-item d-flex align-items-center pe-4">
              <div class="user_dashboard dropdown">
                  <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      <svg width="20" height="20">
                          <circle cx="10" cy="10" r="7" stroke="green" stroke-width="5" fill="red" />
                      </svg>
                  </a>
                  <div class="dropdown-menu border-0 p-0 m-0">
                      <a class="dropdown-item " href="javascript:void(0);">BD</a>
                  </div>
              </div>
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