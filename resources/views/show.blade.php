@extends('layouts.app1')

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
  .viewer-bar .fw-semibold {
    min-width: 80px;
    display: inline-block;
    text-align: left;
  }
  .viewer-bar i.icon {
    width: 24px;
    text-align: center;
  }
  .avatar-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    max-width: 1400px;
    margin: auto;
  }

  .avatar-grid img {
    width: 100%;
    aspect-ratio: 4 / 3;
    object-fit: cover;
    border-radius: 10px;
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
  #floatingVideoPreview {
    transition: transform 0.2s ease, opacity 0.2s ease;
  }
  #fullscreenButton {
    transition: transform 0.3s ease;
  }
  .cam-active {
    transform: translateY(-180px);
  }
  #participantPanel {
    position: fixed;
    top: 65px;
    right: 0;
    width: 400px;
    height: calc(100vh - 65px);
    background-color: white;
    box-shadow: -2px 0 6px rgba(0, 0, 0, 0.1);
    z-index: 1060;
    display: none;
    flex-direction: column;
  }
  #participantPanel.show {
    display: flex;
  }
  #chatPanel {
    position: fixed;
    top: 65px;
    right: 0;
    width: 400px;
    height: calc(100vh - 65px);
    background-color: white;
    box-shadow: -2px 0 6px rgba(0, 0, 0, 0.1);
    z-index: 1060;
    display: none;
    flex-direction: column;
  }
  #participantPanel.show, #chatPanel.show {
    display: flex;
  }
  #chatPanel .bi {
    color: #007bff;
  }
  #overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.4);
    z-index: 1058;
    display: none;
  }
  #focusFriendModal {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    padding: 24px;
    border-radius: 12px;
    width: 480px;

    z-index: 1060;
    display: none;
  }
</style>
<script>
  function toggleFloatingCameraFromIcon() {
    const preview = document.getElementById('floatingVideoPreview');
    const fullscreenBtn = document.getElementById('fullscreenButton');
    const icon = document.querySelector('.viewer-bar .bi-camera-video-off, .viewer-bar .bi-camera-video-fill');
    const label = document.querySelector('.viewer-bar span.fw-semibold');

    const isHidden = preview.classList.contains('d-none');
    if (isHidden) {
      preview.classList.remove('d-none');
      fullscreenBtn.classList.add('cam-active');
      icon.classList.remove('bi-camera-video-off');
      icon.classList.add('bi-camera-video-fill');
      label.textContent = 'Trực tiếp';
    } else {
      preview.classList.add('d-none');
      fullscreenBtn.classList.remove('cam-active');
      icon.classList.remove('bi-camera-video-fill');
      icon.classList.add('bi-camera-video-off');
      label.textContent = 'Người xem';
    }
  }

  function toggleCameraPreview() {
    const preview = document.getElementById('videoPreview');
    const avatar = document.getElementById('avatarFallback');
    const label = document.getElementById('videoStatusLabel');
    const icon = document.getElementById('videoStatusIcon');

    const isHidden = preview.style.display === 'none' || preview.style.display === '';
    preview.style.display = isHidden ? 'block' : 'none';
    avatar.style.display = isHidden ? 'none' : 'block';
    label.innerText = isHidden ? 'Video on' : 'Video off';
    icon.className = isHidden ? 'bi bi-camera-video-fill me-1' : 'bi bi-camera-video-off me-1';
  }

  function toggleViewerDropdown() {
    const dropdown = document.getElementById('viewerDropdown');
    dropdown.classList.toggle('d-none');

    const videoPreview = document.getElementById('videoPreview');
    const avatarFallback = document.getElementById('avatarFallback');
    const videoStatusLabel = document.getElementById('videoStatusLabel');

    const isVideoOn = videoStatusLabel.innerText === 'Video on';
    videoPreview.style.display = isVideoOn ? 'block' : 'none';
    avatarFallback.style.display = isVideoOn ? 'none' : 'block';
  }


  function closeViewerDropdown() {
    document.getElementById('viewerDropdown').classList.add('d-none');
  }

  function toggleFullscreen() {
    const preview = document.getElementById('floatingVideoPreview');
  }

  function toggleParticipantPanel() {
    const panel = document.getElementById('participantPanel');
    panel.classList.toggle('show');
  }

  function toggleChatPanel() {
    const panel = document.getElementById('chatPanel');
    panel.classList.toggle('show');
  }

  function toggleFocusFriendModal() {
    const overlay = document.getElementById('overlay');
    const modal = document.getElementById('focusFriendModal');
    const isOpen = modal.style.display === 'block';
    if (isOpen) {
      modal.style.display = 'none';
      overlay.style.display = 'none';
    } else {
      modal.style.display = 'block';
      overlay.style.display = 'block';
    }
  }
</script>

<div class="container-fluid py-3 px-lg-5">
  <div class="d-flex flex-wrap justify-content-between align-items-center mb-4 gap-2">
    <div class="d-flex align-items-center position-relative">
      <a href="{{ route('home') }}" class="btn btn-outline-dark me-2" style="font-size: 13px;"><i class="bi bi-box-arrow-left"></i></a>
      <div class="d-flex align-items-center viewer-bar">
        <img src="/images/home/avatar.png" alt="avatar" width="28" height="28" class="rounded-circle">
        <span class="fw-semibold">Người xem</span>
        <i class="bi bi-camera-video-off icon" style="cursor: pointer;" onclick="toggleFloatingCameraFromIcon()"></i>
        <i class="bi bi-mic-mute icon"></i>
        <button class="btn btn-sm dropdown-toggle border-0" type="button" onclick="toggleViewerDropdown()"></button>

        <div id="viewerDropdown" class="custom-dropdown d-none">
          <button type="button" class="btn-close position-absolute top-0 end-0 m-2" aria-label="Close" onclick="closeViewerDropdown()"></button>

          <div class="mb-2">
            <small class="text-muted">Video của bạn</small>
          </div>

          <div class="bg-primary text-white rounded d-flex justify-content-between align-items-center px-3 py-1 mb-2">
            <span style="cursor: pointer;" onclick="toggleCameraPreview()">
              <i id="videoStatusIcon" class="bi bi-camera-video-off me-1"></i>
              <span id="videoStatusLabel">Video off</span>
            </span>
            <div>
              <i class="bi bi-person-circle me-2"></i>
              <i class="bi bi-people-fill"></i>
            </div>
          </div>

          <div class="bg-white border rounded text-center py-3" style="border: 2px solid #31c48d; height: 200px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <img id="videoPreview" src="/images/camera/cam.jpg" alt="preview" style="display: block; max-height: 130px; width: 90%; aspect-ratio: 4/3; object-fit: cover; border-radius: 8px;">
            <img id="avatarFallback" src="/images/home/avatar.png" alt="avatar" width="60" class="rounded-circle" style="display: none; margin-bottom: 8px;">
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
      <button class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2 px-3 border rounded-pill position-relative" onclick="toggleFocusFriendModal()">
        <i class="bi bi-funnel"></i>
        <span class="fw-medium">Tìm bạn bè tập trung</span>
      </button>
      <button class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2 px-3 border rounded-pill position-relative" onclick="toggleChatPanel()">
        <i class="bi bi-chat-dots"></i>
      </button>
      <button class="btn btn-outline-primary btn-sm d-flex align-items-center gap-2 px-3 border rounded-pill position-relative" onclick="toggleParticipantPanel()">
          <i class="bi bi-person"></i>
          <span>999</span>
      </button>
    </div>
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

  <div class="avatar-grid">
  @for ($i = 1; $i <= 12; $i++)
    <div>
      <img src="/images/camera/cam.jpg" alt="camera">
    </div>
  @endfor
  </div>

<a href="{{ route('focus') }}" id="fullscreenButton" class="position-fixed bottom-0 end-0 mb-5 me-5 bi bi-arrows-fullscreen" style="font-size: 20px; z-index: 1056; cursor: pointer;" onclick="toggleFullscreen()"></a>
<!-- Floating camera preview -->
<div id="floatingVideoPreview" class="position-fixed bottom-0 end-0 m-3 bg-white shadow rounded d-none" style="z-index: 1055; width: 260px; height: 200px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
  <img src="/images/camera/cam.jpg" alt="camera preview" style="aspect-ratio: 4/3; width: 90%; max-height: 140px; object-fit: cover; border-radius: 8px;">
  <div class="text-center py-1">
    <span class="badge bg-secondary">Anh Duc (trực tiếp)</span>
  </div>
</div>

<div id="chatPanel">
  <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
    <strong>Trò chuyện trong phòng</strong>
    <button class="btn-close" onclick="toggleChatPanel()"></button>
  </div>
  <div class="flex-grow-1 overflow-auto px-3 py-2" style="background-color: #f9fafb;">
    <div class="mb-3 d-flex gap-2">
      <img src="/images/home/avatar.png" width="32" height="32" class="rounded-circle">
      <div><strong>Lan</strong><p>Chào mọi người, mình là Lan, năm hai ngành Marketing. Mình thích chụp ảnh và du lịch</p></div>
    </div>
    <div class="mb-3 d-flex gap-2">
      <img src="/images/home/avatar.png" width="32" height="32" class="rounded-circle">
      <div><strong>Dũng</strong><p>Hey, mình Dũng, năm ba CNTT. Sở thích của mình là lập trình game và chơi bóng rổ.</p></div>
    </div>
    <div class="mb-3 d-flex gap-2">
      <img src="/images/home/avatar.png" width="32" height="32" class="rounded-circle">
      <div><strong>Khanh</strong><p>Hello, mình là Khanh, cho mình hỏi có ai đang học Tiếng Anh không nhỉ ?</p></div>
    </div>
    <div class="mb-3 d-flex gap-2">
      <img src="/images/home/avatar.png" width="32" height="32" class="rounded-circle">
      <div><strong>Linh</strong><p>@Khanh mình đang học Tiếng Anh đấy, bạn cần mình giúp gì không ?</p></div>
    </div>
    <div class="mb-3 d-flex gap-2">
      <img src="/images/home/avatar.png" width="32" height="32" class="rounded-circle">
      <div><strong>Khanh</strong><p>@Linh kết bạn với mình có gì giúp mình học hoặc trao đổi Tiếng Anh nhé bạn.</p></div>
    </div>
    <div class="mb-3 d-flex gap-2">
      <img src="/images/home/avatar.png" width="32" height="32" class="rounded-circle">
      <div><strong>Đức</strong><p>@Dũng chào bạn, mình có thể kết bạn và nhắn tin riêng trao đổi 1 chút về các vấn đề trong CNTT được không bạn ?</p></div>
    </div>
    <div class="mb-3 d-flex gap-2">
      <img src="/images/home/avatar.png" width="32" height="32" class="rounded-circle">
      <div><strong>Dũng</strong><p>@Đức ok bạn</p></div>
    </div>
    <div class="mb-3 d-flex gap-2">
      <img src="/images/home/avatar.png" width="32" height="32" class="rounded-circle">
      <div><strong>Lan</strong><p>Mọi người có ai thích đi du lịch bụi không?</p></div>
    </div>
    <div class="mb-3 d-flex gap-2">
      <img src="/images/home/avatar.png" width="32" height="32" class="rounded-circle">
      <div><strong>Linh</strong><p>@Lan mình cũng rất thích, cuối tuần này có muốn đi phượt không?</p></div>
    </div>
    <div class="mb-3 d-flex gap-2">
      <img src="/images/home/avatar.png" width="32" height="32" class="rounded-circle">
      <div><strong>Khanh</strong><p>Mình đang học Laravel, ai có thể hướng dẫn mình với?</p></div>
    </div>
  </div>
  <div class="border-top p-2 d-flex align-items-center gap-2 bg-white">
    <i class="bi bi-emoji-smile"></i>
    <i class="bi bi-paperclip"></i>
    <i class="bi bi-gift"></i>
    <input class="form-control form-control-sm border-primary" placeholder="Aa...">
    <i class="bi bi-send text-primary"></i>
  </div>
</div>

<div id="participantPanel">
  <div class="d-flex justify-content-between align-items-center p-3 border-bottom">
    <strong>Danh sách người tham gia (999)</strong>
    <button class="btn-close" onclick="toggleParticipantPanel()"></button>
  </div>
  <div class="p-3 border-bottom bg-light">
    <div class="btn-group w-100">
      <button class="btn btn-primary btn-sm"><i class="bi bi-people"></i> All</button>
      <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-person"></i></button>
      <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-person-fill"></i></button>
      <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-star"></i></button>
      <button class="btn btn-outline-secondary btn-sm"><i class="bi bi-star-fill"></i></button>
    </div>
  </div>
  <div class="p-3">
    <input class="form-control form-control-sm mb-2" placeholder="Tìm kiếm người tham gia">
    <div class="overflow-auto" style="max-height: 75vh">
      @for ($i = 1; $i <= 50; $i++)
      <div class="d-flex align-items-center justify-content-between py-2 border-bottom">
        <div class="d-flex align-items-center gap-2">
          <img src="/images/home/avatar.png" alt="avatar" width="32" height="32" class="rounded-circle">
          <span>Tên người tham gia {{ $i }}</span>
        </div>
        <div class="d-flex gap-2 align-items-center">
          <i class="bi bi-star"></i>
          <i class="bi bi-three-dots"></i>
        </div>
      </div>
      @endfor
    </div>
  </div>
</div>

<div id="overlay"></div>

<div id="focusFriendModal">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h6 class="mb-0">Bạn bè tập trung</h6>
    <button class="btn-close" onclick="toggleFocusFriendModal()"></button>
  </div>
  <div class="mb-3">
    <i class="bi bi-funnel"></i>
    <strong class="ms-2">Lọc</strong>
  </div>
  <div class="mb-3">
    <select class="form-select">
      <option selected>Giới tính</option>
      <option value="1">Nam</option>
      <option value="2">Nữ</option>
    </select>
  </div>
  <div class="mb-3">
    <select class="form-select">
      <option selected>Loại người dùng</option>
      <option value="1">Sinh viên</option>
      <option value="2">Khác</option>
    </select>
  </div>
  <div class="d-flex justify-content-end gap-2">
    <button class="btn btn-primary">Tìm kiếm</button>
    <button class="btn btn-outline-secondary" onclick="toggleFocusFriendModal()">Đóng</button>
  </div>
</div>
@endsection