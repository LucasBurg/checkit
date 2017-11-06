<div>
    <?=form_open(base_url('/pessoa'), array('autocomplete' => 'off'))?>
        <label for="">Nome:</label><input type="text" name="nom" id="nom"><?=form_error('nom')?><br>
        <label for="">Senha:</label><input type="password" name="sen" id="sen"><br>
        <button type="submit">Cadastrar</button>
    <?=form_close()?>
</div>