
    <td valign="top"  style="height:500px;">
         <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td><div class="point"></div></td>
            <td><?php echo $lables['title']; ?></td>
          </tr>
        </table>
      </div>-->
      <form name="form1" action="login" method="post">
        <div class="table">
          <table>
            <tr>
              <td nowrap>ユーザーID</td>
              <td nowrap>
              <input type="text" name="username" id="username" value="<?php if(!empty($user_name)) echo $user_name; ?>" />
              </td>
            </tr>
            <tr>
              <td nowrap>パスワード</td>
              <td nowrap>
              <input type="password" name="password" id="password" />
              </td>
            </tr>
			<tr>
			<td width="100%" colspan="2"><font color="red"> <?php if(isset($err_msg))echo $err_msg; ?> </font></td>
			</tr>
          </table>
        </div>

        <!-- <div class="login">
		  <input type="hidden" name="login_check" value="login_check">
          <input type="image" src="<?php echo "$base"; ?>/images/button_login.gif">
          <input name="submit" type="hidden" value="submit">
        </div> -->
      </form></td>