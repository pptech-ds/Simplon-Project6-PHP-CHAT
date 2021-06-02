<form method="POST" action="index.php">
    <fieldset>
        <table>
            <tbody>
                <tr>
                    <td valign="top">
                        <div class="form-group">
                            <input type="text"  name="pseudo" class="form-control" id="pseudo" aria-describedby="pseudoHelp" placeholder="Entrez votre pseudo" required="">
                        </div>
                    </td>
                    <td>
                        <div class="form-group">
                            <textarea name="message" class="form-control" id="message" rows="8" cols="45" placeholder="Entrez votre message" ></textarea>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <button type="submit" name="send" value="Envoyer" class="btn btn-primary">Submit</button>
    </fieldset>
</form>