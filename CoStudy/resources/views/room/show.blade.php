@extends('layouts.app')

@section('content')
<style>
  .viewer-bar {
    gap: 12px;
    padding: 6px 16px;
    border-radius: 24px;
    background-color: #ffffff;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
    border: 1px solid #e0e0e0;
    position: relative;
  }
  .viewer-bar img.icon {
    width: 20px;
    height: 20px;
  }
  .avatar-grid img {
    aspect-ratio: 1 / 1;
    object-fit: cover;
    border-radius: 12px;
    transition: transform 0.2s ease;
  }
  .avatar-grid img:hover {
    transform: scale(1.03);
  }
  .pagination-wrapper {
    width: 100%;
    display: flex;
    justify-content: center;
    margin-top: 1.5rem;
  }
  .custom-dropdown {
    position: absolute;
    top: 100%;
    left: 0;
    margin-top: 10px;
    width: 260px;
    border-radius: 12px;
    z-index: 1050;
    background-color: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    padding: 16px;
  }
</style>
<script>
  function toggleViewerDropdown() {
    const dropdown = document.getElementById('viewerDropdown');
    dropdown.classList.toggle('d-none');
  }

  function closeViewerDropdown() {
    document.getElementById('viewerDropdown').classList.add('d-none');
  }

  function toggleViewerDropdown() {
    const dropdown = document.getElementById('viewerDropdown');
    dropdown.classList.toggle('d-none');
  }

  function closeViewerDropdown() {
    document.getElementById('viewerDropdown').classList.add('d-none');
  }
</script>

<div class="container-fluid py-3 px-lg-5">
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
    <div class="d-flex align-items-center position-relative">
      <a href="{{ route('home') }}" class="btn btn-outline-dark me-2" style="font-size: 13px;"><i class="bi bi-box-arrow-left"></i></a>
      <div class="d-flex align-items-center viewer-bar">
        <img src="/images/home/avatar.png" alt="avatar" width="28" height="28" class="rounded-circle">
        <span class="fw-semibold">Người xem</span>
        <i class="bi bi-camera-video-off icon"></i>
        <i class="bi bi-mic-mute icon"></i>
        <button class="btn btn-sm dropdown-toggle border-0" type="button" onclick="toggleViewerDropdown()"></button>
        <div id="viewerDropdown" class="custom-dropdown d-none" style="position: absolute; top: 100%; left: 0;">
  <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="closeViewerDropdown()"></button>
          {{-- <div class="text-center mb-2">
            <span class="fw-bold text-primary">Người xem</span>
          </div> --}}
          <div class="mb-2">
            <small class="text-muted">Video của bạn</small>
          </div>
          <div class="bg-primary text-white rounded d-flex justify-content-between align-items-center px-3 py-1 mb-2">
            <span><i class="bi bi-camera-video-off me-1"></i>Video off</span>
            <div>
              <i class="bi bi-person-circle me-2"></i>
              <i class="bi bi-people-fill"></i>
            </div>
          </div>
          <div class="bg-white border rounded text-center py-3" style="border: 2px solid #31c48d;">
            <img src="/images/home/avatar.png" alt="avatar" width="60" class="rounded-circle" onerror="this.style.display='none'">
            <div class="mt-2">
              <span class="badge bg-secondary">Anh Duc (bạn)</span>
            </div>
          </div>
          <div class="mt-2 d-flex align-items-center">
            <input type="text" class="form-control form-control-sm me-2" placeholder="Biệt danh...">
            <button class="btn btn-sm btn-outline-secondary"><i class="bi bi-send"></i></button>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex align-items-center flex-wrap gap-2">
      <button class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2 px-3 border rounded-pill">
        <i class="bi bi-funnel"></i>
        <span class="fw-medium">Tìm bạn bè tập trung</span>
      </button>
      <button class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2 px-3 border rounded-pill position-relative">
        <i class="bi bi-chat-dots"></i>
        <i class="bi bi-person"></i>
        <span>999</span>
      </button>
    </div>
  </div>

  <div class="row g-3 avatar-grid">
    @for ($i = 1; $i <= 18; $i++)
    <div class="col-6 col-sm-4 col-md-3 col-lg-2">
      <div class="text-center">
        <img src="/images/avt{{ ($i % 6) + 1 }}.jpg" class="img-fluid">
      </div>
    </div>
    @endfor
  </div>

  <div class="pagination-wrapper">
    <nav aria-label="Page navigation">
      <ul class="pagination pagination-sm mb-0">
        <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
        <li class="page-item"><a class="page-link" href="#">10</a></li>
        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
      </ul>
    </nav>
  </div>
</div>
@endsection
