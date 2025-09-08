<nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="ti ti-menu-2 ti-md"></i>
              </a>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Language -->
                <!--/ Language -->

                <!-- Style Switcher -->
                <!-- / Style Switcher-->

                <!-- Quick links  -->
                <!-- Quick links -->

                <!-- Notification -->

                <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a
                    class="nav-link dropdown-toggle hide-arrow p-0"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">
                    <div class="d-flex align-items-center gap-1">
                    <div class="avatar avatar-online">
                      <img src="{{ asset ('/img/avatars/1.png') }}" alt class="rounded-circle" />
                    </div>
                    <span>{{auth::user()->name }}</span>
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                     <li>
                      <div class="d-grid px-2 pt-2 pb-1">
                        <a class="btn btn-sm btn-danger d-flex" href="{{ route('ubah-profil') }}">
                          <small class="align-middle">ubah profil</small>
                          <i class="ti ti-logout ms-2 ti-14px"></i>
                        </a>
                      </div>
                    </li>
                    <li>
  <div class="d-grid px-2 pt-2 pb-1">
    <a class="btn btn-sm btn-danger d-flex" 
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
       href="javascript:void(0);">
      <small class="align-middle">Logout</small>
      <i class="ti ti-logout ms-2 ti-14px"></i>
    </a>
    <form id="logout-form" method="POST" action="{{ route('logout') }}">
      @csrf
    </form>
  </div>
</li>

                  </ul>
                </li>
                <!--/ User -->
              </ul>
            </div>

            <!-- Search Small Screens -->
          </nav>