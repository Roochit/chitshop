<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chit Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    @yield('css_before')
  </head>
  <body>

    <div class="container">
      <div class="row">
          <div class="col">
              <div class="alert text-center" style="background-color: #509196; color: #ffffff;  role="alert">
                <h4>Admin Office</h4>
              </div>
          </div>
          {{-- <div class="text-center p-4 mb-4" style="background-color: #59C9FA; border-radius: 15px; color: #333; font-weight: bold;">
            Admin Office
          </div> --}}
      </div>
    </div>

    @yield('header')

    <div class="container">
      <div class="row">

        <div class="col-md-3">
          <div class="list-group">
            <a href="/" class="list-group-item list-group-item-action " aria-current="true" style="background-color: #305a5d; color: #ffffff ">
              Home
            </a>
          
            <a href="/test" class="list-group-item list-group-item-action"> - TestCRUD </a>

            <a href="/member" class="list-group-item list-group-item-action"> - Member </a>

            <a href="/item" class="list-group-item list-group-item-action"> - Product </a>
           
            <a href="/" class="list-group-item list-group-item-action"  style="background-color: #ff431e; color: #ffffff "> 
                Log Out 
            </a>

 
          
          </div>
          @yield('sidebarMenu')
        </div>

        <div class="col-md-9">
          @yield('content')
        </div>

      </div>
    </div>

    {{-- <footer class="mt-5 mb-2">
      <p class="text-center">by devbanban.com @2025</p>
    </footer> --}}
    
    @yield('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    @yield('js_before')

    

    {{-- >>>>>>> ตรงนี้สำคัญ <<<<<<< --}}
    @include('sweetalert::alert')

  </body>
</html>

{{-- CSS --}}
<style>
    /* กำหนดตัวแปรสีเพื่อให้แก้ง่าย */
    :root {
        --primary-blue: #2FDBEB; /* สีฟ้าอ่อนตาม Header bar ที่คุณออกแบบ */
        --accent-orange: #EB7D2F; /* สีส้มอมแดงตามปุ่มที่คุณออกแบบ */
        --bg-body: #F0F3F7;      /* สีพื้นหลังเทาอ่อนๆ */
        --text-dark: #333333;
    }

    

    body {
        background-color: var(--bg-body);
        font-family: 'Kanit', sans-serif; /* แนะนำฟอนต์ Kanit จะดูทันสมัยมาก */
        color: var(--text-dark);
    }

    /* 1. ปรับแต่ง Header (Admin Office) */
    .bg-light.text-center.p-4.mb-4 {
        /* background-color: var(--primary-blue) !important; */
        border-radius: 15px; /* มนๆ ตามรูปออกแบบ */
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        color: var(--text-dark) !important;
        font-weight: bold;
    }

    /* 2. ปรับแต่ง Sidebar Menu */
    .nav-pills .nav-link.active {
        /* background-color: var(--primary-blue) !important; */
        background-color: #2FDBEB !important;
        color: var(--text-dark) !important;
    }

    .nav-pills .nav-link {
        color: var(--text-dark);
        border-radius: 8px;
        margin-bottom: 5px;
    }

    .nav-pills .nav-link:hover {
        background-color: #E0F7FA;
    }

    /* ปุ่ม 'ออกจากระบบ' ให้เป็นสีส้ม */
    .nav-pills .nav-link.bg-danger {
        background-color: var(--accent-orange) !important;
        color: white !important;
    }

    /* 3. ปรับแต่งตาราง (Table) */
    .table-responsive {
        background: white;
        border-radius: 15px;
        padding: 15px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }

    .table-bordered {
        border-collapse: separate;
        border-spacing: 0;
        border: none;
    }

    /* ทำให้หัวตารางโค้งมน */
    .table-bordered thead th:first-child { border-top-left-radius: 10px; }
    .table-bordered thead th:last-child { border-top-right-radius: 10px; }

    .table-info {
        background-color: #f8f9fa !important; /* พื้นหลังหัวตารางอ่อนๆ */
        color: var(--text-dark) !important;
        border: none;
    }

    .table-bordered td, .table-bordered th {
        border: 1px solid #EAEAEA;
        vertical-align: middle; /* จัดกลางแนวตั้ง */
    }

    /* 4. ปรับแต่งปุ่ม (Buttons) */
    .btn {
        border-radius: 8px; /* มนๆ ตามรูปออกแบบ */
        font-weight: 500;
        transition: 0.2s;
    }

    .btn-sm { padding: 5px 15px; }

    /* ปุ่ม '+' (Add Data) */
    .btn-primary {
        background-color: var(--primary-blue);
        border: none;
        color: var(--text-dark);
    }

    .btn-primary:hover {
        background-color: #2FDBEB;
        transform: translateY(-1px);
    }

    /* ปุ่มแก้ไข */
    .btn-warning {
        background-color: #FFC107; /* สีเหลือง */
        border: none;
    }

    /* ปุ่มลบ (ใช้สีส้ม) */
    .btn-danger {
        background-color: var(--accent-orange);
        border: none;
    }

    .btn-danger:hover {
        background-color: #EB7D2F;
    }

    /* ปรับแต่งส่วน Pagination */
    .pagination .page-item.active .page-link {
        background-color: var(--primary-blue);
        border-color: var(--primary-blue);
        color: var(--text-dark);
    }
</style>