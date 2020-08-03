<div class="card-body gainsboro">
    @if(!empty($listMahasiswa))
    <h1>DAFTAR MAHASISWA</h1>
    <div class="table-responsive">
        <table id="table_mahasiswa">
            <thead>
                <tr>
                    <th>Nama <img onclick="sortTable(0)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                    <th>Nim <img onclick="sortTable(1)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                    <th>Jurusan <img onclick="sortTable(2)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                    <th>Tanggal Masuk <img onclick="sortTable(3)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                    <th>Tanggal Keluar <img onclick="sortTable(4)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listMahasiswa as $row)
                    <tr>
                        <td>{{$row->nama}}</td>
                        <td>{{$row->nim}}</td>
                        <td><?php echo $row->jurusan->jurusan ?></td>
                        <td>{{\Carbon\Carbon::parse($row->TglMasuk)->format('d-m-Y')}}</td>
                        <td>@if(!empty($row->TglKeluar))
                        {{\Carbon\Carbon::parse($row->TglKeluar)->format('d-m-Y')}}
                        @endif</td>
                        <td><a href="/editMhs/{{$row['id']}}"><img width="24" height="24" src="/images/icon-editor.png"/></a>
                            <a>  |  </a>
                            <a href="/deleteMhs/{{$row['id']}}"><img width="24" height="24" src='/images/delete-button.png'/></a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>