<?php
namespace Metaregistrar\EPP;

class eppTransferContactResponse extends eppResponse {
    function __construct() {
        parent::__construct();
    }

    function __destruct() {
        parent::__destruct();
    }

    #
    # CONTACT TRANSFER RESPONSES
    #

    public function getContactId() {
        return $this->queryPath('/epp:epp/epp:response/epp:resData/contact:trnData/contact:id');
    }

    public function getContact() {
        $return = new eppContactHandle($this->getContactId());
        return $return;

    }

    public function getTransferStatus() {
        return $this->queryPath('/epp:epp/epp:response/epp:resData/contact:trnData/contact:trStatus');
    }

    public function getTransferRequestClientId() {
        return $this->queryPath('/epp:epp/epp:response/epp:resData/contact:trnData/contact:reID');
    }

    public function getTransferRequestDate() {
        return $this->queryPath('/epp:epp/epp:response/epp:resData/contact:trnData/contact:reDate');
    }

    public function getTransferActionDate() {
        return $this->queryPath('/epp:epp/epp:response/epp:resData/contact:trnData/contact:acDate');
    }

    public function getTransferActionClientId() {
        return $this->queryPath('/epp:epp/epp:response/epp:resData/contact:trnData/contact:acID');
    }
}