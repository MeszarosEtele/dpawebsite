<h1>Elérhetőségek</h1>
<h3>Varga Mónika</h3> 
<p>koordinátor</p>
 

<strong>Cím:</strong> Drogoplex Ambulancia - 1152 Budapest, Arany János utca 73.<br>
<strong>Email:</strong> <a href="mailto:info@dpa.hu">i&#110;&#102;o&#64;&#100;pa.&#104;u</a><br> 
<strong>Telefon:</strong> +3613062584 <br><br>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2692.7828572577546!2d19.119266616342802!3d47.55255477918113!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741daff2f5a4535%3A0x5c99ac179bd1027c!2zRHJvZ3ByZXZlbmNpw7NzIEFsYXDDrXR2w6FueQ!5e0!3m2!1shu!2shu!4v1650472253767!5m2!1shu!2shu" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
<br>
<a target="_blank" href="https://www.google.com/maps/place/Drogprevenci%C3%B3s+Alap%C3%ADtv%C3%A1ny/@47.5525548,19.1192666,17z/data=!3m1!4b1!4m5!3m4!1s0x4741daff2f5a4535:0x5c99ac179bd1027c!8m2!3d47.5526116!4d19.1215283?hl=hu-HU">Nagyobb térkép</a>



<?php
if ($success == false) {
?>
<h1>Kapcsolat</h1>

<form name="kapcsolat" action="?oldal=kapcsolat" method="post">
    <div>
        <label><input type="text" id="email" name="email" size="30" maxlength="250" value="<?php echo $_POST ? $_POST['email'] : '';?>">E-mail (kötelező): </label>
        <br/>
        <label> <textarea id="uzenet" name="uzenet" cols="40" rows="10"><?php echo $_POST ? $_POST['uzenet'] : '';?></textarea> Üzenet (kötelező): </label>
        <br/>
        <input id="kuld" type="submit" value="Küld">
    </div>
</form>
<?php
}
?>