
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
      }

      .navbar {
        overflow: hidden;
        background-color: #333;
        position: fixed;
        bottom: 0;
        width: 100%;
      }

      .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }

      .navbar a:hover {
        background-color: #ddd;
        color: black;
      }

      .navbar a.active {
        background-color: #30A8C2;
        color: white;
      }

      .navbar .icon {
        display: none;
      }

      @media screen and (max-width: 600px) {
        .navbar a:not(:first-child) {display: none;}
        .navbar a.icon {
          float: right;
          display: block;
        }
      }

      @media screen and (max-width: 600px) {
        .navbar.responsive .icon {
          position: absolute;
          right: 0;
          bottom:0;
        }
        .navbar.responsive a {
          float: none;
          display: block;
          text-align: left;
        }

      }
</style>

<!-- Component Navbar -->
<div class="navbar" id="myNavbar">
    @if (isset($nav1))
        <a class="text-white active" href="{{$nav1ref}}">{{ $nav1 }}</a>
    @endif
    @if (isset($nav2))
        <a class="text-white" href="{{ $nav2ref }}">{{ $nav2 }}</a>
    @endif
    @if (isset($nav3))
        <a class="text-white" href="{{ $nav3ref }}">{{ $nav3 }}</a>
    @endif
    @if (isset($nav4))
        <a class="text-white" href="{{ $nav4ref }}"> {{ $nav4 }} </a>
    @endif
    @if (isset($nav5))
        <a class="text-white" href="{{ $nav5ref }}"> {{ $nav5 }} </a>
    @endif
  <a  onclick="myFunction()" href="javascript:void(0);" style="font-size:15px;" class="icon">&#9776;</a>
</div>
<!-- Component Navbar -->

  <script>
  function myFunction() {
    var x = document.getElementById("myNavbar");
    if (x.className === "navbar") {
      x.className += " responsive";
    } else {
      x.className = "navbar";
    }
  }
  </script>
