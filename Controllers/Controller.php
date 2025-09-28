<?php

namespace Controllers;

use Templates\Template;

abstract class Controller{
    abstract protected function layout(): string;

    public function view(): void{
        echo $this->header().
            $this->layout().
            $this->footer();
    }

    protected function header(): string{
        return $this->template('Templates/MainLayout/Header.php');
    }

    public function footer(): string{
        return $this->template('Templates/MainLayout/Footer.php');
    }

    public function template(string $file_name, ?array $variables = null): string{
        $template = new Template($file_name, $variables);

        return $template->view();
    }
}
?>