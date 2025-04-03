<?php
extract($_POST);
extract($_GET);
if(!$s){$s=date("Y-m-d");} // today

function crd($s){
$x=explode("-",$s);
$s_Y=$x[0]; // year
$s_m=$x[1]; // month
$s_d=$x[2]; // day
 
$s_t=date("t",mktime(0,0,0,$s_m,$s_d,$s_Y)); // what is month?
$s_n=date("N",mktime(0,0,0,$s_m,1,$s_Y)); // what is first day?
$l=$s_n%7;
$ra=($s_t+$l)/7; $ra=ceil($ra); $ra=$ra-1; // how many lines?
 
$n_d= date("Y-m-d",mktime(0,0,0,$s_m,$s_d+1,$s_Y)); // next day
$p_d= date("Y-m-d",mktime(0,0,0,$s_m,$s_d-1,$s_Y)); // previous day
$n_m= date("Y-m-d",mktime(0,0,0,$s_m+1,$s_d,$s_Y)); // next month
$p_m= date("Y-m-d",mktime(0,0,0,$s_m-1,$s_d,$s_Y)); // previous day
$n_Y= date("Y-m-d",mktime(0,0,0,$s_m,$s_d,$s_Y+1)); // next year
$p_Y= date("Y-m-d",mktime(0,0,0,$s_m,$s_d,$s_Y-1)); // last year
 
echo ("
    <table>
        <tr>
<td><a href='plan_form.php?s=$p_Y'>◀◀</a> </td>
<td width=100 align=center><a href='plan_form.php?s=$p_m'>◀</a></td>
<td width=300 align=center colspan=3>$s_Y year $s_m month</td>
<td><a href='plan_form.php?s=$n_m'>▶</a></td>
<td><a href='plan_form.php?s=$n_Y'>▶▶</a></td>
        </tr>
        <tr>
            <td width=100>sunday</td>
            <td width=100>monday</td>
            <td width=100>tuesday</td>
            <td width=100>wednesday</td>
            <td width=100>thursday</td>
            <td width=100>friday</td>
            <td width=100>saturday</td>
        </tr>
    ");
    for($r=0;$r<=$ra;$r++){
        echo "<tr>";
            for($z=1;$z<=7;$z++){
                $rv=7*$r+$z; $ru=$rv-$l;
                echo "<td width=100 height=80 align=center>";
                if($ru<=0 || $ru>$s_t){ echo "&nbsp;"; }
                else{
                    $s=date("Y-m-d",mktime(0,0,0,$s_m,$ru,$s_Y));
                    ?><a href="page"><?
                    echo "$ru";
                    echo "</a>";
                }
                echo "</td>";
            }
        echo "</tr>";
    }
    echo "</table>";
}
?>
<? crd($s); ?>