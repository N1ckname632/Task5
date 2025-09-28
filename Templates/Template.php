<?php

namespace Templates;

class Template{
    private $file_name = '';
    private $variables = null;

    function __construct($file_name, $variables){
        $this->file_name = $file_name;
        $this->variables=$variables;
    }

    public function view():string{
        $file_name = $this->getFileName();
        $variables = $this->getVariables();

        if($variables){
            foreach($variables as $key => $value){
                $$key = $value;
            }
        }

        ob_start();
        include $file_name;
        return ob_get_clean();
    }

    private function getFileName(): string{
        return $this->file_name;
    }

    private function getVariables(): ?array{
        return $this->variables;
    }
}
?>