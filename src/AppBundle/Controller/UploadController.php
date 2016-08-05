<?php
/**
 * Created by PhpStorm.
 * User: eng
 * Date: 04/08/2016
 * Time: 10:43
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploadController extends Controller
{
    /**
     * @Route("/")
     */

    public function uploadFileAction(){
        $sql = "show tables ";

        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $k1= $stmt->fetchAll();
        dump($k1);die;
        $k=$this->getDoctrine()->getEntityManager();
        $k1=$k->createNativeQuery("show tables;")->getResult();

        return new Response("Hello, welcome to Employee Management Service");
    }
}