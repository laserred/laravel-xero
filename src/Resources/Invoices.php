<?php

namespace Dcblogdev\Xero\Resources;

use Dcblogdev\Xero\Facades\Xero;

class Invoices extends Xero
{
    public function get(int $page = 1, string $where = null)
    {
        $params = http_build_query([
            'page' => $page,
            'where' => $where
        ]);

        $result = Xero::get('invoices?'.$params);

        return $result['body']['Invoices'];
    }

    public function find(string $contactId)
    {
        $result = Xero::get('invoices/'.$contactId);

        return $result['body']['Invoices'][0];
    }

    public function update(string $contactId, array $data) 
    {
        $result = Xero::post('invoices/'.$contactId, $data);

        return $result['body']['Invoices'][0];
    }

    public function store(array $data) 
    {
        $result = Xero::post('invoices', $data);

        return $result['body']['Invoices'][0];
    }
}
