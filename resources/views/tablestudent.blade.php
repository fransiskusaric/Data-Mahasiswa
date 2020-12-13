<div class="page" style="font-size:14px">
    {{ $list_student->links() }}
</div>
<div class="table-responsive">
    <table id="table_student">
        <thead>
            <tr>
                <th>Nama <img onclick="sortTable(0, true)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Student Id <img onclick="sortTable(1, true)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Alamat <img onclick="sortTable(2, true)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Kota <img onclick="sortTable(3, true)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Tanggal Lahir <img onclick="sortTable(4, true)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>No Telp <img onclick="sortTable(5, true)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Tanggal Masuk <img onclick="sortTable(6, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Tanggal Keluar <img onclick="sortTable(7, false)" class="icon-img" width="12" height="12" src="/images/sort.png" /></th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($list_student as $row)
                <tr>
                    <td>{{$row->name}}</td>
                    <td>{{$row->student_id}}</td>
                    <td>{{$row->address}}</td>
                    <td>{{$row->city}}</td>
                    <td>{{\Carbon\Carbon::parse($row->birth_date)->format('d-m-Y')}}</td>
                    <td>{{$row->phone}}</td>
                    <td>{{\Carbon\Carbon::parse($row->in_date)->format('d-m-Y')}}</td>
                    <td>@if(!empty($row->grades->enroll_date))
                        {{\Carbon\Carbon::parse($row->grades->grad_date)->format('d-m-Y')}}
                    @endif</td>
                    <td><a href="/studentinformation/detailstudent/{{$row['s_id']}}" class="edit"><img width="20" height="20" src="/images/icon-editor.png"/></a>
                        <a>  |  </a>
                        <a href="/studentinformation/deletestudent/{{$row['s_id']}}" class="delete"><img width="20" height="20" src='/images/delete-button.png'/></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>