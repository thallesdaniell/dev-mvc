<?php

class index_controller extends Core\Controller
{
    private $post;

    public function init()
    {
        $this->post = new \App\models\usuario_model();
        # $this->ativo();
    }
    
    public function index()
    {
        $user = $this->post->All();
        #$user = $this->post->where('id',1)->get();
        #$user = $this->post->find(1)->delete(1);
        foreach ($user as $v) {
            echo $v->nome.$v->sobrenome;
        }
        #echo '<pre>';
        #var_dump($user);
    }



}


