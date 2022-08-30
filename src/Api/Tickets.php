<?php

namespace Fungku\HubSpot\Api;

class Tickets extends Api
{
    /**
     * @param array $ticket array of deal properties
     *
     * @throws \SevenShores\Hubspot\Exceptions\BadRequest
     *
     * @return mixed
     */
    public function create(array $ticket)
    {
        $endpoint = '/crm-objects/v1/objects/tickets';

        $options['json'] = $ticket;

        return $this->request('post', $endpoint, $options);
    }

    /**
     * @param int   $id     the deal id
     * @param array $ticket the deal properties to update
     *
     * @return mixed
     */
    public function update($id, array $ticket)
    {
        $endpoint = "/crm-objects/v1/objects/tickets/{$id}";

        $options['json'] = $ticket;

        return $this->request('post', $endpoint, $options);
    }

    /**
     * @throws \SevenShores\Hubspot\Exceptions\BadRequest
     *
     * @return \Psr\Http\Message\ResponseInterface|\SevenShores\Hubspot\Http\Response
     */
    public function all(array $params = [])
    {
        $endpoint = '/crm-objects/v1/objects/tickets/paged';

        $queryString = $this->buildQueryString($params);

        return $this->request('get', $endpoint, [], $queryString);
    }

    /**
     * @param int $id
     *
     * @return mixed
     */
    public function delete($id)
    {
        $endpoint = "/crm-objects/v1/objects/tickets/{$id}";

        return $this->request('delete', $endpoint);
    }

    /**
     * @param int   $id
     * @param array $params Optional parameters ['properties', 'propertiesWithHistory', 'includeDeletes']
     *
     * @throws \SevenShores\Hubspot\Exceptions\BadRequest
     *
     * @return mixed
     */
    public function getById($id, array $params = [])
    {
        $endpoint = "/crm-objects/v1/objects/tickets/{$id}";

        $queryString = $this->buildQueryString($params);

        return $this->request('get', $endpoint, [], $queryString);
    }

    /**
     * @param array $params Optional parameters ['timestamp', 'changeType', 'objectId']
     *
     * @return mixed
     */
    public function getChangelog(array $params = [])
    {
        $endpoint = '/crm-objects/v1/change-log/tickets';

        $queryString = $this->buildQueryString($params);
        
        return $this->request('get', $endpoint, [], $queryString);
    }
}
