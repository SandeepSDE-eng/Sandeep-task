<?php $__env->startSection('title', 'Welcome Page'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


<?php $__env->startSection('content'); ?>
<div class="row">
    <aside class="col-lg-9">
        <div class="card">
            <div class="table-responsive">
                <table class="table table-borderless table-shopping-cart">
                    <thead class="text-muted">
                        <tr class="small text-uppercase">
                            <th>Product</th>
                            <th width="120">Quantity</th>
                            <th width="120">Price</th>
                            <th class="text-right d-none d-md-block" width="200"></th>
                        </tr>
                    </thead>
                    <tbody id="product-list">
                        <!-- Product rows will be injected here by JS -->
                    </tbody>
                </table>
            </div>
        </div>
    </aside>


</div>

<?php $__env->stopSection(); ?>


<script>
  // Fetch products from the API
var url = "<?php echo e(url('api/products/')); ?>";
fetch(url)
    .then(response => response.json())
    .then(products => {
        const productList = document.getElementById('product-list');

        products.forEach(product => {
            const row = document.createElement('tr');

            // Handle images for the product
            let imagesHtml = '';
            console.log('==',product);
            if (product.images.length > 0) {
                // Loop through each image and create an image tag
                product.images.forEach(image => {
                    imagesHtml += `
                        <img src="${image.image_path}" class="img-sm" alt="${product.name}">
                    `;
                });
            } else {
                // Display a placeholder if no images are available
                imagesHtml = `<img src="path/to/placeholder.jpg" class="img-sm" alt="No image available">`;
            }

            // Set product details including images, size, and price
            row.innerHTML = `
                <td>
                    <figure class="itemside align-items-center">
                        <div class="aside">${imagesHtml}</div>
                        <figcaption class="info">
                            <a href="#" class="title text-dark">${product.name}</a>
                            <p class="text-muted small">SIZE: ${product.size || 'N/A'} <br> Brand: ${product.brand || 'N/A'}</p>
                        </figcaption>
                    </figure>
                </td>
                <td>
                    <select class="form-control" data-product-id="${product.id}">
                        <option>1</option><option>2</option><option>3</option><option>4</option>
                    </select>
                </td>
                <td>
                    <div class="price-wrap">
                        <var class="price">$${product.price}</var>
                        <small class="text-muted">$${product.discounted_price || product.price} each</small>
                    </div>
                </td>
                <td class="text-right d-none d-md-block">
                    <button class="btn btn-light add-to-cart" data-product-id="${product.id}">Add to Cart</button>
                </td>
            `;

            // Append the row to the table
            productList.appendChild(row);
        });

        // Handle Add to Cart button click
        document.querySelectorAll('.add-to-cart').forEach(button => {
            button.addEventListener('click', function() {
                const productId = this.getAttribute('data-product-id');
                const quantity = this.closest('tr').querySelector('select').value;

                // Add the product to the cart via AJAX
                addToCart(productId, quantity);
            });
        });
    })
    .catch(error => console.error('Error fetching products:', error));


// Function to add product to the cart
function addToCart(productId, quantity) {
    var url = "<?php echo e(url('api/cart/')); ?>";
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ product_id: productId, quantity: quantity })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);  // Check the response in the console
        alert('Product added to cart!');
        updateCart();
    })
    .catch(error => console.error('Error adding to cart:', error));
}

// Function to update cart display (and cart count in the header)
function updateCart() {
    var url = "<?php echo e(url('api/cart/')); ?>";

    fetch(url)
        .then(response => response.json())
        .then(cart => {
            let totalItems = 0;
            cart.forEach(item => {
                totalItems += item.quantity;
            });

            // Update the cart count in the header
            document.getElementById('cartcount').textContent = totalItems;

            // Optionally, update the cart display (price, items, etc.)
            // UpdateCartDetails(cart);
        })
        .catch(error => console.error('Error fetching cart:', error));
}
   </script>

<?php echo $__env->make('layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\sandeep\resources\views/welcome.blade.php ENDPATH**/ ?>