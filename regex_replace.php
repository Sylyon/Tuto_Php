<?php
echo 'bbCode :  <br/>';
$texte="[b]Je[/b] suis le [i]roi[/i] du [color=green]monde[/color] http://php.net/manual/fr/function.preg-replace.php&=?";
echo 'texte : '.$texte.' <br/>';
$texte=preg_replace("#\[b\](.+)\[/b\]#isU", "<strong>$1</strong>",$texte);
$texte=preg_replace("#\[i\](.+)\[/i\]#isU", "<em>$1</em>",$texte);
$texte=preg_replace("#\[color=(red|blue|green|yellow|purple|olive)\](.+)\[/color\]#isU", "<span style='color:$1'>$2</span>",$texte);
$texte=preg_replace("#https?://[a-z0-9._/?=&-]+#i", "<a href=$0>$0</a>",$texte);

#(((https?|ftp)://(w{3}\.)?)(?<!www)(\w+-?)*\.([a-z]{2,4}))#
echo 'texte : '.$texte.' <br/>';

?>