<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sabar Ganda Property</title>

    {{-- CSS Files --}}
    <link rel="stylesheet" href="/css/bulma.min.css">
    <link rel="stylesheet" href="/css/custom.css">
    <link rel="stylesheet" href="/css/bootstrap.css">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css?family=Exo+2:300i,400,400i,500,500i,600|Kanit:300,300i,400,400i,500,500i,600" rel="stylesheet">
</head>
<body>

    <div class="column is-full is-mobile backgroundimg">
        <div class="container">
            <div class="column is-mobile is-centered">
                @include('layouts.navmaster')
            </div>
        </div>
        <br>
        <div class="container">
            <div class="columns is-mobile is-centered">
               <div class="column is-8 searchbox">
                   <h1 class="subtitle is-4 has-text-white searchboxtitletext">Cari Properti</h1>
                   <div class="tabs">
                    <ul>
                      <li class="is-active has-background-danger tabitem">
                        <a href="/beranda">
                                  <span class="has-text-white">Properti</span>
                                </a>
                      </li>
                    </ul>
                  </div>

                  {{-- Search Box --}}
                <form method="POST" action="/propertisg/cari">
                  @csrf
                    <div class="field has-addons searchinput">
                        <p class="control has-icons-left is-expanded">
                          <input class="input is-large inputsearchbox" type="text" placeholder="Cari berdasarkan Nama, Lokasi, atau Jenis Properti" id="search" name="searchquery">
                          <span class="icon is-small is-left">
                            <i class="fas fa-search"></i>
                          </span>
                        </p>
                        <div class="control">
                            <button class="button inputsearchbox is-danger is-large"><span class="subtitle is-6 has-text-white">Cari</span></button>
                        </div>
                    </div>
                    <div class="is-hidden-touch">
                    <div class="field has-addons">
                        <div class="control has-icons-left">
                            <div class="select selectbox is-small">
                                <select name="minprice">
                                <option value="0">Harga(Min)</option>
                                <option value="1000000">1 Juta</option>
                                <option value="2000000">2 Juta</option>
                                <option value="3000000">3 Juta</option>
                                <option value="4000000">4 Juta</option>
                                <option value="5000000">5 Juta</option>
                                <option value="6000000">6 Juta</option>
                                <option value="7000000">7 Juta</option>
                                <option value="8000000">8 Juta</option>
                                <option value="9000000">9 Juta</option>
                                <option value="10000000">10 Juta</option>
                                <option value="50000000">50 Juta</option>
                                <option value="100000000">100 Juta</option>
                                <option value="200000000">200 Juta</option>
                                <option value="1000000000">1 Miliar</option>
                                <option value="50000000000">50 Miliar</option>
                                <option value="100000000000">100 Miliar</option>
                                </select>
                            </div>
                            <span class="icon is-small is-left">
                              <i class="fas fa-dollar-sign"></i>
                            </span>
                        </div>
                        <div class="control has-icons-left">
                          <div class="select selectbox is-small">
                              <select name="maxprice">
                                <option value="9999999999999999999999999999999">Harga(Maks)</option>
                                <option value="1000000">1 Juta</option>
                                <option value="2000000">2 Juta</option>
                                <option value="3000000">3 Juta</option>
                                <option value="4000000">4 Juta</option>
                                <option value="5000000">5 Juta</option>
                                <option value="6000000">6 Juta</option>
                                <option value="7000000">7 Juta</option>
                                <option value="8000000">8 Juta</option>
                                <option value="9000000">9 Juta</option>
                                <option value="10000000">10 Juta</option>
                                <option value="50000000">50 Juta</option>
                                <option value="100000000">100 Juta</option>
                                <option value="200000000">200 Juta</option>
                                <option value="1000000000">1 Miliar</option>
                                <option value="50000000000">50 Miliar</option>
                                <option value="100000000000">100 Miliar</option>
                              </select>
                          </div>
                          <span class="icon is-small is-left">
                            <i class="fas fa-dollar-sign"></i>
                          </span>
                        </div>
                        <div class="control has-icons-left">
                          <div class="select selectbox is-small">
                              <select name="periode">
                              <option value="0">Periode</option>
                              <option value="3">3 Bulan</option>
                              <option value="6">6 Bulan</option>
                              <option value="12">12 Bulan</option>
                              </select>
                          </div>
                          <span class="icon is-small is-left">
                            <i class="far fa-clock"></i>
                          </span>
                        </div>
                    </div>
                    <br>
                    </div>
                </form>
               </div>
               <div class="column is-2 adbox">
                 <p class="has-text-white is-5">
                    Butuh Bantuan?
                 </p>
                 <br>
                 <p class="has-text-white">
                  Jika Anda belum mengetahui tentang cara kerja platform ini, Anda cukup menghubungi kami untuk mendapatkan informasi lebih lanjut.
                 </p>
                 <br>
                 <p class="control">
                    <a class="button is-primary is-inverted is-outlined loginbutton" href="https://wa.me/6212345678"  target="_blank">
                      <span>Hubungi Kami</span>
                    </a>
                  </p>
               </div>
            </div>
            <div class="has-text-centered indexicon">
                <span class="icon has-text-white is-large">
                  <i class="fas fa-home fa-5x has-text-danger"></i>
                </span>
                <h4 class="has-text-white"><span class="has-text-danger">Temukan</span> Properti Impian Kamu</h4>
            </div>
        </div>
    </div>


    {{-- Deatils Section  --}}
    <div class="columns is-mobile is-centered details">
      <div class="column"></div>
      <div class="column has-text-centered">
        <span class="is-centered has-text-primary">
          <i class="fas fa-hand-holding-usd fa-5x has-text-danger"></i>
        </span>
        <br>
        <div class="subtitle marginten">
          Pelayanan Sewa
        </div>
        <span class="has-text-dark">
          Menyewakan Properti yang layak huni, nyaman dan aman.
        </span>
      </div>
      <div class="column has-text-centered">
        <span class="is-centered has-text-primary">
            <i class="fa fa-list fa-5x has-text-danger"></i>
        </span>
        <br>
        <div class="subtitle marginten">
          List Properti
        </div>
        <span class="has-text-dark">
          Memiliki List Properti sesuai dengan lokasi yang Anda inginkan.
        </span>
      </div>
      <div class="column has-text-centered">
        <span class="is-centered has-text-primary">
            <i class="fa fa-gavel fa-5x has-text-danger"></i>
        </span>
        <br>
        <div class="subtitle marginten">
          Persewaan Legal
        </div>
        <span class="has-text-dark">
          Menyewakan Properti secara legal.
        </span>
      </div>
      <div class="column"></div>
    </div>

    {{-- List House Section  --}}
    <div class="column is-full is-mobile backgroundimg">
      <div class="container">
        <div class="column displaybox">
          <div class="containerx">
            <div class="grayme">
                <div class="row">
                  @foreach ($houses as $house)
                  <div class="col-sm-4 col-sm-3 center-responsive">
                    <div class="column is-gaps is-12">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img src="/uploads/property/{{ strtolower($house->property->type) }}/{{json_decode($house->property->images)[0]}}" alt="Placeholder image">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-left">
                                    </div>
                                    <div class="media-content">
                                        <p class="is-6">
                                            <span class="has-text-dark">Nama :</span> {{$house->property->name}} <br>
                                            <span class="has-text-dark">Jenis :</span> {{$house->property->type}} <br>
                                            <span class="has-text-dark">Lokasi :</span> {{$house->property->city}} <br>
                                            <span class="has-text-dark">Harga :</span> Rp. {{number_format($house->property->amount,2)}} <br>
                                            <span class="has-text-dark">Periode :</span> {{$house->property->periode}} Bulan<br>
                                            <span class="has-text-dark">Tersedia :</span> {{$house->stok}}</p>
                                    </div>
                                </div>
                                <div class="content">
                                    <small class media-left>{{$house->property->created_at->diffForHumans()}}</small>
                                    <div class="buttons is-pulled-right">
                                        <button class="button is-danger is-pulled-right" onclick="window.open('/propertisg/{{$house->id}}','_blank');">Lihat</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    {{-- Photo Frame Section --}}
    <div class="columns">
      <div class="column image is-2by1 childrenimg">
        
      </div>
      <div class="column colorred">
        <h1 class="subtitle is-1 has-text-white has-text-centered maketheir">Sabar Ganda Property</h1>
        <div class="column">
          <div class="column">
            <p class="has-text-white has-text-centered">
              Sabar Ganda Property adalah perusahaan yang bergerak di bidang persewaan properti, properti yang disewakan bisa berupa ruko, rumah dan lainnya.<br><br>
              Properti yang disewakan memiliki lingkungan yang bersih, nyaman dengan harga merakyat atau lebih murah di banding kompetitor lainnya.
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- Footer --}}
    @include('layouts.footer')


      {{-- JavaScript Files --}}
      <script src="/js/jquery-3.3.1.min.js"></script>
      <script src="/js/fontawesome.js"></script>
</body>
</html>