<?php
/**
 * Created by PhpStorm.
 * User: eng
 * Date: 04/08/2016
 * Time: 10:43
 */

namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploadController
{
    /**
     * @Route("/")
     */
    public function uploadFileAction(){
        return new Response("Hello, you need to upload the file");
    }
}