<TABLE border=0 cellspacing=1 cellpadding=0 width=100%>
			<TR><TD class='tzSet' height=20 background='img/inv/inv-2_31.gif'>&nbsp;&nbsp;<center><b>Параметры персонажа</b></center></TD></tr>
			<TR><TD style='padding-left: 5'>
<table width="100%" border="0" cellspacing="0" cellpadding="0" background='img/inv/inv-2_27.gif'>
  <tr>
    <td>
	<TABLE cellSpacing=0>
				<TR id="str" onmousedown="ChangeSkill(event,this)" onmouseup="DropTimer()" onclick="OnClick(event,this);">
					<TD>• Сила: </TD>
					<TD width=40 class="skill" align="right" wdth=30><?=($db['sila']+$effect["add_sila"])?><BR></small></TD>
					<TD width=60 noWrap></TD>
					<TD><IMG id="minus_str" SRC=img/minus.gif class="nonactive" ALT="уменьшить">&nbsp;<IMG SRC=img/pluss.gif class=skill ALT="увеличить" id="plus_str"></TD>
				</TR>
				<TR id="dex" onmousedown="ChangeSkill( event, this )" onmouseup="DropTimer()"  onclick="OnClick(event,this);">
					<TD>• Ловкость: </TD>
					<TD width=40 class="skill" align="right" wdth=30><?=($db['lovkost']+$effect["add_lovkost"])?><BR></small></TD>
					<TD width=60 noWrap></TD>
					<TD><IMG id="minus_dex" SRC=img/minus.gif class="nonactive" ALT="уменьшить">&nbsp;<IMG SRC=img/pluss.gif class=skill ALT="увеличить" id="plus_dex"></TD>
				</TR>
				<TR id="inst" onmousedown="ChangeSkill( event, this )" onmouseup="DropTimer()"  onclick="OnClick(event,this);">
					<TD>• Интуиция: </TD>
					<TD width=40 class="skill" align="right" wdth=30><?=($db['udacha']+$effect["add_udacha"])?><BR></small></TD>
					<TD width=60 noWrap></TD>
					<TD><IMG id="minus_inst" SRC=img/minus.gif class="nonactive" ALT="уменьшить">&nbsp;<IMG SRC=img/pluss.gif class=skill ALT="увеличить" id="plus_inst"></TD>
				</TR>
				<TR id="power" onmousedown="ChangeSkill( event, this )" onmouseup="DropTimer()"  onclick="OnClick(event,this);">
					<TD>• Выносливость: </TD>
					<TD width=40 class="skill" align="right" wdth=30><?=$db['power']?><BR></small></TD>
					<TD width=60 noWrap></TD>
					<TD><IMG id="minus_power" SRC=img/minus.gif class="nonactive" ALT="уменьшить">&nbsp;<IMG SRC=img/pluss.gif class=skill ALT="увеличить"  id="plus_power"></TD>
				</TR>
				<?php
				if ($db['level'] > 1) 
				{
					?>
					<TR id="intel" onmousedown="ChangeSkill( event, this )" onmouseup="DropTimer()"  onclick="OnClick(event,this);">
						<TD>• Интеллект: </TD>
						<TD width=40 class="skill" align="right" wdth=30><?=($db['intellekt']+$effect["add_intellekt"])?></TD>
						<TD width=60 noWrap></TD>
						<TD><IMG id="minus_intel" SRC=img/minus.gif class="nonactive" ALT="уменьшить">&nbsp;<IMG SRC=img/pluss.gif class=skill ALT="увеличить"  id="plus_intel"></TD>
					</TR>
					<TR id="wis" onmousedown="ChangeSkill( event, this )" onmouseup="DropTimer()"  onclick="OnClick(event,this);">
						<TD>• Восприятие: </TD>
						<TD width=40 class="skill" align="right" wdth=30><?=$db['vospriyatie']?></TD>
						<TD width=60 noWrap></TD>
						<TD><IMG id="minus_wis" SRC=img/minus.gif class="nonactive" ALT="уменьшить">&nbsp;<IMG SRC=img/pluss.gif class=skill ALT="увеличить"  id="plus_wis"></TD>
					</TR>
					<?
				}
				if ($db['level'] > 9)
				{
					?>
					<TR id="duxa" onmousedown="ChangeSkill( event, this )" onmouseup="DropTimer()"  onclick="OnClick(event,this);">
						<TD>• Духовность: </TD>
						<TD width=40 class="skill" align="right" wdth=30><?=$db['duxovnost']?></TD>
						<TD width=60 noWrap></TD>
						<TD><IMG id="minus_duxa" SRC=img/minus.gif class="nonactive" ALT="уменьшить">&nbsp;<IMG SRC=img/pluss.gif class=skill ALT="увеличить"  id="plus_duxa"></TD>
					</TR>
					<?
				} 
				?>
				</td></tr>
			</table>
	</td>
  </tr>
</table>

			
			<INPUT type="button" value="сохранить" disabled="disabled"  id="save_button0" onclick="SaveSkill();"> <INPUT type="checkbox" onClick="ChangeButtonState(0);">
			<?	
				if($db["ups"])
				{ 
					echo "<br><FONT COLOR=green>Свободных увеличений:  <b id=UP>".$db["ups"]."</b></FONT>";
				}
				
			?>
			<SCRIPT> 
				var nUP = <?=$db['ups']?>;
				var oUP = document.getElementById( "UP" );
				var arrChange = { };
				var arrMin = {str: 5, dex: 5, inst: 5, power: 5};

				function SetAllSkills(isOn) 
				{
					var arrSkills = new Array("str", "dex", "inst", "power", "intel", "wis");
					for (var i in arrSkills) 
					{
						var clname = ( isOn ) ? "skill" : "nonactive";
						if( oNode = document.getElementById( "plus_" + arrSkills[i] ) ) oNode.className=clname;
					}
				}
				var t;
				function OnClick(eEvent, This) 
				{
					DropTimer();
					var oNode = eEvent.target || eEvent.srcElement;
					if( oNode.nodeName != "IMG" ) return;
					var nDelta = ( oNode.nextSibling ) ? -1 : 1;
					MakeSkillStep(nDelta, This, 0);
				}
				function DropTimer() 
				{
					if (t) 
					{
						clearTimeout(t);
						t = 0;
					}
				}
				function ChangeSkill( eEvent, This ) 
				{
					var oNode = eEvent.target || eEvent.srcElement;
					if( oNode.nodeName != "IMG" ) return;
					var nDelta = ( oNode.nextSibling ) ? -1 : 1;
					t=setTimeout(function() {MakeSkillStep(nDelta, This, 1)}, 500);
				}
				function MakeSkillStep(nDelta, This, IsRecurse) 
				{
					if ((nUP - nDelta ) < 0) return;
					var id = This.id;
					if (!arrChange[ id ]) arrChange[ id ] = 0;
					if ((arrChange[ id ] + nDelta) < 0 ) 
					{
						if (oNode = document.getElementById( "minus_" + id ))
						oNode.className = "nonactive";
						return;
					}
					SetAllSkills(( nUP - nDelta ));
					arrChange[ id ] += nDelta;
					This.cells[ 1 ].innerHTML = parseFloat( This.cells[ 1 ].innerHTML ) + nDelta;
					if( oNode = document.getElementById( id + "_inst" ) )
					oNode.innerHTML = parseFloat( oNode.innerHTML ) + nDelta;
					oUP.innerHTML = nUP -= nDelta;
					if ( !arrChange[ id ] ) 
					{
						if( oNode = document.getElementById( "minus_" + id ) ) oNode.className = "nonactive";
					} 
					else 
					{
						if( oNode = document.getElementById( "minus_" + id ) ) oNode.className = "skill";
					}
					if (IsRecurse) t = setTimeout(function(){MakeSkillStep(nDelta, This, 1)}, 50);
				}
				
				function SaveSkill( This ) 
				{
					var sHref = "main.php?act=inv&page_type=characteristics&char_type=stats&edit=save";
					for( var i in arrChange )
					if( arrChange[ i ] > 0 )
					sHref += "&" + i + "=" + arrChange[ i ];
					document.location.href=sHref;
					return true;
				}
				function ChangeButtonState(bid) 
				{
					var button = document.getElementById( "save_button"+bid );
					if (button.disabled) 
					{
						button.disabled = 0;
					} 
					else 
					{
						button.disabled = 1;
					}
				}
			</SCRIPT>
			</td></tr>
		</TABLE>