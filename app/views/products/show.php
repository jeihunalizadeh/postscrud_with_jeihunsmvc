<?php require APPROOT . '\views\inc\header.php'; ?>
<h1 class="float-left mt-5">Read a Product</h1>
<a href="<?php echo URLROOT;?>products" class="btn btn-primary float-right mt-5">Show all products</a>
<table class="table table-bordered table-hover  table-dark mt-5">
<tr>
  <td>Product Name</td>
  <td><?php echo $data['product']->name; ?></td>
</tr>
<tr>
  <td>Price</td>
  <td><?php echo $data['product']->price;?></td>
</tr>
<tr>
  <td>Description</td>
  <td><?php echo $data['product']->description?></td>
</tr>
<tr>
  <td>Category</td>
  <td><?php echo $data['product']->category_id;?></td>
</tr>

</table>






<?php require APPROOT . '\views\inc\footer.php'; ?>