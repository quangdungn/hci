<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>@yield('title', 'Trang chủ học tập')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body { background-color: #f3f6fb; }
    .navbar-custom {
      background-color: white;
      border-bottom: 1px solid #e0e0e0;
      padding: 10px 10px;
    }
    .navbar-custom .search-box {
      border: 1px solid #007bff;
      border-radius: 20px;
      padding: 6px 10px;
      width: 240px;
      font-size: 16px;
    }
    .navbar-custom .icon {
      font-size: 28px;
      margin: 0 32px;
      color: gray;
    }
    .navbar-custom .icon-compact {
      font-size: 28px;
      margin: 0 12px;
      color: gray;
    }
    .navbar-custom .profile-img {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      object-fit: cover;
    }
    .icon-group {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-grow: 1;
    }
  </style>
</head>
<body>

  @include('partials.navbar')

  @yield('content')

</body>
</html>
