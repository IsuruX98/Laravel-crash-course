<div>
    {{-- passing the data to delete action --}}
    <form method="POST" action="{{ route('product.delete', ['product' => $product]) }}">
        @csrf
        {{-- simulate a DELETE request --}}
        @method('delete')
        <button type="submit" class="btn btn-danger font-weight-bold">Delete</button>
    </form>
</div>
