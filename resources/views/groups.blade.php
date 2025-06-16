@extends('layouts.app')
@section('title','Nhóm')

@section('content')
<div class="d-flex w-100 h-100">

  {{-- Sidebar nhóm --}}
  <div class="border-end" style="width:240px;">
    <div class="d-flex align-items-center justify-content-between px-3 py-2 border-bottom">
      <h5 class="mb-0">Nhóm</h5>
      <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#createGroupModal">
        <i class="bi bi-plus-lg"></i>
      </button>
    </div>
    <ul class="list-group list-group-flush overflow-auto" style="max-height:calc(100vh-60px);">
      @foreach($groups as $g)
        <li class="list-group-item">
          <a href="/groups/{{ $g['id'] }}" class="d-flex align-items-center text-decoration-none text-dark">
            <img src="{{ asset('images/'.$g['avatar']) }}" width="32" height="32" class="rounded-circle me-2">
            <span>{{ $g['name'] }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </div>

  {{-- Nội dung khi chưa chọn nhóm --}}
  <div class="flex-grow-1 p-4 text-center">
    <h4 class="text-primary">Bạn một mình nhưng không cô đơn!</h4>
    <p class="text-muted">Cộng đồng nơi mọi người chào đón bạn!</p>
    <button class="btn btn-outline-primary btn-lg mt-5" data-bs-toggle="modal" data-bs-target="#createGroupModal">
      <i class="bi bi-plus-lg fs-2"></i>
    </button>
    <div class="row row-cols-1 row-cols-md-3 g-3 mt-4 overflow-auto" style="max-height:calc(100vh-200px);">
      @foreach($groups as $g)
        <div class="col">
          <div class="card h-100">
            <div class="card-body">
              <div class="d-flex align-items-center mb-2">
                <img src="{{ asset('images/'.$g['avatar']) }}" width="32" height="32" class="rounded-circle me-2">
                <h6 class="mb-0">{{ $g['name'] }}</h6>
              </div>
              <p class="small text-truncate">{{ $g['description'] }}</p>
              <a href="/groups/{{ $g['id'] }}" class="stretched-link"></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

{{-- Modal tạo nhóm --}}
<div class="modal fade" id="createGroupModal" tabindex="-1" aria-labelledby="createGroupModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createGroupModalLabel">Tạo nhóm mới</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <input type="text" id="newGroupName" class="form-control mb-2" placeholder="Tên nhóm">
        <textarea id="newGroupDesc" class="form-control" placeholder="Mô tả nhóm"></textarea>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Hủy</button>
        <button id="saveGroupBtn" class="btn btn-primary btn-sm">Tạo</button>
      </div>
    </div>
  </div>
</div>

<script>
  document.getElementById('saveGroupBtn').onclick = ()=>{
    // Demo: chỉ đóng modal
    bootstrap.Modal.getInstance(document.getElementById('createGroupModal')).hide();
    alert('Nhóm mới đã được tạo (demo)');
  };
</script>
@endsection
