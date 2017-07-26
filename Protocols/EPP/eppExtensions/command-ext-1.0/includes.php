<?php
include_once(dirname(__FILE__) . '/eppData/metaregInfoDomainOptions.php');

include_once(dirname(__FILE__) . '/eppRequests/metaregInfoDomainRequest.php');
$this->addCommandResponse('Metaregistrar\EPP\metaregInfoDomainRequest', 'Metaregistrar\EPP\eppInfoDomainResponse');

include_once(dirname(__FILE__) . '/eppRequests/metaregEppAuthcodeRequest.php');
$this->addCommandResponse('Metaregistrar\EPP\metaregEppAuthcodeRequest', 'Metaregistrar\EPP\eppInfoDomainResponse');

include_once(dirname(__FILE__) . '/eppRequests/metaregEppPrivacyRequest.php');
$this->addCommandResponse('Metaregistrar\EPP\metaregEppPrivacyRequest', 'Metaregistrar\EPP\eppUpdateDomainResponse');

include_once(dirname(__FILE__) . '/eppRequests/metaregEppAutorenewRequest.php');
$this->addCommandResponse('Metaregistrar\EPP\metaregEppAutorenewRequest', 'Metaregistrar\EPP\eppUpdateDomainResponse');

include_once(dirname(__FILE__) . '/eppRequests/metaregEppTransferExtendedRequest.php');
$this->addCommandResponse('Metaregistrar\EPP\metaregEppTransferExtendedRequest', 'Metaregistrar\EPP\eppTransferResponse');