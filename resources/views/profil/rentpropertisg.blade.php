<div class="column displaybox">
    @include('profil.navprofil')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a href="/profil">Profil</a></li>
            <li class="is-active"><a href="/profil">Sewa Properti</a></li>
        </ul>
    </nav>
    <div class="columns is-mobile is-centered">
        <div class="column is-half">
    @include('layouts.errors') @if(session()->has('message'))
            <div class="notification is-success">
                <button class="delete"></button>
                <h1 class="is-size-7"><b> {{ session()->get('message') }}</b></h1>
            </div>
            @endif
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
    <div class="card cardmargin">
        <div class="containerx">
            <style>
                #map {
                    height: 300px;
                }
            </style>
            <h1 class="title has-text-centered">Sewa Properti <br>{{ $house->property->name }}</h1>
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="columns">
                    <div class="column">
                        <input name="property_id" value="{{$house->property->id}}" hidden>
                        <div class="field">
                            <div class="control">
                                <label for="renter_name">Nama Penyewa</label>
                            <input class="input is-primary" type="text" name="renter_name">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label for="renter_contact">Nomor HP Penyewa</label>
                                <input class="input is-primary" type="number" name="renter_contact">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label for="renter_address">Alamat Penyewa</label>
                                <textarea name="renter_address" class="textarea is-primary"></textarea>
                            </div>
                        </div>     
                    </div>
                    {{-- next column start here --}}
                    <div class="column">  
                        <div class="field">
                            <div class="control">
                                <label for="rent_start">Tanggal Mulai Sewa</label>
                                <input class="input" type="date" name="rent_start">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label for="rent_start">Tanggal Selesai Sewa</label>
                                <input class="input" type="date" name="rent_end">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control is-pulled-right">
                                <button type="submit" class="button is-success">
                                    Simpan
                                </button>
                                <button type="reset" class="button is-danger">
                                    Batal
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <br>
    <br>
</div>
<script src="/js/jquery-3.3.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
    
          $(".addmore").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });
    
          $("body").on("click",".removepic",function(){ 
              $(this).parents(".control-group").remove();
          });
    
        });
</script>
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
</div>
</div>
</div>