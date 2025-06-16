<!DOCTYPE html>
<html lang="vi" style="height:100%">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','Demo')</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="d-flex flex-column" style="height:100%; margin:0;">

  {{-- Navbar chung --}}
  @include('partials.navbar')

  {{-- Nội dung chính --}}
  <main class="flex-grow-1 d-flex" style="overflow:hidden;">
    @yield('content')
  </main>

  {{-- Offcanvas Chat nhỏ --}}
  <div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="chatOffcanvas"
    aria-labelledby="chatOffcanvasLabel"
    style="width:320px; max-width:100%; bottom:0; height:80%; border-top-left-radius:12px; border-top-right-radius:12px;">
    
    <div class="offcanvas-header border-bottom">
      <h5 class="offcanvas-title" id="chatOffcanvasLabel">Chats</h5>
      <div class="d-flex align-items-center">
        <button class="btn btn-sm me-2"><i class="bi bi-search"></i></button>
        <button class="btn btn-sm me-2"><i class="bi bi-plus"></i></button>
        <!-- Nút phóng to sang trang chat -->
        <a href="/messages" class="btn btn-sm me-2">
          <i class="bi bi-arrows-fullscreen"></i>
        </a>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
      </div>
    </div>

    <div class="offcanvas-body p-0">
      <ul class="list-group list-group-flush">
        <li class="list-group-item d-flex align-items-center">
          <img src="{{ asset('images/avatar.jpg') }}" width="32" height="32" class="rounded-circle me-2">
          <div class="flex-grow-1">
            <div class="fw-bold">Bình <span class="text-muted small">Đang nhập…</span></div>
            <div class="text-truncate small">Bạn: Tớ nghĩ nên thuê xe cho…</div>
          </div>
          <div class="text-muted small">16:00</div>
        </li>
        <li class="list-group-item d-flex align-items-center">
          <img src="{{ asset('images/avatar2.jpg') }}" width="32" height="32" class="rounded-circle me-2">
          <div class="flex-grow-1">
            <div class="fw-bold">Sơn</div>
            <div class="text-truncate small">Chiều nay đi chơi không ?</div>
          </div>
          <div class="text-muted small">14:00</div>
        </li>
        <!-- Thêm chat items nếu cần -->
      </ul>
    </div>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
