<?php
/***********************************************************
	Filename: libs/autoload/file.php
	Note	: �ļ������࣬������ϵͳ�Զ�����
	Version : 3.0
	Author  : qinggan
	Update  : 2009-10-17
***********************************************************/
class file_lib
{
	var $read_count;
	function __construct()
	{
		$this->read_count = 0;
	}

	function file_lib()
	{
		$this->__construct();
	}

	//��ȡ����
	function cat($file="")
	{
		if($file)
		{
			$this->read_count++;
			$check = strtolower($file);
			if(strpos($check,"http://") === false)
			{
				if(!file_exists($file))
				{
					return false;
				}
			}
			$content = file_get_contents($file);
			$content = str_replace("<?php die('forbidden'); ?>\n","",$content);
			return $content;
		}
		else
		{
			return false;
		}
	}

	#[�洢����]
	function vi($content,$file,$var="",$type="wb")
	{
		$this->make($file,"file");
		if(is_array($content) && $var)
		{
			$content = $this->__array($content,$var);
			$content = "<?php \n".$content."\n ?".">";
		}
		else
		{
			$content = "<?php die('forbidden'); ?>\n".$content;
		}
		$this->_write($content,$file,$type);
		return true;
	}

	#[�洢php��Դ���ļ�]
	function vim($content,$file)
	{
		$this->make($file,"file");
		$this->_write($content,$file,"wb");
		return true;
	}

	//�洢ͼƬ
	function save_pic($content,$file)
	{
		$this->make($file,"file");
		$handle = $this->_open($file,"wb");
		fwrite($handle,$content);
		unset($content);
		$this->close($handle);
		return true;
	}

	#[ɾ�����ݲ���]
	#[��һ������һ��ҪС�ģ��ڳ���������ϸ�һЩ����Ȼ�п��ܽ�����Ŀ¼ɾ����]
	function rm($file,$type="file")
	{
		$array = $this->_dir_list($file);
		if(is_array($array))
		{
			foreach($array as $key=>$value)
			{
				if(file_exists($value))
				{
					if(is_dir($value))
					{
						$this->rm($value);
					}
					else
					{
						unlink($value);
					}
				}
			}
		}
		else
		{
			if(file_exists($array) && is_file($array))
			{
				unlink($array);
			}
		}
		//���Ҫɾ��Ŀ¼��ͬʱ����
		if($type == "folder")
		{
			rmdir($file);
		}
		return true;
	}

	#[�����ļ���Ŀ¼]
	function make($file,$type="dir")
	{
		$newfile = $file;
		$msg = "";
		if(defined("ROOT"))
		{
			$root_strlen = strlen(ROOT);
			if(substr($file,0,$root_strlen) == ROOT)
			{
				$newfile = substr($file,$root_strlen);
			}
			$msg = ROOT;//�Ӹ�Ŀ¼�������Ƿ����ļ�д��
		}
		$array = explode("/",$newfile);
		$count = count($array);
		if($type == "dir")
		{
			for($i=0;$i<$count;$i++)
			{
				$msg .= $array[$i];
				if(!file_exists($msg) && ($array[$i]))
				{
					mkdir($msg,0777);
				}
				$msg .= "/";
			}
		}
		else
		{
			for($i=0;$i<($count-1);$i++)
			{
				$msg .= $array[$i];
				if(!file_exists($msg) && ($array[$i]))
				{
					mkdir($msg,0777);
				}
				$msg .= "/";
			}
			@touch($file);//�����ļ�
		}
		return true;
	}

	#[���Ʋ���]
	function cp($old,$new,$recover=true)
	{
		if(substr($new,-1) == "/")
		{
			$this->make($new,"dir");
		}
		else
		{
			$this->make($new,"file");
		}
		if(is_file($new))
		{
			if($recover)
			{
				unlink($new);
			}
			else
			{
				return false;
			}
		}
		else
		{
			$new = $new.basename($old);
		}
		copy($old,$new);
		return true;
	}

	#[�ļ��ƶ�����]
	function mv($old,$new,$recover=true)
	{
		if(substr($new,-1) == "/")
		{
			$this->make($new,"dir");
		}
		else
		{
			$this->make($new,"file");
		}
		if(is_file($new))
		{
			if($recover)
			{
				unlink($new);
			}
			else
			{
				return false;
			}
		}
		else
		{
			$new = $new.basename($old);
		}
		rename($old,$new);
		return true;
	}

	#[��ȡ�ļ����б�]
	function ls($folder)
	{
		$this->read_count++;
		return $this->_dir_list($folder);
	}

	function deep_ls($folder,&$list)
	{
		$this->read_count++;
		$tmplist = $this->_dir_list($folder);
		foreach($tmplist AS $key=>$value)
		{
			if(is_dir($value))
			{
				$this->deep_ls($value,$list);
			}
			else
			{
				$list[] = $value;
			}
		}
	}

	function _dir_list($file,$type="folder")
	{
		if(substr($file,-1) == "/") $file = substr($file,0,-1);
		if($type == "file")
		{
			return $file;
		}
		elseif(is_dir($file))
		{
			$handle = opendir($file);
			$array = array();
			while(false !== ($myfile = readdir($handle)))
			{
				if($myfile != "." && $myfile != ".." && $myfile != ".svn") $array[] = $file."/".$myfile;
			}
			closedir($handle);
			return $array;
		}
		else
		{
			return $file;
		}
	}

	function __array($array,$var,$content="")
	{
		foreach($array AS $key=>$value)
		{
			if(is_array($value))
			{
				$content .= $this->__array($value,"".$var."[\"".$key."\"]");
			}
			else
			{
				$old_str = array('"',"<?php","?>","\r");
				$new_str = array("'","&lt;?php","?&gt;","");
				$value = str_replace($old_str,$new_str,$value);
				$content .= "\$".$var."[\"".$key."\"] = \"".$value."\";\n";
			}
		}
		return $content;
	}

	#[���ļ�]
	function _open($file,$type="wb")
	{
		$handle = fopen($file,$type);
		$this->read_count++;
		return $handle;
	}

	#[д����Ϣ]
	function _write($content,$file,$type="wb")
	{
		global $system_time;
		$content = stripslashes($content);
		$handle = $this->_open($file,$type);
		fwrite($handle,$content);
		unset($content);
		$this->close($handle);
		#[�����ļ�������ʱ��]
		$system_time = $system_time ? $system_time : time();
		@touch($file,$system_time);
		return true;
	}

	function close($handle)
	{
		return fclose($handle);
	}
}
?>