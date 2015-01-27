<?php

class Transform
{
    public function __construct($json)
    {
        $data = json_decode($json, true);

        if (200 != $data['meta']['code']) {
            return false;
        }

        $this->data = $data;
    }

    public static function getUserInfo($user)
    {
        $user = json_decode($user, true);

        if ($user['meta']['data']) {
            die('user not exist');
        }

        return $user;
    }

    public function getPhoto()
    {
        if (empty($this->data['data'])) {
            return false;
        }

        $data = $this->data['data'];
        $arys= array();

        foreach ($data as $val) {
            $ret = array();

            $ret['created_time'] = $val['created_time'];
            $ret['local'] = $val['location']['name'];
            $ret['text'] = $val['caption']['text'];
            $ret['link'] = $val['link'];
            $ret['like'] = $val['likes']['count']; 
            $ret['img'] = $val['images']['low_resolution'];
            $ret['img_ori'] = $val['images']['standard_resolution'];
            $ret['img_thu'] = $val['images']['thumbnail'];

            $arys[] = $ret;
        }


        return $arys;
    }
    
    public function getNextUrl()
    {
        return $this->data['pagination']['next_url'];
    }

    
    public function getNextMaxId()
    {
        return $this->data['pagination']['next_max_id'];
    }


}
