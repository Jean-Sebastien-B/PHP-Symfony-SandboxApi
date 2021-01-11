<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


/**
 * Classe de personnalisation des requêtes & réponses d'Authentification
 */
class ApiController extends AbstractController
{

    /**
     * @var integer HTTP status code - 200 (OK) by default
     */
    protected $statusCode = 200;

    /**
     * Gets the value of statusCode.
     * @return integer
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * Sets the value of statusCode.
     * @param integer $statusCode the status code
     * @return self
     */
    protected function setStatusCode(int $statusCode)
    {
        $this->statusCode = $statusCode;
        return $this;
    }

    /**
     * Returns a JSON response
     * @param array $data
     * @param array $headers
     * @return JsonResponse
     */
    public function response(array $data, $headers = [])
    {
        return new JsonResponse($data, $this->getStatusCode(), $headers);
    }

    /**
     * Sets an error message and returns a JSON response
     * @param string $errors
     * @param array $headers
     * @return JsonResponse
     */
    public function respondWithErrors(string $errors, $headers = [])
    {
        $data = [
            'status' => $this->getStatusCode(),
            'errors' => $errors,
        ];
        return new JsonResponse($data, $this->getStatusCode(), $headers);
    }

    /**
     * Sets an error message and returns a JSON response
     *
     * @param string $success
     * @param array $headers
     * @return JsonResponse
     */
    public function respondWithSuccess(string $success, $headers = [])
    {
        $data = [
            'status' => $this->getStatusCode(),
            'success' => $success,
        ];
        return new JsonResponse($data, $this->getStatusCode(), $headers);
    }

    /**
     * Returns a 401 Unauthorized http response
     * @param string $message
     * @return JsonResponse
     */
    public function respondUnauthorized($message = 'Vous n\'avez pas les droits nécessaires pour accéder à cette section')
    {
        return $this->setStatusCode(401)->respondWithErrors($message);
    }

    /**
     * Returns a 422 Unprocessable Entity
     * @param string $message
     * @return JsonResponse
     */
    public function respondValidationError($message = 'Erreur de validation')
    {
        return $this->setStatusCode(422)->respondWithErrors($message);
    }

    /**
     * Returns a 404 Not Found
     * @param string $message
     * @return JsonResponse
     */
    public function respondNotFound($message = 'Page inexistante')
    {
        return $this->setStatusCode(404)->respondWithErrors($message);
    }

    /**
     * Returns a 201 Created
     * @param array $data
     * @return JsonResponse
     */
    public function respondCreated($data = [])
    {
        return $this->setStatusCode(201)->response($data);
    }

    /**
     * Cette méthode permet d'accepter la charge utile (payload) dans les requêtes POST
     * @param Request $request
     * @return Request
     */
    protected function transformJsonBody(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        if ($data === null) {
            return $request;
        }
        $request->request->replace($data);
        return $request;
    }
}
