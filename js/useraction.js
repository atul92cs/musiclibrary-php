



deleteuser=(e)=>{
  let user=e.target.parentElement.parentElement.firstElementChild.innerHTML;
  //console.log(user);
  let url='/deleteArtist.php/?id='+user;
  const xhr=new XMLHttpRequest();
  xhr.open('DELETE',url,true);
  xhr.onload=()=>{
    if(xhr.readyState===4||xhr.status===4)
    {
      alert('artist deleted');
      window.location.reload();
    }
    else {
      alert('error occured');
      window.location.reload();
    }
  }
}
