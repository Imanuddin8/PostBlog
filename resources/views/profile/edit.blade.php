@extends('layout.main')

@section('konten')
<div
    class="row justify-content-center align-items-center mt-3"
>
    <div class="col-11 col-lg-8 p-3 rounded" style="background: #F8F9FA">
        <h3 class="text-center mb-4">Edit your post</h3>
        <form action="{{ route('profile.updatePost', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Form Inputs -->
            <div class="mb-3">
                <label for="caption" class="form-label fw-bold fs-5">Caption :</label>
                <input type="file" name="image" class="form-control">
                <small class="form-text text-muted">Choose file if you want to change the image.</small>
                @if ($post->image)
                    <div class="mt-2">
                        <img src="{{Storage::url($post->image)}}" alt="current image" style="width:50%;height:50%;object-fit:cover">
                    </div>
                @endif
                @error('image')
                    <div>{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="caption" class="form-label fw-bold fs-5">Caption :</label>
                <textarea title="caption" name="caption" id="caption" class="form-control" rows="3">{{$post->caption}}</textarea>
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <a href="{{route('profile.index', auth()->user()->id)}}" class="btn btn-secondary px-5 me-2">
                    <span>Cencel</span>
                </a>
                <button type="submit" class="btn btn-warning px-5">
                    <span>Edit</span>
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
