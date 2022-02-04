<?php

namespace App\Controller;

abstract class AbstractController
{
    /**
     * fonction de rendu de vue
     *
     * @param string $path
     * @param array $param
     * @return void
     */
    protected function renderView(string $path, array $param)
    {
        extract($param);
        ob_start();
        require_once('./src/view/' . $path . '.phtml');
        $content = ob_get_clean();

        require('./src/view/mainLayout.phtml');
    }
}
