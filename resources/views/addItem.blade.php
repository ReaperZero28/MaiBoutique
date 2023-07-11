@extends('homeTemplate')

@section('title')
<title>Maiboutique - Add Item</title>
@endsection

@section('content-1')
<div class="mainContent">
    <div class="containter d-flex flex-wrap justify-content-around pt-3 px-3">
        <div class="card shadow-sm" style="width: 36vw;">
            <div class="card-body">
                <form action="/add-item/processing" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 text-center">
                        <h2>Add Item</h2>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Clothes Image</label>
                        <input type="file" class="form-control @error('image')
                        is-invalid
                        @enderror" name="image" id="inputImage">
                        @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Clothes Name</label>
                        <input type="text" class="form-control @error('name')
                        is-invalid
                        @enderror" name="name" id="inputName" placeholder="5-20 characters">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Clothes Description</label>
                        <input type="text" class="form-control @error('desc')
                        is-invalid
                        @enderror" name="desc" id="inputDesc" placeholder="min. 5 characters">
                        @error('desc')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Clothes Price (in IDR)</label>
                        <input type="text" class="form-control @error('price')
                        is-invalid
                        @enderror" name="price" id="inputPrice" placeholder="min. IDR 1000">
                        @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Clothes Stock</label>
                        <input type="number" class="form-control @error('stock')
                        is-invalid
                        @enderror" name="stock" id="inputStock" min="1" value="1">
                        @error('stock')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success" style="width: 100%;">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
