<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class NurseController extends AbstractController
{
    static $nurses = array(
        "juan.perez@email.com" => array("name" => "Juan Pérez", "password" => "a1B2c3D4e5"),
        "maria.gomez@email.com" => array("name" => "María Gómez", "password" => "F6g7H8i9J0"),
        "carlos.martinez@email.com" => array("name" => "Carlos Martínez", "password" => "k1L2m3N4o5"),
        "ana.lopez@email.com" => array("name" => "Ana López", "password" => "P6q7R8s9T0"),
        "luis.fernandez@email.com" => array("name" => "Luis Fernández", "password" => "U1v2W3x4Y5"),
        "sara.ramirez@email.com" => array("name" => "Sara Ramírez", "password" => "Z6a7B8c9D0"),
        "diego.rodriguez@email.com" => array("name" => "Diego Rodríguez", "password" => "E1f2G3h4I5"),
        "laura.sanchez@email.com" => array("name" => "Laura Sánchez", "password" => "J6k7L8m9N0"),
        "jorge.morales@email.com" => array("name" => "Jorge Morales", "password" => "O1p2Q3r4S5"),
        "elena.garcia@email.com" => array("name" => "Elena García", "password" => "T6u7V8w9X0")
    );

    #[Route('/nurse/name', name: 'app_nurse', methods: ['GET'])]
    public function findByName(Request $request): JsonResponse
    {

        $return_nurses = array();

        if (isset(self::$nurses)) {

            $name = $request->get('name');

            dd($name);

            foreach (self::$nurses as $email => $data) {
                if ($data['name'] == $name) {
                    $return_nurses[$email] = array('name' => $data['name']);
                }
            }
        }

        return new JsonResponse($return_nurses);
    }
}
