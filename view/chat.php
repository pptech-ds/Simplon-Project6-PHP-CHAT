<h1> Live Chat Amazin </h1>

<table class="table table-hover">
  
  <tbody>
<?php for ($i = 0; $i <= 5; $i++) { ?>
    <tr class="table-secondary">
      <td>date <?= $i ?></td>
      <td>user <?= $i ?></td>
      <td>message <?= $i ?></td>
    </tr>
<?php } ?>
    
  </tbody>
</table>