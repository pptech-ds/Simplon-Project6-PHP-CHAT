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
        // foreach($tab as $num => $row) {
        $startMessage = 0;
        $maxMessageToShow = 10;
        if(count($tab) > $maxMessageToShow) {
            $startMessage = count($tab)-$maxMessageToShow;
        }
        for($i=$startMessage; $i<count($tab); $i++){
        ?>
            <tr class="table-light">
                <td class="col-2"><?= $tab[$i]['date'] ?></td>
                <td class="col-2"><?= htmlspecialchars($tab[$i]['pseudo']) ?></td>
                <td class="col-8"><?= nl2br( htmlspecialchars($tab[$i]['content']) ) ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
