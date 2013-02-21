<?php

/*
 * This file is part of the Omnipay package.
 *
 * (c) Adrian Macneil <adrian@adrianmacneil.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Omnipay\AuthorizeNet\Message;

/**
 * Authorize.Net Capture Request
 */
class CaptureRequest extends AbstractRequest
{
    protected $method = 'PRIOR_AUTH_CAPTURE';

    public function getData()
    {
        $this->validate(array('amount', 'gatewayReference'));

        $data = $this->getBaseData();
        $data['x_amount'] = $this->getAmountDecimal();
        $data['x_trans_id'] = $this->getGatewayReference();

        return $data;
    }
}