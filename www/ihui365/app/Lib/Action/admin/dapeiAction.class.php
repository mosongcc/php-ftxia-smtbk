<?php
 

global $zym_decrypt;
$zym_decrypt['����֯�����ֈ�å���������įï�ֈ'] = base64_decode('X2luaXRpYWxpemU=');
$zym_decrypt['����������Ô�������È��Ë�������'] = base64_decode('aGVhZGVy');
$zym_decrypt['��֮���������֋������Ô���������'] = base64_decode('RA==');
$zym_decrypt['�����֮�į���������������þ�Ĕ��'] = base64_decode('ZGF0ZQ==');
$zym_decrypt['����ÈåÈ֎������������È������'] = base64_decode('YXJyYXlfcG9w');
$zym_decrypt['���ċ�ľ��־��������Ô�î֔���Ď'] = base64_decode('ZXhwbG9kZQ==');
$zym_decrypt['������������î��î���þ������å�'] = base64_decode('c3RyX3JlcGxhY2U=');
$zym_decrypt['�������Ď����į����������È�����'] = base64_decode('ZA==');
$zym_decrypt['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�'] = base64_decode('aW1wbG9kZQ=='); 

class dapeiAction extends BackendAction {
    public function _initialize() {
        parent::$GLOBALS['zym_decrypt']['����֯�����ֈ�å���������įï�ֈ']();
        $this->_mod = D(base64_decode('YXJ0aWNsZQ=='));
        $this->_cate_mod = D(base64_decode('YXJ0aWNsZV9jYXRl'));
        $GLOBALS['zym_decrypt']['����������Ô�������È��Ë�������'](base64_decode('Q29udGVudC1UeXBlOnRleHQvaHRtbDsgY2hhcnNldD11dGYtOA=='));

    }
    public function _before_index() {
        $sort = $this->_request("sort", 'trim', 'ordid');
        $��������������־���î������Î��� = $this->_request(base64_decode('b3JkZXI=') , base64_decode('dHJpbQ==') , base64_decode('REVTQw=='));
        $��֎����������������Ë������֮�� = $this->_cate_mod->order($sort . ' ' . $��������������־���î������Î���)->field(base64_decode('aWQsbmFtZQ=='))->select();
        $����������Ĕ������î����֥��å֋ = array();
        foreach ($��֎����������������Ë������֮�� as $���Î�֥�����������Ô�����������) {
            $����������Ĕ������î����֥��å֋[$���Î�֥�����������Ô�����������[base64_decode('aWQ=') ]] = $���Î�֥�����������Ô�����������[base64_decode('bmFtZQ==') ];
        }
        $this->assign(base64_decode('Y2F0ZV9saXN0') , $����������Ĕ������î����֥��å֋);
        $֮��������Į�֯�ֈ�������������� = $this->_get('p', base64_decode('aW50dmFs') , 1);
        $this->assign('p', $֮��������Į�֯�ֈ��������������);
    }
    protected function _search() {
        $������ֈþ��ĥ���֋��ĥ��֥����� = array();
        ($���Ĕ���Ĉ�־��������ï�Į������ = $this->_request(base64_decode('dGltZV9zdGFydA==') , base64_decode('dHJpbQ=='))) && $������ֈþ��ĥ���֋��ĥ��֥�����[base64_decode('YWRkX3RpbWU=') ][] = array(
            base64_decode('ZWd0') ,
            strtotime($���Ĕ���Ĉ�־��������ï�Į������)
        );
        ($�Ĕ�����������ï�ï��������֔־� = $this->_request(base64_decode('dGltZV9lbmQ=') , base64_decode('dHJpbQ=='))) && $������ֈþ��ĥ���֋��ĥ��֥�����[base64_decode('YWRkX3RpbWU=') ][] = array(
            base64_decode('ZWx0') ,
            strtotime($�Ĕ�����������ï�ï��������֔־�) + (24 * 60 * 60 - 1)
        );
        ($�����������ľîï������ĥ����־� = $this->_request(base64_decode('c3RhdHVz') , base64_decode('dHJpbQ=='))) && $������ֈþ��ĥ���֋��ĥ��֥�����[base64_decode('c3RhdHVz') ] = $�����������ľîï������ĥ����־�;
        ($��Ô��åÔ���Ĉ������å��Į���Î = $this->_request(base64_decode('a2V5d29yZA==') , base64_decode('dHJpbQ=='))) && $������ֈþ��ĥ���֋��ĥ��֥�����[base64_decode('dGl0bGU=') ] = array(
            base64_decode('bGlrZQ==') ,
            '%' . $��Ô��åÔ���Ĉ������å��Į���Î . '%'
        );
        $�������ֈ����Ô�֥���þ��������� = $this->_request(base64_decode('Y2F0ZV9pZA==') , base64_decode('aW50dmFs'));
        $������֋����������ֈ���þ֎���ֈ = '';
        if ($�������ֈ����Ô�֥���þ���������) {
            $�ċ���Ë�������Ô�����֋�������� = $this->_cate_mod->get_child_ids($�������ֈ����Ô�֥���þ���������, true);
            $������ֈþ��ĥ���֋��ĥ��֥�����[base64_decode('Y2F0ZV9pZA==') ] = array(
                base64_decode('SU4=') ,
                $�ċ���Ë�������Ô�����֋��������
            );
            $����������į�Ë��֥֯����Î����� = $this->_cate_mod->where(array(
                base64_decode('aWQ=') => $�������ֈ����Ô�֥���þ���������
            ))->getField(base64_decode('c3BpZA=='));
            $������֋����������ֈ���þ֎���ֈ = $����������į�Ë��֥֯����Î����� ? $����������į�Ë��֥֯����Î����� . $�������ֈ����Ô�֥���þ��������� : $�������ֈ����Ô�֥���þ���������;
        }
        $this->assign(base64_decode('c2VhcmNo') , array(
            base64_decode('dGltZV9zdGFydA==') => $���Ĕ���Ĉ�־��������ï�Į������,
            base64_decode('dGltZV9lbmQ=') => $�Ĕ�����������ï�ï��������֔־�,
            base64_decode('Y2F0ZV9pZA==') => $�������ֈ����Ô�֥���þ���������,
            base64_decode('c2VsZWN0ZWRfaWRz') => $������֋����������ֈ���þ֎���ֈ,
            base64_decode('c3RhdHVz') => $�����������ľîï������ĥ����־�,
            base64_decode('a2V5d29yZA==') => $��Ô��åÔ���Ĉ������å��Į���Î,
        ));
        return $������ֈþ��ĥ���֋��ĥ��֥�����;
    }
    public function _before_add() {
        $�֋ï֔����������������������Ĉ� = $_SESSION['pp_admin']['username'];
        $this->assign(base64_decode('YXV0aG9y') , $�֋ï֔����������������������Ĉ�);
        $�֋֯î�����������å�������֮��� = $GLOBALS['zym_decrypt']['��֮���������֋������Ô���������'](base64_decode('c2V0dGluZw=='))->where(array(
            base64_decode('bmFtZQ==') => base64_decode('c2l0ZV9uYW1l')
        ))->getField(base64_decode('ZGF0YQ=='));
        $this->assign(base64_decode('c2l0ZV9uYW1l') , $�֋֯î�����������å�������֮���);
        $�þ���ċ�֎��������ï�È�������� = $this->_cate_mod->field(base64_decode('aWQsbmFtZQ=='))->where(array(
            base64_decode('cGlk') => 0
        ))->order(base64_decode('b3JkaWQgREVTQw=='))->select();
        $this->assign(base64_decode('Zmlyc3RfY2F0ZQ==') , $�þ���ċ�֎��������ï�È��������);
    }
    public function _before_edit() {
        $�֎��������֔��Ĕ֎�֯�����Î�֔ = $this->_get('id', 'intval');
        $���֋�����ï�Î�����å���־�į�� = $this->_mod->field(base64_decode('aWQsY2F0ZV9pZA=='))->where(array(
            base64_decode('aWQ=') => $�֎��������֔��Ĕ֎�֯�����Î�֔
        ))->find();
        $����������į�Ë��֥֯����Î����� = $this->_cate_mod->where(array(
            base64_decode('aWQ=') => $���֋�����ï�Î�����å���־�į��[base64_decode('Y2F0ZV9pZA==') ]
        ))->getField(base64_decode('c3BpZA=='));
        if ($����������į�Ë��֥֯����Î����� == 0) {
            $����������į�Ë��֥֯����Î����� = $���֋�����ï�Î�����å���־�į��[base64_decode('Y2F0ZV9pZA==') ];
        } else {
            $����������į�Ë��֥֯����Î�����.= $���֋�����ï�Î�����å���־�į��[base64_decode('Y2F0ZV9pZA==') ];
        }
        $this->assign(base64_decode('c2VsZWN0ZWRfaWRz') , $����������į�Ë��֥֯����Î�����);
    }
    public function ajax_upload_img() {
        $�������֯���Ë���Ĉ�ֈ��Î������ = $this->_get('type', 'trim', 'img');
        if (!empty($_FILES[$�������֯���Ë���Ĉ�ֈ��Î������][base64_decode('bmFtZQ==') ])) {
            $dir = $GLOBALS['zym_decrypt']['�����֮�į���������������þ�Ĕ��'](base64_decode('eW0vZC8='));
            $����֥����Î��������å���������� = $this->_upload($_FILES[base64_decode('aW1n') ], base64_decode('YXJ0aWNsZS8=') . $dir, array(
                base64_decode('d2lkdGg=') => base64_decode('Mjgw') ,
                base64_decode('aGVpZ2h0') => base64_decode('Mjgw')
            ));
            if ($����֥����Î��������å����������[base64_decode('ZXJyb3I=') ]) {
                $this->ajaxReturn(0, $����֥����Î��������å����������[base64_decode('aW5mbw==') ]);
            } else {
                $���ĥ�֮���������ֈ���ċ���å��� = $dir . $����֥����Î��������å����������[base64_decode('aW5mbw==') ][0][base64_decode('c2F2ZW5hbWU=') ];
                $������֥�����������þ����������� = $GLOBALS['zym_decrypt']['����ÈåÈ֎������������È������']($GLOBALS['zym_decrypt']['���ċ�ľ��־��������Ô�î֔���Ď']('.', $���ĥ�֮���������ֈ���ċ���å���));
                $�������־îÔ����ľ�֎����Î����[base64_decode('aW1n') ] = $GLOBALS['zym_decrypt']['������������î��î���þ������å�']('.' . $������֥�����������þ�����������, base64_decode('X3RodW1iLg==') . $������֥�����������þ�����������, $���ĥ�֮���������ֈ���ċ���å���);
                $this->ajaxReturn(1, L(base64_decode('b3BlcmF0aW9uX3N1Y2Nlc3M=')) , $�������־îÔ����ľ�֎����Î����[base64_decode('aW1n') ]);
            }
        } else {
            $this->ajaxReturn(0, L(base64_decode('aWxsZWdhbF9wYXJhbWV0ZXJz')));
        }
    }
    public function ajax_gettags() {
        $þîË��þ�����������������Ô��� = $this->_get("title", "trim");
        $��������������������������Î�֮� = $GLOBALS['zym_decrypt']['�������Ď����į����������È�����'](base64_decode('aXRlbXM='))->get_tags_by_title($þîË��þ�����������������Ô���);
        $þ�����־�֥�ï�Į�֥��ïľ֎��� = $GLOBALS['zym_decrypt']['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�'](",", $��������������������������Î�֮�);
        $this->ajaxReturn(1, l(base64_decode('b3BlcmF0aW9uX3N1Y2Nlc3M=')) , $þ�����־�֥�ï�Į�֥��ïľ֎���);
    }
}
unset($zym_5); ?>
