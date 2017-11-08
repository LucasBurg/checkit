/**
 * Arquivos para realizar o list dos blocos cadastrados
 */

var $table_content = $('#table_content');
var $msg = $('#msg');

function load_list_bloco() {
    return $.ajax({'url': '/bloco/list_itens'}).promise();
};

function fail_list_bloco(error) {
    alert(error.text);
    console.log(error);
};

function render_list_bloco(response) {
    if (response.valid) {
        $msg.hide().text(response.msg).fadeIn();
        $table_content.empty().hide().fadeIn();
        $.each(response.data, function (i, e) {
            var $tr = $('<tr/>');
            $tr.append($('<td/>').text(e.id));
            $tr.append($('<td/>').text(e.nom));
            $a_editar = $('<a/>').prop('href','/bloco/'+e.id).text('Editar');
            $a_excluir = $('<a/>').prop('href','/bloco/excluir/'+e.id).text('Excluir');
            $tr.append($('<td/>').html([$a_editar, ' / ', $a_excluir]));
            $table_content.append($tr);
        });
    }
};

load_list_bloco().done(render_list_bloco).fail(fail_list_bloco);
