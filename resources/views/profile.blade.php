{{-- resources/views/profile.blade.php --}}
@extends('layouts.app')

@section('title','Hồ sơ cá nhân')

@section('content')
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <div class="d-flex w-100 h-100">

    {{-- Panel người dùng --}}
    <div class="bg-info bg-opacity-25 p-4 d-flex flex-column" style="width:280px;">
      <div class="text-center mb-4">
        <img
          src="{{ asset('images/avatar.jpg') }}"
          class="rounded-circle mb-2"
          width="80" height="80"
          alt="Avatar">
        <h5>Người dùng <i class="bi bi-pencil-fill ms-1"></i></h5>
      </div>
      <p class="text-muted mb-1 small">Email người dùng</p>
      <div class="d-flex justify-content-between mb-3">
        <div><strong>234</strong><br><small>Followers</small></div>
        <div><strong>23</strong><br><small>Following</small></div>
      </div>
      <div class="form-check form-switch mb-3">
        <input
          class="form-check-input"
          type="checkbox"
          id="activeSwitch"
          checked>
        <label class="form-check-label small" for="activeSwitch">
          Đang hoạt động
        </label>
      </div>
      <textarea
        class="form-control mb-3"
        rows="3"
        placeholder="Bạn chưa có tiểu sử"></textarea>
      <button class="btn btn-primary btn-sm mt-auto">
        Quản lý người theo dõi
        <i class="bi bi-arrow-repeat ms-1"></i>
      </button>
    </div>

    {{-- Panel tổng quan --}}
    <div class="flex-grow-1 bg-warning bg-opacity-25 p-4 d-flex flex-column">
      <h4 class="text-center fw-bold mb-4">Tổng quát</h4>

      {{-- Chuỗi hoạt động --}}
      <div class="d-flex justify-content-around align-items-center mb-4">
        <div class="text-center">
          <i class="bi bi-trophy-fill text-danger fs-3"></i><br>
          <small>Chuỗi tốt nhất</small><br>
          <strong>120</strong>
        </div>
        <div class="text-center">
          <i class="bi bi-graph-up-arrow text-success fs-3"></i><br>
          <small>Chuỗi hiện tại</small><br>
          <strong>20</strong>
        </div>
        <div class="text-center">
          <i class="bi bi-graph-down text-secondary fs-3"></i><br>
          <small>Chuỗi đóng băng</small><br>
          <strong>0</strong>
        </div>
      </div>

      {{-- Biểu đồ hoạt động tuần qua --}}
      <div class="flex-grow-1">
        <canvas id="activityChart" style="width:100%; height:100%;"></canvas>
      </div>
    </div>

  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const ctx = document.getElementById('activityChart').getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['CN','T2','T3','T4','T5','T6','T7'],
          datasets: [{
            label: 'Hoạt động',
            data: [3, 7, 5, 10, 9, 6, 4],
            backgroundColor: '#0d6efd'
          }]
        },
        options: {
          maintainAspectRatio: false,
          scales: {
            x: {
              grid: { display: false }
            },
            y: {
              beginAtZero: true,
              ticks: { stepSize: 2 }
            }
          },
          plugins: { legend: { display: false } }
        }
      });
    });
  </script>
@endsection
