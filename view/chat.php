<table class="table table-hover">
    <thead>
        <tr>
        <th scope="col" hidden>date</th>
        <th scope="col" hidden>pseudo</th>
        <th scope="col" hidden>message</th>
        </tr>
  </thead>
  <tbody>
<?php for ($i = 0; $i <= 5; $i++) { ?>
    <tr class="table-light">
      <td>date <?= $i ?></td>
      <td>user <?= $i ?></td>
      <td>message <?= $i ?></td>
    </tr>
<?php } ?>
    
  </tbody>
</table>