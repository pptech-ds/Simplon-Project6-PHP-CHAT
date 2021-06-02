<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="col-2" hidden>date</th>
            <th scope="col" class="col-2" hidden>pseudo</th>
            <th scope="col" class="col-8" hidden>message</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < 5; $i++) {
        ?>
            <tr class="table-light">
                <td class="col-2">date <?= $i ?></td>
                <td class="col-2">user <?= $i ?></td>
                <td class="col-8">message <?= $i ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>