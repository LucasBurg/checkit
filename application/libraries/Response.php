<?php 
class Response 
{
    private $ci;

    private $res;
    
    public function __construct()
    {
        $this->ci =& get_instance();
    }

    public function set_data($data)
    {
        $this->res['data'] = $data;
    }

    public function set_url($url)
    {
        $this->res['url'] = $url;
    }

    public function set_valid($valid) 
    {
        $this->res['valid'] = $valid;
    }

    public function set_msg($msg)
    {
        $this->res['msg'] = $msg;
    }

    public function get_res()
    {
        return $this->res;
    }

    public function get_res_json() 
    {
        $output = $this->ci->output;
        $output->set_content_type('application/json');
        $output->set_output(json_encode($this->res));
        return $output->get_output();
    }
}