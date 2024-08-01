<x-layout>
    <div class="container">
        <div class="card">
            <!-- Badge for cooking time -->
            <img style="aspect-ratio:3/2" src="{{ asset('storage/' . $recipe->image) }}" class="card-img-top" alt="Recipe Image">
            <div class="card-body">
                <h1 class="card-title">{{ $recipe->title }}</h1>
                <span class="">Time: {{ $recipe->time_to_cook." min" }}</span>
                <hr style="border-top: 1px solid black;">
                <p class="card-text">{{ $recipe->description }}</p>
                <h5>Ingredients:</h5>
                <p>{{ $recipe->ingredients }}</p>
                <h5>How to Cook:</h5>
                <p>{{ $recipe->how_to_cook }}</p>
                <h6>Posted by: {{ $recipe->user->name }}</h6>
                <p class="card-text"><small class="text-muted">Posted on {{ $recipe->created_at->format('M d, Y') }}</small></p>
            </div>
        </div>
</x-layout>