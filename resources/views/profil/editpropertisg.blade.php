<div class="column displaybox">
    @include('profil.navprofil')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a href="/profil">Profil</a></li>
            <li class="is-active"><a href="/profil">Edit Properti</a></li>
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
            <h1 class="title has-text-centered">Edit Properti</h1>
            <form method="POST" action="" enctype="multipart/form-data">
                @csrf
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <div class="control">
                                <label for="name">Nama Properti</label>
                            <input class="input is-primary" type="text" name="name" value="{{$house->property->name}}">
                            <input name="propertyid" value="{{$house->property->id}}" hidden>
                            <input name="houseid" value="{{$house->id}}" hidden>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label for="name">Harga Properti/Periode <strong>(Rupiah)</strong></label>
                                <input class="input is-primary" type="text" name="amount" value="{{$house->property->amount}}">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label for="name">Kabupaten/Kota</label>
                                <input class="input is-primary" type="text" name="city" value="{{$house->property->city}}">
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <label for="name">Deskripsi Properti</label>
                                <textarea name="description" class="textarea is-primary"> {{$house->property->description}}</textarea>
                            </div>
                        </div>
                       
                        {{-- Image Upload Section --}}
                        <div class="field">
                            <div class="control">
                                <label for="img">Foto <strong class="is-small">(Tips: Upload Lebih dari satu Foto [Maks
                                    Ukuran: 4MB])</strong></label>
                                <div class="contetnt">
                                    <div class="row columns">
                                            @foreach (json_decode($house->property->images) as $image)
                                            <div class="column"><img src="/uploads/property/{{ strtolower($house->property->type) }}/{{$image}}" /></div>
                                            @endforeach
                                    </div>
                                </div>
                                <br>
                                <div class="input-group control-group increment">
                                    <input type="file" name="filename[]" class="form-control">
                                    <div class="input-group-btn">
                                        <button class="button is-success addmore" type="button"><i class="glyphicon glyphicon-plus"></i>Lebih Banyak</button>
                                    </div>
                                </div>

                                <div class="clone hide">
                                    <div class="control-group input-group" style="margin-top:10px">
                                        <input type="file" name="filename[]" class="form-control">
                                        <div class="input-group-btn">
                                            <button class="button is-danger removepic" type="button"><i class="glyphicon glyphicon-remove"></i> Hapus</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- next column start here --}}
                    <div class="column">
                        
                        
                        <div class="field">
                            <div class="control">
                                <label for="name">Periode Sewa</label>
                                <br>
                                <div class="select is-primary">
                                    <select name="periode">
                                    <option selected value="{{$house->property->periode}}">{{$house->property->periode}} Bulan</option>
                                    <option value="3">3 Bulan</option>
                                    <option value="6">6 Bulan</option>
                                    <option value="12">12 Bulan</option>
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="field">
                            <div class="control">
                                <label for="name">Stok</label>
                                <input class="input is-primary" type="number" name="stok" value="{{$house->stok}}">
                            </div>
                        </div>
                        
                        <div class="field">
                            <div class="control is-pulled-right">
                                <button type="submit" class="button is-success">
                               Simpan Perubahan
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