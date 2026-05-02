
    <div class="container">
        <h2>Add Product</h2>
     
        <form action="index.php?page=productController" method="POST" enctype="multipart/form-data">

            <!-- Common Fields -->
            <input type="text" name="name" placeholder="Product Name">
            <input type="number" name="price" placeholder="Price">
            <input type="file" name="image">
            <input type="text" name="description" placeholder="description">

            <!-- Type -->
            <select id="type" name="type">
                <option value="">Select Type</option>
                <option value="books">Book</option>
                <option value="babyCars">Baby Car</option>
            </select>

            <!-- Book Fields -->
            <div id="bookFields" class="hidden">
                <input type="text" name="writer" placeholder="Writer">
                <input type="text" name="publisher" placeholder="Publisher">
                <input type="text" name="color" placeholder="color">
                <input type="text" name="supplier" placeholder="supplier">
            </div>

            <!-- BabyCar Fields -->
            <div id="babyCarFields" class="hidden">
                <input type="number" name="age" placeholder="Age">
                <input type="number" name="weight" placeholder="Weight">
                <input type="text" name="material" placeholder="Material">
            </div>

            <button type="submit">Save Product</button>

        </form>

    </div>

    