
<h2>Inscription</h2>

<form action="/index.php?c=user&a=register" method="POST">
    <label for="username">Votre pseudo</label>
    <input type="text" id="username" name="username">

    <label for="password">Votre mot de passe</label>
    <input type="password" id="password" name="password">

    <label for="passwordR">Répétez votre mot de passe</label>
    <input type="password" id="passwordR" name="passwordR">

    <input type="submit" name="submit" value="Inscription" class="button">
</form>