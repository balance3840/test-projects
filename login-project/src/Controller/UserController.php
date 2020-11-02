<?php

namespace App\Controller;

use App\Entity\User;
use App\Enums\ErrorsEnum;
use App\Traits\ApiResponse;
use App\Repository\UserRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class UserController
 * @package App\Controller
 */
class UserController extends AbstractController {
    use ApiResponse;

    /** @var UserRepository */
    private $userRepository;

    /** @var EncoderFactoryInterface */
    private $encoderFactory;

    /**
     * UserController constructor.
     * @param UserRepository $userRepository
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(UserRepository $userRepository, EncoderFactoryInterface $encoderFactory) {
        $this->userRepository = $userRepository;
        $this->encoderFactory = $encoderFactory;
    }

    /**
     * @Route("/login", name="user_login", methods={"POST"})
     * @param Request $request Username and password
     * @return JsonResponse User details
     * @throws NonUniqueResultException
     */
    public function login(Request $request): JsonResponse
    {
        $fields = json_decode($request->getContent(), true);

        $email = $fields['email'] ?? null;
        $password = $fields['password'] ?? null;

        if(!$email || !$password) {
            return $this->errorResponse(ErrorsEnum::BAD_REQUEST,
            'Bad request. Make sure you send email and password in the request.',
            Response::HTTP_BAD_REQUEST);
        }

        $encoder = $this->encoderFactory->getEncoder(new User);

        $email = $fields['email'];
        $password = $fields['password'];

        $user = $this->userRepository->findOneByEmail($email);

        if(!$user) {
            return $this->errorResponse(ErrorsEnum::USER_NOT_FOUND,
            'The requested user does not exist.', Response::HTTP_NOT_FOUND);
        }

        $hashedPassword = $user->getPassword();

        if(!$encoder->isPasswordValid($hashedPassword, $password, null)) {
            return $this->errorResponse(ErrorsEnum::INVALID_CREDENTIALS, 
            'The credentials are not valid', Response::HTTP_UNAUTHORIZED);
        }

        return $this->successResponse($user->toArray());

    }

}