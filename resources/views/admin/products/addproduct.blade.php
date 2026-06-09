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
        <form action="{{ route('admin_add_products') }}" method="POST" enctype="multipart/form-data"
            class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md space-y-6">
            @csrf

            <!-- Product Name -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Product Name
                </label>
                <input type="text" name="product_name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter product name">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Description
                </label>
                <textarea name="product_description" rows="5"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Enter product description"></textarea>
            </div>

            <!-- Price & Quantity -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Price
                    </label>
                    <input type="number" name="product_price"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="0.00">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                        Quantity
                    </label>
                    <input type="number" name="product_quantity"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="0">
                </div>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">
                    Product Image
                </label>

                <input type="file" name="product_image" class="block w-full text-sm text-gray-500
                   file:mr-4 file:py-2 file:px-4
                   file:rounded-lg file:border-0
                   file:bg-indigo-50 file:text-indigo-700
                   hover:file:bg-indigo-100">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition duration-200">
                    Add Product
                </button>
            </div>
        </form>
        @include('admin.home.footer')
        @include('admin.home.js')
</body>

</html>