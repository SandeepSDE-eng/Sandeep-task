<?php $__env->startSection('content'); ?>
<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Add Product')); ?></div>
                <div class="card-body">
                    <form id="productForm" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" required>
                        </div>

                        <div class="form-group">
                            <label for="images">Product Images</label>
                            <input type="file" class="form-control" id="images" name="images[]" multiple>
                            <div id="image-preview" class="mt-3">
                                <!-- Preview images will be appended here -->
                            </div>
                        </div>

                        <button type="button" id="saveProductBtn" class="btn btn-primary mt-3">Save Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
       // alert('1');
        // Show selected images as previews
        $('#images').on('change', function(event) {
            var files = event.target.files;
            $('#image-preview').html('');  // Clear previous previews
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imgElement = $('<img>').attr('src', e.target.result).addClass('img-thumbnail').css('width', '100px').css('margin', '5px');
                    $('#image-preview').append(imgElement);  // Append the image preview
                }
                reader.readAsDataURL(file);
            }
        });

        // Submit the form using AJAX when the "Save Product" button is clicked
        //alert('2');
        $('#saveProductBtn').click(function(e) {
           // alert('2');
            e.preventDefault();  // Prevent default form submission

            var formData = new FormData($('#productForm')[0]);  // Serialize the form data

            $.ajax({
                url: "<?php echo e(url('api/products')); ?>",  // Make sure to replace with the correct URL
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Add CSRF token
                },
                success: function(response) {
                    alert('Product created successfully');
                    console.log(response);
                    // Optionally redirect to another page or reset the form
                    window.location.href = "<?php echo e(route('products.index')); ?>";  // Redirect to product list
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    alert('Error: ' + xhr.responseText);  // Display error message
                }
            });
        });
    });
</script>

<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\projects\sandeep\resources\views/products/create.blade.php ENDPATH**/ ?>