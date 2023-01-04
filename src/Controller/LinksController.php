<?php

namespace App\Controller;

use RedBeanPHP\R;

class LinksController extends AbstractController
{
    public function addLink()
    {
        if (isset($_POST['submit'])) {

            $link = R::dispense('link');
            $user = R::findOne('user', 'id=?', [$_SESSION['user']->id]);

            $link->linkTitle = $this->clean($this->getFormField('title'));
            $link->linkName = $this->clean($this->getFormField('link'));
            $link->linkImage = $this->addImage();

            $user->ownLinkList[] = $link;
            R::store($link);
            R::store($user);

            $_SESSION['success'] = "Ajout terminé";

            $this->render("home/allLinks", [
                'link' => R::findAll('link', $_SESSION['user']->id),
            ]);
        }
    }

    public function addImage()
    {
        $name = "";
        $error = [];
        //Checking the presence of the form field
        if(isset($_FILES['img']) && $_FILES['img']['error'] === 0){

            //Defining allowed file types for the secured
            $allowedMimeTypes = ['image/jpg', 'image/jpeg', 'image/png'];

            if(in_array($_FILES['img']['type'], $allowedMimeTypes)) {
                //Setting the maximum size
                $maxSize = 1024 * 1024;
                if ((int)$_FILES['img']['size'] <= $maxSize) {
                    //Get the temporary file name
                    $tmp_name = $_FILES['img']['tmp_name'];
                    //Assignment of the final name
                    $name = $this->getRandomName($_FILES['img']['name']);

                    //Checks if the destination file exists, otherwise it is created
                    if(!is_dir('uploads')){
                        mkdir('uploads');
                    }
                    //File move
                    move_uploaded_file($tmp_name,'../public/uploads/' . $name);
                }
                else {
                    $_SESSION['errors'] =  "Le poids est trop lourd, maximum autorisé : 1 Mo";
                    $this->render('project/links');
                }
            }
            else {
                $_SESSION['errors'] = "Mauvais type de fichier. Seul les formats JPG, JPEG et PNG sont acceptés";
                $this->render('project/links');
            }
        }
        else {
            $_SESSION['errors'] = "Une erreur s'est produite";
            $this->render('project/links');
        }
        $_SESSION['error'] = $error;
        return $name;
    }

    public function deleteLink(int $id = null)
    {
        $link = R::findOne('link', 'id=?', [$id]);
        $user = R::findOne('user', 'id=?', [$_SESSION['user']->id]);
        R::trash($link);
    }
}