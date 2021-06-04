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
        foreach($tab as $row) {
        ?>
            <tr class="table-light">
                <td class="col-2"><?= $row['date'] ?></td>
                <td class="col-2"><?= htmlspecialchars($row['pseudo']) ?></td>
                <td class="col-8"><?= nl2br( htmlspecialchars($row['content']) ) ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
