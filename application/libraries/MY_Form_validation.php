<?php
class MY_Form_validation extends CI_Form_validation
{
    public function __construct()
    {
        parent::__construct();
    }

    public function valid_cpf($cpf)
    {
        $CI =& get_instance();
        $CI->form_validation->set_message('valid_cpf', 'O %s informado NÃO é válido.');
        $cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        if (strlen($cpf) != 11 ||
            $cpf == '00000000000' ||
            $cpf == '11111111111' ||
            $cpf == '22222222222' ||
            $cpf == '33333333333' ||
            $cpf == '44444444444' ||
            $cpf == '55555555555' ||
            $cpf == '66666666666' ||
            $cpf == '77777777777' ||
            $cpf == '88888888888' ||
            $cpf == '99999999999') {
            return FALSE;
        } else {
            for ($t = 9; $t < 11; $t++) {
                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf[$c] * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                    return FALSE;
                }
            }
            return TRUE;
        }
    }

    public function valid_nome_completo($nome)
    {
        $CI =& get_instance();
        $CI->form_validation->set_message('valid_nome_completo', 'O %s deve conter nome e sobrenome.');
        $arr_nome = explode(' ', trim($nome));
        return (count($arr_nome) > 1);
    }

    public function valid_telefone($telefone)
    {
        $CI =& get_instance();
        $CI->form_validation->set_message('valid_telefone', 'O %s é invalido.');
        return (preg_match('#^\(\d{2}\) \d{4,5}-\d{4,5}$#', $telefone) > 0);
    }
}