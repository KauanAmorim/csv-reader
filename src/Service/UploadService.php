<?php

namespace App\Service;

use App\Entity\ClientFreight;
use Doctrine\ORM\EntityManagerInterface;
use Exception;

class UploadService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * @var array
     */
    private $files;

    public function __construct(array $files, EntityManagerInterface $entityManager)
    {
        $this->files = $files;
        $this->entityManager = $entityManager;
    }

    /**
     * @throws Exception
     */
    public function validations(): void
    {
        $this->validFileIndex();
        $this->validEmptyFiles();
        $this->validUpload();
        $this->validFileType();
        $this->validReadableFile();
    }

    /**
     * @throws Exception
     */
    private function validFileIndex(): void
    {
        $fileIndexExists = array_key_exists('file', $this->files);
        if (!$fileIndexExists) {
            throw new Exception('Chave de upload do arquivo não encontrada');
        }
    }

    /**
     * @throws Exception
     */
    private function validEmptyFiles(): void
    {
        $emptyFiles = empty($this->files);
        if ($emptyFiles) {
            throw new Exception('Nenhum arquivo encontrado');
        }
    }

    /**
     * @throws Exception
     */
    private function validUpload(): void
    {
        $tmpFileName = $this->files['file']['tmp_name'];
        $isUploadedFile = is_uploaded_file($tmpFileName);
        if (!$isUploadedFile) {
            throw new Exception('Arquivo enviado não foi enviado por POST HTTP');
        }
    }

    /**
     * @throws Exception
     */
    private function validFileType(): void
    {
        $fileType = $this->files['file']['type'];
        $isCsvFile = $fileType == 'text/csv';
        if (!$isCsvFile) {
            throw new Exception('O tipo do arquivo é inválido');
        }
    }

    /**
     * @throws Exception
     */
    private function validReadableFile(): void
    {
        $tmpFileName = $this->files['file']['tmp_name'];
        $isReadable = is_readable($tmpFileName);
        if (!$isReadable) {
            throw new Exception('Não é possivel ler o arquivo');
        }
    }

    public function upload(): void
    {
        $file = $this->files['file']['tmp_name'];
        $splFile = new \SplFileObject($file);
        $splFile->fgetcsv(';');
        while (!$splFile->eof()) {
            $line = $splFile->fgetcsv(';');
            $this->treatLine($line);
        }
        $this->entityManager->flush();
    }

    private function treatLine($line): void
    {
        if ($line[0] && $line[1] && $line[2] && $line[3] && $line[4]) {
            $from_postcode = $line[0];
            $to_postcode = $line[1];
            $from_weight = $line[2];
            $to_weight = $line[3];
            $cost = $line[4];

            $clientFreight = new ClientFreight(
                $from_postcode,
                $to_postcode,
                $from_weight,
                $to_weight,
                $cost
            );

            $this->entityManager->persist($clientFreight);
        }
    }
}
