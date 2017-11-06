<?php
/**
 * Prepara a view a ser exibida
 * Essa library foi baseada em um post externo, segue o link:
 * 
 * @author Lucas Burg <lucas.mota@ielusc.br>
 * @link  https://stackoverflow.com/questions/22531049/how-to-load-page-views-like-header-sidebar-footer-in-codeigniter Post de Ref. da Library
 * @package Library
 */
class Template
{
    /**
     * @var mixed Contém as futuras variaveis que seram utilizadas no template.
     */
    private $data;
    
    /**
     * @var mixed Core do Framework 
     */
    private $ci;
    
    /**
     * @var mixed Recebe os arquivos JS's  
     */
    private $js;
    
    /**
     * @var mixed Recebe os arquivos CSS's  
     */
    private $css;
    
    /**
     * Construtor, seta os parametros defautls utilizado pela Library     
     * @return void
     */
    public function __construct()
    {
        $this->ci  =& get_instance();
        $this->js  = [];
        $this->css = [];
        //$this->add_css(base_url('assets/css/normalize.css'));
        //$this->add_js(base_url('assets/plugins/bootstrap/bootstrap.min.js'));
    }
    
    /**
     * Exibi uma pagina 
     * @param string $folder Nome do diretorio que está a $page
     * @param string $page Nome da pagina a ser exibida
     * @param mixed  $data Dados para exibir para $page
     */
    public function show($folder, $page, $data=null)
    {
        $view = $folder.DIRECTORY_SEPARATOR.$page;
        if (!file_exists("application/views/{$view}.php")) {
            show_404();
        } else {
            $this->data['page_var'] = $data;
            $this->load_css();
            $this->load_js();
            $this->data['content']  = $this->ci->load->view($view, $this->data, true);
            $this->ci->load->view('templates/default/layout', $this->data);
        }
    }
    
    /**
     * @param string $file Arquivo JS a ser adicionano na pagina
     */
    public function add_js($file)
    {
        $this->js[]['file'] = $file;
    }
    
    /**
     * @param string $file Arquivo CSS a ser adicionano na pagina
     */
    public function add_css($file)
    {
        $this->css[]['file'] = $file;
    }
    
    /**
     * Gera as Tags HTML para o CSS
     * @return void
     */
    private function load_css()
    {
        $this->data['css_head'] = '';
        foreach ($this->css as $item) {
            $this->data['css_head'] .= "<link rel=\"stylesheet\" type=\"text/css\" href=\"{$item['file']}\">".PHP_EOL;
        }
    }
    
    /**
     * Gera as Tags HTML para o JS
     * @return void
     */
    private function load_js()
    {
        $this->data['js_footer'] = '';
        foreach ($this->js as $item) {
            $this->data['js_footer'] .= "<script type=\"text/javascript\" src=\"{$item['file']}\"></script>".PHP_EOL;
        }
    }
}
