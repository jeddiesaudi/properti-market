<div class="column displaybox">
    @include('admin.navprofile')
    <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
        <ul>
            <li><a class="has-text-danger" href="/admin">Admin</a></li>
            <li class="is-active"><a href="/profil">Semua Properti</a></li>
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
            <div class="subtitle has-text-black-bis containerx">Semua Properti</div>
            <div class="column tableshow containerx" style="overflow-x: auto">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Periode</th>
                            <th>Tersedia</th>
                            <th>Tersewa</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Jenis</th>
                            <th>Harga</th>
                            <th>Periode</th>
                            <th>Tersedia</th>
                            <th>Tersewa</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if($houses->count() > 0) @foreach ($houses as $key=>$house)
                        @php
                            $tersewa = App\Transaction::where('property_id', $house->id)->get();
                            $tersewaCount = count($tersewa);
                        @endphp
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$house->property->name}}</td>
                            <td>{{$house->property->city}}</td>
                            <td>{{$house->property->type}}</td>
                            <td>{{number_format($house->property->amount,2)}}</td>
                            <td>{{$house->property->periode}} Bulan</td>
                            <td>{{$house->stok}}</td>
                            <td>{{$tersewaCount}}</td>
                            <td><a href="/admin/propertisg/{{$house->property->id}}" class="button is-dark nounnounderlinebtn" target="_blank"><i class="fas fa-external-link-square-alt"></i></a></td> 
                            <td>
                                <form action="/admin/propertisg/{{$house->property->id}}/hapus" method="post">
                                    @csrf
                                    <button class="button is-danger nounnounderlinebtn" type="submit" onclick="deleteMe();"><i class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach @endif
                    </tbody>
                </table>
                {{ $houses->links() }}
            </div>
        </div>
    </div>
</div>
<br>
<br>
</div>
<script>
    function deleteMe() {
    event.preventDefault();
    var form = event.target.form;
    Swal.fire({
        title: 'Anda Yakin?',
        text: "Data Anda tidak akan dapat dikembalikan!!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: "hsl(141, 71%, 48%)",
        cancelButtonColor: "hsl(348, 100%, 61%)",
        confirmButtonText: 'Ya, Hapus!',
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
                'Diabatalkan',
                'Data Anda Aman :)',
                'info'
            )
        }
    });
}
</script>