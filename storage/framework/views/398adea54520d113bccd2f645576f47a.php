<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Products')); ?></div>
                <div class="card-body">
                    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-success mb-3">Add Product</a>
                    <table class="table table-bordered" id="productTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Products will be injected here by JS -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<script>
    // Define the URL for the API
    var url = "<?php echo e(url('api/products/')); ?>";

    // Fetch products from the API
    fetch(url)
        .then(response => response.json())
        .then(data => {
            const tableBody = document.querySelector('#productTable tbody');
            data.forEach(product => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${product.id}</td>
                    <td>${product.name}</td>
                    <td>$${product.price}</td>
                    <td>
                        <a href="/products/${product.id}/edit" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm delete-btn" data-id="${product.id}">Delete</button>
                    </td>
                `;
                tableBody.appendChild(row);
            });

            // Add event listeners for the delete buttons
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const productId = this.getAttribute('data-id');
                    if (confirm('Are you sure you want to delete this product?')) {
                        deleteProduct(productId);
                    }
                });
            });
        })
        .catch(error => console.error('Error fetching products:', error));

    // Function to delete the product using AJAX
    function deleteProduct(productId) {
        fetch(url + '/' + productId, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            // Remove the row of the deleted product from the table
            document.querySelector(`button[data-id="${productId}"]`).closest('tr').remove();
        })
        .catch(error => {
            console.error('Error deleting product:', error);
            alert('There was an error deleting the product.');
        });
    }
</script>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\sandeep\resources\views/products/index.blade.php ENDPATH**/ ?>