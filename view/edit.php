<h2>Cập nhật thông tin khách hàng</h2>
<form method="post" action="index.php?page=edit">
    <input type="hidden" name="id" value="<?php echo $product->id; ?>"/>
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="<?php echo $product->productName; ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label>Producer</label>
        <textarea name="producer" class="form-control"><?php echo $product->productProducer; ?></textarea>
    </div>
    <div class="form-group">
        <label>Price</label>
        <textarea name="price" class="form-control"><?php echo $product->productPrice; ?></textarea>
    </div>
    <div class="form-group">
        <label>Quantity</label>
        <textarea name="quantity" class="form-control"><?php echo $product->productQuantity; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary"/>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
</form>
