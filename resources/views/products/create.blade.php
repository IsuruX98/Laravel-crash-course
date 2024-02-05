<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Product</h1>
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
    <form method="post" action="{{ route('product.store') }}">
        @csrf
        @method('post')
        <div>
            <label>Name</label>
            <input type="text" name="name" placeholder="name">
        </div>
        <div>
            <label>Qty</label>
            <input type="text" name="qty" placeholder="qty">
        </div>
        <div>
            <label>Price</label>
            <input type="text" name="price" placeholder="price">
        </div>
        <div>
            <label>Descrption</label>
            <input type="text" name="description" placeholder="descrption">
        </div>
        <div>
            <input type="submit" value="save as a new product">
        </div>
    </form>
</body>

</html>
