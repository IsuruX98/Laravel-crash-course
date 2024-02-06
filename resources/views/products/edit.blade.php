<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update a Product</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles here if needed */
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5 font-weight-bolder">Update a Product</h1>
        <div>
            {{-- Display errors --}}
            @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <form class="mt-3" method="post" action="{{ route('product.update', ['product' => $product]) }}">
            @csrf
            {{-- Simulate a PUT request --}}
            @method('put')
            <div class="form-group">
                <label for="name">Name</label>
                {{-- $product is coming from the index page --}}
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                    value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="qty">Qty</label>
                <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter quantity"
                    value="{{ $product->qty }}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price"
                    value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description"
                    placeholder="Enter description" value="{{ $product->description }}">
            </div>
            <button type="submit" class="btn mt-4 btn-dark">Update product</button>
        </form>
    </div>
</body>

</html>
