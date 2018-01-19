<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Zbucki
 * Date: 18.11.2017
 * Time: 13:09
 */

namespace Metaregistrar\EPP;


class eppTransferDomainRequest extends eppTransferRequest {

	function __construct($operation, $domain) {
		parent::__construct();

		#
		# Sanity checks
		#
		if (!in_array($operation, [self::OPERATION_REQUEST, self::OPERATION_QUERY, self::OPERATION_APPROVE, self::OPERATION_CANCEL, self::OPERATION_REJECT])) {
			trigger_error('Operation parameter should be QUERY, REQUEST, CANCEL, APPROVE or REJECT on eppTransferRequest, ignore this if you are using a custom transfer operation', E_USER_NOTICE);
		}

		$this->buildQuery($domain, $operation);
	}

	function __destruct() {
		parent::__destruct();
	}

	public function buildQuery(eppDomain $domain, $operation) {
		#
		# Object create structure
		#
		$transfer = $this->createElement('transfer');
		$transfer->setAttribute('op', $operation);
		$this->domainobject = $this->createElement('domain:transfer');
		$this->domainobject->appendChild($this->createElement('domain:name', $domain->getDomainname()));
		if (strlen($domain->getAuthorisationCode())) {
			$authinfo = $this->createElement('domain:authInfo');
			$authinfo->appendChild($this->createElement('domain:pw', $domain->getAuthorisationCode()));
			$this->domainobject->appendChild($authinfo);
		}
		$transfer->appendChild($this->domainobject);
		$this->getCommand()->appendChild($transfer);
	}
}