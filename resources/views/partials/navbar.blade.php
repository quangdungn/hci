<!-- resources/views/partials/navbar.blade.php -->
<nav class="navbar navbar-expand bg-white shadow-sm" style="height:60px">
  <div class="container-fluid position-relative h-100">

    {{-- Trái: Logo + Search --}}
    <div
      class="d-flex align-items-center position-absolute"
      style="left:1rem; top:50%; transform:translateY(-50%);">

      {{-- Logo --}}
      <a href="/" class="me-3 d-flex align-items-center">
        <img src="{{ asset('images/logo.png') }}" width="40" height="40" alt="Logo">
      </a>

      {{-- Search bar --}}
      <div
        class="d-flex align-items-center"
        style="width:280px; height:36px; border:2px solid #0d6efd; border-radius:18px; overflow:hidden;">
        <div
          class="d-flex align-items-center justify-content-center"
          style="width:36px; height:100%;">
          <i class="bi bi-search fs-5 text-primary"></i>
        </div>
        <input
          type="text"
          class="form-control border-0 shadow-none"
          placeholder="Search"
          style="height:100%; flex:1; border-radius:0;" />
      </div>
    </div>

    {{-- Giữa: Home, Groups, Profile, Calendar, Pomodoro --}}
    <div
      class="d-flex align-items-center position-absolute"
      style="left:50%; top:50%; transform:translate(-50%,-50%);">
      @php
        $midItems = [
          ['u' => '/',         'i' => 'house-door-fill'],
          ['u' => '/groups',   'i' => 'people-fill'],
          ['u' => '/profile',  'i' => 'person-circle'],
          ['u' => '/calendar', 'i' => 'calendar-date'],
          ['u' => '/pomodoro','i' => 'alarm-fill'],
        ];
      @endphp

      @foreach($midItems as $item)
        <a
          href="{{ $item['u'] }}"
          class="px-3 text-decoration-none {{ request()->is(trim($item['u'], '/')) ? 'text-primary' : 'text-secondary' }}">
          <i class="bi bi-{{ $item['i'] }} fs-4"></i>
        </a>
      @endforeach
    </div>

    {{-- Phải: Notifications, Messenger, Avatar --}}
    <div
      class="d-flex align-items-center position-absolute"
      style="right:1rem; top:50%; transform:translateY(-50%);">

      {{-- Notifications --}}
      <div class="position-relative px-2">
        <a
          href="/notifications"
          class="{{ request()->is('notifications') ? 'text-primary' : 'text-secondary' }}">
          <i class="bi bi-bell-fill fs-4"></i>
        </a>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          3
        </span>
      </div>

      {{-- Facebook Messenger icon --}}
      <div class="position-relative px-2">
        <a
          href="/messages"
          class="{{ request()->is('messages') ? 'text-primary' : 'text-secondary' }}">
          <i class="fab fa-facebook-messenger fs-4"></i>
        </a>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          5
        </span>
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
