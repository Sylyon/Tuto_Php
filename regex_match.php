<?php
if(preg_match("#guitard#", "J'aime la guitard"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/>';
if(preg_match("#Guitard#", "J'aime la guitard"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/>';
if(preg_match("#Guitard#i", "J'aime la guitard"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/>';
if(preg_match("#^guitard|piano$#i", "J'aime la piano et la guitard"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/>';
if(preg_match("#guitar[de]$#i", "J'aime la piano et la guitare"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/>';
if(preg_match("#^[A-Z]#", "J'aime la piano et la guitare"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/>';
if(preg_match("#[^a-z]#", "J'aime la piano et la guitare"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/>';
if(preg_match("#zo*ro#", "J'aime la piano et la guitare zooro"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/>';
if(preg_match("#zo?ro#", "J'aime la piano et la guitare zooro"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/>';
if(preg_match("#zo+ro#", "J'aime la piano et la guitare zooro"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/> quoi :';
if(preg_match("#Quoi\?#", "Quoi?"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/>';

if(preg_match("#Quoi ?\?#", "Quoi?"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/><br/>Regex complexe : <br/>';
echo '&nbsp;&nbsp;Numéro de tel :  <br/>';
if(preg_match("#^(((\+([0-9]{2,3}))[-. ]?)|0)[0-9][-. ]?((([0-9]{2})[-. ]?){4})$#", "02.32.02.36.00"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}
echo '<br/><br/>';
echo '&nbsp;&nbsp;Email :  <br/>';
if(preg_match("#^[a-z0-9_.-]+@[a-z0-9_.-]{2,}\.[a-z]{2,4}$#", "mega-killer.le-retour@super-site.fr.st"))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}

echo '<br/><br/>';
echo '&nbsp;&nbsp;Email :  <br/>';
if(preg_match("#^ \/\/ $#", " // "))
{
	echo 'Vrais';
}
else
{
	echo 'Faux';
}


?>
