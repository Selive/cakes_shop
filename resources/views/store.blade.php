<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('head')
    <body>
        @include('nav')
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card text-dark">
                                <a href="#"><img class="card-img-top" style="height: 250px" src="/img/tort_{{ $product->id }}.png"></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a class="text-dark" href="#">{{ $product->name }}</a>
                                    </h4>
                                    <h5>{{ $product->price }} руб.</h5>
                                </div>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                <button type="button" cake="{{ $product->id }}" class="btn btn-primary add-to-cart">Добавить в корзину</button>
                                <button type="button" cake="{{ $product->id }}" class="btn btn-primary delete-from-cart" style="display: none;"><i class="fas fa-backspace"></i></button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
