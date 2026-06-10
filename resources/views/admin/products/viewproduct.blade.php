<html>

<head>
    @include('admin.home.css')
</head>

<body>
    @include('admin.home.header')
    @include('admin.home.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <h2 class="h5 no-margin-bottom">Dashboard</h2>
            </div>
        </div>

        <!-- table -->
        <div class="container">
            <h1>View Product</h1>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product Name</th>
                        <th>Product Description</th>
                        <th>Product Quantity</th>
                        <th>Product Prices</th>
                        <th>Product Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productlists as $list)
                        <tr>
                            <td>{{ $list->id }}</td>
                            <td>{{ $list->name }}</td>
                            <td>{{ $list->description }}</td>
                            <td>{{ $list->quantity }}</td>
                            <td>{{ $list->Price }}</td>
                            <td>
                                <img height="150" width="150" src="{{ asset('image/product/' . $list->image) }}" alt="">
                            </td>
                            <td>
                                <a href="{{ route('edit.product', $list->id) }}">Edit</a>
                                <a href="{{ route('delete.product', $list->id) }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('admin.home.footer')
        @include('admin.home.js')
</body>

</html>