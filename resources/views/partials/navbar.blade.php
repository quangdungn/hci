{{-- resources/views/partials/navbar.blade.php --}}
<nav class="navbar navbar-expand bg-white shadow-sm" style="height:60px">
  <div class="container-fluid position-relative h-100">

    {{-- === Nhóm trái: Logo + Search === --}}
    <div class="d-flex align-items-center position-absolute" style="left:1rem; top:50%; transform:translateY(-50%);">
      {{-- Logo --}}
      <a href="/" class="me-3 d-flex align-items-center">
        <img src="{{ asset('images/logo.png') }}" width="40" height="40" alt="Logo">
      </a>
      {{-- Search bar --}}
      <div class="d-flex align-items-center" style="width:280px; height:36px; border:2px solid #0d6efd; border-radius:18px; overflow:hidden;">
        <div class="d-flex align-items-center justify-content-center" style="width:36px; height:100%;">
          <i class="bi bi-search fs-5 text-primary"></i>
        </div>
        <input
          type="text"
          class="form-control border-0 shadow-none"
          placeholder="Search"
          style="height:100%; flex:1; border-radius:0;" />
      </div>
    </div>

    {{-- === Nhóm giữa: Home, Groups, Profile, Calendar, Pomodoro === --}}
    <div class="d-flex align-items-center position-absolute" style="left:50%; top:50%; transform:translate(-50%,-50%);">
      @php
        $midItems = [
          ['u'=>'/','i'=>'house-door-fill'],
          ['u'=>'/groups','i'=>'people-fill'],
          ['u'=>'/profile','i'=>'person-circle'],
          ['u'=>'/calendar','i'=>'calendar-date'],
          ['u'=>'/pomodoro','i'=>'alarm-fill'],
        ];
      @endphp
      @foreach($midItems as $item)
        <a
          href="{{ $item['u'] }}"
          class="px-4 text-decoration-none {{ request()->is(trim($item['u'], '/')) ? 'text-primary' : 'text-secondary' }}">
          <i class="bi bi-{{ $item['i'] }} fs-4"></i>
        </a>
      @endforeach
    </div>

    {{-- === Nhóm phải: Notifications dropdown, Messenger, Avatar === --}}
    <div class="d-flex align-items-center position-absolute" style="right:1rem; top:50%; transform:translateY(-50%);">
      {{-- Notifications --}}
      <div class="dropdown px-2">
        <button
          class="btn position-relative p-0 text-secondary dropdown-toggle"
          id="notifDropdown"
          data-bs-toggle="dropdown">
          <i class="bi bi-bell-fill fs-4"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="notifDropdown" style="min-width:200px;">
          <li><h6 class="dropdown-header">Tắt thông báo trong vòng:</h6></li>
          <li><button class="dropdown-item">30 phút</button></li>
          <li><button class="dropdown-item">1 giờ</button></li>
          <li><button class="dropdown-item">2 giờ</button></li>
          <li><button class="dropdown-item">3 giờ</button></li>
          <li><button class="dropdown-item">4 giờ</button></li>
          <li><button class="dropdown-item">5 giờ</button></li>
          <li><hr class="dropdown-divider"></li>
          <li class="px-3">
            <input type="text" class="form-control form-control-sm" placeholder="Nhập thời gian">
          </li>
        </ul>
      </div>
      {{-- Messenger --}}
      <div class="position-relative px-2">
        <button
          class="btn p-0 text-secondary"
          data-bs-toggle="offcanvas"
          data-bs-target="#chatOffcanvas"
          aria-controls="chatOffcanvas">
          <i class="bi bi-chat-dots-fill fs-4"></i>
        </button>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">5</span>
      </div>
      {{-- Avatar --}}
      <div class="px-2">
        <a href="/profile" class="d-block">
          <img
            src="{{ asset('images/avatar.jpg') }}"
            class="rounded-circle"
            width="40" height="40"
            alt="Avatar">
        </a>
      </div>
    </div>

  </div>
</nav>
