<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un utilisateur</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javascript">

    function verify() {
    var myInputList = document.getElementsByClassName("enter-text");
    for (let e of myInputList) {

    if (e.value === null || e.value === "" || e.value === undefined) {
    alert("Please Fill All Required Fields");
    //return false;
    }
    }
    }
    document.getElementById("button-send").addEventListener("click", verify);

    </script>
</head>
<body>


<?php if (isset($_SESSION['error'])){
    ?>
    <div class="container">
        <div class="alert alert-danger" style="margin: 0 !important;"><?= $_SESSION['error'] ?></div></div>
    <?php
    unset($_SESSION['error']);
}
?>


<form method="post" action="ajoutUtilisateur.php" >
    <table border="2">
    <tr><td><label for="cin">CIN </label></td><td><input class="form-control enter-text" type="number" required name="cin" id="cin" min="1" max="99999999"></td></tr>
        <tr><td><label for=prenom>Prénom </label></td><td><input type="text" class="form-control enter-text" required  maxlength="30" name="prenom" id="prenom"></td></tr>
        <tr><td><label for="nom">Nom </label></td><td><input type="text" required class="form-control enter-text" name="nom"  maxlength="30" id="nom"></td></tr>
        <tr><td><label for="age">Age </label></td><td><input type="number" required class="form-control enter-text" name="age" id="age" min="0" max="200"></td></tr>
        <tr><td><input class="btn btn-primary" type="submit" id="button-send" onclick="verify()" value="Ajouter"></td></tr>
    </table>

</form>

</body>
</html>