<?php
namespace LinguaLeo\ExpertSender;

class ApiResult
{
    protected $errorCode;
    protected $responseCode;
    protected $errorMessage;
    protected $response;


    /**
     * @param  ExpertSenderResponse $response
     * @param  $request
     */
    public function __construct($response, $request)
    {
        $this->response = $response;
        $this->request = $request;

        if ($response->isOk()) {
            $this->errorCode = 0;
            $this->responseCode = 0;
            $this->errorMessage = '';
        } else {
            $this->errorCode = $response->getErrorCode();
            $this->responseCode = $response->getResponseCode();
            $this->errorMessage = $response->getErrorMessage();
        }
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function isOk()
    {
        return $this->errorCode == 0;
    }

    /**
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * @return mixed
     */
    public function getResponseCode()
    {
        return $this->responseCode;
    }
}