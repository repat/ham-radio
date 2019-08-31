<?php

namespace Repat\HamRadio;

/**
 * United States of America
 */
class US extends Helper
{
    const URL = 'https://data.fcc.gov/api/license-view/basicSearch/getLicenses?searchValue=';

    /**
     * @inheritdoc
     */
    public function regex() : string
    {
        return '/^[AaWaKkNn][a-zA-Z]?[0-9][a-zA-Z]{1,3}$/';
    }

    /**
     * @inheritdoc
     */
    public function verifyCallSign(string $callSign) : array
    {
        $response = $this->client->get(self::URL . $callSign);

        if ($response->getStatusCode() === HTTP_OK) {
            return $this->xml2array($response->getBody()->getContents());
        }

        return [];
    }
}
