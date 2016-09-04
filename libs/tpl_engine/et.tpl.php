<?php
#[ģ����]
#[�ر�˵�������ģ��������ѧϰ��SYSTN.COM��ģ����Ļ����ϸ�װ������]
#[Ӧ�ø���]
require_once("et_ease.php");
class et_tpl extends Ease
{
	function __construct($config)
	{
		parent::Ease($config);
	}

	function et_tpl($config)
	{
		$this->__construct($config);
	}

	//�趨����
	function assign($var,$val)
	{
		$this->set_var($var,$val);
	}

	//����Smarty��д�������Ƽ�
	function display($file)
	{
		$array = $this->_format_file($file);
		$htmlfile = $array["htmlfile"];
		$folder = $array["folder"];
		$this->p($htmlfile,$folder);
	}

	function plugin($identifier,$filename,$isfetch=false)
	{
		if(!defined("APP_NAME"))
		{
			return false;
		}
		if(APP_NAME == "admin")
		{
			$file = "../../../plugins/".$identifier."/".$filename;
		}
		else
		{
			$file = "../../plugins/".$identifier."/".$filename;
		}
		if($isfetch)
		{
			return $this->fetch($file);
		}
		else
		{
			$this->display($file);
		}
	}

	//��ȡ���ص�����
	function fetch($file)
	{
		ob_start();
		$array = $this->_format_file($file);
		$htmlfile = $array["htmlfile"];
		$folder = $array["folder"];
		$this->p($htmlfile,$folder);
		$msg = ob_get_contents();
		ob_end_clean();
		return $msg;
	}

	function _format_file($file)
	{
		$end_file = basename($file);
		$end_file = basename($file);
		$tmp_array = explode(".",$end_file);
		if(count($tmp_array)>1)
		{
			unset($tmp_array[count($tmp_array)-1]);
		}
		$htmlfile = implode(".",$tmp_array);
		$folder = substr($file,0,-(strlen($end_file)));
		return array("folder"=>$folder,"htmlfile"=>$htmlfile);
	}
}
?>