<form method="POST" action="index.php">
    <fieldset>
        <div class="row">
            <div class="form-group col-4">
                <label for="pseudo" class="form-label mt-4" hidden>Pseudo</label>
                <input type="text" class="form-control" name="pseudo" id="pseudo" aria-describedby="pseudo" placeholder="Entrez votre pseudo">
            </div>

            <div class="form-group col-8">
                <label for="content" class="form-label mt-4" hidden>message</label>
                <textarea class="form-control" name="content" id="content" rows="3" placeholder="Entrez votre message"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Envoyer</button>

    </fieldset>
</form>