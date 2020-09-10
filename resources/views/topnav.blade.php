<div class="topnav">
    <button id="student" class="btn myBtn" onclick="openModal(this.id)">Import Student</button>
    <div class="modal">
        <div class="modal-content">
            <span id="close-s" class="close-md" onclick="closeModal(this.id)">&times;</span>
            <form style="border: 4px solid #a1a1a1;padding: 5px;" action="{{ url('importstudent') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                <button class="btn btn-import" style="float:right" onclick="success()">Import Student</button>
                @csrf
                <input type="file" name="Students" required="required" />
            </form>
        </div>
    </div>
    <button id="teacher" class="btn myBtn" onclick="openModal(this.id)">Import Teacher</button>
    <div class="modal">
        <div class="modal-content">
            <span id="close-t" class="close-md" onclick="closeModal(this.id)">&times;</span>
            <form style="border: 4px solid #a1a1a1;padding: 5px;" action="{{ url('importteacher') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                <button class="btn btn-import" style="float:right" onclick="success()">Import Teacher</button>
                @csrf
                <input type="file" name="Teachers" required="required" />
            </form>
        </div>
    </div>
    <div id="snackbar">Import Successfully</div>
</div>