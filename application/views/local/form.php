<?php
    $local = $page_var['local'];
?>
<div>
<h3>Formulário do local</h3>
<?= form_open('/local', array('autocomplete' => 'off')) ?>
    <?php if (isset($local['id'])) : ?>
        <input type="hidden" name="id" value="<?=set_value('id', $local['id'])?>">
    <?php endif; ?>
    <div>
        <label for="">Nome:</label>
        <input type="text" name="nom" id="nom" value="<?= set_value('nom', $local['nom'])?>">
    </div>
    <br>
    <div>
        <button type="submit">Salvar</button>
        <?= anchor('/local/list', 'Voltar a lista') ?>
    </div>
<?= form_close() ?>
</div>
