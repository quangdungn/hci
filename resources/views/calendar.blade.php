{{-- resources/views/calendar.blade.php --}}
@extends('layouts.app')

@section('title','Lịch')

@section('content')
  <!-- FullCalendar CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.css"
    rel="stylesheet">

  <div class="d-flex flex-column w-100 h-100">

    {{-- Top controls --}}
    <div class="d-flex align-items-center justify-content-between px-3 py-2">
      <button id="todayBtn" class="btn btn-outline-primary btn-sm">Hôm nay</button>

      <div class="dropdown">
        <button
          class="btn btn-outline-secondary btn-sm dropdown-toggle"
          type="button"
          id="monthDropdown"
          data-bs-toggle="dropdown"
          aria-expanded="false">
          <span id="currentMonthLabel"></span>
        </button>
        <ul class="dropdown-menu" aria-labelledby="monthDropdown">
          @for($m=1; $m<=12; $m++)
            <li>
              <a class="dropdown-item month-item" href="#" data-month="{{ $m }}">
                Tháng {{ $m }}
              </a>
            </li>
          @endfor
        </ul>
      </div>

      <div class="d-flex align-items-center">
        {{-- Dropdown tiny next to Add button --}}
        <div class="dropdown">
          <button
            id="addTaskBtn"
            class="btn btn-primary btn-sm me-2"
            data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="bi bi-plus-lg"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end p-3" style="min-width:240px;">
            <div class="mb-2">
              <input
                type="text"
                id="taskDesc"
                class="form-control form-control-sm"
                placeholder="Mô tả nhiệm vụ">
            </div>
            <div class="mb-2">
              <input
                type="date"
                id="taskDate"
                class="form-control form-control-sm"
                value="{{ now()->format('Y-m-d') }}">
            </div>
            <div class="d-flex justify-content-end">
              <button
                class="btn btn-secondary btn-sm me-2"
                id="cancelAdd">
                Hủy
              </button>
              <button
                class="btn btn-primary btn-sm"
                id="confirmAdd">
                Thêm
              </button>
            </div>
          </div>
        </div>

        <button id="filterBtn" class="btn btn-outline-secondary btn-sm">
          <i class="bi bi-filter"></i> Lọc
        </button>
      </div>
    </div>

    {{-- Calendar --}}
    <div id="calendar" class="flex-grow-1"></div>
  </div>

  <!-- FullCalendar JS -->
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Init calendar
      const calendarEl = document.getElementById('calendar');
      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        initialDate: '2025-06-01',
        locale: 'vi',
        height: '100%',
        headerToolbar: false,
        events: [
          { title: 'Họp để sửa code', start: '2025-06-09' },
          { title: 'Họp các vấn đề tiến tiến', start: '2025-06-12' },
          { title: 'Học tương tác người máy', start: '2025-06-30' }
        ]
      });
      calendar.render();

      // Helpers
      function updateMonthLabel() {
        const d = calendar.getDate();
        document.getElementById('currentMonthLabel').textContent =
          'Tháng ' + (d.getMonth() + 1) + ', ' + d.getFullYear();
      }
      updateMonthLabel();

      // Today button
      document.getElementById('todayBtn').addEventListener('click', () => {
        calendar.today();
        updateMonthLabel();
      });

      // Month selector
      document.querySelectorAll('.month-item').forEach(el => {
        el.addEventListener('click', e => {
          e.preventDefault();
          const m = parseInt(el.dataset.month) - 1;
          const y = calendar.getDate().getFullYear();
          calendar.gotoDate(new Date(y, m, 1));
          updateMonthLabel();
        });
      });

      // Dropdown instances
      const addDropdownBtn = document.getElementById('addTaskBtn');
      const addDropdownMenu = addDropdownBtn.nextElementSibling;
      const addDropdown = bootstrap.Dropdown.getOrCreateInstance(addDropdownBtn);

      document.getElementById('cancelAdd').addEventListener('click', () => {
        addDropdown.hide();
      });

      document.getElementById('confirmAdd').addEventListener('click', () => {
        const desc = document.getElementById('taskDesc').value.trim();
        const date = document.getElementById('taskDate').value;
        if (!desc || !date) {
          alert('Vui lòng nhập mô tả và chọn ngày');
          return;
        }
        calendar.addEvent({ title: desc, start: date });
        // reset
        document.getElementById('taskDesc').value = '';
        document.getElementById('taskDate').value = new Date().toISOString().substr(0,10);
        addDropdown.hide();
      });

      // Filter placeholder
      document.getElementById('filterBtn').addEventListener('click', () => {
        alert('Chức năng lọc đang phát triển…');
      });
    });
  </script>
@endsection
