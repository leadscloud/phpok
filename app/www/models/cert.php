<?php
#=====================================================================
#	Filename: app/www/models/cert.php
#	Note	: 获取证书信息
#	Version : 3.0
#	Author  : bobo
#	Update  : 2016-09-04
#=====================================================================
class cert_m extends Model
{
	var $langid = "zh";
	function __construct()
	{
		parent::Model();
	}

	function cert_m()
	{
		$this->__construct();
	}

	function set_langid($langid="zh")
	{
		$this->langid = $langid;
	}

	function get_one($idcard = '', $fullname = '', $certnum = '')
	{
        $result = false;
        $data = false;
        if ($fullname) {
            $sql = "SELECT id FROM ".$this->db->prefix."user_ext WHERE field = 'fullname' AND val = "."'".$fullname."'";
            $id1 = $this->db->get_one($sql);
        }

        if ($certnum) {
            $sql = "SELECT id FROM ".$this->db->prefix."user_ext WHERE field = 'certnum' AND val = "."'".$certnum."'";
            $id2 = $this->db->get_one($sql);
        }

        if ($idcard) {
            $sql = "SELECT id FROM ".$this->db->prefix."user_ext WHERE field = 'idcard' AND val = "."'".$idcard."'";
            $id3 = $this->db->get_one($sql);
        }

        if (isset($id1['id']) && isset($id2['id']) && !isset($id3['id'])) {
            if ($id1['id'] == $id2['id']) {
                $id_flag = $id1['id'];
                $sql = "SELECT * FROM ".$this->db->prefix."user_ext ue JOIN WHERE id = ".$id_flag;
                $result = $this->db->get_one($sql);
            }
        }

        if (isset($id1['id']) && isset($id3['id']) && !isset($id2['id'])) {
            if ($id1['id'] == $id3['id']) {
                $id_flag = $id1['id'];
                $sql = "SELECT * FROM ".$this->db->prefix."user_ext WHERE id = ".$id_flag;
                $result = $this->db->get_one($sql);
            }
        }

        if (isset($id2['id']) && isset($id3['id']) && !isset($id1['id'])) {
            if ($id2['id'] == $id3['id']) {
                $id_flag = $id2['id'];
                $sql = "SELECT * FROM ".$this->db->prefix."user_ext WHERE id = ".$id_flag;
                $result = $this->db->get_one($sql);
            }
        }

        if (isset($id2['id']) && isset($id3['id']) && isset($id1['id'])) {
            if ($id2['id'] == $id3['id']) {
                $id_flag = $id2['id'];
                $sql = "SELECT * FROM ".$this->db->prefix."user_ext WHERE id = ".$id_flag;
                $result = $this->db->get_all($sql);
            }
        }

        if ($result != false) {
            $sex = [0 => '女', 1 => '男'];
            foreach ($result as $key => $value) {
                if ('sex' == $value['field']) {
                    $data[$value['field']] = $sex[$value['val']];
                } else {
                    $data[$value['field']] = $value['val'];
                }
            }

            $sql = "SELECT thumb_id FROM ".$this->db->prefix."user WHERE id = ".$id_flag;
            $user = $this->db->get_one($sql);

            $sql = "SELECT filename FROM ".$this->db->prefix."upfiles WHERE id = ".$user['thumb_id'];
            $img = $this->db->get_one($sql);

            $data['image'] = $img['filename'];
        }
		return $data;
	}
}
?>
