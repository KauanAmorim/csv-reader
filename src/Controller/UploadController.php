<?php

namespace App\Controller;

use App\Service\UploadService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploadController extends AbstractController
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", methods={"GET"})
     */
    public function formAction(): Response {
        return $this->render('upload.html.twig');
    }

    /**
     * @Route("/upload", methods={"POST"}, name="upload_file")
     */
    public  function uploadAction(): JsonResponse
    {
        try {
            ob_start();
            $uploadService = new UploadService($_FILES, $this->entityManager);
            $uploadService->validations();
            $uploadService->upload();
            ob_end_clean();
            return new JsonResponse(["result" => $_FILES['file']['name']]);
        } catch (\Exception $e) {
            return new JsonResponse(["error" => $e->getTrace()]);
        }
    }
}