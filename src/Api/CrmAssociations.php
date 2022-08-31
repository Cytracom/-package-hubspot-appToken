<?php

namespace Fungku\HubSpot\Api;


/**
 * @see https://developers.hubspot.com/docs/methods/crm-associations/crm-associations-overview
 */
class CrmAssociations extends Api
{
    /**
     * Get associations for a CRM object.
     *
     * @param mixed $objectId
     *
     * @throws BadRequest
     *
     * @see https://developers.hubspot.com/docs/methods/crm-associations/get-associations
     *
     * @return \Psr\Http\Message\ResponseInterface|\SevenShores\Hubspot\Http\Response
     */
    public function get($objectId, int $definitionId, array $params = [])
    {
        $endpoint = "/crm-associations/v1/associations/{$objectId}/HUBSPOT_DEFINED/{$definitionId}";

        $query_string = null;
        if ($params) {
            $queryString = $this->buildQueryString($params);
        }

        return $this->request('get', $endpoint, [], $query_string);
    }

    /**
     * Associate CRM objects.
     *
     * @throws BadRequest
     *
     * @see https://developers.hubspot.com/docs/methods/crm-associations/associate-objects
     *
     * @return \Psr\Http\Message\ResponseInterface|\SevenShores\Hubspot\Http\Response
     */
    public function create(array $association)
    {
        $endpoint = '/crm-associations/v1/associations';

        return $this->request('put', $endpoint, ['json' => $association]);
    }

    /**
     * Create multiple associations between CRM objects.
     *
     * @throws BadRequest
     *
     * @see https://developers.hubspot.com/docs/methods/crm-associations/batch-associate-objects
     *
     * @return \Psr\Http\Message\ResponseInterface|\SevenShores\Hubspot\Http\Response
     */
    public function createBatch(array $associations)
    {
        $endpoint = '/crm-associations/v1/associations/create-batch';

        return $this->request(
            'put',
            $endpoint,
            ['json' => $associations]
        );
    }

    /**
     * Delete an association.
     *
     * @see https://developers.hubspot.com/docs/methods/crm-associations/delete-association
     *
     * @return \Psr\Http\Message\ResponseInterface|\SevenShores\Hubspot\Http\Response
     */
    public function delete(array $association)
    {
        $endpoint = '/crm-associations/v1/associations/delete';

        return $this->request('put', $endpoint, ['json' => $association]);
    }

    /**
     * Delete multiple associations between CRM objects.
     *
     * @see https://developers.hubspot.com/docs/methods/crm-associations/batch-delete-associations
     *
     * @return \Psr\Http\Message\ResponseInterface|\SevenShores\Hubspot\Http\Response
     */
    public function deleteBatch(array $associations)
    {
        $endpoint = '/crm-associations/v1/associations/delete-batch';

        return $this->request(
            'put',
            $endpoint,
            ['json' => $associations]
        );
    }
}
