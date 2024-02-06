<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product CRUD Operations</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles here if needed */
    </style>
</head>

<body>
    <div class="container">
        <h1 class="mt-5">Product CRUD Operations</h1>
        <div class="mt-3">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="mt-3">
            <div class="mb-3">
                <a class="btn btn-dark font-weight-bold" href="{{ route('product.create') }}">Create a Product</a>
            </div>
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- $products are coming from the controller using the model --}}
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
                                <a class="btn btn-dark font-weight-bold"
                                    href="{{ route('product.edit', ['product' => $product]) }}">Edit</a>
                            </td>
                            <td>
                                {{-- passing the data to delete action --}}
                                <form method="POST" action="{{ route('product.delete', ['product' => $product]) }}">
                                    @csrf
                                    {{-- simulate a DELETE request --}}
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger font-weight-bold">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Pagination links -->

            {{-- if you want to use a different pagination links() run -> php artisan vendor:publish --tag=laravel-pagination
                 and use a proper one
            --}}
            <div class="">
                {{ $products->links('vendor.pagination.bootstrap-5') }}
            </div>

        </div>
    </div>
</body>

</html>
