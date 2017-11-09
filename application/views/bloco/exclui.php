<?php
    $url = base_url("/bloco/excluir/{$page_var['id']}");
?>
<h3>Excluir</h3>
<?= form_open($url) ?>
    <p>Deseja excluir o registro <b><?=$page_var['descricao']?></b>?</p>
    <input type="hidden" name="id" value="<?= set_value('id', $page_var['id']) ?>">
    <button type="submit">Excluir</button>
    <?= anchor('/bloco/list', 'Voltar a lista') ?>
<?= form_close() ?>