<?php
 

global $zym_decrypt;
$zym_decrypt['Ž¯ÀÖÖ¯”ÃÁ¯ÃÖˆ‹Ã¥Ž”ÃÃý®¥®ÄÄ¯Ã¯¥Öˆ'] = base64_decode('X2luaXRpYWxpemU=');
$zym_decrypt['Ž¯¯”‹¯¯¾®¥Ã”®ÄýÁ¥¯”Ãˆ¥ŽÃ‹Ž”®¯¾ˆ®'] = base64_decode('aGVhZGVy');
$zym_decrypt['”ÃÖ®ˆÁ¾À”®ŽˆÃÖ‹‹ÃÁ®ÃÃÃ”¾‹¾Ž‹‹Á‹¾'] = base64_decode('RA==');
$zym_decrypt['¾”ýÁ®Ö®ÄÄ¯Ž¾ý‹ÖÁˆÖÖÃÃÁ”¥”Ã¾ÄÄ”Á”'] = base64_decode('ZGF0ZQ==');
$zym_decrypt['ÄÀÁ¾ÃˆÃ¥ÃˆÖŽÖÃÖÁ¯ÃÖÃÀÀÃÖÃˆ®ÖÁÖýÖ'] = base64_decode('YXJyYXlfcG9w');
$zym_decrypt['”ÖÖÄ‹¾Ä¾¯ÃÖ¾ÖÁÖÃÀŽ‹ÀÃ”¾Ã®Ö””ˆÖÄŽ'] = base64_decode('ZXhwbG9kZQ==');
$zym_decrypt['Áý®‹Á¾¯ÖÃÀÄÖÃ®ÖÃÃ®¾À¾Ã¾ÃÃÁˆ¾®Ã¥Ã'] = base64_decode('c3RyX3JlcGxhY2U=');
$zym_decrypt['ÖÖÁÁˆŽ¯ÄŽÃÁ¾ŽÄ¯¾‹¥¥ÖÁ¯ÁÃÄÃˆŽ¯ÄÀÃ'] = base64_decode('ZA==');
$zym_decrypt['ÃÁ¥ÃÖÄˆ®Ö¾¾‹¯ÄˆŽÖŽÖÁ”Ö¥¯¯Ä¾ÀˆÄŽˆ'] = base64_decode('aW1wbG9kZQ=='); 

class dapeiAction extends BackendAction {
    public function _initialize() {
        parent::$GLOBALS['zym_decrypt']['Ž¯ÀÖÖ¯”ÃÁ¯ÃÖˆ‹Ã¥Ž”ÃÃý®¥®ÄÄ¯Ã¯¥Öˆ']();
        $this->_mod = D(base64_decode('YXJ0aWNsZQ=='));
        $this->_cate_mod = D(base64_decode('YXJ0aWNsZV9jYXRl'));
        $GLOBALS['zym_decrypt']['Ž¯¯”‹¯¯¾®¥Ã”®ÄýÁ¥¯”Ãˆ¥ŽÃ‹Ž”®¯¾ˆ®'](base64_decode('Q29udGVudC1UeXBlOnRleHQvaHRtbDsgY2hhcnNldD11dGYtOA=='));

    }
    public function _before_index() {
        $sort = $this->_request("sort", 'trim', 'ordid');
        $ÁŽÀÄÁ””ÀÁÖÖÀ®¯Ö¾‹ÖÃÃ®Ž‹Ž®¥ÀÃŽÃÃÁ = $this->_request(base64_decode('b3JkZXI=') , base64_decode('dHJpbQ==') , base64_decode('REVTQw=='));
        $¯‹ÖŽÁÄÃÁˆ¾®ÖÄý¥ÁÃÖÖýÃ‹¥”¾ÖÀÃÖ®”‹ = $this->_cate_mod->order($sort . ' ' . $ÁŽÀÄÁ””ÀÁÖÖÀ®¯Ö¾‹ÖÃÃ®Ž‹Ž®¥ÀÃŽÃÃÁ)->field(base64_decode('aWQsbmFtZQ=='))->select();
        $‹¾¯ýÃÃÖÖÀ‹Ä”ŽÁ‹‹ÀÃÃ®ÃÃÁ”Ö¥ÃÖÃ¥Ö‹ = array();
        foreach ($¯‹ÖŽÁÄÃÁˆ¾®ÖÄý¥ÁÃÖÖýÃ‹¥”¾ÖÀÃÖ®”‹ as $®ÀÃÃŽÖÖ¥ˆÁ¥®Ãý¥À¯‹ÖÃ”¯ÁÃÃÃÃÄÀ®‹”) {
            $‹¾¯ýÃÃÖÖÀ‹Ä”ŽÁ‹‹ÀÃÃ®ÃÃÁ”Ö¥ÃÖÃ¥Ö‹[$®ÀÃÃŽÖÖ¥ˆÁ¥®Ãý¥À¯‹ÖÃ”¯ÁÃÃÃÃÄÀ®‹”[base64_decode('aWQ=') ]] = $®ÀÃÃŽÖÖ¥ˆÁ¥®Ãý¥À¯‹ÖÃ”¯ÁÃÃÃÃÄÀ®‹”[base64_decode('bmFtZQ==') ];
        }
        $this->assign(base64_decode('Y2F0ZV9saXN0') , $‹¾¯ýÃÃÖÖÀ‹Ä”ŽÁ‹‹ÀÃÃ®ÃÃÁ”Ö¥ÃÖÃ¥Ö‹);
        $Ö®ÖÁÖý¯ÄÄÁÄ®®Ö¯ŽÖˆŽ”ˆŽ”‹¯ÁÀÖý¥ÁÀ = $this->_get('p', base64_decode('aW50dmFs') , 1);
        $this->assign('p', $Ö®ÖÁÖý¯ÄÄÁÄ®®Ö¯ŽÖˆŽ”ˆŽ”‹¯ÁÀÖý¥ÁÀ);
    }
    protected function _search() {
        $ÄÃÁÖÃýÖˆÃ¾ÄÖÄ¥ˆ¾ÄÖ‹¾ÄÄ¥”ˆÖ¥¥¯ŽÀˆ = array();
        ($Á¾¾Ä”ý¥ÄÄˆ‹Ö¾”¯¥ý”ŽýÄÃ¯‹Ä®ýÀ”ŽˆŽ = $this->_request(base64_decode('dGltZV9zdGFydA==') , base64_decode('dHJpbQ=='))) && $ÄÃÁÖÃýÖˆÃ¾ÄÖÄ¥ˆ¾ÄÖ‹¾ÄÄ¥”ˆÖ¥¥¯ŽÀˆ[base64_decode('YWRkX3RpbWU=') ][] = array(
            base64_decode('ZWd0') ,
            strtotime($Á¾¾Ä”ý¥ÄÄˆ‹Ö¾”¯¥ý”ŽýÄÃ¯‹Ä®ýÀ”ŽˆŽ)
        );
        ($”Ä”ÃÃýÄÀ¥ÄÖÀ®¯Ã¯ÃÃ¯ŽÃýÀÁ‹ÖÃÖ”Ö¾Ö = $this->_request(base64_decode('dGltZV9lbmQ=') , base64_decode('dHJpbQ=='))) && $ÄÃÁÖÃýÖˆÃ¾ÄÖÄ¥ˆ¾ÄÖ‹¾ÄÄ¥”ˆÖ¥¥¯ŽÀˆ[base64_decode('YWRkX3RpbWU=') ][] = array(
            base64_decode('ZWx0') ,
            strtotime($”Ä”ÃÃýÄÀ¥ÄÖÀ®¯Ã¯ÃÃ¯ŽÃýÀÁ‹ÖÃÖ”Ö¾Ö) + (24 * 60 * 60 - 1)
        );
        ($¯Àý‹¥¥¾¥¯‹¥Ä¾Ã®Ã¯Á‹‹¥¯ŽÄ¥¥ˆýÃÖ¾Ö = $this->_request(base64_decode('c3RhdHVz') , base64_decode('dHJpbQ=='))) && $ÄÃÁÖÃýÖˆÃ¾ÄÖÄ¥ˆ¾ÄÖ‹¾ÄÄ¥”ˆÖ¥¥¯ŽÀˆ[base64_decode('c3RhdHVz') ] = $¯Àý‹¥¥¾¥¯‹¥Ä¾Ã®Ã¯Á‹‹¥¯ŽÄ¥¥ˆýÃÖ¾Ö;
        ($ÃÁÃ”¾‹Ã¥Ã”ÄÄÖÄˆ”ÄÃÃÖÃÃ¥ÃÀÄ®ÀÀÖÃŽ = $this->_request(base64_decode('a2V5d29yZA==') , base64_decode('dHJpbQ=='))) && $ÄÃÁÖÃýÖˆÃ¾ÄÖÄ¥ˆ¾ÄÖ‹¾ÄÄ¥”ˆÖ¥¥¯ŽÀˆ[base64_decode('dGl0bGU=') ] = array(
            base64_decode('bGlrZQ==') ,
            '%' . $ÃÁÃ”¾‹Ã¥Ã”ÄÄÖÄˆ”ÄÃÃÖÃÃ¥ÃÀÄ®ÀÀÖÃŽ . '%'
        );
        $À®ÀÖý®ÁÖˆ‹¯ÃÀÃ”ÖÖ¥ˆ‹‹Ã¾¥ýˆŽÁÁÃýÃ = $this->_request(base64_decode('Y2F0ZV9pZA==') , base64_decode('aW50dmFs'));
        $ÁÖÁýÁ¾Ö‹ýý¥‹”Á¥ÃÁ¯Öˆ¥¯ÖÃ¾ÖŽÃÁˆÖˆ = '';
        if ($À®ÀÖý®ÁÖˆ‹¯ÃÀÃ”ÖÖ¥ˆ‹‹Ã¾¥ýˆŽÁÁÃýÃ) {
            $ÃÄ‹¥ýÁÃ‹ý¾ˆŽÖÖÃÃ”¯ýÃÁÖÖ‹ÖÖýÀ”ÃÀÄ = $this->_cate_mod->get_child_ids($À®ÀÖý®ÁÖˆ‹¯ÃÀÃ”ÖÖ¥ˆ‹‹Ã¾¥ýˆŽÁÁÃýÃ, true);
            $ÄÃÁÖÃýÖˆÃ¾ÄÖÄ¥ˆ¾ÄÖ‹¾ÄÄ¥”ˆÖ¥¥¯ŽÀˆ[base64_decode('Y2F0ZV9pZA==') ] = array(
                base64_decode('SU4=') ,
                $ÃÄ‹¥ýÁÃ‹ý¾ˆŽÖÖÃÃ”¯ýÃÁÖÖ‹ÖÖýÀ”ÃÀÄ
            );
            $Žˆ¥ÖÁý‹¯¥ÖÄ¯ŽÃ‹‹ÁÖ¥Ö¯”ÖÀ”ÃŽ¥À¯¯Ö = $this->_cate_mod->where(array(
                base64_decode('aWQ=') => $À®ÀÖý®ÁÖˆ‹¯ÃÀÃ”ÖÖ¥ˆ‹‹Ã¾¥ýˆŽÁÁÃýÃ
            ))->getField(base64_decode('c3BpZA=='));
            $ÁÖÁýÁ¾Ö‹ýý¥‹”Á¥ÃÁ¯Öˆ¥¯ÖÃ¾ÖŽÃÁˆÖˆ = $Žˆ¥ÖÁý‹¯¥ÖÄ¯ŽÃ‹‹ÁÖ¥Ö¯”ÖÀ”ÃŽ¥À¯¯Ö ? $Žˆ¥ÖÁý‹¯¥ÖÄ¯ŽÃ‹‹ÁÖ¥Ö¯”ÖÀ”ÃŽ¥À¯¯Ö . $À®ÀÖý®ÁÖˆ‹¯ÃÀÃ”ÖÖ¥ˆ‹‹Ã¾¥ýˆŽÁÁÃýÃ : $À®ÀÖý®ÁÖˆ‹¯ÃÀÃ”ÖÖ¥ˆ‹‹Ã¾¥ýˆŽÁÁÃýÃ;
        }
        $this->assign(base64_decode('c2VhcmNo') , array(
            base64_decode('dGltZV9zdGFydA==') => $Á¾¾Ä”ý¥ÄÄˆ‹Ö¾”¯¥ý”ŽýÄÃ¯‹Ä®ýÀ”ŽˆŽ,
            base64_decode('dGltZV9lbmQ=') => $”Ä”ÃÃýÄÀ¥ÄÖÀ®¯Ã¯ÃÃ¯ŽÃýÀÁ‹ÖÃÖ”Ö¾Ö,
            base64_decode('Y2F0ZV9pZA==') => $À®ÀÖý®ÁÖˆ‹¯ÃÀÃ”ÖÖ¥ˆ‹‹Ã¾¥ýˆŽÁÁÃýÃ,
            base64_decode('c2VsZWN0ZWRfaWRz') => $ÁÖÁýÁ¾Ö‹ýý¥‹”Á¥ÃÁ¯Öˆ¥¯ÖÃ¾ÖŽÃÁˆÖˆ,
            base64_decode('c3RhdHVz') => $¯Àý‹¥¥¾¥¯‹¥Ä¾Ã®Ã¯Á‹‹¥¯ŽÄ¥¥ˆýÃÖ¾Ö,
            base64_decode('a2V5d29yZA==') => $ÃÁÃ”¾‹Ã¥Ã”ÄÄÖÄˆ”ÄÃÃÖÃÃ¥ÃÀÄ®ÀÀÖÃŽ,
        ));
        return $ÄÃÁÖÃýÖˆÃ¾ÄÖÄ¥ˆ¾ÄÖ‹¾ÄÄ¥”ˆÖ¥¥¯ŽÀˆ;
    }
    public function _before_add() {
        $ŽÖ‹Ã¯Ö”ÀÀ®ÖÀÀÀÃýýŽˆÀÁ¾ˆ¾¯¯®ÁÀÄˆ” = $_SESSION['pp_admin']['username'];
        $this->assign(base64_decode('YXV0aG9y') , $ŽÖ‹Ã¯Ö”ÀÀ®ÖÀÀÀÃýýŽˆÀÁ¾ˆ¾¯¯®ÁÀÄˆ”);
        $ŽÖ‹Ö¯Ã®ýÀˆýÁý”ÁˆŽ¾Ã¥Àˆ®‹”¯ÃÖ®®ŽÖ = $GLOBALS['zym_decrypt']['”ÃÖ®ˆÁ¾À”®ŽˆÃÖ‹‹ÃÁ®ÃÃÃ”¾‹¾Ž‹‹Á‹¾'](base64_decode('c2V0dGluZw=='))->where(array(
            base64_decode('bmFtZQ==') => base64_decode('c2l0ZV9uYW1l')
        ))->getField(base64_decode('ZGF0YQ=='));
        $this->assign(base64_decode('c2l0ZV9uYW1l') , $ŽÖ‹Ö¯Ã®ýÀˆýÁý”ÁˆŽ¾Ã¥Àˆ®‹”¯ÃÖ®®ŽÖ);
        $ˆÃ¾ÃÁ”Ä‹”ÖŽˆ¾ˆˆŽˆ¾ÃÃ¯ÃÃˆýÃÁŽÃý‹¾ = $this->_cate_mod->field(base64_decode('aWQsbmFtZQ=='))->where(array(
            base64_decode('cGlk') => 0
        ))->order(base64_decode('b3JkaWQgREVTQw=='))->select();
        $this->assign(base64_decode('Zmlyc3RfY2F0ZQ==') , $ˆÃ¾ÃÁ”Ä‹”ÖŽˆ¾ˆˆŽˆ¾ÃÃ¯ÃÃˆýÃÁŽÃý‹¾);
    }
    public function _before_edit() {
        $‹ÖŽ‹‹ÁÁ¥ŽÖÖÖ”ÃÀÄ”ÖŽÄÖ¯Ž®Á¾ÀÃŽýÖ” = $this->_get('id', 'intval');
        $¯ÖÀÖ‹¾ý‹¯ýÃ¯ŽÃŽ®¾ýÖÖÃ¥”ÀÖÖ¾ˆÄ¯¥Ž = $this->_mod->field(base64_decode('aWQsY2F0ZV9pZA=='))->where(array(
            base64_decode('aWQ=') => $‹ÖŽ‹‹ÁÁ¥ŽÖÖÖ”ÃÀÄ”ÖŽÄÖ¯Ž®Á¾ÀÃŽýÖ”
        ))->find();
        $Žˆ¥ÖÁý‹¯¥ÖÄ¯ŽÃ‹‹ÁÖ¥Ö¯”ÖÀ”ÃŽ¥À¯¯Ö = $this->_cate_mod->where(array(
            base64_decode('aWQ=') => $¯ÖÀÖ‹¾ý‹¯ýÃ¯ŽÃŽ®¾ýÖÖÃ¥”ÀÖÖ¾ˆÄ¯¥Ž[base64_decode('Y2F0ZV9pZA==') ]
        ))->getField(base64_decode('c3BpZA=='));
        if ($Žˆ¥ÖÁý‹¯¥ÖÄ¯ŽÃ‹‹ÁÖ¥Ö¯”ÖÀ”ÃŽ¥À¯¯Ö == 0) {
            $Žˆ¥ÖÁý‹¯¥ÖÄ¯ŽÃ‹‹ÁÖ¥Ö¯”ÖÀ”ÃŽ¥À¯¯Ö = $¯ÖÀÖ‹¾ý‹¯ýÃ¯ŽÃŽ®¾ýÖÖÃ¥”ÀÖÖ¾ˆÄ¯¥Ž[base64_decode('Y2F0ZV9pZA==') ];
        } else {
            $Žˆ¥ÖÁý‹¯¥ÖÄ¯ŽÃ‹‹ÁÖ¥Ö¯”ÖÀ”ÃŽ¥À¯¯Ö.= $¯ÖÀÖ‹¾ý‹¯ýÃ¯ŽÃŽ®¾ýÖÖÃ¥”ÀÖÖ¾ˆÄ¯¥Ž[base64_decode('Y2F0ZV9pZA==') ];
        }
        $this->assign(base64_decode('c2VsZWN0ZWRfaWRz') , $Žˆ¥ÖÁý‹¯¥ÖÄ¯ŽÃ‹‹ÁÖ¥Ö¯”ÖÀ”ÃŽ¥À¯¯Ö);
    }
    public function ajax_upload_img() {
        $¾¯¯ÃýýˆÖ¯¯ÖÀÃ‹¥Ž‹Äˆ®ÖˆÖýÃŽŽÃý‹ŽÀ = $this->_get('type', 'trim', 'img');
        if (!empty($_FILES[$¾¯¯ÃýýˆÖ¯¯ÖÀÃ‹¥Ž‹Äˆ®ÖˆÖýÃŽŽÃý‹ŽÀ][base64_decode('bmFtZQ==') ])) {
            $dir = $GLOBALS['zym_decrypt']['¾”ýÁ®Ö®ÄÄ¯Ž¾ý‹ÖÁˆÖÖÃÃÁ”¥”Ã¾ÄÄ”Á”'](base64_decode('eW0vZC8='));
            $‹¥ÀÖÖ¥ÄÁ‹®ÃŽÄÁŽÃÁ¾¥ýÃ¥Áý®Ž‹ÁÖÄÃÀ = $this->_upload($_FILES[base64_decode('aW1n') ], base64_decode('YXJ0aWNsZS8=') . $dir, array(
                base64_decode('d2lkdGg=') => base64_decode('Mjgw') ,
                base64_decode('aGVpZ2h0') => base64_decode('Mjgw')
            ));
            if ($‹¥ÀÖÖ¥ÄÁ‹®ÃŽÄÁŽÃÁ¾¥ýÃ¥Áý®Ž‹ÁÖÄÃÀ[base64_decode('ZXJyb3I=') ]) {
                $this->ajaxReturn(0, $‹¥ÀÖÖ¥ÄÁ‹®ÃŽÄÁŽÃÁ¾¥ýÃ¥Áý®Ž‹ÁÖÄÃÀ[base64_decode('aW5mbw==') ]);
            } else {
                $®À¾Ä¥¥Ö®ÄÀ¥”¥ýÃÁÃÖˆ¥”ˆÄ‹¾ý®Ã¥Ž‹¥ = $dir . $‹¥ÀÖÖ¥ÄÁ‹®ÃŽÄÁŽÃÁ¾¥ýÃ¥Áý®Ž‹ÁÖÄÃÀ[base64_decode('aW5mbw==') ][0][base64_decode('c2F2ZW5hbWU=') ];
                $À‹”ÁÁÄÖ¥”¾¾¥Ž®ÃÁ¾‹¯Ã¾ÄÃÁ¯ÄÃÖÀÁýÀ = $GLOBALS['zym_decrypt']['ÄÀÁ¾ÃˆÃ¥ÃˆÖŽÖÃÖÁ¯ÃÖÃÀÀÃÖÃˆ®ÖÁÖýÖ']($GLOBALS['zym_decrypt']['”ÖÖÄ‹¾Ä¾¯ÃÖ¾ÖÁÖÃÀŽ‹ÀÃ”¾Ã®Ö””ˆÖÄŽ']('.', $®À¾Ä¥¥Ö®ÄÀ¥”¥ýÃÁÃÖˆ¥”ˆÄ‹¾ý®Ã¥Ž‹¥));
                $ÖÃÁÁÁ”®Ö¾Ã®Ã”ˆýÖÖÄ¾ÃÖŽ”Á¥¯ÃŽÖÃÃý[base64_decode('aW1n') ] = $GLOBALS['zym_decrypt']['Áý®‹Á¾¯ÖÃÀÄÖÃ®ÖÃÃ®¾À¾Ã¾ÃÃÁˆ¾®Ã¥Ã']('.' . $À‹”ÁÁÄÖ¥”¾¾¥Ž®ÃÁ¾‹¯Ã¾ÄÃÁ¯ÄÃÖÀÁýÀ, base64_decode('X3RodW1iLg==') . $À‹”ÁÁÄÖ¥”¾¾¥Ž®ÃÁ¾‹¯Ã¾ÄÃÁ¯ÄÃÖÀÁýÀ, $®À¾Ä¥¥Ö®ÄÀ¥”¥ýÃÁÃÖˆ¥”ˆÄ‹¾ý®Ã¥Ž‹¥);
                $this->ajaxReturn(1, L(base64_decode('b3BlcmF0aW9uX3N1Y2Nlc3M=')) , $ÖÃÁÁÁ”®Ö¾Ã®Ã”ˆýÖÖÄ¾ÃÖŽ”Á¥¯ÃŽÖÃÃý[base64_decode('aW1n') ]);
            }
        } else {
            $this->ajaxReturn(0, L(base64_decode('aWxsZWdhbF9wYXJhbWV0ZXJz')));
        }
    }
    public function ajax_gettags() {
        $Ã¾Ã®Ã‹ÄÁÃ¾ÖÖÁˆˆ”ÁÁÃÁ¯ÖÁýý¯¾Ã”¾ŽÀ = $this->_get("title", "trim");
        $Ž¥ýÄý”ˆ¯ÃýŽÁŽÄýŽ”¯¯ÀÁ¥ÁÖÃÃÃŽÃÖ®À = $GLOBALS['zym_decrypt']['ÖÖÁÁˆŽ¯ÄŽÃÁ¾ŽÄ¯¾‹¥¥ÖÁ¯ÁÃÄÃˆŽ¯ÄÀÃ'](base64_decode('aXRlbXM='))->get_tags_by_title($Ã¾Ã®Ã‹ÄÁÃ¾ÖÖÁˆˆ”ÁÁÃÁ¯ÖÁýý¯¾Ã”¾ŽÀ);
        $Ã¾ÁÀý¥¾Ö¾ÃÖ¥¯Ã¯‹Ä®ˆÖ¥ÖÖÃ¯Ä¾ÖŽ”‹¯ = $GLOBALS['zym_decrypt']['ÃÁ¥ÃÖÄˆ®Ö¾¾‹¯ÄˆŽÖŽÖÁ”Ö¥¯¯Ä¾ÀˆÄŽˆ'](",", $Ž¥ýÄý”ˆ¯ÃýŽÁŽÄýŽ”¯¯ÀÁ¥ÁÖÃÃÃŽÃÖ®À);
        $this->ajaxReturn(1, l(base64_decode('b3BlcmF0aW9uX3N1Y2Nlc3M=')) , $Ã¾ÁÀý¥¾Ö¾ÃÖ¥¯Ã¯‹Ä®ˆÖ¥ÖÖÃ¯Ä¾ÖŽ”‹¯);
    }
}
unset($zym_5); ?>
