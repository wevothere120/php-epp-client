<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Zbucki
 * Date: 18.11.2017
 * Time: 13:09
 */

namespace Metaregistrar\EPP;


class eppTransferContactRequest extends eppTransferRequest {

	function __construct($operation, $contact) {
		parent::__construct();

		#
		# Sanity checks
		#
		if (!in_array($operation, [self::OPERATION_REQUEST, self::OPERATION_QUERY, self::OPERATION_APPROVE, self::OPERATION_CANCEL, self::OPERATION_REJECT])) {
			trigger_error('Operation parameter should be QUERY, REQUEST, CANCEL, APPROVE or REJECT on eppTransferRequest, ignore this if you are using a custom transfer operation', E_USER_NOTICE);
		}

		$this->buildQuery($contact, $operation);
	}

	function __destruct() {
		parent::__destruct();
	}

	public function buildQuery(eppContactHandle $contact, $operation) {
		#
		# Object create structure
		#
		$transfer = $this->createElement('transfer');
		$transfer->setAttribute('op', $operation);
		$this->contactobject = $this->createElement('contact:transfer');
		$this->contactobject->appendChild($this->createElement('contact:id', $contact->getContactHandle()));
		if (strlen($contact->getPassword())) {
			$authinfo = $this->createElement('contact:authInfo');
			$authinfo->appendChild($this->createElement('contact:pw', $contact->getPassword()));
			$this->contactobject->appendChild($authinfo);
		}
		$transfer->appendChild($this->contactobject);
		$this->getCommand()->appendChild($transfer);
	}
}