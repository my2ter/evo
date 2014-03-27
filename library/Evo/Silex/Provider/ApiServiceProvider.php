<?php
namespace Evo\Silex\Provider;

use Silex\Application;
use Silex\ServiceProviderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiServiceProvider implements ServiceProviderInterface
{

    public function register(Application $app)
    {
    }

    public function boot(Application $app)
    {
        $app->before(
            function (Request $request) {
                if (0 === strpos($request->headers->get('Content-Type'), 'application/json')) {
                    $data = json_decode($request->getContent(), true);
                    $request->request->replace(is_array($data) ? $data : array());
                }
            },
            Application::EARLY_EVENT
        );

        $app->error(
            function (\Evo\ValidationException $e, $code) {
                $responseBody = array(
                    'code' => 400,
                    'status' => 400,
                );

                $error = $e->getMessage();
                $responseBody['message'] = $e->getMessage();

                return new JsonResponse(
                    $responseBody,
                    400
                );
            }
        );

        $app->error(
            function (\Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException $e, $code) {
                return new Response(null, 405);
            }
        );
    }
}
