<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Update a Product</h1>
    <div>
        {{-- this is how you to catch and diplay errors --}}
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
    {{-- route is what the form should do in the contoller so this form call to the update route
        with product data then it pass that to the contoller --}}
    <form method="post" action="{{ route('product.update', ['product' => $product]) }}">
        @csrf
        {{-- simulate a PUT request. The actual HTTP method should be "post" in the form --}}
        @method('put')
        <div>
            <label>Name</label>
            {{-- $product is coming from the index page --}}
            <input type="text" name="name" placeholder="name" value="{{ $product->name }}">
        </div>
        <div>
            <label>Qty</label>
            <input type="text" name="qty" placeholder="qty" value="{{ $product->qty }}">
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="price" value="{{ $product->price }}">
        </div>
        <div>
            <label>Descrption</label>
            <input type="text" name="description" placeholder="descrption" value="{{ $product->description }}">
        </div>
        <div>
            <input type="submit" value="Update product">
        </div>
    </form>
</body>

</html>
