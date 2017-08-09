<?php
#
# For use with registries that support the charge extension
#
include_once(dirname(__FILE__) . '/eppResponses/chargeEppCheckDomainResponse.php');
$this->addCommandResponse('Metaregistrar\EPP\eppCheckDomainRequest', 'Metaregistrar\EPP\chargeEppCheckDomainResponse');