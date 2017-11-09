<?php

$url = base_url("pessoa/");
$pessoas = $page_var['pessoas'];
$loop = 0;
//var_dump($pessoas);



?>
<table border="1px;">
    <thead>
        <th>Nome</th>
        <th>Usuário</th>
        <th>Data de Nascimento</th>
        <th>Email</th>
        <th>CPF</th>
        <th><?= anchor($url, "Adicionar") ?></th>
    </thead>
    <tbody>
        <?php
        foreach ($pessoas as $pessoa) {
            $id = $pessoa['id'];
            $nome = $pessoa['nom'];
            $usuario = $pessoa['usu'];
            $dat_nas = $pessoa['dat_nas'];
            $email = $pessoa['ema'];
            $cpf = $pessoa['cpf'];
            $url_atualizar = base_url("pessoa/{$id}");
            $url_excluir = base_url("pessoa/excluir/{$id}");
         ?>
        <tr>
            <td><?= $nome ?></td>
            <td><?= $usuario ?></td>
            <td><?= $dat_nas ?></td>
            <td><?= $email ?></td>
            <td><?= $cpf ?></td>
            <td><?= anchor($url_atualizar, 'Atualizar'); ?></td>
            <td><?= anchor($url_excluir, 'excluir'); ?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>
