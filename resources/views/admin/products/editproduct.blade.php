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

        <form action="{{ route('admin_update_product', $editproduct->id) }}" method="POST" enctype="multipart/form-data"
            class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-md space-y-6">
            @csrf



            <!-- Product Name -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">
                    Product Name
                </label>
                <input type="text" name="product_name"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3D007A] focus:border-[#3D007A]"
                    placeholder="Enter product name" value="{{ $editproduct->name }}">
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">
                    Description
                </label>
                <textarea name="product_description" rows="5"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg resize-none focus:outline-none focus:ring-2 focus:ring-[#3D007A] focus:border-[#3D007A]"
                    placeholder="Enter product description">{{ $editproduct->description }}</textarea>
            </div>

            <!-- Price & Quantity -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-2">
                        Price
                    </label>
                    <input type="number" name="product_price"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3D007A] focus:border-[#3D007A]"
                        placeholder="0.00" value="{{ $editproduct->Price }}">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-800 mb-2">
                        Quantity
                    </label>
                    <input type="number" name="product_quantity" value="{{ $editproduct->quantity }}"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#3D007A] focus:border-[#3D007A]"
                        placeholder="0">
                </div>
            </div>

            <!-- Image Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-800 mb-2">
                    Product Image
                </label>

                <input type="file" name="product_image" class="block w-full text-sm text-gray-500
                           file:mr-4 file:py-2 file:px-4
                           file:rounded-lg file:border-0
                           file:bg-[#EDE3F9] file:text-[#3D007A]
                           hover:file:bg-[#E8ECF1]">
                <img src="{{ asset('image/product/' . $editproduct->image) }}" alt="productImage" />
            </div>


            <!-- Submit Button -->
            <div>
                <button type="submit"
                    class="bg-[#3D007A] text-white px-6 py-3 rounded-lg font-medium hover:bg-[#2C0059] transition duration-200">
                    Edit Product
                </button>
            </div>
        </form>
        @include('admin.home.footer')
        @include('admin.home.js')
</body>

</html>