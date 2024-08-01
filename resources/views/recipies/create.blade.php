<x-layout>
    <div class="container card pb-2 my-3">
        <h2>Add Your Recipie</h2>
        <form method="post" enctype="multipart/form-data" action="{{route('createRec')}}">
            @csrf
            <style>
                h5{
                    display: inline;
                }
            </style>
                <div class="form-group mt-3">
                    <h5 for="title">Name:</h5>
                    <input type="text" class="form-control" value="{{old('title')}}" name="title" >
                    @error('title')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <h5 for="content">Description:</h5> (Upto 20 words)
                    <input class="form-control" value="{{old('description')}}" name="description"></input>
                    @error('description')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <h5 for="content">Time to cook:</h5> (in minutes)
                    <input class="form-control" type="number" value="{{old('time_to_cook')}}" name="time_to_cook"></input>
                    @error('time_to_cook')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <h5 for="title">Ingredients:</h5> (Use , for separated values)
                    <input type="text" class="form-control" value="{{old('ingredients')}}" name="ingredients" >
                    @error('ingredients')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <h5 for="title">How to Cook:</h5>
                    <input type="text" class="form-control" value="{{old('how_to_cook')}}" name="how_to_cook" ></input>
                    @error('how_to_cook')
                        <div class="form-text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3 ">
                    <H5 for="image">Image:</H5>
                    <input type="file" class="form-control-file" name="image" accept="image/*" >
                    @error('image')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
                </div>
            <button type="submit" class="btn btn-success mt-2">Submit</button>
        </form>
    </div>
</x-layout>