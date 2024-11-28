    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          {{-- <a class="sidebar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg" alt="logo" /></a>
         --}}
         <h2>Welcome, Dr. {{ auth()->user()->name }}</h2>
        </div>
        <ul class="nav">
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/dash')}}">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/appointments')}}">
              <span class="menu-icon">
                <i class="mdi mdi-clock"></i>
              </span>
              <span class="menu-title">Appointment</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/consultation')}}">
              <span class="menu-icon">
                <i class="mdi mdi-video"></i>
              </span>
              <span class="menu-title">Consultation</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/dash')}}">
              <span class="menu-icon">
                <i class="mdi mdi-calendar"></i>
              </span>
              <span class="menu-title">Schedule</span>
            </a>
          </li>
          {{-- <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/dash')}}">
              <span class="menu-icon">
                <i class="mdi mdi-calendar-check"></i>
              </span>
              <span class="menu-title">Appointment</span>
            </a>
          </li> --}}
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/dash')}}">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Reports</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="{{url('/dash')}}">
              <span class="menu-icon">
                <i class="mdi mdi-cogs"></i>
              </span>
              <span class="menu-title">Settings</span>
            </a>
          </li>
  
  
          
         
  
        </ul>
      </nav>
      
  