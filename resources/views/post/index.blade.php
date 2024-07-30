@extends('layout.main')

@section('konten')
<div>
    <div
        class="row justify-content-center align-items-center my-3"
    >
        <div class="col-11 col-lg-7 bg-white rounded p-4">
            <div>
                @auth
                    <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <input type="file" class="form-control" name="image" title="post a picture">
                            @error('image')
                                <div>{{$message}}</div>
                            @enderror
                        </div>
                        <div>
                            <textarea title="your caption" name="caption" id="caption" class="form-control mb-3" placeholder="Type your caption">{{old('caption')}}</textarea>
                        </div>
                        <div
                            class="row justify-content-end align-items-center"
                        >
                            <div class="col-auto">
                                <button type="submit" class="btn px-4" style="background: #CED4DA">
                                    <span class="me-1 fw-semibold">Post</span>
                                    <i class="fa-solid fa-share"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                @endauth
                @guest
                    <div class="text-center">
                        <span class="text-danger">Please login first for make post!!!!</span>
                    </div>
                @endguest
            </div>
        </div>
    </div>
    <div
        class="row justify-content-center align-items-center g-3"
    >
        @foreach ($post as $row)
            <div class="col-11 col-lg-7 rounded p-4" style="background: #F8F9FA">
                <div class="d-flex justify-content-start align-items-center mb-3">
                    @auth
                        <a href="{{route('profile.indexSinggah', $row->user->id)}}" class="d-flex align-items-center text-decoration-none">
                            <div class="me-2">
                                <img src="{{ $row->user->image ? asset('storage/' . $row->user->image) : asset('dist/img/anonim.jpg')}}" alt="" style="border-radius: 50%; width: 50px; height:50px; object-fit: cover;">
                            </div>
                            <div>
                                <span class="text-black">{{$row->user->username}}</span>
                            </div>
                        </a>
                    @endauth
                    @guest
                        <div class="me-2">
                            <img src="{{ $row->user->image ? asset('storage/' . $row->user->image) : asset('dist/img/anonim.jpg')}}" alt="" style="border-radius: 50%; width: 50px; height:50px; object-fit: cover;">
                        </div>
                        <div>
                            <span class="text-black">{{$row->user->username}}</span>
                        </div>
                    @endguest
                    <div class="dropdown ms-auto">
                        <button class="btn dropdown-toggle no-arrow" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                                <a href="" class="dropdown-item">
                                    <i class="fa-solid fa-exclamation me-2 p-1"></i>
                                    <span>Report</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="mb-3">
                    @if ($row->image)
                        <img src="{{Storage::url($row->image)}}" alt="" style="width: 100%; height: 50%; object-fit:cover;">
                    @endif
                </div>
                <div class="mb-3">
                    <span class="text-break">{{$row->caption}}</span>
                </div>
                <div class="text-secondary">
                    <span>{{formatDate($row->tanggal)}}</span>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
