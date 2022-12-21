@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">

        <div class="pull-right">
            <a class="btn btn-primary"  href="{{ url('/products') }}"> Back</a>
        </div>
    </div>
</div>


<form action="{{ route('products.update',$product->id) }}" method="POST">
    @csrf   
    @method('PUT')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{$product->description}}" required autocomplete="description">
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-3">
                            <label for="category" class="col-md-4 col-form-label text-md-end">{{ __('Category') }}</label>
                            <div class="col-md-6">
                                <label  id="category" for="category" required autocomplete="category" class="col-form-label text-md-end">
                                    <label for="category"></label>
                                    <select id="category" name="category">
                                      <option value="automoveis">Automoveis</option>
                                      <option value="brinquedos">Brinquedos</option>
                                      <option value="eletronicos">Eletronicos</option>
                                      <option value="outros">Outros</option>
                                    </select>
                                @error('category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="quantity" class="col-md-4 col-form-label text-md-end">{{ __('Quantity') }}</label>

                            <div class="col-md-6">
                                <input id="number" type="number" min="1"  class="form-control @error('quantity') is-invalid @enderror" name="quantity" required autocomplete="quantity">

                                @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>
                            <div class="col-md-6">
                                <input id="price" type="number" min="0.01" class="form-control" step=".01" name="price" required autocomplete="price">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="hide" class="col-md-4 col-form-label text-md-end">{{ __('Hide') }}</label>
                            <div class="col-md-6">
                                <label  id="hide" for="hide" required autocomplete="hide" class="col-form-label text-md-end">
                                    <label for="hide"></label>
                                    <select id="hide" name="hide">
                                      <option value="no">No</option>
                                      <option value="yes">Yes</option>
                                    </select>
                                @error('hide')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit Product') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection