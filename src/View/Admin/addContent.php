<?php
$form->prepare();

?>

<form name="formAddContent" method="post">

    <input type="text" name="title" value="<?php echo $form->get('title')->getValue(); ?>" />
    <?php
    foreach($form->getMessages() as $name => $message) {
        if ('title' == $name) {
            var_dump($message);
        }
    }
    ?>

<input type="hidden" name="csrf" value="<?php echo $form->get('csrf')->getValue(); ?>" />
<input type="submit" name="Ajouter" value="Ajouter" />
</form>


<!--<form action='../src/controller/affichage.php' method="POST">-->
<!--    <textarea class="input-block-level" id="summernote" name="content"></textarea>-->
<!--    <input type="submit" id="create" class="btn btn-default" name="submit" value="Créer">-->
<!--</form>-->
