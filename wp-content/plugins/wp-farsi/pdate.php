<?php
 # https://github.com/vahid-sohrabloo/Pdate
 function wpfa_date($c,$d=NULL){static $e=array(0,31,31,31,31,31,31,30,30,30,30,30,29);static $f=array('شنبه','یکشنبه','دوشنبه','سه شنبه','چهارشنبه','پنج شنبه','جمعه');static $g=array('','فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند');if(!$d){$d=time();}list($h,$j,$k,$l)=explode('-',date('Y-m-d-w',$d));list($m,$n,$o)=gregorian2jalali($h,$j,$k);$p=($l+1);if($p>=7){$p=0;}if($c=='\\'){$c='//';}$q=strlen($c);$r=0;$s='';while($r<$q){$t=$c{$r};if($t=='\\'){$s.=$c{++$r};$r++;continue;}switch($t){case 'd':$s.=(($o<10)?('0'.$o):$o);break;case 'D':$s.=substr($f[$p],0,2);break;case 'j':$s.=$o;break;case 'l':$s.=$f[$p];break;case 'N':$s.=$p+1;break;case 'w':$s.=$p;break;case 'z':$s.=_DayOfYear($n,$o);break;case 'S':$s.='م';break;case 'W':$s.=ceil(_DayOfYear($n,$o)/7);break;case 'F':$s.=$g[$n];break;case 'm':$s.=(($n<10)?('0'.$n):$n);break;case 'M':$s.=substr($g[$n],0,6);break;case 'n':$s.=$n;break;case 't':$s.=((_isKabise($m)&&($n==12))?30:$e[$n]);break;case 'L':$s.=(int)_isKabise($m);break;case 'Y':case 'o':$s.=$m;break;case 'y':$s.=substr($m,2);break;case 'a':case 'A':if(date('a',$d)=='am'){$s.=(($t=='a')?'ق.ظ':'قبل از ظهر');}else{$s.=(($t=='a')?'ب.ظ':'بعد از ظهر');}break;case 'B':case 'g':case 'G':case 'h':case 'H':case 's':case 'u':case 'i':case 'e':case 'I':case 'O':case 'P':case 'T':case 'Z':$s.=date($t,$d);break;case 'c':$s.=($m.'-'.$n.'-'.$o.' '.date('H:i:s P',$d));break;case 'r':$s.=(substr($f[$p],0,2).'، '.$o.' '.substr($g[$n],0,6).' '.$m.' '.date('H::i:s P',$d));break;case 'U':$s.=$d;break;default:$s.=$t;}$r++;}return $s;}function _DayOfYear($n,$o){static $e=array(0,31,31,31,31,31,31,30,30,30,30,30,29);$u=0;for($r=1;$r<$n;$r++){$u+=$e[$r];}return($u+$o);}function _isKabise($v){$w=($v%33);if(($w==1)or($w==5)or($w==9)or($w==13)or($w==17)or($w==22)or($w==26)or($w==30)){return 1;}return 0;}function _div($x,$y){return (int)($x/$y);}function gregorian2jalali($z,$aa,$bb){static $cc=array(31,28,31,30,31,30,31,31,30,31,30,31);static $dd=array(31,31,31,31,31,31,30,30,30,30,30,29);$ee=$z-1600;$ff=$aa-1;$gg=(365*$ee+_div($ee+3,4)-_div($ee+99,100)+_div($ee+399,400));for($r=0;$r<$ff;++$r){$gg+=$cc[$r];}if($ff>1&&(($ee%4==0&&$ee%100!=0)||($ee%400==0)))$gg++;$gg+=$bb-1;$hh=$gg-79;$ii=_div($hh,12053);$hh=$hh%12053;$jj=(979+33*$ii+4*_div($hh,1461));$hh%=1461;if($hh>=366){$jj+=_div($hh-1,365);$hh=($hh-1)%365;}for($r=0;($r<11&&$hh>=$dd[$r]);++$r){$hh-=$dd[$r];}return array($jj,$r+1,$hh+1);}function jalali2gregorian($kk,$ll,$mm){static $cc=array(31,28,31,30,31,30,31,31,30,31,30,31);static $dd=array(31,31,31,31,31,31,30,30,30,30,30,29);$jj=$kk-979;$nn=$ll-1;$hh=(365*$jj+_div($jj,33)*8+_div($jj%33+3,4));for($r=0;$r<$nn;++$r){$hh+=$dd[$r];}$hh+=$mm-1;$gg=$hh+79;$ee=(1600+400*_div($gg,146097));$gg=$gg%146097;$oo=1;if($gg>=36525){$gg--;$ee+=(100*_div($gg,36524));$gg=$gg%36524;if($gg>=365){$gg++;}else{$oo=0;}}$ee+=(4*_div($gg,1461));$gg%=1461;if($gg>=366){$oo=0;$gg--;$ee+=_div($gg,365);$gg=($gg%365);}for($r=0;$gg>=($cc[$r]+($r==1&&$oo));$r++){$gg-=($cc[$r]+($r==1&&$oo));}return array($ee,$r+1,$gg+1);}