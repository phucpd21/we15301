{{-- <div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <img src="" alt="">
      <span class="fs-5 fw-semibold">Collapsible</span>
    </a>
    <ul class="list-unstyled ps-0">
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
          Product
        </button>
        <div class="collapse show" id="home-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Test 1</a></li>
            <li><a href="#" class="link-dark rounded">Test 2</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
          Category
        </button>
        <div class="collapse" id="dashboard-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Test 1</a></li>
            <li><a href="#" class="link-dark rounded">Test 2</a></li>
          </ul>
        </div>
      </li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
          User
        </button>
        <div class="collapse" id="orders-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Test 1</a></li>
            <li><a href="#" class="link-dark rounded">Test 2</a></li>
          </ul>
        </div>
      </li>
      <li class="border-top my-3"></li>
      <li class="mb-1">
        <button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
          Setting
        </button>
        <div class="collapse" id="account-collapse">
          <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
            <li><a href="#" class="link-dark rounded">Test 1</a></li>
            <li><a href="#" class="link-dark rounded">Test 2</a></li>
          </ul>
        </div>
      </li>
    </ul>
  </div> --}}


<div class="flex-shrink-0 p-3 bg-white" style="width: 280px;">
    <a href="/" class="d-flex align-items-center pb-3 mb-3 link-dark text-decoration-none border-bottom">
        <img src="" alt="">
        <span class="fs-5 fw-semibold">Quản lý cửa hàng</span>
    </a>
    <ul class="list-unstyled ps-0">
        <li class="mb-1">
            <a href="{{ route('admin.products.index') }}" class="{{ Request::is('admin/products') ? 'btn-active' : '' }} btn
                btn-toggle align-items-center rounded collapsed" >
                Product
                {{-- {{ Request::is('admin/products') ? 'btn-active' : '' }} --}}
            </a>
        </li>
        <li class="mb-1">
            <a href="{{ route('admin.categories.index') }}" class=" {{ Request::is('admin/categories') ? 'btn-active' : '' }} btn btn-toggle align-items-center rounded collapsed">
                Category
            </a>
        </li>
        <li class="mb-1">
            <a href="{{ route('admin.users.index') }}" class=" {{ Request::is('admin/users') ? 'btn-active' : '' }} btn btn-toggle align-items-center rounded collapsed">
                User
            </a>
        </li>
        <li class="border-top my-3"></li>
        <li class="mb-1">
            <a href="" class=" {{ Request::is('admin/setting') ? 'btn-active' : '' }} btn btn-toggle align-items-center rounded collapsed">
                Setting
            </a>
        </li>
    </ul>
</div>
