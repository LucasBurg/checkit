/**
 * Arquivos para realizar o list dos locals cadastrados
 */

var $table_content = $('#table_content');
var $msg = $('#msg');

function load_list_local() {
    return $.ajax({'url': '/local/list_itens'}).promise();
};

function fail_list_local(error) {
    alert(error.text);
    console.log(error);
};

function render_list_local(response) {
    if (response.valid) {
        $msg.hide().text(response.msg).fadeIn(600);
        $table_content.empty().hide().fadeIn(600);
        $.each(response.data, function (i, e) {
            var $tr = $('<tr/>');
            $tr.append($('<td/>').text(e.id));
            $tr.append($('<td/>').text(e.nome));
            $a_editar = $('<a/>').prop('href','/local/'+e.id).text('Editar');
            $a_excluir = $('<a/>').prop('href','/local/excluir/'+e.id).text('Excluir');
            $tr.append($('<td/>').html([$a_editar, ' / ', $a_excluir]));
            $table_content.append($tr);
        });
    }
};

load_list_local().done(render_list_local).fail(fail_list_local);
