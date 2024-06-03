<div class="column displaybox">
    @include('profil.navprofil')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a href="/profil">Profil</a></li>
            <li class="is-active"><a href="/profil">Semua Daftar Penyewa Properti</a></li>
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
    </div>
    <div class="card cardmargin">
        <div class="containerx">
            <h1 class="title has-text-centered">Semua Daftar Penyewa Properti</h1>
            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>Properti</th>
                        <th>Nama</th>
                        <th>Nomor HP</th>
                        <th>Alamat</th>
                        <th>Rentang Sewa</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- You can dynamically populate this tbody with rented properties -->
                    @foreach($renter as $rented_property)
                    <tr>
                        <td>{{ $rented_property->property->name }}</td>
                        <td>{{ $rented_property->renter_name }}</td>
                        <td>{{ $rented_property->renter_contact }}</td>
                        <td>{{ $rented_property->renter_address }}</td>
                        <td>{{ $rented_property->rent_start }} - {{ $rented_property->rent_end }}</td>
                        <td>
                            <form action="/profil/propertisg/{{$rented_property->id}}/rentDone" method="post">
                                @csrf
                                <button class="button is-danger" type="submit" onclick="deleteMe();">Selesai Sewa</button>
                            </form>
                        </td>
                        <td>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <br>
</div>
<script src="/js/jquery-3.3.1.min.js"></script>

<script>
    function deleteMe() {
        event.preventDefault();
        var form = event.target.form;
        Swal.fire({
            title: 'Anda Yakin?',
            text: "Data Anda tidak akan dapat dikembalikan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: "hsl(141, 71%, 48%)",
            cancelButtonColor: "hsl(348, 100%, 61%)",
            confirmButtonText: 'Ya, Lakukan Selesai Sewa!',
            cancelButtonText: 'Tidak, Batalkan!',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                
                form.submit();

            } else if (
                // Read more about handling dismissals
                result.dismiss === Swal.DismissReason.cancel
            ) {
                Swal.fire(
                    'Tindakan Dibatalkan',
                    'Data Anda Aman :)',
                    'info'
                )
            }
        });
    }
</script>

</div>
</div>
</div>
</div>