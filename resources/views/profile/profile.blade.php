@extends('layout.main')

@section('konten')
    <div
        class="row justify-content-center align-items-center rounded py-4 mt-3" style="background: #F8F9FA"
    >
        <div class="col-11">
            <div class="d-flex justify-content-start align-items-center mb-3">
                <div class="me-2">
                    <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('dist/img/anonim.jpg') }}" alt="photo profile" style="border-radius: 50%; width: 100px; height:100px; object-fit: cover;">
                    {{-- <img src="{{ $user->image ? asset('storage/' . $user->image) : asset('dist/img/anonim.jpg') }}" alt="photo profile" style="border-radius: 50%; width: 100px; height:100px; object-fit: cover;"> --}}
                </div>
                <div>
                    <span class="fw-bold fs-3">{{$user->name}}</span>
                </div>
                <div class="ms-auto">
                    <a href="{{route('profile.edit', $user->id)}}" class="btn btn-secondary" title="Edit profile">
                        <i class="fa-solid fa-user-pen fs-3 ps-2"></i>
                    </a>
                </div>
            </div>
            <div style="max-width: 40rem">
                <span class="fw-semibold">{{$user->username}}</span>
                <p class="text-break">{{$user->deskripsi}}</p>
            </div>
            <div>
                <h4 class="mb-3">My Post</h4>
                <div
                    class="row justify-content-center align-items-center g-3"
                >
                    @forelse ($post as $row)
                        <div class="col-12 p-4 text-white rounded" style="background: #6C757D">
                            <div class="d-flex justify-content-start align-items-center mb-3">
                                <div class="me-2">
                                    <img src="{{ $row->user->image ? asset('storage/' . $row->user->image) : asset('dist/img/anonim.jpg') }}" alt="photo profile" style="border-radius: 50%; width: 50px; height:50px; object-fit: cover;">
                                </div>
                                <div>
                                    <span>{{$row->user->username}}</span>
                                </div>
                                <div class="dropdown ms-auto">
                                    <button class="btn dropdown-toggle no-arrow" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-vertical text-white"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="" class="dropdown-item">
                                                <i class="fa-solid fa-exclamation me-2 p-1"></i>
                                                <span>Report</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{route('profile.editPost', $row->id)}}" class="dropdown-item">
                                                <i class="fa-solid fa-pen-to-square me-2"></i>
                                                <span>Edit</span>
                                            </a>
                                        </li>
                                        <li>
                                            <form action="{{ route('profile.deletePost', $row->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fa-solid fa-trash me-2"></i>
                                                    <span>Delete</span>
                                                </button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mb-3">
                                @if ($row->image)
                                    <div class="d-flex justify-content-center">
                                        <img src="{{Storage::url($row->image)}}" alt="" style="width: 50%; height: 50%; object-fit:cover;">
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <span class="text-break">{{$row->caption}}</span>
                            </div>
                            <div class="">
                                <span style="color: #E6E6E6;">{{formatDate($row->tanggal)}}</span>
                            </div>
                        </div>
                    @empty
                    <div class="col-12 text-center">
                        <span class="fw-bold fs-3 text-secondary">No Post</span>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
