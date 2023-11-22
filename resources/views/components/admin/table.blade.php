@props(['btnCreateActive' => ''])
<button class="btn btn-dark">
                    <a href="{{ route('products.create') }}">Create</a>
                </button>
<table class="display nowrap" id="table-products">
    <thead>
        <tr>
            <th></th>
            <th>Id</th>
            <th>Name</th>
            <th>brand</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
            <th>New</th>
            <th>Image</th>
            <th>Create_at</th>
            <th>Updated_at</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
          <th>Id</th>
            <th>Name</th>
            <th>brand</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Category</th>
            <th>New</th>
            <th>Image</th>
            <th>Create_at</th>
            <th>Updated_at</th>
            <th>edit</th>
            <th>delete</th>
        </tr>
    </tfoot>
</table>
