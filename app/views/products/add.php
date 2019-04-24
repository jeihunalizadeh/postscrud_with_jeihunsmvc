<?php require APPROOT . '/views/inc/header.php'; ?>
  <a href="<?php echo URLROOT; ?>products" class="btn btn-light"><i class="fa fa-backward"></i> Back</a>
  <div class="card card-body bg-light mt-5">
    <h2>Add Product</h2>
    <p>Create a product with this form</p>
    <form action="<?php echo URLROOT; ?>products/add" method="post">
      <div class="form-group">
        <label for="name">Name: <sup>*</sup></label>
        <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
      </div>
      <div class="form-group">
        <label for="description">Description: <sup>*</sup></label>
        <textarea name="description" class="form-control form-control-lg <?php echo (!empty($data['desc_err'])) ? 'is-invalid' : ''; ?>"><?php echo $data['description']; ?></textarea>
        <span class="invalid-feedback"><?php echo $data['desc_err']; ?></span>
      </div>
      <div class="form-group">
          <label for="price">Price: <sup>*</sup></label>
          <input type="number" name="price" class="form-control form-control-lg <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value= "<?php echo $data['price']; ?>">
          <span class="invalid-feedback"><?php echo $data['price_err']; ?></span>
        </div>
        
            <!-- <label for="category_id">Category: <sup>*</sup></label>
            <select class="form-control" name="category_id">
                <option>Select Category...</option> -->

         
      <input type="submit" class="btn btn-success" value="Submit">
    </form>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>