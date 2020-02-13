<?php session_start() ?>
<h1>Edit your profil</h1>

<form method="POST" action="">
    <label>E-mail</label> : <input type="email" name="emailedit" value="<?php echo $_SESSION['email']?>"/>
    <label>Mot de passe</label> : <input type="text" name="passwordedit" value=""/>
    <button action="submit">Edit</button>
    <a href="profil">Go back <--</a>
</form>

<form action="delete" method="POST">
<button type="submit" value="delete">Delete</button>
</form>