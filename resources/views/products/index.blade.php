<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Product CRUD Operations</h1>
    <div>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        <div>
            <a href="{{ route('product.create') }}">Create a Product</a>
        </div>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>

            {{-- $products are coming from the contoller using the model --}}

            {{-- iterating the product details --}}
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        {{-- passing the data to edit page --}}
                        <a href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                    </td>
                    <td>
                        {{-- passing the data to edit page --}}
                        <form method="POST" action="{{ route('product.delete', ['product' => $product]) }}">
                            @csrf
                            {{-- simulate a PUT request. The actual HTTP method should be "post" in the form --}}
                            @method('delete')
                            <input type="submit" value="delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>

</html>
