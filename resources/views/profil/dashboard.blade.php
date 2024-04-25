<div class="column displaybox profileback">
        @include('profil.navprofil')
        <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
            <ul>
                <li><a href="/profil">Profil</a></li>
                <li class="is-active"><a href="/profil">Dashboard</a></li>
            </ul>
        </nav>
        @if($user->NIC==null || $user->description==null || $user->address==null || $user->city==null || $user->gender==null || $user->NIC==null || $user->birthday==null || $user->phoneNo==null)
        <div class="columns is-mobile is-centered content">
            <div class="column is-half">
                <div class="notification is-warning">
                    <button class="delete"></button> {{ __('Silahkan lengkapi Biodata Anda,')
                    }} <a href="/profil/editprofil">Klik Disini</a></div>

            </div>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
                        $notification = $delete.parentNode;
                        $delete.addEventListener('click', () => {
                            $notification.parentNode.removeChild($notification);
                        });
                    });
                });
            </script>
        </div>
      @endif
        <div class="columns dashboxes profileback">
            <div class="column has-text-centered selecticon" onclick="location.href='/tambah/propertisg'">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-home fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Tambah Properti</h6>
            </div>
            <div class="column has-text-centered selecticon" onclick="location.href='/profil/editprofil'">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-edit fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Edit Profil</h6>
            </div>
            <div class="column has-text-centered selecticon" onclick="location.href='/profil/terjual'">
              <span class="iicon has-text-centered is-large">
                <i class="far fa-check-circle fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Properti Terjual</h6>
            </div>
            <div class="column has-text-centered selecticon" onclick="location.href='/'">
              <span class="icon has-text-centered is-large">
                <i class="fas fa-search fa-4x"></i>
              </span>
              <h6 class="is-uppercase has-text-weight-bold">Cari</h6>
            </div>
        </div>
        
    </div>
