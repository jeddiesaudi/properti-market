<nav class="navbar is-transparent navcolor">
  <div class="navbar-brand">
    <a class="" href="/">
      <img src="img/logo-white.png" height="150px">
    </a>
   
  </div>
  <div id="navid" class="navbar-menu">
    <div class="navbar-start">
      <a class="navbar-item menutext thisactive" href="/beranda">
              Beranda
            </a>
      <a class="navbar-item menutext" href="https://wa.me/6212345678"  target="_blank">
              Hubungi Kami
            </a>
    </div>

    <div class="navbar-end">
      <div class="navbar-item">
        <div class="field is-grouped">
          @guest
          @else
          <div class="dropdown is-hoverable">
            <div class="dropdown-trigger">
              <button class="button is-primary is-inverted is-outlined usermenu" aria-haspopup="true" aria-controls="dropdown-menu3">
                        <span>{{ Auth::user()->name }}</span>
                        <span class="icon is-small">
                          <i class="fas fa-angle-down" aria-hidden="true"></i>
                        </span>
                      </button>
            </div>
            <div class="dropdown-menu" id="dropdown-menu3" role="menu">
              <div class="dropdown-content">
                <a href="/profil" target="_blank" class="dropdown-item">Profil Saya</a>
                <a href="/tambah/propertisg" class="dropdown-item">Tambah Properti</a>
                <a href="/profil/gantipassword" class="dropdown-item">Ganti Password</a>
                <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                          Logout
                        </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </div>
          </div>
          @endguest
        </div>
      </div>
    </div>
  </div>
</nav>