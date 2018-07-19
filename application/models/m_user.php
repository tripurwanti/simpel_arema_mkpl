<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_user extends CI_Model
{
         
        function __construct()
 {
  parent::__construct();
 }
  		function userfromdb()
        {
        	$hasil=$this->db->query("SELECT * FROM tb_pengolah")->result();
			return $hasil;
		}
        function cek_user_login($username, $password)
        {
        $query = "select * from tb_pengolah where username='$username' and password='$password'";
        $hasil=$this->db->query($query);
 
        if ($hasil->num_rows() == 1) { // jika data = 1
                return $hasil->row_array();
        }
        else
                {
                        return FALSE; // else mengembalikan FALSE
                }
        }
        
        function adminfromdb($username)
        {
			$query = "select * from tb_pengolah where username='".$username."'";
        	$hasil=$this->db->query($query)->result();
        	return $hasil;
		}
		function daftartodb($data)
        {
        	$nama=$data['nama'];
			$email=$data['email'];
			$rayon=$data['akses'];
        	$user=$data['user'];
        	$pass=$data['pass'];
        	$foto=$data['gambar'];
        	if($rayon=="admin" OR $rayon=="PP Area" OR $rayon=="Perencanaan" OR $rayon=="Konstruksi" OR $rayon=="view")
        	{
        		$akses=$rayon;
				$rayon="Area";
			}
			else
			{
				$akses="rayon";
			}
        	$query="insert into tb_pengolah(nama,email,akses,nama_rayon,username,password,foto,pesan) values('".$nama."','".$email."','".$akses."','".$rayon."','".$user."','".$pass."','".$foto."','0')";
			$hasil=$this->db->query($query);
			return $hasil;
        }
        
        function deletedatafromdb($id)
		{
			$query="DELETE FROM tb_pengolah WHERE id = '".$id."'";
			$hasil=$this->db->query($query);
			return $hasil;
		}
		
		
		function showdataedit($id)
		{
			$hasil=$this->db->query("SELECT * FROM tb_pengolah WHERE id='".$id."'");
			return $hasil;
		}
		
		public function getnotif()
		{
			$data = $this->db->query("select pesan from tb_pengolah WHERE id='".$_SESSION['id']."'");
			
			return $data;
			
		}
		
		function cekubahpass($password)
        {
        $query = "select * from tb_pengolah where username='".$_SESSION['user']."' and password='$password'";
        $hasil=$this->db->query($query);
 
        if ($hasil->num_rows() == 1) { // jika data = 1
                return $hasil->row_array();
        }
        else
                {
                        return FALSE; // else mengembalikan FALSE
                }
        }
        
        function ubahpass($data)
        {
        $newpass=md5($data['new']);
        $query = "UPDATE tb_pengolah SET password='".$newpass."' where id='".$_SESSION['id']."'";
        $hasil=$this->db->query($query);
        
        }
        
        function updatetusertodb($data)
        {
	        $id=$data['id'];
	        $nama=$data['nama'];
	        $email=$data['email'];
	        $username=$data['username'];
	        $pass=$data['password'];
	        if($pass=="")
	        {
				$query = "UPDATE tb_pengolah SET nama='".$nama."',email='".$email."',username='".$username."' where id='".$id."'";
	        	$hasil=$this->db->query($query);
			}
			else
			{
				$newpass=md5($pass);
				$query = "UPDATE tb_pengolah SET nama='".$nama."',email='".$email."',username='".$username."', password='".$newpass."' where id='".$id."'";
	       		$hasil=$this->db->query($query);
			}
			
			if($_SESSION['id']==$id)
			{
				$_SESSION['nama']=$nama;
				$_SESSION['user']=$username;
			}
        }
}
?>