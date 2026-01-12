<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
      <a href="{{ url('dashboard') }}" class="simple-text logo-mini">
        <div class="logo-image-small">
          <!-- <img src="./assets/img/logo-small.png"> -->
          <img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" style="width:40px; height:auto;">
        </div>
      </a>
      <a href="{{ url('dashboard') }}" class="simple-text logo-normal">
        <div class="logo-image-big">
          <!-- <img src="../assets/img/logo-big.png"> -->
           <p class="text-dark">Admin</p>
        </div>
      </a>
    </div>

    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="{{ Request::is('index') ? 'active' : '' }}">
          <a href="{{ url('dashboard') }}">
            <i class="nc-icon nc-bank"></i>
            <p>Dashboard</p>
          </a>
        </li>

        <li class="{{ Request::is('header-manager') ? 'active' : '' }}">
          <a href="{{ url('header-manager') }}">
            <i class="nc-icon nc-touch-id"></i>
            <p>Header Manager</p>
          </a>
        </li>

        <li class="{{ Request::is('banner-manager') ? 'active' : '' }}">
          <a href="{{ url('banner-manager') }}">
            <i class="nc-icon nc-cloud-upload-94"></i>
            <p>Banner Manager</p>
          </a>
        </li>
        
        <li class="{{ Request::is('lead-manager') ? 'active' : '' }}">
          <a href="{{ url('lead-manager') }}">
            <i class="nc-icon nc-cloud-upload-94"></i>
            <p>Lead Manager</p>
          </a>
        </li>

        <li class="{{ Request::is('car-manager') ? 'active' : '' }}">
          <a href="{{ url('car-manager') }}">
            <i class="nc-icon nc-single-02"></i>
            <p>Car Manager</p>
          </a>
        </li>
      </ul>
    </div>
  </div>
