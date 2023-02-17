<?php $titulo="SIE de Investigaci&oacute;n y Ense&ntilde;anza - Manual de Condor: Estado de los trabajos enviados"; ?>
<?php $metadescription="Manual de Condor: Estado de los trabajos enviados"; ?>
<?php $metakeywords="Manual, Condor, Estado, Trabajos, Enviado"; ?>

<?php include("header_condor.php"); ?>

<!--Navigation Panel-->
<a  href="node10.php" name="tex2html156" id="tex2html156">
<img width="37" height="24" class="nav-img" alt="next" src="next.png" /></a> 
<a  href="node4.php" name="tex2html152" id="tex2html152">
<img width="26" height="24" class="nav-img" alt="up" src="up.png" /></a> 
<a  href="node8.php" name="tex2html146" id="tex2html146">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png" /></a> 
<a  href="node1.php" name="tex2html154" id="tex2html154">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png" /></a>  
<br />

<strong> Siguiente:</strong> <a  href="node10.php" name="tex2html157" id="tex2html157">Borrando
trabajos. condor_rm</a>
<strong> Subir:</strong> <a  href="node4.php" name="tex2html153" id="tex2html153">&iquest;C&oacute;mo
lo uso?</a>
<strong> Anterior:</strong> <a  href="node8.php" name="tex2html147" id="tex2html147">Sobre
el acceso </a> <strong>  <a  href="node1.php" name="tex2html155" id="tex2html155">&#205;ndice
 General</a></strong> 
<br />
<br />
<!--End of Navigation Panel-->


<h1><a name="SECTION00042000000000000000" id="SECTION00042000000000000000"></a>
<a name="sec::condor_q" id="sec::condor_q"></a>
Estado de los trabajos enviados. <em>condor_q</em>
</h1>

<p>
Podemos obtener informaci&#243;n acerca de nuestros trabajos con el comando <em>condor_q</em>:</p>

<pre>
[adrians@trevina ~]$ condor_submit myjob.submit
Submitting job(s).
Logging submit event(s).
1 job(s) submitted to cluster 1.

[adrians@trevina ~]$ condor_q


-- Submitter: trevina.iac.es : &lt;161.72.81.178:1085&gt; : trevina.iac.es
 ID      OWNER            SUBMITTED     RUN_TIME ST PRI SIZE CMD
   1.0   adrians         7/13 12:37   0+00:00:00 I  0   0.0  myprog Example.1.0

1 jobs; 1 idle, 0 running, 0 held
</pre>

<p>
Por defecto, este comando nos mostrar&#225; informaci&#243;n de los trabajos que hemos
enviado desde la m&#225;quina donde se ejecuta, en el ejemplo ser&#237;a ``trevina''.
La informaci&#243;n que aparece en la salida ser&#237;a:</p>

<ul>
<li>El <span class="tt">ID</span> es el identificador del trabajo y est&#225; formado por dos n&#250;meros:

<ul>
<li>El n&#250;mero antes del punto representa el ``cluster''. Un ``cluster'' es
            el conjunto de trabajos creado en un env&#237;o. Podemos ver un ejemplo en la salida
            del comando ``condor_submit''.
</li>
<li>El n&#250;mero despu&#233;s del punto representa el trabajo dentro del cluster,
            como en el ejemplo solo creamos uno, ser&#225; el trabajo 0. Trabajos
            sucesivos en el mismo cluster se nombrar&#237;an como 1.1, 1.2, ....
</li>
</ul>
</li>
<li>El usuario que env&#237;o los trabajos.</li>
<li>La fecha del env&#237;o.</li>
<li>El tiempo de ejecuci&#243;n, en el formato: D&#237;as+HH:MM:SS.</li>
<li>El estado actual del trabajo. Algunos valores posibles son:
        <dl>
<dt><strong>I:</strong></dt>
<dd>No se est&#225; ejecutando porque aun no se le ha asignado ninguna
            m&#225;quina (IDLE).

</dd>
<dt><strong>R:</strong></dt>
<dd>Ejecut&#225;ndose actualmente (RUNNING).

</dd>
<dt><strong>H:</strong></dt>
<dd>El trabajo no se est&#225; ejecutando por deseo del propietario
(HOLD). Ver el comando 
<a name="tex2html3"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/condor_hold.html">condor_hold</a>, 
<a name="tex2html4"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/condor_release.html">condor_release</a>
o la secci&oacute;n
<a name="tex2html5"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/2_6Managing_Job.html">Managing a Job </a>
del manual de Condor.</dd>
</dl>
</li>
<li>La prioridad del trabajo que ha especificado el usuario. Ver comando
<a name="tex2html6"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/condor_prio.html">condor_prio</a>
o
la secci&oacute;n <a name="tex2html7"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/2_6Managing_Job.html">Managing a Job</a>
del manual de Condor.</li>
<li>El tama&#241;o de la imagen del trabajo en megabytes.
</li>
<li>Y por &#250;ltimo, el nombre del ejecutable.
</li>
</ul>

<p>
En el caso de que un trabajo no se est&#233; ejecutando, este comando tambi&#233;n nos
permite conocer el motivo gracias a la opci&#243;n <span class="tt">-analyze</span>. Por ejemplo:</p>

<pre>
[adrians@trevina ~]$ condor_submit myjob.submit 
Submitting job(s).
Logging submit event(s).
1 job(s) submitted to cluster 1.

[adrians@trevina ~]$ condor_q -analyze


-- Submitter: trevina.iac.es : &lt;161.72.81.178:39869&gt; : trevina.iac.es
 ID      OWNER            SUBMITTED     RUN_TIME ST PRI SIZE CMD               
---
001.000:  Run analysis summary.  Of 187 machines,
    187 are rejected by your job's requirements
      0 reject your job because of their own requirements
      0 match, but are serving users with a better priority in the pool
      0 match, but prefer another specific job despite its worse user-priority
      0 match, but will not currently preempt their existing job
      0 are available to run your job
        No successful match recorded.
        Last failed match: Thu Sep 16 12:38:09 2004
        Reason for last match failure: no match found

WARNING:  Be advised:
   No resources matched request's constraints
   Check the Requirements expression below:

Requirements = ((Memory &gt; 2147483647)) &amp;&amp; (Arch == "INTEL") &amp;&amp;
(OpSys == "LINUX") &amp;&amp; (Disk &gt;= DiskUsage) &amp;&amp;
(TARGET.FileSystemDomain == MY.FileSystemDomain)
</pre>

<p>
En el ejemplo podemos ver como el trabajo 1.0 tiene problemas para ejecutarse:
nuestros requisitos (<span class="tt">Requirements</span>) han desechado 187 m&#225;quinas de las 187
candidatas. Adem&#225;s, <em>condor_q</em> nos sugiere que revisemos dicha expresi&#243;n y nos
la muestra en su salida (en el ejemplo vemos como el l&#237;mite m&#237;nimo de memoria
RAM es excesivo).</p>

<p>
Para m&#225;s informaci&#243;n puedes visitar la <a name="tex2html8"
href="http://www.cs.wisc.edu/condor/manual/v7.0/condor_q.html">p&#225;gina del manual de <em>condor_q
</em></a>, la secci&oacute;n<a name="tex2html9"
  href="http://www.cs.wisc.edu/condor/manual/v7.0/2_6Managing_Job.html">Managing a Job</a> del manual de Condor.
</p>

<hr />

<!--Navigation Panel-->

<a name="tex2html156"  href="node10.php">
<img width="37" height="24" class="nav-img" alt="next" src="next.png"></a> 
<a name="tex2html152"  href="node4.php">
<img width="26" height="24" class="nav-img" alt="up" src="up.png"></a> 
<a name="tex2html146"  href="node8.php">
<img width="63" height="24" class="nav-img" alt="previous" src="prev.png"></a> 
<a name="tex2html154"  href="node1.php">
<img width="65" height="24" class="nav-img" alt="contents" src="contents.png"></a>  
<br />
<strong> Siguiente:</strong> <a name="tex2html157"  href="node10.php">Borrando trabajos. condor_rm</a>
<strong> Subir:</strong> <a name="tex2html153"  href="node4.php">&iquest;C&oacute;mo lo uso?</a>
<strong> Anterior:</strong> <a name="tex2html147"  href="node8.php">Sobre el acceso </a> <strong>  
<a name="tex2html155"  href="node1.php">&#205;ndice General</a></strong> 
<!--End of Navigation Panel-->

<address>
Adrian Santos Marrero
2004-09-21
</address>

</body>
</html>
