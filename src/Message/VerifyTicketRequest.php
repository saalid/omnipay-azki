<?php

namespace Omnipay\Azkivam\Message;

use Omnipay\Common\Exception\InvalidRequestException;

class VerifyTicketRequest extends AbstractRequest
{

    protected $endPoint = '/payment/verify';

    protected function getHttpMethod()
    {
        return 'POST';
    }

    protected function createUri(string $baseUrl)
    {
        return $baseUrl . $this->endPoint;
    }

    /**
     * @param array $data
     * @return VerifyTicketResponse
     */
    protected function createResponse(array $data)
    {
        return new VerifyTicketResponse($this, $data);
    }

    /**
     * Get the raw data array for this message. The format of this varies from gateway to
     * gateway, but will usually be either an associative array, or a SimpleXMLElement.
     *
     * @return mixed
     * @throws InvalidRequestException
     */
    public function getData()
    {
        // Validate required parameters before return data
        $this->validate('ticketId');
        return [
            'ticket_id' => $this->getTicketId()
        ];
    }
}