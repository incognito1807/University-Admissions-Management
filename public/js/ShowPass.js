function showPass() 
{
    var x = document.getElementById("passWord");
    if (x.type === "password") 
    {
      x.type = "text";
    } 
    else 
    {
      x.type = "password";
    }
}