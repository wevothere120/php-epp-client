<?php
/**
 * Created by PhpStorm.
 * User: Grzegorz Zbucki
 * Date: 18.11.2017
 * Time: 13:09
 */

namespace Metaregistrar\EPP;


class eppTransferContactRequest extends eppTransferRequest {

	function __construct($operation, $object) {
		parent::__construct();

		#
		# Sanity checks
		#
		switch ($operation) {
			case self::OPERATION_QUERY:
				if ($object instanceof eppContactHandle) {
					$this->setContactQuery($object);
				}
				break;
			case self::OPERATION_REQUEST:
				if ($object instanceof eppContactHandle) {
					$this->setContactRequest($object);
				}
				break;
			case self::OPERATION_CANCEL:

				break;
			case self::OPERATION_APPROVE:
				if ($object instanceof eppContactHandle) {
					$this->setContactApprove($object);
				}
				break;
			case self::OPERATION_REJECT:

				break;
			default:
				trigger_error('Operation parameter should be QUERY, REQUEST, CANCEL, APPROVE or REJECT on eppTransferRequest, ignore this if you are using a custom transfer operation', E_USER_NOTICE);
				break;
		}
	}

	function __destruct() {
		parent::__destruct();
	}


	public function setContactQuery(eppContactHandle $contact) {
		#
		# Object create structure
		#
		$transfer = $this->createElement('transfer');
		$transfer->setAttribute('op', self::OPERATION_QUERY);
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

	public function setContactRequest(eppContactHandle $contact) {
		#
		# Object create structure
		#
		$transfer = $this->createElement('transfer');
		$transfer->setAttribute('op', self::OPERATION_REQUEST);
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

	public function setContactApprove(eppContactHandle $contact) {
		#
		# Object create structure
		#
		$transfer = $this->createElement('transfer');
		$transfer->setAttribute('op', self::OPERATION_APPROVE);
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