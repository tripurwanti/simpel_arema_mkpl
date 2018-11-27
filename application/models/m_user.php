<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class M_user extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}


    function approve($id){
        $query = "UPDATE tb_pengolah SET approve='Y' where id='$id'";
        $hasil=$this->db->query($query);
    }

    function unapprove($id){
        $query="DELETE FROM tb_pengolah WHERE id = '$id'";
        $hasil=$this->db->query($query);
        return $hasil;
    }

    function cek_approval($username){
          $query = "select * from tb_pengolah where username='$username' and approve='Y'";
          $hasil=$this->db->query($query);
          if ($hasil->num_rows() == 1){ 
            return TRUE;
          }else{
              return FALSE; 
          }
      }
    
    function count_non_approval_user(){
        $hasil=$this->db->query("SELECT COUNT(*) AS TOTAL_USER_APPROVAL FROM tb_pengolah WHERE approve='N' or approve is null");
        return $hasil;
    }

    function get_count_admin($jenis){
      $query = "select count(*) as count from tb_pengolah where akses = '$jenis'";
      $hasil = $this->db->query($query);
      return $hasil;
  }

  function update_foto_profil($data){
      $query = "UPDATE tb_pengolah SET FOTO='".$data['foto']."' where id='".$data['id_user']."'";
      $hasil=$this->db->query($query);
  }

  function userfromdb()
  {
    $hasil=$this->db->query("SELECT * FROM tb_pengolah where approve = 'Y'")->result();
    return $hasil;
}

function userfromdb_unapprove(){
    $hasil=$this->db->query("SELECT * FROM tb_pengolah where approve = 'N' or approve is null")->result();
    return $hasil;
}

function cek_user_login($username, $password)
{
  $query = "select * from tb_pengolah where username='$username' and password='$password'";
  $hasil=$this->db->query($query);

  if ($hasil->num_rows() == 1) { 
   return $hasil->row_array();
}
else
{
    return FALSE; 
}
}


function adminfromdb($username)
{
 $query = "select * from tb_pengolah where username='".$username."'";
 $hasil=$this->db->query($query)->result();
 return $hasil;
}
function daftartodb($data){
    $nama=$data['nama'];
    $email=$data['email'];
    $rayon=$data['akses'];
    $user=$data['user'];
    $pass=$data['pass'];
    $foto=$data['gambar'];
    $approval=$data['approval'];
    if($rayon=="admin" OR $rayon=="PP Area" OR $rayon=="Perencanaan" OR $rayon=="Konstruksi" OR $rayon=="view"){
        $akses=$rayon;
        $rayon="Area";
    }else{
        $akses="rayon";
    }
    $query="insert into tb_pengolah(nama,email,akses,nama_rayon,username,password,foto,pesan,approve) values('".$nama."','".$email."','".$akses."','".$rayon."','".$user."','".$pass."','".$foto."','0','".$approval."')";
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

 if ($hasil->num_rows() == 1) {
     return $hasil->row_array();
 }
 else
 {
    return FALSE; 
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

function forget_pass($data){
 $query = "UPDATE tb_pengolah SET password='".$data['password']."' where id='".$data['id_user']."'";
 $hasil=$this->db->query($query);
}
}
?>