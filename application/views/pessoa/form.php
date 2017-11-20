<?php
$pessoa = null;
if (!empty($page_var)) {
    $pessoa = $page_var['pessoa'];
}
?>
<div>
    <?=form_open(current_url(), array('autocomplete' => 'off'))?>
    <?=form_hidden('id', (isset($pessoa['id'])) ? $pessoa['id'] : '')?>
    <table>
        <tbody>
            <tr>
                <td><label for="nom">Nome:</label></td>
                <td><input type="text" name="nom" id="nom" value="<?= set_value('nom',$pessoa['nom']) ?>" ><?=form_error('nom')?></td>
            </tr>
            <tr>
                <td><label for="usu">Usuário:</label></td>
                <td><input type="text" name="usu" id="usu" value="<?= set_value('usu',$pessoa['usu']) ?>" ><?=form_error('usu')?></td>
            </tr>
            <tr>
                <td><label for="sen">Senha:</label></td>
                <td><input type="password" name="sen" id="sen" value="<?= set_value('sen',$pessoa['sen']) ?>" ><?=form_error('sen')?></td>
            </tr>
            <tr>
                <td><label for="dat_nas">Data Nascimento:</label></td>
                <td><input type="date" name="dat_nas" id="dat_nas" value="<?= set_value('dat_nas',$pessoa['dat_nas']) ?>" ><?=form_error('dat_nas')?></td>
            </tr>
            <tr>
                <td><label for="ema">Email:</label></td>
                <td><input type="email" name="ema" id="ema" value="<?= set_value('ema',$pessoa['ema']) ?>" ><?=form_error('ema')?></td>
            </tr>
            <tr>
                <td><label for="cpf">CPF:</label></td>
                <td><input type="text" name="cpf" id="cpf" value="<?= set_value('cpf',$pessoa['cpf']) ?>" ><?=form_error('cpf')?></td>
            </tr>
        </tbody>
    </table>
    <button type="submit">Cadastrar</button>
    <?=form_close()?>
</div>
