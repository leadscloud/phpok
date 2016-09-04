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
                $sql = "SELECT * FROM ".$this->db->prefix."user_ext WHERE id = ".$id1['id'];
                $result = $this->db->get_one($sql);
            }
        }

        if (isset($id1['id']) && isset($id3['id']) && !isset($id2['id'])) {
            if ($id1['id'] == $id3['id']) {
                $sql = "SELECT * FROM ".$this->db->prefix."user_ext WHERE id = ".$id1['id'];
                $result = $this->db->get_one($sql);
            }
        }

        if (isset($id2['id']) && isset($id3['id']) && !isset($id1['id'])) {
            if ($id2['id'] == $id3['id']) {
                $sql = "SELECT * FROM ".$this->db->prefix."user_ext WHERE id = ".$id2['id'];
                $result = $this->db->get_one($sql);
            }
        }

        if (isset($id2['id']) && isset($id3['id']) && isset($id1['id'])) {
            if ($id2['id'] == $id3['id']) {
                $sql = "SELECT * FROM ".$this->db->prefix."user_ext WHERE id = ".$id2['id'];
                $result = $this->db->get_all($sql);
            }
        }

        if ($result != false) {
            foreach ($result as $key => $value) {
                $data[$value['field']] = $value['val'];
            }
        }
		return $data;
	}
}
?>
