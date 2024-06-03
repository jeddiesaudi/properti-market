<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$house->property->name}} - Sabar Ganda Property</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/flickity.css"> {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600"
        rel="stylesheet">
        {{-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css"> --}}

</head>

<body>
    @include('hasil.navhasil')

    <div class="viewsection">

        <div class="column profileback">
            <div class="containerx">
                <div class="carousel carousel-main" data-flickity='{"pageDots": false }'>
                    @foreach (json_decode($house->property->images) as $image)
                    <div class="carousel-cell"><img src="/uploads/property/{{ strtolower($house->property->type) }}/{{$image}}" /></div>
                    @endforeach

                </div>

                <div class="carousel carousel-nav" data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
                    @foreach (json_decode($house->property->images) as $image)
                    <div class="carousel-cell"><img src="/uploads/property/{{strtolower($house->property->type)}}/{{$image}}" /></div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="containerx detailssection">
            <div class="columns is-flex-mobile">
                <div class="column is-two-thirds is-flex-mobile">
                    <div class="containerx">
                        <div class="is-pulled-left">
                            <div class="title">
                                {{$house->property->name}}
                            </div>
                            <div class="subtitle">
                                {{$house->property->city}}, Indonesia
                            </div>
                            <hr class="hrline">
                            <div class="subtitle has-text-weight-semibold">
                                Detail Properti
                            </div>
                            <div class="columns">
                                <div class="column detailscolumn">
                                    <p>Deskripsi: <br><span class="has-text-weight-semibold">{{$house->property->description}}</span></p>
                                </div>
                                <div class="column">
                                    <p>Jenis: <span class="has-text-weight-semibold">{{$house->property->type}}</span></p>
                                    <p>Wilayah: <span class="has-text-weight-semibold">{{$house->property->wilayah}}</span></p>
                                </div>

                                {{-- Mobile/Tablet Section --}}
                                <div class="column is-hidden-desktop">
                                    <div class='is-flex is-horizontal-center'>
                                        <figure class="image is-128x128">
                                            <img class="is-rounded is-horizontal-center" src="/uploads/avatars/{{$house->property->user->avatar}}">
                                        </figure>
                                    </div>
                                    <div class="subtitle has-text-centered"><span>@</span>{{$house->property->user->name}}</div>
                                    <div class="has-text-centered">
                                        <button class="button is-success" onclick="showPnox()">Tampilkan Kontak</button>
                                        <p class="has-text-dark customerpno" id="pnox"><a href="tel:{{$house->property->contactNo}}" class="nounnounderlinelink">{{$house->property->contactNo}}</a></p>
                                        <hr>
                                        <p class="owneramount">Harga Sewa: Rp. <span class="has-text-success has-text-weight-bold">{{number_format($house->property->amount,2)}}/{{ $house->property->periode }} Bulan</span></p>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-hidden-touch">
                    <div class='is-flex is-horizontal-center'>
                        <figure class="image is-128x128">
                            <img class="is-rounded is-horizontal-center" src="/uploads/avatars/{{$house->property->user->avatar}}">
                        </figure>
                    </div>
                    <div class="subtitle has-text-centered"><span>@</span>{{$house->property->user->name}}</div>
                    <div class="has-text-centered">
                        <button class="button is-danger" onclick="location.href='https://wa.me/62812345678/'" type="button">Whatsapp Kami</button>
                        <p class="has-text-dark customerpno" id="pno"><a href="tel:{{$house->property->contactNo}}" class="nounnounderlinelink">{{$house->property->contactNo}}</a></p>
                        <hr>
                        <p class="owneramount">Harga Sewa: Rp. <span class="has-text-danger has-text-weight-bold">{{number_format($house->property->amount,2)}}/{{ $house->property->periode }} Bulan</span></p>
                        <p class="ownerstok">Stok: <span class="has-text-danger has-text-weight-bold">{{ $house->stok }} Tersedia</span></p>
                    </div>
                </div>
            </div>
    </div>
    </div>
    {{-- Footer --}}
    @include('layouts.footer')
     {{-- JavaScript Files --}}
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/fontawesome.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/flickity.pkgd.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    @include('sweetalert::alert')
    
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