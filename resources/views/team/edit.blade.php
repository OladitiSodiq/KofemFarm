@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mt-md-0">
            <h1>Edit Team Member</h1>
        </div>
    </div>
    <form action="{{ route('settings.update_team_member', ['id' => $teamMember->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mt-4">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="image">Image <small>(300x300 px)</small></label>
                    <input type="file" class="form-control" id="image" name="image" onchange="loadPreview(this)">
                    <img id="image-preview" src="{{ $teamMember->image ? asset('assets/assets/Landing-page/img/' . $teamMember->image) : '#' }}" alt="Image Preview" class="img-thumbnail mt-2" style="display: {{ $teamMember->image ? 'block' : 'none' }}; width: 100%;">
                </div>
            </div>
            <div class="col-md-8">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $teamMember->name }}" required>
                    <label for="name">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="{{ $teamMember->designation }}" required>
                    <label for="designation">Designation</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="url" class="form-control" id="twitter" name="twitter" placeholder="Twitter" value="{{ $teamMember->twitter }}">
                    <label for="twitter">Twitter</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="url" class="form-control" id="facebook" name="facebook" placeholder="Facebook" value="{{ $teamMember->facebook }}">
                    <label for="facebook">Facebook</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="url" class="form-control" id="instagram" name="instagram" placeholder="Instagram" value="{{ $teamMember->instagram }}">
                    <label for="instagram">Instagram</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="LinkedIn" value="{{ $teamMember->linkedin }}">
                    <label for="linkedin">LinkedIn</label>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-success w-100">Update</button>
                </div>

            </div>

        </div>
    </form>
</div>

<script>
    function loadPreview(input) {
        const preview = document.getElementById('image-preview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
            preview.src = '';
        }
    }
</script>
@endsection
