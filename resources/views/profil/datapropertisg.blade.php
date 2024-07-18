
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
                            <span class="has-text-dark">Lokasi :</span> {{$house->property->city}} <br>
                            <span class="has-text-dark">Harga :</span> Rp. {{number_format($house->property->amount,2)}} <br>
                            <span class="has-text-dark">Periode :</span> {{$house->property->periode}} Bulan<br>
                            <span class="has-text-dark">Tersedia :</span> {{$house->stok}} <br>
                            <span class="has-text-dark">Tersewa :</span> {{ $tersewaCount }}
                            
                        </p>
                    </div>
                </div>

                <div class="content">
                    <div class="buttons is-pulled-right">
                        <button class="button is-success is-pulled-right" onclick="window.location.href = '/profil/propertisg/{{$house->id}}/renter';">Sewa</button>
                        <button class="button is-dark is-pulled-right" onclick="window.location.href = '/propertisg/{{$house->id}}';">Lihat</button>
                        <button class="button is-warning is-pulled-right" onclick="window.location.href = '/profil/propertisg/{{$house->id}}/edit';">Edit</button>
                        <form action="/profil/propertisg/{{$house->id}}/hapus" method="post">
                            @csrf
                            <button class="button is-danger is-pulled-right" type="submit" onclick="deleteMe();">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
