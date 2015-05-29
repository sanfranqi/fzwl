<html>
<head>
<title>addbill</title>
<script language="javascript">
function checkFields() {
  if (myform.billNo.value=="") {
    alert("billNo no empty");
    myform.billNo.focus;
    return false;
  }
  return true;
}
</script>
</head>
<body bgcolor="#f5deb3">
<form name="myform" method="POST" action="BillOP.php?action=add" OnSubmit="return checkFields()">
        <table border="0" width="100%" cellspacing="1">
          <tr>
            <td width="100%"><font size="4"><b>billNo</b></font> 
            <input style="font-size:15" type="text" name="billNo" size="27"></td>
          </tr>
          <tr>
            <td width="100%"><font size="4"><b>remark</b></font> 
            <input style="font-size:15" type="text" name="remark" size="27"></td>
          </tr>
        </table>
        <p align="center">
        <input style="font-size:15" type="submit" value="add" name="B1">
        <input style="font-size:15" type="reset" value="reset" name="B2">
        <a style="color:blue; TEXT-DECORATION: none" href="javascript:window.close()"><input style="font-size:15" type="button" value="close"></input></a>
        </p>
      </form>
</body>
</html>
