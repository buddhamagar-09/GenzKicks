<html>

<head>
    @include('admin.home.css')
    <style>
        .div_deg {
            padding: 15px;
        }

        label {
            display: inline-block;
            width: 150px;
        }

        input {
            width: 500px;

        }
    </style>
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
        <form action="{{ route('admin_add_products') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="div_deg">
                <label>Product Name</label>
                <input type="text" name="product_name">
            </div>

            <div class="div_deg">
                <label>Description</label>
                <textarea style="width: 500px; height: 100px;" name="product_description"></textarea>
            </div>

            <div class="div_deg">
                <label>Price</label>
                <input type="number" name="product_price">
            </div>

            <div class="div_deg">
                <label>Quantity</label>
                <input type="number" name="product_quantity">
            </div>

            <div class="div_deg">
                <label>Image</label>
                <input type="file" name="product_image">
            </div>

            <div class="div_deg">
                <input type="submit" value="Add Product" class="btn btn-success">
            </div>
        </form>
        @include('admin.home.footer')
        @include('admin.home.js')
</body>

</html>