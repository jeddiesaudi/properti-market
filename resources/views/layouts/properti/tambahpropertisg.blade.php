<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Properti - Sabar Ganda Property</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/bootstrap.css">

    {{-- Google Fonts --}}
    <link
        href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet">
    <style>
        #map {
            height: 300px;
        }
    </style>
</head>

<body>
    @include('hasil.navhasil')
    <br>
    <div class="title has-text-centered">Tambah Properti</div>
    <br>
    <div class="container">
        <div class="columns is-mobile is-centered">
            <div class="column is-8">
                @include('layouts.errors')
                @if(session()->has('message'))
                <div class="notification is-success">
                    <button class="delete"></button>
                    <h1 class="is-size-4"><b> {{ session()->get('message') }}</b></h1>
                </div>
                @endif
            </div>
        </div>

        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            <div class="columns">
                <div class="column">
                    <div class="field">
                        <div class="control">
                            <label for="name">Nama Properti</label>
                            <input class="input is-primary {{ $errors->has('name') ? ' is-danger' : '' }}" type="text"
                                name="name" value="{{ old('name') }}">
                            @if ($errors->has('name'))
                            <span>
                                <strong class="has-text-danger">{{ $errors->first('name') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label for="name">Jenis Properti</label>
                            <br>
                            <div class="select is-primary is-full {{ $errors->has('type') ? ' is-danger' : '' }}">
                                <select name="type">
                                    <option value="Rumah">Rumah</option>
                                    <option value="Ruko">Ruko</option>
                                </select>
                                @if ($errors->has('type'))
                                <span>
                                    <strong class="has-text-danger">{{ $errors->first('type') }}</strong>
                                </span> @endif
                            </div>

                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label for="city">Kabupaten/Kota</label>
                            <input class="input is-primary {{ $errors->has('city') ? ' is-danger' : '' }}" type="text"
                                name="city" value="{{ old('city') }}">
                            @if ($errors->has('city'))
                            <span>
                                <strong class="has-text-danger">{{ $errors->first('city') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label for="name">Deskripsi Properti</label>
                            <textarea name="description" class="textarea is-primary {{ $errors->has('description') ? ' is-danger' : '' }}" value="{{ old('description') }}"></textarea>
                            @if ($errors->has('description'))
                            <span>
                                <strong class="has-text-danger">{{ $errors->first('description') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    {{-- Image Upload Section --}}
                    <div class="field">
                        <div class="control">
                            <label for="img">Foto <strong class="is-small">(Tips: Upload Lebih dari satu Foto [Maks
                                    Ukuran: 4MB])</strong></label>
                            <div class="input-group control-group increment">
                                <input type="file" name="filename[]" class="form-control">
                                <div class="input-group-btn">
                                    <button class="button is-dark addmore" type="button"><i
                                            class="glyphicon glyphicon-plus"></i>Lebih Banyak</button>
                                </div>
                            </div>

                            <div class="clone hide">
                                <div class="control-group input-group" style="margin-top:10px">
                                    <input type="file" name="filename[]" class="form-control">
                                    <div class="input-group-btn">
                                        <button class="button is-danger" type="button"><i
                                                class="glyphicon glyphicon-remove"></i> Hapus</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('filename'))
                                <span>
                                    <strong class="has-text-danger">{{ $errors->first('filename') }}</strong>
                                </span> @endif
                    </div>
                </div>
                {{-- next column start here --}}
                <div class="column">
                    <div class="field">
                        <div class="control">
                            <label for="name">Harga Properti/Periode <strong>(Rupiah)</strong></label>
                            <input class="input is-primary {{ $errors->has('amount') ? ' is-danger' : '' }}" type="text" name="amount" value="{{ old('amount') }}">
                            @if ($errors->has('amount'))
                            <span>
                                <strong class="has-text-danger">{{ $errors->first('amount') }}</strong>
                            </span> @endif
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label for="periode">Periode Sewa</label>
                            <br>
                            <div class="select is-primary is-full {{ $errors->has('periode') ? ' is-danger' : '' }}">
                                <select name="periode">
                                    <option value="3">3 Bulan</option>
                                    <option value="6">6 Bulan</option>
                                    <option value="12">12 Bulan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label for="stok">Stok</label>
                            <input class="input is-primary {{ $errors->has('stok') ? ' is-danger' : '' }}" type="number" name="stok" value="{{ old('stok') }}">
                            @if ($errors->has('stok'))
                                <span>
                                    <strong class="has-text-danger">{{ $errors->first('stok') }}</strong>
                                </span> @endif
                        </div>
                    </div>
                    <div class="field">
                        <div class="control is-pulled-right">
                            <button type="submit" class="button is-dark">
                                Tambah Properti
                            </button>
                            <button type="reset" class="button is-warning">
                                Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <br>
    <br>
    </div>
    {{-- Footer --}}
    @include('layouts.footer') {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
    
          $(".addmore").click(function(){ 
              var html = $(".clone").html();
              $(".increment").after(html);
          });
    
          $("body").on("click",".is-danger",function(){ 
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
</body>

</html>