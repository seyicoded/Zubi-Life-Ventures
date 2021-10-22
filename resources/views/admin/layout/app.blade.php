<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Zubi Venture Admin Dashboard | Dashboard</title>
  <!-- Favicon -->
  <link rel="shortcut icon" href="{{url('admin_file/img/svg/logo.svg')}}" type="image/x-icon">
  <!-- Custom styles -->
  <link rel="stylesheet" href="{{url('admin_file/css/style.min.css')}}">
  <link rel="stylesheet" href="{{url('css/w3.css')}}">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"  />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.bootstrap4.min.css">
  <link href="{{url('Gassets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    {{-- CKEDITOR --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
    <!-- ANIMATE CSS -->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>

<body style="background: rgba(0, 0, 0, 0.03)">
  <div class="layer"></div>
<!-- ! Body -->
<a class="skip-link sr-only" href="#skip-target">Skip to content</a>
<div class="page-flex">
  @include('admin.layout.sidenav')

  <div class="main-wrapper">
    <!-- ! Main nav -->
    <nav class="main-nav--bg" style="height: 90px">
  <div class="container main-nav">
    <div class="main-nav-start">
    </div>
    <div class="main-nav-end">

      <div class="nav-user-wrapper">
        <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
          <span class="sr-only">My profile</span>
          <span class="nav-user-img">
            <picture><source srcset="{{url('admin_file/img/avatar/avatar-illustrated-02.webp')}}" type="image/webp"><img src="{{url('admin_file/img/avatar/avatar-illustrated-02.png')}}" alt="User name"></picture>
          </span>
        </button>
        <ul class="users-item-dropdown nav-user-dropdown dropdown">
          <li><a href="##">
              <i data-feather="user" aria-hidden="true"></i>
              <span>Profile</span>
            </a></li>
          <li><a href="##">
              <i data-feather="settings" aria-hidden="true"></i>
              <span>Account settings</span>
            </a></li>
          <li><a class="danger" href="{{url('/logout')}}">
              <i data-feather="log-out" aria-hidden="true"></i>
              <span>Log out</span>
            </a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
      <div class="container">
          @yield('content')
      </div>
    </main>
    <!-- ! Footer -->
    <footer class="footer">
  <div class="container footer--flex">
    <div class="footer-start">
      <p>2021 © Zubi Dashboard - <a href="elegant-dashboard.com" target="_blank"
          rel="noopener noreferrer"></a></p>
    </div>
    <ul class="footer-end">
      {{-- <li><a href="##">About</a></li> --}}
      {{-- <li><a href="##">Support</a></li> --}}
      {{-- <li><a href="##">Puchase</a></li> --}}
    </ul>
  </div>
</footer>
  </div>
</div>
<!-- Chart library -->
<script src="{{url('admin_file/plugins/chart.min.js')}}"></script>
<!-- Icons library -->
<script src="{{url('admin_file/plugins/feather.min.js')}}"></script>
<!-- Custom scripts -->
<script src="{{url('admin_file/js/script.js')}}"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
{{-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> --}}
{{-- DATA TABLE JS --}}
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
{{-- END OF DATA TABLE JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="{{('Gassets/js/main.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
          dom: 'Bfrtip',
          buttons: [
              'excelHtml5',
              'csvHtml5',
              'pdfHtml5'
          ]
        });
    } );
</script>

</body>

</html>
