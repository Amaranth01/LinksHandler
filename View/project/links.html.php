<h2>Ajoutez un lien</h2>

<form action="/index.php?c=links&a=add-link" method="POST">
    <label for="title">Titre de notre lien</label>
    <input type="text" name="title" id="title">

    <label for="link">Votre lien</label>
    <input type="text" name="link" id="link">

    <label for="img">L'image de votre lien</label>
    <input type="file" name="img" id="img" alt="image">

    <input type="submit" name="submit" value="Enregistrer le lien">
</form>