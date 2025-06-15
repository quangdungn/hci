@extends('layouts.app')

@section('content')
<style>
    .main-content {
      min-height: calc(100vh - 80px);
      padding: 1rem 2rem;
      display: flex;
      gap: 2rem;
    }
    .sidebar {
      width: 20%;
      background-color: #ffffff;
      border-radius: 8px;
      padding: 1.5rem;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .study-area {
      flex: 1;
      background-color: #ccf0ff;
      border-radius: 8px;
      padding: 1.5rem;
    }
    .study-card {
      background-color: #ffffff;
      border-radius: 8px;
      padding: 1rem;
      box-shadow: 0 0 8px rgba(0,0,0,0.05);
      margin-bottom: 1rem;
    }
</style>
<div class="main-content">
  <div class="sidebar">
    <h5 class="fw-bold">Nhóm của tôi</h5>
    <div class="d-flex align-items-center mt-3">
      <img src="/images/group.jpg" class="rounded-circle me-2" width="40" height="40">
      <span>Nhóm tương tác người máy</span>
    </div>
  </div>
  <div class="study-area">
    <h5 class="fw-bold mb-3">Phòng học tập chung</h5>
    <button class="btn btn-light mb-4">Tạo phòng tập chung</button>

    <div class="study-card">
      <h6 class="fw-bold">Phòng học tập chung 1</h6>
      <p>20 người trực tuyến</p>
      <div class="d-flex flex-wrap mb-3">
        <img src="/images/avt1.jpg" class="rounded-circle me-2" width="40" height="40">
        <img src="/images/avt2.jpg" class="rounded-circle me-2" width="40" height="40">
        <img src="/images/avt3.jpg" class="rounded-circle me-2" width="40" height="40">
      </div>
      <a href="{{ route('room') }}" class="btn btn-primary">Tham Gia</a>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="study-card">
          <h6 class="fw-bold">Phòng học tập chung 2</h6>
          <p>16 người trực tuyến</p>
          <div class="d-flex flex-wrap mb-3">
            <img src="/images/avt2.jpg" class="rounded-circle me-2" width="40" height="40">
            <img src="/images/avt2.jpg" class="rounded-circle me-2" width="40" height="40">
          </div>
          <a href="{{ route('room') }}" class="btn btn-primary">Tham Gia</a>
        </div>
      </div>
      <div class="col-md-6">
        <div class="study-card">
          <h6 class="fw-bold">Phòng học tập chung 3</h6>
          <p>16 người trực tuyến</p>
          <div class="d-flex flex-wrap mb-3">
            <img src="/images/avt3.jpg" class="rounded-circle me-2" width="40" height="40">
            <img src="/images/avt3.jpg" class="rounded-circle me-2" width="40" height="40">
          </div>
          <a href="{{ route('room') }}" class="btn btn-primary">Tham Gia</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
