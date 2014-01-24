<?php

namespace Joos\OpenTokBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use Symfony\Component\HttpFoundation\Request;

class OpenTokController extends FOSRestController
{
    /**
     * Generates a new OpenTok session and token
     *
     * If a session variable is passed then just a token will be generated, otherwise a session and token
     * will be generated as long as "generate_token" is true. For most cases you will want to generate both at
     * the same time.
     *
     * @ApiDoc(
     *      resource="OpenTok",
     *      output=""
     * )
     * @RequestParam(
     *   name="generate_token",
     *   requirements="(true|false)",
     *   description="boolean flag to trigger if a token should be generated or not. Set to false and leave 'session_id' blank if you just want to create a session_id",
     *   default="true"
     * )
     * @RequestParam(
     *   name="session_id",
     *   description="The OpenTok session id to use when generating the token",
     *   strict=false
     * )
     */
    public function createAction(Request $request)
    {
        /** @var \OpenTokSDK $opentok */
        $opentok = $this->get('joos_open_tok');

        $sessionId = $request->request->get('session_id');
        $generateToken = $request->request->get('generate_token', true);

        // ensure we always have a session and that it is a OpenTokSession object
        if (!$sessionId) {
            $sessionId = $opentok->createSession();
        } else {
            $sessionId = new \OpenTokSession($sessionId, null);
        }

        $token = '';
        if ($generateToken) {
            $token = $opentok->generateToken($sessionId);
        }

        $view = $this->view()
            ->setData(array(
                'token'     => $token,
                'session'   => $sessionId->getSessionId(),
            ))
        ;

        return $this->handleView($view);
    }
}