<aside id="sidebar" class="sidebar">
  <ul class="sidebar-nav" id="sidebar-nav" style="padding-top: 1rem;">
    <img style="margin-top: 3rem; width:100px; display:block; margin:auto;"  src="{{asset('admin/assets/img/am_global.png')}}" alt="">
    <!-- <h6 style="margin-left:18px; font-weight: 700; color: #012970; margin-bottom: 60px;">AM Global</h6> -->


    <li class="nav-item">
      <a class="nav-link" href="{{url('dashboard')}}">
        <i class="bi bi-grid"></i>
        <span>Admin Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-heading">Bikes</li>
    <li class="nav-item">
      <a class="nav-link collapsed {{ Route::is('bike-sales.add_bike')  ? 'active' : '' }}" href="{{route('bike-sales.add_bike')}}">
        <!-- <i class="bi bi-people"></i> -->
        <img src="{{asset('admin/assets/img/electric-motor.png')}}" class="me-2 pt-1" style="width: 20px;" alt="">
        <span>Add Sale</span>
      </a>
    </li><!-- New Request Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed {{ Route::is('bike-sales.index')  ? 'active' : '' }}" href="{{route('bike-sales.index')}}">
        <!-- <i class="bi bi-people"></i> -->
        <img src="{{asset('admin/assets/img/motorcycle (1).png')}}" class="me-2 pt-1" style="width: 20px;" alt="">
        <span>Bike Sales List</span>
      </a>
    </li>
    <!-- New Request Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed {{ Route::is('bikes.index')  ? 'active' : '' }}" href="{{route('bikes.index')}}">
      <img src="{{asset('admin/assets/img/bike-.png')}}" class="me-2 pt-1" style="width: 20px;" alt="">
        <span>All Bikes</span>
      </a>
    </li>
    <!-- New Request Nav -->
    <li class="nav-item">
      <a class="nav-link collapsed {{ Route::is('bikes.add-bike')  ? 'active' : '' }}" href="{{route('bikes.add-bike')}}">
      <img src="{{asset('admin/assets/img/man (1).png')}}" class="me-2 pt-1" style="width: 20px;" alt="">
        <span>Add Bike</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed {{ Route::is('bikes.price-list')  ? 'active' : '' }}" href="{{route('bikes.price-list')}}">
      <img src="{{asset('admin/assets/img/file.png')}}" class="me-2 pt-1" style="width: 20px;" alt="">
        <span>Price List</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link collapsed {{ Route::is('bikes.repairng-list')  ? 'active' : '' }}" href="{{route('bikes.repairng-list')}}">
      <img src="{{asset('admin/assets/img/file.png')}}" class="me-2 pt-1" style="width: 20px;" alt="">
        <span>Add Repairing</span>
      </a>
    </li>
    <li class="nav-heading">Installments</li>
     <!-- New Request Nav -->
     <li class="nav-item">
      <a class="nav-link collapsed {{ Route::is('installments.index')  ? 'active' : '' }}" href="{{route('installments.index')}}">
      <img src="{{asset('admin/assets/img/pay-day.png')}}" class="me-2 pt-1" style="width: 20px;" alt="">
        <span>Installments</span>
      </a>
    </li>
    <li class="nav-heading">Expenses</li>
     <!-- New Request Nav -->
     <li class="nav-item">
      <a class="nav-link collapsed {{ Route::is('add-expense')  ? 'active' : '' }}" href="{{route('add-expense')}}">
      <img src="{{asset('admin/assets/img/calculator.png')}}" class="me-2 pt-1" style="width: 20px;" alt="">
        <span>Add Expense</span>
      </a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link collapsed" href="{{route('sales.invice')}}">
        <i class="bi bi-people"></i>
        <span>Invice</span>
      </a>
    </li> -->
    <!-- Customer List Nav -->


    <li class="nav-item">

      <a class="nav-link collapsed" href="{{ route('logout') }}"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="bi bi-box-arrow-in-right"></i>Logout
        <span> <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form></span>
      </a>
    </li>

  </ul>

</aside>