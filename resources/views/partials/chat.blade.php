{{-- resources/views/partials/chat.blade.php --}}
<div class="d-flex flex-column flex-grow-1 h-100 bg-light">
  {{-- Header chat --}}
  <div class="d-flex align-items-center px-3 py-2 bg-white border-bottom" style="height:60px; flex-shrink:0;">
    <img
      src="{{ asset('images/avatar2.jpg') }}"
      class="rounded-circle me-3"
      width="40" height="40"
      alt="Avatar">
    <div>
      <div class="fw-bold">Sơn</div>
      <div class="text-success small">Đang hoạt động</div>
    </div>
  </div>

  {{-- Nội dung tin nhắn --}}
  <div class="flex-grow-1 overflow-auto px-3 py-2" style="min-height:0;">
    {{-- Tin từ Sơn --}}
    <div class="d-flex mb-3">
      <img
        src="{{ asset('images/avatar2.jpg') }}"
        class="rounded-circle me-2"
        width="32" height="32"
        alt="Avatar">
      <div class="bg-white p-2 rounded-3" style="max-width:60%;">
        <p class="mb-1 small">Chào An! Tớ cũng chưa có kế hoạch gì cả. Có gì vui à?</p>
        <small class="text-muted">16:30</small>
      </div>
    </div>
    {{-- Tin của An --}}
    <div class="d-flex mb-3 justify-content-end">
      <div class="bg-primary text-white p-2 rounded-3" style="max-width:60%;">
        <p class="mb-1 small">Chào Sơn! Cuối tuần này cậu có rảnh không?</p>
        <small class="text-white small">16:20</small>
      </div>
      <img
        src="{{ asset('images/avatar.jpg') }}"
        class="rounded-circle ms-2"
        width="32" height="32"
        alt="Avatar">
    </div>
    {{-- Thêm các tin nhắn khác nếu cần --}}
  </div>

  {{-- Khung nhập tin --}}
  <div class="d-flex align-items-center px-3 py-2 bg-white border-top" style="height:60px; flex-shrink:0;">
    <button class="btn btn-light me-2"><i class="bi bi-mic-fill fs-5"></i></button>
    <button class="btn btn-light me-2"><i class="bi bi-image fs-5"></i></button>
    <button class="btn btn-light me-2"><i class="bi bi-emoji-smile fs-5"></i></button>
    <input
      type="text"
      class="form-control rounded-pill border-1"
      placeholder="Nhập tại đây...">
    <button class="btn btn-primary ms-2"><i class="bi bi-send-fill fs-5"></i></button>
  </div>
</div>
