<div class="topnav">
    <a href="#importStudent" class="myBtn">Import Student</a>
    <div class="modal">
        <div class="modal-content">
            <span class="close-md">&times;</span>
            <form style="border: 4px solid #a1a1a1;padding: 5px;" action="{{ url('importstudent') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                <button class="btn btn-primary" style="float:right" onclick="success()">Import Student</button>
                @csrf
                <input type="file" name="Students" required="required" />
            </form>
        </div>
    </div>
    <a href="#importTeacher" class="myBtn">Import Teacher</a>
    <div class="modal">
        <div class="modal-content">
            <span class="close-md">&times;</span>
            <form style="border: 4px solid #a1a1a1;padding: 5px;" action="{{ url('importteacher') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                <button class="btn btn-primary" style="float:right" onclick="success()">Import Teacher</button>
                @csrf
                <input type="file" name="Teachers" required="required" />
            </form>
        </div>
    </div>
    <div id="snackbar">Import Successfully</div>
</div>