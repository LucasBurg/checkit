<?php
$pessoa = $page_var['pessoa'];
//var_dump($pessoa);
$id = $pessoa['id'];
$nom = $pessoa['nom'];
$url = base_url("pessoa/list/");
?>

<div>
    <?=form_open(base_url("pessoa/excluir/{$id}"))?>
        <label>Tem certeza que deseja excluir <?= $nom ?>?</label><input type="hidden" name="id" value="<?= $id ?>"><br>
        <button type="submit">Sim</button><?php echo anchor($url, 'voltar'); ?>
    <?=form_close()?>

</div>
