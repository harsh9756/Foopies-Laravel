<x-layout>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-success text-center text-white">
                <h2>Edit Profile</h2>
            </div>
            <form action="{{ route('profsave') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                        @error('name')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                        @error('username')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                    <div class="mb-1">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $user->email }}">
                        @error('email')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mb-2">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
