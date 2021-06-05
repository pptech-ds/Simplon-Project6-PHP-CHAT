<form method="POST" action="index.php#submitID">
    <fieldset>
        <div class="row">
            <div class="form-group col-4">
                <label for="pseudo" class="form-label mt-4" hidden>Pseudo</label>
                <input type="text" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : '' ?>" class="form-control"
                    name="pseudo" id="pseudo" aria-describedby="pseudo" placeholder="Entrez votre pseudo">
            </div>

            <div class="form-group col-8">
                <label for="content" class="form-label mt-4" hidden>message</label>
                <textarea class="form-control" name="content" id="content" rows="3"
                    placeholder="Entrez votre message"></textarea>
            </div>
        </div>

        <button type="submit" id="submitID" class="btn btn-primary mb-5">Envoyer</button>

        <?php if($errors !== []) {
            foreach($errors as $key => $val){ ?>
        <div class="alert alert-dismissible alert-warning">
            <p class="mb-0"><?= $val ?></p>
        </div>
        <?php  }
        } ?>

    </fieldset>
</form>