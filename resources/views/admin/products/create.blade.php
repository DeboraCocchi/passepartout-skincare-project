@extends('layouts.app')

@section('content')
    <div class="content-container">
        <div class="container-fluid">

            <div><h2>Aggiungi un nuovo prodotto</h2></div>
                <form action="{{route('admin.products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                 <div class="row mt-5">

                    <div class="col-7">
                        <label for="name" class="form-label">Nome <span class="purple">*</span></label>
                        <input type="text" class="form-control" id="name" id="name" name="name" aria-describedby="name" value="{{old('name')}}">
                        @error('name')
                                    <p class="invalid-feedback">{{$message}}</p>
                        @enderror

                    </div>
                    <div class="col-4 ">
                        <label for="brand" class="form-label">Brand </label>
                        <input type="text" class="form-control" id="brand"  name="brand" aria-describedby="brand" value="{{old('brand')}}">

                    </div>
                    <div class="col-4 mt-3">
                        <label for="price" class="form-label">Prezzo (&euro;) <span class="purple">*</span></label>
                        <input type="number" class="form-control" id="price" step="0.01" aria-describedby="price" name="price" value="{{old('price')}}">
                        @error('price')
                                    <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-3 mt-5">
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>Scegli una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->type}}</option>
                            @endforeach


                          </select>
                    </div>

                    <div class="col-4 mt-3">
                         <label for="code" class="form-label">Codice prodotto  <span class="purple">*</span></label>
                        <input type="text" class="form-control" id="code" name="code" aria-describedby="code" value="{{old('code')}}">
                        @error('code')
                                    <p class="invalid-feedback">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="col-6 mt-3">
                        <div class="col-12">
                            <label for="image" class="form-label">Immagine prodotto<span class="purple">*</span></label>
                            <input
                            onchange="showImage(event)"
                            type="file" class="form-control @error('image') is-invalid @enderror"  id="image" name="image" value="{{old('image')}}">
                            @error('image')
                                <p class="invalid-feedback">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-12 mt-3 mb-4">
                            <label for="description" class="form-label">Descrizione prodotto <span class="purple">*</span></label>
                            <textarea class="form-control" placeholder="Leave a comment here" id="description" name="description" style="height: 160px"></textarea>
                        </div>

                    </div>
                    <div class="col-5 mt-3">
                        <label for="product-img" class="form-label">Anteprima immagine </label>
                            <img id="product-img" class="h-100 w-100">

                    </div>
                    <button type="submit" class="btn btn-dark mt-3 mb-5 ms-2" style="width:200px" id="create">Aggiungi prodotto</button>
                </div>
            </form>


            </div>
        </div>
    </div>
@endsection

<script>
     function showImage(event){
            const tagImage = document.getElementById('product-img');
            tagImage.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
