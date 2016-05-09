<?php
 

global $zym_decrypt;
$zym_decrypt['Ž¯ÀÖÖ¯”ÃÁ¯ÃÖˆ‹Ã¥Ž”ÃÃý®¥®ÄÄ¯Ã¯¥Öˆ'] = base64_decode('X2luaXRpYWxpemU=');
$zym_decrypt['®‹ŽýÄ¥ÁÁŽˆÃ‹ÃÃÃ®¾ÄÖ¥¯ÃÃÀÃŽ”¾Ö¥ÃÀ'] = base64_decode('VHJlZQ==');
$zym_decrypt['¥ýÃÄ¥®ÃŽÃÀ¯®ýŽÀŽ¥Ä‹ÖÖˆ¾®ÁÃˆÄ¾Äˆ‹'] = base64_decode('VQ==');
$zym_decrypt['ÃÖŽýÀˆý®‹¥ÖÀÄˆˆ”ÄÃ¥ý‹¥ýÀÖÄ‹ÀÖ¾ÖÁ'] = base64_decode('TA==');
$zym_decrypt['Áý‹ÃÖÖ¥Ã”¾ÃÀý®ˆÄÖÃ®ÖÄ®ÖÖ‹ˆÃÖÃÃ¾ˆ'] = base64_decode('c3ByaW50Zg==');
$zym_decrypt['®ˆ¾¯ÖÖ”Ã‹Ö‹‹ÖÖˆ‹¥”ýÖÀÃ‹ÖÖÃÁˆÃŽÄ¾'] = base64_decode('aW5fYXJyYXk=');
$zym_decrypt['ÄÀÁ¾ÃˆÃ¥ÃˆÖŽÖÃÖÁ¯ÃÖÃÀÀÃÖÃˆ®ÖÁÖýÖ'] = base64_decode('YXJyYXlfcG9w');
$zym_decrypt['”ÖÖÄ‹¾Ä¾¯ÃÖ¾ÖÁÖÃÀŽ‹ÀÃ”¾Ã®Ö””ˆÖÄŽ'] = base64_decode('ZXhwbG9kZQ==');
$zym_decrypt['Áý®‹Á¾¯ÖÃÀÄÖÃ®ÖÃÃ®¾À¾Ã¾ÃÃÁˆ¾®Ã¥Ã'] = base64_decode('c3RyX3JlcGxhY2U=');

class dapei_cateAction extends BackendAction {
    public function _initialize() {
        parent::$GLOBALS['zym_decrypt']['Ž¯ÀÖÖ¯”ÃÁ¯ÃÖˆ‹Ã¥Ž”ÃÃý®¥®ÄÄ¯Ã¯¥Öˆ']();
        $this->_mod = D('dapei_cate');
    }
    public function index() {
        $‹ýÁÖŽ¾”ÀÖ‹Ä¾®ý®¾ÃÃÄÁ‹ÖˆˆÀˆ¥ÖÖÃˆ® = $this->_request('sort', 'trim', 'ordid');
        $ÄŽÃ¯ÖÄŽÄÖÁˆý®Á”¥Ã¯”Ž¥‹‹Ä¯ÄÁ¾”Žˆ” = $this->_request(base64_decode('b3JkZXI=') , base64_decode('dHJpbQ==') , base64_decode('REVTQw=='));
        $®ÄÁÄÖÀŽÃÁÃ‹ÃÖýý®”ýŽ‹ÃˆÁ¥”¥ŽÃÖˆ‹Ã = new $GLOBALS['zym_decrypt']['®‹ŽýÄ¥ÁÁŽˆÃ‹ÃÃÃ®¾ÄÖ¥¯ÃÃÀÃŽ”¾Ö¥ÃÀ']();
        $®ÄÁÄÖÀŽÃÁÃ‹ÃÖýý®”ýŽ‹ÃˆÁ¥”¥ŽÃÖˆ‹Ã->icon = array(
            base64_decode('4pSCIA==') ,
            base64_decode('4pSc4pSAIA==') ,
            base64_decode('4pSU4pSAIA==')
        );
        $®ÄÁÄÖÀŽÃÁÃ‹ÃÖýý®”ýŽ‹ÃˆÁ¥”¥ŽÃÖˆ‹Ã->nbsp = base64_decode('wqDCoMKg');
        $Ö‹¾Á¥ý®¯ŽÖÖŽÃ”ˆ‹”ýÖÖÁýÃ®ÃÀ¾¥Ã¯ÃÃ = $this->_mod->order($‹ýÁÖŽ¾”ÀÖ‹Ä¾®ý®¾ÃÃÄÁ‹ÖˆˆÀˆ¥ÖÖÃˆ® . ' ' . $ÄŽÃ¯ÖÄŽÄÖÁˆý®Á”¥Ã¯”Ž¥‹‹Ä¯ÄÁ¾”Žˆ”)->select();
        $ÁÖ¯ýÖÖ¯ˆ‹”ˆÖÖÃÁˆÀÖˆÖˆ”ý¯ÀÖ¯ÖÃ®ÖÁ = array();
        foreach ($Ö‹¾Á¥ý®¯ŽÖÖŽÃ”ˆ‹”ýÖÖÁýÃ®ÃÀ¾¥Ã¯ÃÃ as $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ) {
            $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('c3RyX3N0YXR1cw==') ] = base64_decode('PGltZyBkYXRhLXRkdHlwZT0idG9nZ2xlIiBkYXRhLWlkPSI=') . $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('aWQ=') ] . base64_decode('IiBkYXRhLWZpZWxkPSJzdGF0dXMiIGRhdGEtdmFsdWU9Ig==') . $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('c3RhdHVz') ] . base64_decode('IiBzcmM9Il9fU1RBVElDX18vaW1hZ2VzL2FkbWluL3RvZ2dsZV8=') . ($Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('c3RhdHVz') ] == 0 ? base64_decode('ZGlzYWJsZWQ=') : base64_decode('ZW5hYmxlZA==')) . base64_decode('LmdpZiIgLz4=');
            $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('c3RyX21hbmFnZQ==') ] = base64_decode('PGEgaHJlZj0iamF2YXNjcmlwdDo7IiBjbGFzcz0iSl9zaG93ZGlhbG9nIiBkYXRhLXVyaT0i') . $GLOBALS['zym_decrypt']['¥ýÃÄ¥®ÃŽÃÀ¯®ýŽÀŽ¥Ä‹ÖÖˆ¾®ÁÃˆÄ¾Äˆ‹'](base64_decode('ZGFwZWlfY2F0ZS9hZGQ=') , array(
                base64_decode('cGlk') => $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('aWQ=') ]
            )) . base64_decode('IiBkYXRhLXRpdGxlPSI=') . $GLOBALS['zym_decrypt']['ÃÖŽýÀˆý®‹¥ÖÀÄˆˆ”ÄÃ¥ý‹¥ýÀÖÄ‹ÀÖ¾ÖÁ'](base64_decode('YWRkX2FydGljbGVfY2F0ZQ==')) . base64_decode('IiBkYXRhLWlkPSJhZGQiIGRhdGEtd2lkdGg9IjUwMCIgZGF0YS1oZWlnaHQ9IjM2MCI+') . $GLOBALS['zym_decrypt']['ÃÖŽýÀˆý®‹¥ÖÀÄˆˆ”ÄÃ¥ý‹¥ýÀÖÄ‹ÀÖ¾ÖÁ'](base64_decode('YWRkX2FydGljbGVfc3ViY2F0ZQ==')) . base64_decode('PC9hPiB8DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGEgaHJlZj0iamF2YXNjcmlwdDo7IiBjbGFzcz0iSl9zaG93ZGlhbG9nIiBkYXRhLXVyaT0i') . $GLOBALS['zym_decrypt']['¥ýÃÄ¥®ÃŽÃÀ¯®ýŽÀŽ¥Ä‹ÖÖˆ¾®ÁÃˆÄ¾Äˆ‹'](base64_decode('ZGFwZWlfY2F0ZS9lZGl0') , array(
                base64_decode('aWQ=') => $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('aWQ=') ]
            )) . base64_decode('IiBkYXRhLXRpdGxlPSI=') . $GLOBALS['zym_decrypt']['ÃÖŽýÀˆý®‹¥ÖÀÄˆˆ”ÄÃ¥ý‹¥ýÀÖÄ‹ÀÖ¾ÖÁ'](base64_decode('ZWRpdA==')) . base64_decode('IC0g') . $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('bmFtZQ==') ] . base64_decode('IiBkYXRhLWlkPSJlZGl0IiBkYXRhLXdpZHRoPSI1MDAiIGRhdGEtaGVpZ2h0PSIyOTAiPg==') . $GLOBALS['zym_decrypt']['ÃÖŽýÀˆý®‹¥ÖÀÄˆˆ”ÄÃ¥ý‹¥ýÀÖÄ‹ÀÖ¾ÖÁ'](base64_decode('ZWRpdA==')) . base64_decode('PC9hPiB8DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGEgaHJlZj0iamF2YXNjcmlwdDo7IiBkYXRhLWFjdHR5cGU9ImFqYXgiIGNsYXNzPSJKX2NvbmZpcm11cmwiIGRhdGEtdXJpPSI=') . $GLOBALS['zym_decrypt']['¥ýÃÄ¥®ÃŽÃÀ¯®ýŽÀŽ¥Ä‹ÖÖˆ¾®ÁÃˆÄ¾Äˆ‹'](base64_decode('ZGFwZWlfY2F0ZS9kZWxldGU=') , array(
                base64_decode('aWQ=') => $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('aWQ=') ]
            )) . base64_decode('IiBkYXRhLW1zZz0i') . $GLOBALS['zym_decrypt']['Áý‹ÃÖÖ¥Ã”¾ÃÀý®ˆÄÖÃ®ÖÄ®ÖÖ‹ˆÃÖÃÃ¾ˆ']($GLOBALS['zym_decrypt']['ÃÖŽýÀˆý®‹¥ÖÀÄˆˆ”ÄÃ¥ý‹¥ýÀÖÄ‹ÀÖ¾ÖÁ'](base64_decode('Y29uZmlybV9kZWxldGVfb25l')) , $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('bmFtZQ==') ]) . base64_decode('Ij4=') . $GLOBALS['zym_decrypt']['ÃÖŽýÀˆý®‹¥ÖÀÄˆˆ”ÄÃ¥ý‹¥ýÀÖÄ‹ÀÖ¾ÖÁ'](base64_decode('ZGVsZXRl')) . base64_decode('PC9hPg==');
            $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('cGFyZW50aWRfbm9kZQ==') ] = ($Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('cGlk') ]) ? base64_decode('IGNsYXNzPSJjaGlsZC1vZi1ub2RlLQ==') . $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ[base64_decode('cGlk') ] . '"' : '';
            $ÁÖ¯ýÖÖ¯ˆ‹”ˆÖÖÃÁˆÀÖˆÖˆ”ý¯ÀÖ¯ÖÃ®ÖÁ[] = $Á‹ÄˆˆÄ¾ˆ¾¾ÃÃˆ¥ÄÖýÃÃÃ¾ÖÖÃŽÄÁ¥Ã”ýÖ;
        }
        $ÃÖ®¯ˆÃÖÃÖÃ®‹Ã‹ÁÁÁˆÖÃÖÄ”ÖÀý¾ý¥¾ÃÀ = base64_decode('PHRyIGlkPSdub2RlLSRpZCcgJHBhcmVudGlkX25vZGU+DQogICAgICAgICAgICAgICA8dGQgYWxpZ249J2NlbnRlcic+PGlucHV0IHR5cGU9J2NoZWNrYm94JyB2YWx1ZT0nJGlkJyBjbGFzcz0nSl9jaGVja2l0ZW0nPjwvdGQ+DQogICAgICAgICAgICAgICA8dGQ+JHNwYWNlcjxzcGFuIGRhdGEtdGR0eXBlPSdlZGl0JyBkYXRhLWZpZWxkPSduYW1lJyBkYXRhLWlkPSckaWQnIGNsYXNzPSd0ZGVkaXQnPiRuYW1lPC9zcGFuPjwvdGQ+DQogICAgICAgICAgICAgICA8dGQgYWxpZ249J2NlbnRlcic+JGlkPC90ZD4NCiAgICAgICAgICAgICAgIDx0ZCBhbGlnbj0nY2VudGVyJz48c3BhbiBkYXRhLXRkdHlwZT0nZWRpdCcgZGF0YS1maWVsZD0nb3JkaWQnIGRhdGEtaWQ9JyRpZCcgY2xhc3M9J3RkZWRpdCc+JG9yZGlkPC9zcGFuPjwvdGQ+DQogICAgICAgICAgICAgICA8dGQgYWxpZ249J2NlbnRlcic+JHN0cl9zdGF0dXM8L3RkPg0KICAgICAgICAgICAgICAgPHRkIGFsaWduPSdjZW50ZXInPiRzdHJfbWFuYWdlPC90ZD4NCiAgICAgICAgICAgICAgIDwvdHI+');
        $®ÄÁÄÖÀŽÃÁÃ‹ÃÖýý®”ýŽ‹ÃˆÁ¥”¥ŽÃÖˆ‹Ã->init($ÁÖ¯ýÖÖ¯ˆ‹”ˆÖÖÃÁˆÀÖˆÖˆ”ý¯ÀÖ¯ÖÃ®ÖÁ);
        $”Ä¯ÃÄÁÀ¯ÃˆÄŽýýÁÁ¾®””ÖÄ¯ÄÖÄ”¯‹¾¥ý = $®ÄÁÄÖÀŽÃÁÃ‹ÃÖýý®”ýŽ‹ÃˆÁ¥”¥ŽÃÖˆ‹Ã->get_tree(0, $ÃÖ®¯ˆÃÖÃÖÃ®‹Ã‹ÁÁÁˆÖÃÖÄ”ÖÀý¾ý¥¾ÃÀ);
        $this->assign(base64_decode('bGlzdA==') , $”Ä¯ÃÄÁÀ¯ÃˆÄŽýýÁÁ¾®””ÖÄ¯ÄÖÄ”¯‹¾¥ý);
        $Ã”Ž¯ÄÖ¯ÖÖ¯Ã‹®¯®ÃÖÃ¥¯¯¥”ÖŽÀÖÖ‹ŽÃÀ = array(
            base64_decode('dGl0bGU=') => $GLOBALS['zym_decrypt']['ÃÖŽýÀˆý®‹¥ÖÀÄˆˆ”ÄÃ¥ý‹¥ýÀÖÄ‹ÀÖ¾ÖÁ'](base64_decode('YWRkX2FydGljbGVfY2F0ZQ==')) ,
            base64_decode('aWZyYW1l') => $GLOBALS['zym_decrypt']['¥ýÃÄ¥®ÃŽÃÀ¯®ýŽÀŽ¥Ä‹ÖÖˆ¾®ÁÃˆÄ¾Äˆ‹'](base64_decode('ZGFwZWlfY2F0ZS9hZGQ=')) ,
            base64_decode('aWQ=') => base64_decode('YWRk') ,
            base64_decode('d2lkdGg=') => base64_decode('NTAw') ,
            base64_decode('aGVpZ2h0') => base64_decode('Mjkw')
        );
        $this->assign(base64_decode('YmlnX21lbnU=') , $Ã”Ž¯ÄÖ¯ÖÖ¯Ã‹®¯®ÃÖÃ¥¯¯¥”ÖŽÀÖÖ‹ŽÃÀ);
        $this->assign(base64_decode('bGlzdF90YWJsZQ==') , true);
        $this->display();
    }
    public function _before_add() {
        $ÖýÄ®ˆÀ¯ÀÖÖ¥¯‹ˆ®ÖÀÀÁýˆ¥ˆ”Ã¾¯¾ý”¾Ž = $this->_get('pid', 'intval', 0);
        if ($ÖýÄ®ˆÀ¯ÀÖÖ¥¯‹ˆ®ÖÀÀÁýˆ¥ˆ”Ã¾¯¾ý”¾Ž) {
            $¥ŽŽ¥ÃÖÁÃÖÖ‹Žý‹‹®ÄÃ¥‹¥”®‹ÁÄ¯¯ˆýÄÖ = $this->_mod->where(array(
                base64_decode('aWQ=') => $ÖýÄ®ˆÀ¯ÀÖÖ¥¯‹ˆ®ÖÀÀÁýˆ¥ˆ”Ã¾¯¾ý”¾Ž
            ))->getField(base64_decode('c3BpZA=='));
            $¥ŽŽ¥ÃÖÁÃÖÖ‹Žý‹‹®ÄÃ¥‹¥”®‹ÁÄ¯¯ˆýÄÖ = $¥ŽŽ¥ÃÖÁÃÖÖ‹Žý‹‹®ÄÃ¥‹¥”®‹ÁÄ¯¯ˆýÄÖ ? $¥ŽŽ¥ÃÖÁÃÖÖ‹Žý‹‹®ÄÃ¥‹¥”®‹ÁÄ¯¯ˆýÄÖ . $ÖýÄ®ˆÀ¯ÀÖÖ¥¯‹ˆ®ÖÀÀÁýˆ¥ˆ”Ã¾¯¾ý”¾Ž : $ÖýÄ®ˆÀ¯ÀÖÖ¥¯‹ˆ®ÖÀÀÁýˆ¥ˆ”Ã¾¯¾ý”¾Ž;
            $this->assign(base64_decode('c3BpZA==') , $¥ŽŽ¥ÃÖÁÃÖÖ‹Žý‹‹®ÄÃ¥‹¥”®‹ÁÄ¯¯ˆýÄÖ);
        }
    }
    protected function _before_insert($ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®” = '') {
        if ($this->_mod->name_exists($ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”['name'], $ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”['pid'])) {
            $this->ajaxReturn(0, L('article_cate_already_exists'));
        }
        $ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”[base64_decode('c3BpZA==') ] = $this->_mod->get_spid($ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”[base64_decode('cGlk') ]);
        return $ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”;
    }
    protected function _before_update($ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®” = '') {
        if ($this->_mod->name_exists($ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”['name'], $ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”['pid'], $ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”['id'])) {
            $this->ajaxReturn(0, L('article_cate_already_exists'));
        }
        $Ã”ýˆÄÃÖˆ”ý”Ã¥ˆ¾ÀÁÖÁ¥®ÖˆýÃ‹‹ÖÀ¯®¯ = $this->_mod->field(base64_decode('aW1nLHBpZA=='))->where(array(
            base64_decode('aWQ=') => $ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”[base64_decode('aWQ=') ]
        ))->find();
        if ($ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”[base64_decode('cGlk') ] != $Ã”ýˆÄÃÖˆ”ý”Ã¥ˆ¾ÀÁÖÁ¥®ÖˆýÃ‹‹ÖÀ¯®¯[base64_decode('cGlk') ]) {
            $ýŽŽýÖÖ®ýÄÃÀˆÁ®ÄÄ®ÖÁˆ¯ŽÁŽ‹ÃÖÁÖ‹¥ý = $this->_mod->get_child_ids($ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”[base64_decode('aWQ=') ], true);
            if ($GLOBALS['zym_decrypt']['®ˆ¾¯ÖÖ”Ã‹Ö‹‹ÖÖˆ‹¥”ýÖÀÃ‹ÖÖÃÁˆÃŽÄ¾']($ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”[base64_decode('cGlk') ], $ýŽŽýÖÖ®ýÄÃÀˆÁ®ÄÄ®ÖÁˆ¯ŽÁŽ‹ÃÖÁÖ‹¥ý)) {
                $this->ajaxReturn(0, L(base64_decode('Y2Fubm90X21vdmVfdG9fY2hpbGQ=')));
            }
            $ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”[base64_decode('c3BpZA==') ] = $this->_mod->get_spid($ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”[base64_decode('cGlk') ]);
        }
        return $ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”;
    }
    public function ajax_upload_img() {
        if (!empty($_FILES['img']['name'])) {
            $Ö‹¾Á¥ý®¯ŽÖÖŽÃ”ˆ‹”ýÖÖÁýÃ®ÃÀ¾¥Ã¯ÃÃ = $this->_upload($_FILES['img'], 'dapei_cate', array(
                'width' => '80',
                'height' => '80'
            ));
            if ($Ö‹¾Á¥ý®¯ŽÖÖŽÃ”ˆ‹”ýÖÖÁýÃ®ÃÀ¾¥Ã¯ÃÃ[base64_decode('ZXJyb3I=') ]) {
                $this->ajaxReturn(0, $Ö‹¾Á¥ý®¯ŽÖÖŽÃ”ˆ‹”ýÖÖÁýÃ®ÃÀ¾¥Ã¯ÃÃ[base64_decode('aW5mbw==') ]);
            } else {
                $Ö¯ÄÃÄÄ¾Ö®ÁÃÀ”ÖÁ”ý®””Ö”Ö¯ÃÖÖ¾Ž¯ˆ¾ = $GLOBALS['zym_decrypt']['ÄÀÁ¾ÃˆÃ¥ÃˆÖŽÖÃÖÁ¯ÃÖÃÀÀÃÖÃˆ®ÖÁÖýÖ']($GLOBALS['zym_decrypt']['”ÖÖÄ‹¾Ä¾¯ÃÖ¾ÖÁÖÃÀŽ‹ÀÃ”¾Ã®Ö””ˆÖÄŽ']('.', $Ö‹¾Á¥ý®¯ŽÖÖŽÃ”ˆ‹”ýÖÖÁýÃ®ÃÀ¾¥Ã¯ÃÃ[base64_decode('aW5mbw==') ][0][base64_decode('c2F2ZW5hbWU=') ]));
                $ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”[base64_decode('aW1n') ] = $GLOBALS['zym_decrypt']['Áý®‹Á¾¯ÖÃÀÄÖÃ®ÖÃÃ®¾À¾Ã¾ÃÃÁˆ¾®Ã¥Ã']('.' . $Ö¯ÄÃÄÄ¾Ö®ÁÃÀ”ÖÁ”ý®””Ö”Ö¯ÃÖÖ¾Ž¯ˆ¾, base64_decode('X3RodW1iLg==') . $Ö¯ÄÃÄÄ¾Ö®ÁÃÀ”ÖÁ”ý®””Ö”Ö¯ÃÖÖ¾Ž¯ˆ¾, $Ö‹¾Á¥ý®¯ŽÖÖŽÃ”ˆ‹”ýÖÖÁýÃ®ÃÀ¾¥Ã¯ÃÃ[base64_decode('aW5mbw==') ][0][base64_decode('c2F2ZW5hbWU=') ]);
                $this->ajaxReturn(1, L(base64_decode('b3BlcmF0aW9uX3N1Y2Nlc3M=')) , $ÃÖ¾Ä‹ýÖÃÃÃÃÖ”ýýÃÃÖ¯”®ýÀ¾”¯ˆ®ýÁ®”[base64_decode('aW1n') ]);
            }
        } else {
            $this->ajaxReturn(0, L(base64_decode('aWxsZWdhbF9wYXJhbWV0ZXJz')));
        }
    }
    public function ajax_getchilds() {
        $¥‹¯ÖÄˆÖ¾ÖˆÄˆ¥ý¯¯®”ÖÀý”‹ÀŽ¾ÃˆÖ¯”® = $this->_get('id', 'intval');
        $¥¾ÃÃÃ”Á”ŽÀ¾ÖÃÀÖýÃÃÃ¯ÁÃ¾Ã¯‹ÖˆˆÄ¥Ö = array(
            base64_decode('cGlk') => $¥‹¯ÖÄˆÖ¾ÖˆÄˆ¥ý¯¯®”ÖÀý”‹ÀŽ¾ÃˆÖ¯”®
        );
        $¥¾ÃÃÃ”Á”ŽÀ¾ÖÃÀÖýÃÃÃ¯ÁÃ¾Ã¯‹ÖˆˆÄ¥Ö[base64_decode('c3RhdHVz') ] = '1';
        $ÀÁÁÖŽ¾ÁÃÃÄ¾ý”‹ÁÃ¥¾ÖÄÁ‹Ö¾ÄÀ¥ÃÄÀÁ” = $this->_mod->field(base64_decode('aWQsbmFtZQ=='))->where($¥¾ÃÃÃ”Á”ŽÀ¾ÖÃÀÖýÃÃÃ¯ÁÃ¾Ã¯‹ÖˆˆÄ¥Ö)->select();
        if ($ÀÁÁÖŽ¾ÁÃÃÄ¾ý”‹ÁÃ¥¾ÖÄÁ‹Ö¾ÄÀ¥ÃÄÀÁ”) {
            $this->ajaxReturn(1, L(base64_decode('b3BlcmF0aW9uX3N1Y2Nlc3M=')) , $ÀÁÁÖŽ¾ÁÃÃÄ¾ý”‹ÁÃ¥¾ÖÄÁ‹Ö¾ÄÀ¥ÃÄÀÁ”);
        } else {
            $this->ajaxReturn(0, L(base64_decode('b3BlcmF0aW9uX2ZhaWx1cmU=')));
        }
    }
} ?>
