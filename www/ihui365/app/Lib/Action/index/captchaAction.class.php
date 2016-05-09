<?php

class captchaAction extends FirstendAction {

    public function _empty() {
        Image::buildImageVerify(4, 1, 'png', '300', '100', 'captcha');
    }
}