<nav class="sidebar-nav">
  
  <ul class="nav">
    
    @if(Auth::user()->isAdmin())
    <li class="nav-item">
      <a class="nav-link {{ isActiveRoute('dashboard') }}" 
        href="{{url('/dashboard')}}">
        <i class="nav-icon cui-speedometer"></i> Dashboard
      </a>
    </li>
    @endif
    
    @if(Auth::user()->isMember())
    <li class="nav-title">Requests</li>
    
    <li class="nav-item">
      <a class="nav-link {{ (session('status') === 'approved') ? 'active' : '' }}" 
        href="{{ route('members.requests', ['status' => 'approved']) }}">
        <i class="nav-icon cui-layers"></i> Approved
      </a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ (session('status') === 'pending') ? 'active' : '' }}" 
        href="{{ route('members.requests', ['status' => 'pending']) }}">
        <i class="nav-icon cui-note"></i> Pending <span class="badge badge-pill badge-warning">{{$pending_count}}</span>
      </a>
    </li>
    @endif    
    
    @if(Auth::user()->isSuperAdmin())    
    <li class="nav-title">Featured</li>
    
    <li class="nav-item">
      <a class="nav-link {{ isActiveRoute('roles.index') }}" 
         href="{{ route('roles.index') }}">
      <i class="nav-icon cui-briefcase"></i>Roles</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link {{ isActiveRoute('events.list') }}" 
         href="{{ route('events.list') }}">
      <i class="nav-icon cui-calendar"></i>Events</a>
    </li>
    
    <li class="nav-title">Users</li>
    
    <li class="nav-item">
      <a class="nav-link " 
         href="">
      <i class="nav-icon fa fa-handshake-o"></i>Managers</a>
    </li>
    
    <li class="nav-item">
      <a class="nav-link " 
         href="">
      <i class="nav-icon cui-people"></i>Members</a>
    </li>
    @endif
    
    {{-- Learn Nav With DropDown Menu --}}
    <li class="nav-item nav-dropdown d-lg-none">
      
      <a class="nav-link nav-dropdown-toggle" href="#">
        Account
      </a>
    
      <ul class="nav-dropdown-items">
        
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="cui-account-logout"></i> Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}"
            method="POST" style="display: none;">{{ csrf_field() }}</form>
        </li>
        
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('change_password') }}">
            <i class="cui-lock-unlocked"></i> Change password
          </a>
        </li>
        
      </ul>
      
    </li>
    
  </ul>
  
</nav>
