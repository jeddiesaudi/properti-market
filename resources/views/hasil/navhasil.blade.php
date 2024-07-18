<div class="container">
    <div class="is-centered">
        <a class="navbar is-centered is-horizontal-center" href="/">
            <img src="/img/logo-black.png"  height="100px">
        </a>
        <br>       
        <div class="buttons is-centered">
        @guest
        @else
          @if(Auth::guard('admin')->check())
          <a class="button is-danger is-centered nounderlinebtn" href="/admin">
            Profil
          </a>
          @else
          <a class="button is-danger is-centered nounderlinebtn" href="/profil">
            Profil
          </a>
          @endif
            <a class="button is-light is-centered nounderlinebtn" href="/logout">
              Logout
            </a>
        </div>
    </div>
</div>
  <nav class="navbar" role="navigation" class="is-centered" aria-label="main navigation">
    <div class="navbar-brand">
      <a role="button" class="navbar-burger burger button is-primary" aria-label="menu" aria-expanded="false" onclick="document.querySelector('.below').classList.toggle('is-active');" data-target="belownav">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
  
    <div id="belownav" class="navbar-menu below is-centered navsearch">
      <div class="navbar-start">
            <a class="navbar-item menuitemnav" href="/">
              Beranda
            </a>
            <a class="navbar-item menuitemnav" href="https://wa.me/6212345678"  target="_blank">
              Hubungi Kami
            </a>
      </div>
      <div class="navbar-end">
      <div class="navbar-item">
      @endguest
      </div>
    </div>
    </div>
  </nav>
