<?php require APPROOT . '\views\inc\header.php'; ?>



<table class="table table-hover table-dark mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
     <?php foreach($data['products'] as $product)  :   ?>
    <tr>
      <th scope="row"><?php echo $product->id; ?></th>
      <td><?php echo $product->name; ?></td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>

<?php  endforeach; ?>

  </tbody>
</table>




<?php require APPROOT . '\views\inc\footer.php'; ?>