@extends("Dashboard.app")
@section("title" , "Product Index")

@section("main")

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card-custom-1">
                    <div class="table-responsive">
                        <table class="table caption-top">
                            <caption>
                                Product Index
                                <a href="{{ route("dashboard.product.create") }}" class="d-inline-block ml-2">
                                    Create
                                </a>
                            </caption>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">title</th>
                                    <th scope="col">price</th>
                                    <th scope="col">image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row">
                                            <a class="btn btn-warning" href="{{ route("dashboard.product.edit", ['product' => $product->id]) }}">
                                                Edit
                                            </a>
                                            <form class="d-inline-block ml-2" method="post" action="{{ route("dashboard.product.destroy" , ['product' => $product->id]) }}">
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </th>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ number_format($product->price) }}</td>
                                        <td>
                                            <img src="{{ $product->imageShow }}" class="table-img">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       <p>{{$user->name}}</p> 
                       <h1>{{$user->email}}</h1>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="col-auto">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
