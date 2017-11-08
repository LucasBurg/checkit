<div>
<h3>Formulário do Bloco</h3> 
<?= form_open('/bloco', array('autocomplete' => 'off')) ?>
    <div>
        <label for="">Nome:</label>
        <input type="text" name="nom" id="nom">
    </div>
    <br>
    <div>
        <button type="submit">Salvar</button>
        <?= anchor('/bloco/list', 'Voltar a lista') ?>
    </div>
<?= form_close() ?>
</div>