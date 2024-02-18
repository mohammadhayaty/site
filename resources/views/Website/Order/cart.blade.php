@extends("Website.cartinvoice")
@section("main")

    <div class="container  mt-5 mb-5">
        <div class="row justify-content-center">
        @if($cart->count > 0)
            <div class="col-lg-9">
                <div class="card-custom-3">
                    <div class="table-responsive">
                        <table class="table align-middle cart-table">
                            <thead>
                                <th scope="col">Num</th>
                                <th scope="col">Product</th>
                                <th scope="col">Count</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Total Price</th>
                                <th scope="col">#</th>
                            </thead>
                            <tbody>
                                @foreach($cart->products as $key => $item)
                                    <tr>
                                        <td>
                                            {{ $key + 1 }}
                                        </td>
                                        <td>
                                            <a href="{{ $item['product']->hrefUrl }}">
                                                <img src="{{ $item['product']->imageShow }}" class="item-icon">
                                                <span class="title">{{ $item['product']->title }}</span>
                                            </a>
                                        </td>
                                        <td>
                                            <form action="{{ route("updateCart" , ['product' => $item['product']->id]) }}" method="post">
                                                @csrf
                                                @method("PATCH")
                                                <div class="d-inline-block me-1">
                                                    <input type="number" name="count" id="count" class="form-control" value="{{ $item['count'] }}">
                                                </div>
                                                <div class="d-inline-block">
                                                    <button class="btn btn-warning">Update</button>
                                                </div>
                                            </form>
                                        </td>
                                        <td>
                                            {{ $item['product']->priceShow }} $
                                        </td>
                                        <td>
                                            {{ number_format($item['product']->price * $item['count']) }} $
                                        </td>
                                        <td>
                                            <form action="{{ route("removeFromCart" , ['product' => $item['product']->id]) }}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-danger">Remove</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row justify-content-end mt-3">
                        <div class="col-auto">
                            {{ number_format($cart->price) }} $
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route("addAddress") }}" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address </label>
                                    <textarea name="address" id="address" class="form-control" placeholder="Address"></textarea>
                                </div>
                                <div>
                                    <button class="btn btn-success">Invoice</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-auto">
                <a class="btn btn-warning " href="{{ route("home") }}">سبد خرید شما خالیست!</a>
            </div>
        @endif
        </div>
    </div>
@endsection
