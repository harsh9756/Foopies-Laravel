<x-layout>
    <section class="container mt-5 p-1">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header bg-success text-center text-white">
                <h2>Profile Information</h2>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" value="{{ $user->username }}" readonly>
                </div>
                <div class="mb-1">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                </div>
            </div>
            <div class="d-flex justify-content-around">
                <a href="{{ route('edit') }}" class="btn btn-danger mb-2">Edit</a>
            </div>
        </div>
    </section>
    <section class="container card my-2 py-2">
        <div class="d-flex justify-content-between">
            <h3>Your Recipies</h3>
            <a href="{{ route('createRec') }}" class="btn btn-success">Post New Recipie</a>
        </div>
        <hr>
        @if ($recipes->isEmpty())
            No Recipies Yet
        @else
        <div class="row">
            <style>
                img{
                    aspect-ratio:3/2;
                }
            </style>
            @foreach ($recipes as $recipe)
            <div class="card p-1 col-lg-3 col-sm-6 col-6 mx-lg-1 rounded-3">
                <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="Recipe Image">
                <div class="card-body">
                    <h5 class="card-title">{{ $recipe->title }}</h5>
                    <hr class="m-2">
                    <p class="card-text">{{ Str::limit($recipe->description,20) }}</p>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $recipe->created_at->format('M d, Y') }}</h6>
                    <a href="{{ route('recipe.delete', $recipe->id) }}" class="btn btn-danger">Delete</a>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </section>
</x-layout>
