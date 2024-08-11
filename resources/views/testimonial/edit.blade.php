@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-3 mt-md-0">
            <h1>Edit Testimonial</h1>
        </div>
    </div>
    <form action="{{ route('settings.update_testimonial', ['id' => $testimonial->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row mt-4">

            <div class="col-md-4">
                <div class="form-group">
                    <label for="image">Image <small>(300x300 px)</small></label>
                    <input type="file" class="form-control" id="image" name="image" onchange="loadPreview(this)">
                    <img id="image-preview" src="{{ $testimonial->image ? asset('assets/assets/Landing-page/img/' . $testimonial->image) : '#' }}" alt="Image Preview" class="img-thumbnail mt-2" style="display: {{ $testimonial->image ? 'block' : 'none' }}; width: 100%;">
                </div>
            </div>
            <div class="col-md-8">

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $testimonial->name }}" required>
                    <label for="name">Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="feedback" name="feedback" placeholder="Feedback" value="{{ $testimonial->feedback }}" required>
                    <label for="feedback">Feedback</label>
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
