<div style="font-size:14px">
    {{ $list_teacher->links() }}
</div>
<div class="table-responsive">
    <table id="table_teacher">
        <thead>
            <tr>
                <th>Nama <img onclick="sortTable(0, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Teacher Id <img onclick="sortTable(1, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Alamat <img onclick="sortTable(2, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Kota <img onclick="sortTable(3, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Tanggal Lahir <img onclick="sortTable(4, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>No Telp <img onclick="sortTable(5, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Mapel <img onclick="sortTable(6, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Tanggal Masuk <img onclick="sortTable(7, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Tanggal Keluar <img onclick="sortTable(8, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list_teacher as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->teacher_id}}</td>
                    <td>{{$row->address}}</td>
                    <td>{{$row->city}}</td>
                    <td>{{\Carbon\Carbon::parse($row->birth_date)->format('d-m-Y')}}</td>
                    <td>{{$row->phone}}</td>
                    <td><?php echo $row->courses->course ?></td>
                    <td>{{\Carbon\Carbon::parse($row->in_date)->format('d-m-Y')}}</td>
                    <td>@if(!empty($row->TglKeluar))
                        {{\Carbon\Carbon::parse($row->out_date)->format('d-m-Y')}}
                    @endif</td>
                    <td><a href="/editMhs/{{$row['id']}}"><img width="20" height="20" src="/images/icon-editor.png"/></a>
                        <a>  |  </a>
                        <a href="/deleteMhs/{{$row['id']}}"><img width="20" height="20" src='/images/delete-button.png'/></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>