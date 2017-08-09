<?php
#
# For use with registries that support the charge extension
#
$this->addExtension('charge','http://www.unitedtld.com/epp/charge-1.0');

include_once(dirname(__FILE__) . '/eppRequests/chargeEppTransferDomainRequest.php');
$this->addCommandResponse('Metaregistrar\EPP\chargeEppTransferDomainRequest', 'Metaregistrar\EPP\eppTransferResponse');

include_once(dirname(__FILE__) . '/eppResponses/chargeEppCheckDomainResponse.php');
$this->addCommandResponse('Metaregistrar\EPP\eppCheckDomainRequest', 'Metaregistrar\EPP\chargeEppCheckDomainResponse');

