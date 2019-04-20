
<?php require APPROOT . '\views\inc\header.php'; ?>
<br>
<br>
<div class="card w-50 p-2 m-auto text-center ">
  <div class="card-body bg-dark text-white">
   <p><?php echo $data['description']; ?></p>
    <article><?php echo $data['extra']; ?></article>
   JeihunsMVC framework version: <strong><?php echo $data['version']; ?></strong>
  </div>
</div>


<?php require APPROOT . '\views\inc\footer.php'; ?>




