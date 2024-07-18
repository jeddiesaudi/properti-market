<script type="text/javascript" src="/js/googlecharts.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart']});
  google.charts.setOnLoadCallback(drawCharts);

  function drawCharts() {
    drawPropertyTypeChart();
    drawStockChart();
  }

  function drawPropertyTypeChart() {
    var data = google.visualization.arrayToDataTable({!! $data !!}, false);
    var options = {'title':'Persentase Jenis Properti', 'width':450, 'height':400};
    var chart = new google.visualization.PieChart(document.getElementById('property_type_chart_div'));
    chart.draw(data, options);
  }

  function drawStockChart() {
    var data = google.visualization.arrayToDataTable({!! $graphReportData !!}, false);
    var options = {'title':'Persentase Stok Properti', 'width':450, 'height':400};
    var chart = new google.visualization.PieChart(document.getElementById('stock_chart_div'));
    chart.draw(data, options);
  }
</script>
    
<div class="column displaybox profileback">
  @include('admin.navprofile')
  <nav class="breadcrumb has-arrow-separator profileback breadcrumbcss" aria-label="breadcrumbs">
    <ul>
      <li><a class="has-text-danger" href="/admin">Admin</a></li>
      <li class="is-active"><a href="/admin">Dashboard</a></li>
    </ul>
  </nav>
  <div class="subtitle has-text-black-bis">Lihat Ringkasan</div>
  <div class="columns">
    <div class="column">
        <div id="property_type_chart_div">
        </div>
    </div>
    <div class="column">
      <div id="stock_chart_div">
      </div>
    </div> 
    <div class="column">
        <div class="columns">
          <div class="column" id="chart_province"></div>
          <div class="column" id="chart_month"></div>
        </div>
        <div class="columns">
          <div class="column" id="chart_report">
          </div>
          <div class="column" id="chart_availability"></div>
        </div>
    </div>
  </div>
  <hr>
  <div class="subtitle has-text-black-bis">Properti Terakhir</div>
  <div class="column tableshow" style="overflow-x: auto">
    <table class="table">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Properti</th>
          <th>Lokasi Properti</th>
          <th>Jenis Properti</th>
          <th>Harga Properti</th>
          <th>Periode Sewa</th>
          <th>Tersedia</th>
          <th>Tersewa</th>
          <th>Ditambah Oleh</th>
          <th>Lihat</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama Properti</th>
          <th>Lokasi Properti</th>
          <th>Jenis Properti</th>
          <th>Harga Properti</th>
          <th>Periode Sewa</th>
          <th>Tersedia</th>
          <th>Tersewa</th>
          <th>Ditambah Oleh</th>
          <th>Lihat</th>
        </tr>
      </tfoot>
      <tbody>
        @foreach ($houses as $key=>$house)
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
          <td>{{ $house->stok }}</td>
          <td>{{ $tersewaCount }}</td>
          <td>{{$house->property->user->name}}</td>
          <td><a href="/admin/propertisg/{{$house->property->id}}" class="button is-dark nounnounderlinebtn">Lihat</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <hr>
  <div class="subtitle has-text-black-bis">Registrasi User Terakhir</div>
  <div class="column tableshow style=" overflow-x: auto ">   
            <table class="table ">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama User</th>
                  <th>Email User</th>
                  <th>Kelengkapan Profil</th>
                  <th>Status</th>
                  <th>Lihat User</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama User</th>
                  <th>Email User</th>
                  <th>Kelengkapan Profil</th>
                  <th>Status</th>
                  <th>Lihat User</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach ($users as $key=>$user)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                      @if($user->NIC == null || $user->description == null || $user->address == null || $user->city == null || $user->gender == null || $user->birthday == null || $user->phoneNo == null)
                        Belum Lengkap
                      @else
                        Lengkap
                      @endif                  
                    </td>
                    <td>
                      @if($user->email_verified_at==NULL)
                        Belum Terverifikasi
                      @else
                        Terverifikasi
                      @endif
                    </td>
                  <td><a href="/admin/user/{{$user->id}}/tampil" class="button is-dark nounnounderlinebtn">Lihat User</a>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
  </div>
</div>