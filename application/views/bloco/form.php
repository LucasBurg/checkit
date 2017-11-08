<?php
    $bloco = $page_var['bloco'];
?>
<div>
<h3>Formulário do Bloco</h3> 
<?= form_open('/bloco', array('autocomplete' => 'off')) ?>
    <?php if (isset($bloco['id'])) : ?>
        <input type="hidden" name="id" value="<?=set_value('id', $bloco['id'])?>">
    <?php endif; ?>
    <div>
        <label for="">Nome:</label>
        <input type="text" name="nom" id="nom" value="<?= set_value('nom', $bloco['nom'])?>">
    </div>
    <br>
    <div>
        <button type="submit">Salvar</button>
        <?= anchor('/bloco/list', 'Voltar a lista') ?>
    </div>
<?= form_close() ?>
</div>