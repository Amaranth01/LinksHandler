<?php
namespace App\Controller;
use Exception;

class AbstractController
{
    public function render(string $template, array $data = [])
    {
        ob_start();
        require __DIR__ . '/../../View/' . $template . '.html.php';
        $html = ob_get_clean();
        require __DIR__ . '/../../View/base.html.php';
        exit;
    }

    /**
     * Clean the data
     * @param string $data
     * @return string
     */
    public function clean(string $data): string
    {
        $data = trim($data);
        $data = strip_tags($data);
        $data = htmlentities($data);

        return $data;
    }

    public function formSubmitted(): bool
    {
        return isset($_POST['submit']);
    }

    /**
     * Get field data
     * @param string $field
     * @param null $default
     * @return mixed|string
     */
    public function getFormField(string $field, $default = null)
    {
        if(!isset($_POST[$field])) {
            return (null === $default) ? '' : $default;
        }
        return $_POST[$field];
    }

    public function getRandomName(string $rName): string
    {
        //Get file extension
        $infos = pathinfo($rName);
        try {
            //Generates a random string of 15 chars
            $bytes = random_bytes(15);
        }
        catch (Exception $e) {
            //Is used on failure
            $bytes = openssl_random_pseudo_bytes(15);
        }
        //Convert binary data to hexadecimal
        return bin2hex($bytes) . '.' . $infos['extension'];
    }

    /**
     * Checks if a user is already logged in
     * @return bool
     */
    public static function userConnected(): bool
    {
        return isset($_SESSION['user']) && null !== ($_SESSION['user'])->getId();
    }
}