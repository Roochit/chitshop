<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 12 Basic CRUD by devbanban.com 2025</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    @yield('css_before')
  </head>
  <body>

    <!-- start navbar  --> 
<div class="container">
    <div class="row">
    <div class="col-12 col-sm-12 col-md-12">
<nav class="navbar navbar-expand-lg" style="background-color: #509196; color: #ffffff; ">
    <div class="container">
      <a class="navbar-brand text-white" href="/home">MyShop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="/home">Home</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link text-white" href="https://devbanban.com/?p=4425">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="https://devbanban.com/?p=4425">Link</a>
          </li> --}}

           {{-- <li class="nav-item">
            <a class="nav-link text-white" href="/login">Login</a>
          </li> --}}


          
          {{-- <li class="nav-item">
            <a class="nav-link text-white" href="/member" target="_blank">BackOffice</a>
          </li> --}}
          
        </ul>
        <form action="/search" method="get" class="d-flex" role="search">
          <input class="form-control me-2" type="text" name="keyword" placeholder="Search Product Name" aria-label="Search" required value="{{ $keyword ?? ''}}">
          <button class="btn btn-danger" type="submit">Search </button>
        </form>
      </div>
    </div>
  </nav>
    </div>
    </div>
</div>
  <!-- end navbar  -->

  <div class="container mt-2 mb-2">
    <div class="row">
      <div class="col-12 col-sm-12 col-md-12">
        <div class="alert alert-primary" role="alert">
          ::show product::
        </div>
      </div>
    </div>
  </div>
  @yield('navbar')


  <div class="container mt-2">
    <div class="row">
        @yield('showProduct')
    </div>
  </div>


    <footer class="mt-5 mb-2">
      {{-- <p class="text-center">by devbanban.com @2025</p> --}}
    </footer>
    
    @yield('footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    @yield('js_before')

  </body>
</html>

{{-- CSS --}}
<style>
    /* กำหนดตัวแปรสีเพื่อให้แก้ง่าย */
    :root {
        /* --primary-blue: #2FDBEB; สีฟ้าอ่อนตาม Header bar ที่คุณออกแบบ */
        /* --accent-orange: #D6732D; สีส้มอมแดงตามปุ่มที่คุณออกแบบ */
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

    .nav-pills .nav-link {
        color: var(--text-dark);
        border-radius: 8px;
        margin-bottom: 5px;
    }

    .nav-pills .nav-link:hover {
        background-color: #E0F7FA;
        
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
        background-color: #2FDBEB; /* สีเหลือง */
        color: #000000 !important;           /* ตัวอักษรสีขาว */
        box-shadow: 0 4px 8px #509196; 
        border: none;
        /* background-color: var(--primary-blue);
        border: none;
        color: var(--text-dark); */
    }

    .btn-primary:hover {
        border: 2px solid #2FDBEB !important; 
        color: #2FDBEB !important;
        background-color: white !important; /* ใส่พื้นหลังขาวเพื่อให้ขอบเด่น */
        border-radius: 12px !important;
        padding: 4px 12px !important;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
        text-decoration: none !important;
        box-shadow: 0 4px 8px rgba(235, 125, 47, 0.3); /* แถม: เพิ่มเงาส้มอ่อนๆ ตอนชี้ */
        display: inline-block;;
    }

    /* ปุ่มแก้ไข */
    .btn-warning {
        background-color: #FFC107; /* สีเหลือง */
        color: #000000 !important;           /* ตัวอักษรสีขาว */
        box-shadow: 0 4px 8px rgba(235, 125, 47, 0.3); /* แถม: เพิ่มเงาส้มอ่อนๆ ตอนชี้ */
        border: none;
    }
    .btn-warning:hover {
        border: 2px solid #FFC107 !important; 
        color: #FFC107 !important;
        background-color: white !important; /* ใส่พื้นหลังขาวเพื่อให้ขอบเด่น */
        /* border-radius: 12px !important;
        padding: 4px 12px !important;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
        text-decoration: none !important; */
        display: inline-block;;
    }

    /* ปุ่มลบ (ใช้สีส้ม) */
    .btn-danger {
        background-color: #EB7D2F !important; /* เปลี่ยนพื้นหลังเป็นสีส้ม */
        color: #ffffff !important;           /* ตัวอักษรสีขาว */
        box-shadow: 0 4px 8px rgba(235, 125, 47, 0.3); /* แถม: เพิ่มเงาส้มอ่อนๆ ตอนชี้ */
    }
    .btn-danger:hover {
        border: 2px solid #EB7D2F !important; 
        color: #EB7D2F !important;
        background-color: white !important; /* ใส่พื้นหลังขาวเพื่อให้ขอบเด่น */
        border-radius: 12px !important;
        padding: 4px 12px !important;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
        text-decoration: none !important;
        display: inline-block;;
    }

    /* ปุ่มกลับรีเซ็ตรหัสผ่าน */
    .btn-reset-custom {
        /* บังคับค่าขอบให้ชัดเจน */
        border: 2px solid #EB7D2F !important; 
        color: #EB7D2F !important;
        background-color: white !important; /* ใส่พื้นหลังขาวเพื่อให้ขอบเด่น */
        border-radius: 12px !important;
        padding: 4px 12px !important;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
        text-decoration: none !important;
        display: inline-block;
    }
    /* เมื่อเมาส์ชี้ (Hover) */
    .btn-reset-custom:hover {
        background-color: #EB7D2F !important; /* เปลี่ยนพื้นหลังเป็นสีส้ม */
        color: #ffffff !important;           /* ตัวอักษรสีขาว */
        box-shadow: 0 4px 8px rgba(235, 125, 47, 0.3); /* แถม: เพิ่มเงาส้มอ่อนๆ ตอนชี้ */
    }

    /* <<<<<<<<<< side bar >>>>>>>>>> */

    /* ปุ่มกลับไปหน้าบ้าน */
    .btn-home-custom {
        background-color: #305a5d !important; /* เปลี่ยนพื้นหลังเป็นสีส้ม */
        color: #ffffff !important;           /* ตัวอักษรสีขาว */
        box-shadow: 0 4px 8px rgba(235, 125, 47, 0.3); /* แถม: เพิ่มเงาส้มอ่อนๆ ตอนชี้ */
    }
    /* เมื่อเมาส์ชี้ (Hover) */
    .btn-home-custom:hover {
        /* บังคับค่าขอบให้ชัดเจน */
        border: 2px solid #305a5d !important; 
        color: #305a5d !important;
        background-color: white !important; /* ใส่พื้นหลังขาวเพื่อให้ขอบเด่น */
        /* border-radius: 12px !important; */
        padding: 4px 12px !important;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
        text-decoration: none !important;
        display: inline-block;
    }

    /* ปุ่มออกจากระบบ */
    .btn-logout-custom {
        background-color: #ff431e !important; /* เปลี่ยนพื้นหลังเป็นสีส้ม */
        color: #ffffff !important;           /* ตัวอักษรสีขาว */
        box-shadow: 0 4px 8px rgba(235, 125, 47, 0.3); /* แถม: เพิ่มเงาส้มอ่อนๆ ตอนชี้ */
    }
    /* เมื่อเมาส์ชี้ (Hover) */
    .btn-logout-custom:hover {
        /* บังคับค่าขอบให้ชัดเจน */
        border: 2px solid #ff431e !important; 
        color: #ff431e !important;
        background-color: white !important; /* ใส่พื้นหลังขาวเพื่อให้ขอบเด่น */
        /* border-radius: 12px !important; */
        padding: 4px 12px !important;
        font-weight: 500;
        transition: all 0.3s ease-in-out;
        text-decoration: none !important;
        display: inline-block;
    }

    /* ปุ่มธรรมดาใน side bar */
    .btn-side_bar-custom {
        background-color: #ffffff !important; /* เปลี่ยนพื้นหลังเป็นสีส้ม */
        color: var(--text-dark) !important;           /* ตัวอักษรสีขาว */
        box-shadow: 0 4px 8px rgba(235, 125, 47, 0.3); /* แถม: เพิ่มเงาส้มอ่อนๆ ตอนชี้ */
    }
    /* เมื่อเมาส์ชี้ (Hover) */
    .btn-side_bar-custom:hover {
        /* บังคับค่าขอบให้ชัดเจน */
        /* border: 2px solid #ff431e !important;  */
        color: #EB7D2F !important;
        background-color: white !important; /* ใส่พื้นหลังขาวเพื่อให้ขอบเด่น */
        /* border-radius: 12px !important;
        padding: 4px 12px !important; */
        /* font-weight: 500;
        transition: all 0.3s ease-in-out; */
        /* text-decoration: none !important; */
        display: inline-block;
    }

</style>
