<?php
    $unidade = $page_var['unidade'];
?>
<div>
<h3>Formulário Unidade</h3> 
<?= form_open(current_url(), array('autocomplete' => 'off')) ?>
    <?php if (isset($unidade['id'])) : ?>
        <input type="hidden" name="id" value="<?=set_value('id', $unidade['id'])?>">
    <?php endif; ?>
    <div>
        <label for="">Nome:</label>
        <input type="text" name="nom" id="nom" value="<?= set_value('nom', $unidade['nom'])?>">
    </div>
    <br>
    <div>
        <button type="submit">Salvar</button>
        <?= anchor('/unidade/list', 'Voltar a lista') ?>
    </div>
<?= form_close() ?>
</div>