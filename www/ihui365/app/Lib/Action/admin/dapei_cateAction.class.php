<?php
 

global $zym_decrypt;
$zym_decrypt['����֯�����ֈ�å���������įï�ֈ'] = base64_decode('X2luaXRpYWxpemU=');
$zym_decrypt['����ĥ����Ë��î��֥����Î��֥��'] = base64_decode('VHJlZQ==');
$zym_decrypt['���ĥ�Î���������ċ�ֈ���ÈľĈ�'] = base64_decode('VQ==');
$zym_decrypt['�֎���������Ĉ���å������ċ�־��'] = base64_decode('TA==');
$zym_decrypt['�����֥Ô��������î�Į�֋����þ�'] = base64_decode('c3ByaW50Zg==');
$zym_decrypt['�����֔Ë֋��ֈ������Ë�����Îľ'] = base64_decode('aW5fYXJyYXk=');
$zym_decrypt['����ÈåÈ֎������������È������'] = base64_decode('YXJyYXlfcG9w');
$zym_decrypt['���ċ�ľ��־��������Ô�î֔���Ď'] = base64_decode('ZXhwbG9kZQ==');
$zym_decrypt['������������î��î���þ������å�'] = base64_decode('c3RyX3JlcGxhY2U=');

class dapei_cateAction extends BackendAction {
    public function _initialize() {
        parent::$GLOBALS['zym_decrypt']['����֯�����ֈ�å���������įï�ֈ']();
        $this->_mod = D('dapei_cate');
    }
    public function index() {
        $���֎���֋ľ���������ֈ������È� = $this->_request('sort', 'trim', 'ordid');
        $Ďï�Ď���������ï�����į������� = $this->_request(base64_decode('b3JkZXI=') , base64_decode('dHJpbQ==') , base64_decode('REVTQw=='));
        $���������Ë���������È������ֈ�� = new $GLOBALS['zym_decrypt']['����ĥ����Ë��î��֥����Î��֥��']();
        $���������Ë���������È������ֈ��->icon = array(
            base64_decode('4pSCIA==') ,
            base64_decode('4pSc4pSAIA==') ,
            base64_decode('4pSU4pSAIA==')
        );
        $���������Ë���������È������ֈ��->nbsp = base64_decode('wqDCoMKg');
        $֋��������֎Ô��������î����ï�� = $this->_mod->order($���֎���֋ľ���������ֈ������È� . ' ' . $Ďï�Ď���������ï�����į�������)->select();
        $�֯��֯����������ֈֈ����֯�î�� = array();
        foreach ($֋��������֎Ô��������î����ï�� as $��Ĉ�ľ����È������þ��Î���Ô��) {
            $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('c3RyX3N0YXR1cw==') ] = base64_decode('PGltZyBkYXRhLXRkdHlwZT0idG9nZ2xlIiBkYXRhLWlkPSI=') . $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('aWQ=') ] . base64_decode('IiBkYXRhLWZpZWxkPSJzdGF0dXMiIGRhdGEtdmFsdWU9Ig==') . $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('c3RhdHVz') ] . base64_decode('IiBzcmM9Il9fU1RBVElDX18vaW1hZ2VzL2FkbWluL3RvZ2dsZV8=') . ($��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('c3RhdHVz') ] == 0 ? base64_decode('ZGlzYWJsZWQ=') : base64_decode('ZW5hYmxlZA==')) . base64_decode('LmdpZiIgLz4=');
            $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('c3RyX21hbmFnZQ==') ] = base64_decode('PGEgaHJlZj0iamF2YXNjcmlwdDo7IiBjbGFzcz0iSl9zaG93ZGlhbG9nIiBkYXRhLXVyaT0i') . $GLOBALS['zym_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�'](base64_decode('ZGFwZWlfY2F0ZS9hZGQ=') , array(
                base64_decode('cGlk') => $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('aWQ=') ]
            )) . base64_decode('IiBkYXRhLXRpdGxlPSI=') . $GLOBALS['zym_decrypt']['�֎���������Ĉ���å������ċ�־��'](base64_decode('YWRkX2FydGljbGVfY2F0ZQ==')) . base64_decode('IiBkYXRhLWlkPSJhZGQiIGRhdGEtd2lkdGg9IjUwMCIgZGF0YS1oZWlnaHQ9IjM2MCI+') . $GLOBALS['zym_decrypt']['�֎���������Ĉ���å������ċ�־��'](base64_decode('YWRkX2FydGljbGVfc3ViY2F0ZQ==')) . base64_decode('PC9hPiB8DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGEgaHJlZj0iamF2YXNjcmlwdDo7IiBjbGFzcz0iSl9zaG93ZGlhbG9nIiBkYXRhLXVyaT0i') . $GLOBALS['zym_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�'](base64_decode('ZGFwZWlfY2F0ZS9lZGl0') , array(
                base64_decode('aWQ=') => $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('aWQ=') ]
            )) . base64_decode('IiBkYXRhLXRpdGxlPSI=') . $GLOBALS['zym_decrypt']['�֎���������Ĉ���å������ċ�־��'](base64_decode('ZWRpdA==')) . base64_decode('IC0g') . $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('bmFtZQ==') ] . base64_decode('IiBkYXRhLWlkPSJlZGl0IiBkYXRhLXdpZHRoPSI1MDAiIGRhdGEtaGVpZ2h0PSIyOTAiPg==') . $GLOBALS['zym_decrypt']['�֎���������Ĉ���å������ċ�־��'](base64_decode('ZWRpdA==')) . base64_decode('PC9hPiB8DQogICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgPGEgaHJlZj0iamF2YXNjcmlwdDo7IiBkYXRhLWFjdHR5cGU9ImFqYXgiIGNsYXNzPSJKX2NvbmZpcm11cmwiIGRhdGEtdXJpPSI=') . $GLOBALS['zym_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�'](base64_decode('ZGFwZWlfY2F0ZS9kZWxldGU=') , array(
                base64_decode('aWQ=') => $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('aWQ=') ]
            )) . base64_decode('IiBkYXRhLW1zZz0i') . $GLOBALS['zym_decrypt']['�����֥Ô��������î�Į�֋����þ�']($GLOBALS['zym_decrypt']['�֎���������Ĉ���å������ċ�־��'](base64_decode('Y29uZmlybV9kZWxldGVfb25l')) , $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('bmFtZQ==') ]) . base64_decode('Ij4=') . $GLOBALS['zym_decrypt']['�֎���������Ĉ���å������ċ�־��'](base64_decode('ZGVsZXRl')) . base64_decode('PC9hPg==');
            $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('cGFyZW50aWRfbm9kZQ==') ] = ($��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('cGlk') ]) ? base64_decode('IGNsYXNzPSJjaGlsZC1vZi1ub2RlLQ==') . $��Ĉ�ľ����È������þ��Î���Ô��[base64_decode('cGlk') ] . '"' : '';
            $�֯��֯����������ֈֈ����֯�î��[] = $��Ĉ�ľ����È������þ��Î���Ô��;
        }
        $�֮������î�Ë�������Ĕ��������� = base64_decode('PHRyIGlkPSdub2RlLSRpZCcgJHBhcmVudGlkX25vZGU+DQogICAgICAgICAgICAgICA8dGQgYWxpZ249J2NlbnRlcic+PGlucHV0IHR5cGU9J2NoZWNrYm94JyB2YWx1ZT0nJGlkJyBjbGFzcz0nSl9jaGVja2l0ZW0nPjwvdGQ+DQogICAgICAgICAgICAgICA8dGQ+JHNwYWNlcjxzcGFuIGRhdGEtdGR0eXBlPSdlZGl0JyBkYXRhLWZpZWxkPSduYW1lJyBkYXRhLWlkPSckaWQnIGNsYXNzPSd0ZGVkaXQnPiRuYW1lPC9zcGFuPjwvdGQ+DQogICAgICAgICAgICAgICA8dGQgYWxpZ249J2NlbnRlcic+JGlkPC90ZD4NCiAgICAgICAgICAgICAgIDx0ZCBhbGlnbj0nY2VudGVyJz48c3BhbiBkYXRhLXRkdHlwZT0nZWRpdCcgZGF0YS1maWVsZD0nb3JkaWQnIGRhdGEtaWQ9JyRpZCcgY2xhc3M9J3RkZWRpdCc+JG9yZGlkPC9zcGFuPjwvdGQ+DQogICAgICAgICAgICAgICA8dGQgYWxpZ249J2NlbnRlcic+JHN0cl9zdGF0dXM8L3RkPg0KICAgICAgICAgICAgICAgPHRkIGFsaWduPSdjZW50ZXInPiRzdHJfbWFuYWdlPC90ZD4NCiAgICAgICAgICAgICAgIDwvdHI+');
        $���������Ë���������È������ֈ��->init($�֯��֯����������ֈֈ����֯�î��);
        $�į�����ÈĎ���������į��Ĕ����� = $���������Ë���������È������ֈ��->get_tree(0, $�֮������î�Ë�������Ĕ���������);
        $this->assign(base64_decode('bGlzdA==') , $�į�����ÈĎ���������į��Ĕ�����);
        $Ô���֯�֯Ë�����å����֎��֋��� = array(
            base64_decode('dGl0bGU=') => $GLOBALS['zym_decrypt']['�֎���������Ĉ���å������ċ�־��'](base64_decode('YWRkX2FydGljbGVfY2F0ZQ==')) ,
            base64_decode('aWZyYW1l') => $GLOBALS['zym_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�'](base64_decode('ZGFwZWlfY2F0ZS9hZGQ=')) ,
            base64_decode('aWQ=') => base64_decode('YWRk') ,
            base64_decode('d2lkdGg=') => base64_decode('NTAw') ,
            base64_decode('aGVpZ2h0') => base64_decode('Mjkw')
        );
        $this->assign(base64_decode('YmlnX21lbnU=') , $Ô���֯�֯Ë�����å����֎��֋���);
        $this->assign(base64_decode('bGlzdF90YWJsZQ==') , true);
        $this->display();
    }
    public function _before_add() {
        $��Į�����֥�������������þ������ = $this->_get('pid', 'intval', 0);
        if ($��Į�����֥�������������þ������) {
            $���������֋������å������į����� = $this->_mod->where(array(
                base64_decode('aWQ=') => $��Į�����֥�������������þ������
            ))->getField(base64_decode('c3BpZA=='));
            $���������֋������å������į����� = $���������֋������å������į����� ? $���������֋������å������į����� . $��Į�����֥�������������þ������ : $��Į�����֥�������������þ������;
            $this->assign(base64_decode('c3BpZA==') , $���������֋������å������į�����);
        }
    }
    protected function _before_insert($�־ċ������֔����֯������������� = '') {
        if ($this->_mod->name_exists($�־ċ������֔����֯�������������['name'], $�־ċ������֔����֯�������������['pid'])) {
            $this->ajaxReturn(0, L('article_cate_already_exists'));
        }
        $�־ċ������֔����֯�������������[base64_decode('c3BpZA==') ] = $this->_mod->get_spid($�־ċ������֔����֯�������������[base64_decode('cGlk') ]);
        return $�־ċ������֔����֯�������������;
    }
    protected function _before_update($�־ċ������֔����֯������������� = '') {
        if ($this->_mod->name_exists($�־ċ������֔����֯�������������['name'], $�־ċ������֔����֯�������������['pid'], $�־ċ������֔����֯�������������['id'])) {
            $this->ajaxReturn(0, L('article_cate_already_exists'));
        }
        $Ô����ֈ���å��������ֈ�Ë������ = $this->_mod->field(base64_decode('aW1nLHBpZA=='))->where(array(
            base64_decode('aWQ=') => $�־ċ������֔����֯�������������[base64_decode('aWQ=') ]
        ))->find();
        if ($�־ċ������֔����֯�������������[base64_decode('cGlk') ] != $Ô����ֈ���å��������ֈ�Ë������[base64_decode('cGlk') ]) {
            $�����֮��������Į�����������֋�� = $this->_mod->get_child_ids($�־ċ������֔����֯�������������[base64_decode('aWQ=') ], true);
            if ($GLOBALS['zym_decrypt']['�����֔Ë֋��ֈ������Ë�����Îľ']($�־ċ������֔����֯�������������[base64_decode('cGlk') ], $�����֮��������Į�����������֋��)) {
                $this->ajaxReturn(0, L(base64_decode('Y2Fubm90X21vdmVfdG9fY2hpbGQ=')));
            }
            $�־ċ������֔����֯�������������[base64_decode('c3BpZA==') ] = $this->_mod->get_spid($�־ċ������֔����֯�������������[base64_decode('cGlk') ]);
        }
        return $�־ċ������֔����֯�������������;
    }
    public function ajax_upload_img() {
        if (!empty($_FILES['img']['name'])) {
            $֋��������֎Ô��������î����ï�� = $this->_upload($_FILES['img'], 'dapei_cate', array(
                'width' => '80',
                'height' => '80'
            ));
            if ($֋��������֎Ô��������î����ï��[base64_decode('ZXJyb3I=') ]) {
                $this->ajaxReturn(0, $֋��������֎Ô��������î����ï��[base64_decode('aW5mbw==') ]);
            } else {
                $֯���ľ֮�����������֔֯��־���� = $GLOBALS['zym_decrypt']['����ÈåÈ֎������������È������']($GLOBALS['zym_decrypt']['���ċ�ľ��־��������Ô�î֔���Ď']('.', $֋��������֎Ô��������î����ï��[base64_decode('aW5mbw==') ][0][base64_decode('c2F2ZW5hbWU=') ]));
                $�־ċ������֔����֯�������������[base64_decode('aW1n') ] = $GLOBALS['zym_decrypt']['������������î��î���þ������å�']('.' . $֯���ľ֮�����������֔֯��־����, base64_decode('X3RodW1iLg==') . $֯���ľ֮�����������֔֯��־����, $֋��������֎Ô��������î����ï��[base64_decode('aW5mbw==') ][0][base64_decode('c2F2ZW5hbWU=') ]);
                $this->ajaxReturn(1, L(base64_decode('b3BlcmF0aW9uX3N1Y2Nlc3M=')) , $�־ċ������֔����֯�������������[base64_decode('aW1n') ]);
            }
        } else {
            $this->ajaxReturn(0, L(base64_decode('aWxsZWdhbF9wYXJhbWV0ZXJz')));
        }
    }
    public function ajax_getchilds() {
        $����Ĉ־ֈĈ��������������È֯�� = $this->_get('id', 'intval');
        $����Ô������������ï�þï�ֈ�ĥ� = array(
            base64_decode('cGlk') => $����Ĉ־ֈĈ��������������È֯��
        );
        $����Ô������������ï�þï�ֈ�ĥ�[base64_decode('c3RhdHVz') ] = '1';
        $���֎����ľ����å�����־�������� = $this->_mod->field(base64_decode('aWQsbmFtZQ=='))->where($����Ô������������ï�þï�ֈ�ĥ�)->select();
        if ($���֎����ľ����å�����־��������) {
            $this->ajaxReturn(1, L(base64_decode('b3BlcmF0aW9uX3N1Y2Nlc3M=')) , $���֎����ľ����å�����־��������);
        } else {
            $this->ajaxReturn(0, L(base64_decode('b3BlcmF0aW9uX2ZhaWx1cmU=')));
        }
    }
} ?>
