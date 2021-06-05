<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col" class="col-2" hidden>date</th>
            <th scope="col" class="col-2" hidden>pseudo</th>
            <th scope="col" class="col-7" hidden>message</th>
            <th scope="col" class="col-1" hidden>delete</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $message) { //var_dump($message) ?>
        <tr class="table-light">
            <td class="col-2"><?= $message['date'] ?></td>
            <td class="col-2"><?= htmlspecialchars( $message['pseudo'] ) ?></td>
            <td class="col-7"><?= nl2br( htmlspecialchars($message['content']) ) ?></td>
            <td class="col-1 text-center">
                <a href="?id=<?= $message['id'] ?>&pseudo=<?= $message['pseudo'] ?>">
                    <?= isset($_POST['pseudo']) && $_POST['pseudo'] === $message['pseudo'] ? '❌' : '' ?>
                </a>
            </td>
        </tr>
        <?php
        } ?>
    </tbody>
</table>