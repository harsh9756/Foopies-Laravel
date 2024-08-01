<x-layout>
    <div>
        <h1 class="text-center">Latest Recipes</h1>
        <hr style="color: cyan;">
        <div class="container">
            <div class="row">
                <style>
                    img{
                        aspect-ratio:3/2;
                    }
                </style>
                @foreach ($recipes as $recipe)
                <div class="card p-1 col-lg-3 col-sm-6 col-6 mx-lg-1 rounded-3">
                        <div class="badge rounded-pill bg-success  position-absolute top-0 end-0 m-2">
                            <span >{{ $recipe->time_to_cook." m" }}</span>
                        </div>
                            <img src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="Recipe Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $recipe->title }}</h5>
                            <hr class="my-2">
                            <h6 class="card-subtitle mb-1 text-muted">{{ $recipe->created_at->format('M d, Y') }}</h6>
                            <p class="card-text"><small class="text-muted">By {{ $recipe->user->name }}</small></p>
                            <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-primary">View Recipe</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
